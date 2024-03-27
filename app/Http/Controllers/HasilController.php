<?php

namespace App\Http\Controllers;

use App\Helpers\GeoMetricMean;
use App\Helpers\MatrixMultiplication;
use App\Models\Anhipro;
use App\Models\Bobot;
use App\Models\CalculatePriorityWeights;
use App\Models\ConsistencyRatio;
use App\Models\ConsistencyRatioResult;
use App\Models\ConsistencyRatioResultConsistent;
use App\Models\Geomean;
use App\Models\Kriteria;
use App\Models\PairComparisonMatrix;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\type;

class HasilController extends Controller
{
    public function index()
    {
        return view('hasil.index');
    }

    public function store(Request $request)
    {
        $name = $request->input('calculate');

        $status = false;
        $message = 'Tidak dapat menghitung GMM/AHP saat ini. Silakan coba lagi nanti';

        if ($name == 'gmm') {
            [$status, $message] = $this->gmm_calculate();
        }

        if ($name == 'ahp') {
            [$status, $message] = $this->ahp_calculate();
        }

        return $status
            ? redirect()->route('Hasil::index')->with('success', $message)
            : redirect()->route('Hasil::index')->with('failed', $message);
    }

    protected function gmm_calculate(): array
    {
        $bobot = Bobot::all()->groupBy('id_kriteria');

        $status = false;
        $message = 'Tidak dapat menghitung GMM saat ini. Silakan coba lagi nanti';

        DB::beginTransaction();

        Geomean::query()->delete();

        try {
            $store = [];

            foreach ($bobot as $idKriteria => $bobots) {
                $numbers = [];

                foreach ($bobots as  $value) {
                    $numbers[] = $value->bobot;
                }

                $store[] = [
                    'kriteria_id' => $idKriteria,
                    'hasil' => GeoMetricMean::count($numbers)
                ];
            }

            Geomean::insert($store);

            $status = true;
            $message = 'Perhitungan GMM berhasil diselesaikan';
        } catch (\Throwable $th) {
            DB::rollBack();
        }

        DB::commit();

        return [$status, $message];
    }

    protected function ahp_calculate(): array
    {
        $geomean = Geomean::all();
        $criteria = Kriteria::all();

        $status = false;
        $message = 'Tidak dapat menghitung AHP saat ini. Silakan coba lagi nanti';

        DB::beginTransaction();

        try {
            if (!$this->pair_comparison_matrix($geomean, $criteria)) {
                return throw new Error('Matriks Perbandingan Pasangan Gagal!');
            }

            if (!$this->pair_comparison_matrix_result($criteria)) {
                return throw new Error('Hasil Matriks Perbandingan Pasangan Gagal!');
            }

            if (!$this->calculate_priority_weights($criteria)) {
                return throw new Error('Menghitung Bobot Prioritas Gagal!');
            }

            if (!$this->calculating_consistency_ratio($criteria)) {
                return throw new Error('Menghitung Rasio Konsistensi Gagal!');
            }

            if (!$this->devide_consistency_ratio_with_pw($criteria)) {
                return throw new Error('Membagi Rasio Konsistensi Dengan Pw Gagal!');
            }

            if (!$this->consistency_ratio()) {
                return throw new Error('Menghitung Rasio Konsistensi Konsistensi Gagal!');
            }

            $status = true;
            $message = 'Perhitungan AHP berhasil diselesaikan';

            DB::commit();
        } catch (\Throwable $th) {
            $message = $th->getMessage();

            DB::rollBack();
        }

        return [$status, $message];
    }

    protected function pair_comparison_matrix($geomean, $criteria): bool
    {
        $status = false;

        try {
            /** clean table AnHiPro */
            Anhipro::query()->delete();

            /** duplicate geomean */
            $geomean_insert = [];

            foreach ($geomean as $_geomean) {
                $geomean_insert[] = [
                    'kriteria_id' => $_geomean->kriteria_id,
                    'hasil' => $_geomean->hasil,
                ];
            }

            /** ids for filter kriteria */
            $criteria_ids = [];

            foreach ($geomean as $_geomean) {
                $criteria_ids[] = $_geomean->kriteria_id;
            }

            /** where not in geomean */
            $criteria_not_in_geomean = $criteria->whereNotIn('id', $criteria_ids);

            /** get value 1/geomean */
            foreach ($criteria_not_in_geomean as $cnig) {
                $jenis = $cnig->name; // reverse -> jenis
                $name = $cnig->jenis; // reverse -> name

                $_criteria_id = $criteria
                    ->where('jenis', $jenis)
                    ->where('name', $name)
                    ->first();

                $_geomean = $geomean->firstWhere('kriteria_id', $_criteria_id->id);

                $append_to_geomean_insert = [
                    'kriteria_id' => $cnig->id,
                    'hasil' => number_format(1 / $_geomean->hasil, 2)
                ];

                $geomean_insert[] = $append_to_geomean_insert;
            }

            /** insert duplication to database */
            Anhipro::insert($geomean_insert);

            $status = true;
        } catch (\Throwable $th) {
            //throw $th;
        }

        return $status;
    }

    protected function pair_comparison_matrix_result($criteria): bool
    {
        $status = false;

        try {
            $anhipro = Anhipro::all();
            $criteria_gb_jenis = $criteria->groupBy('jenis');

            /** delete PCM record */
            PairComparisonMatrix::query()->delete();

            foreach ($criteria_gb_jenis as $index => $criteria) {
                $criteria_count = 0;

                foreach ($criteria as $_index => $_criteria) {
                    $criteria_count += $anhipro->firstWhere('kriteria_id', $_criteria->id)?->hasil;
                }

                /** insert to PCM */
                PairComparisonMatrix::insert([
                    'name' => $index,
                    'hasil' => number_format($criteria_count, 2)
                ]);
            }

            $status = true;
        } catch (\Throwable $th) {
            //throw $th;
        }

        return $status;
    }

    protected function calculate_priority_weights($criteria): bool
    {
        $status = false;

        try {
            /**
             * get an duplicate and calcuated gmm from anhipro table
             * get pari comparison matrix result
             * criteria grouping by name
             */
            $anhipro = Anhipro::all();
            $pairComparisonMatrix = PairComparisonMatrix::all();
            $criteria_gb_name = $criteria->groupBy('name');

            /** clear table */
            CalculatePriorityWeights::query()->delete();

            foreach ($criteria_gb_name as $index => $criteria) {
                $jumlah = 0;

                foreach ($criteria as $_index => $_criteria) {
                    $hasil = $anhipro->firstWhere('kriteria_id', $_criteria->id)?->hasil /
                        $pairComparisonMatrix->firstWhere('name', $_criteria->jenis)?->hasil;

                    $jumlah += $hasil;
                }

                $pw = number_format($jumlah / 8, 2);
                $jumlah = number_format($jumlah, 3);

                $store = [
                    [
                        'name' => "{$index}-jumlah",
                        'hasil' => $jumlah,
                    ],
                    [
                        'name' => "{$index}-pw",
                        'hasil' => $pw,
                    ],
                ];

                /** CPW insert to database */
                CalculatePriorityWeights::insert($store);
            }

            $status = true;
        } catch (\Throwable $th) {
            //throw $th;
        }

        return $status;
    }

    protected function calculating_consistency_ratio($criteria): bool
    {
        $status = false;

        try {

            $anhipro = Anhipro::all();
            $criteria_gb_name = $criteria->groupBy('name');

            /** delete prev result */
            ConsistencyRatio::query()->delete();

            $ratio = [];
            $matrix1 = [];
            $matrix2 = [];

            $calculatePriorityWeights = CalculatePriorityWeights::query()->where('name', 'like', '%-pw')->get();

            foreach ($calculatePriorityWeights as $weight) {
                $matrix2[] = $weight->hasil;
            }

            foreach ($criteria_gb_name as $index => $criteria) {
                foreach ($criteria as $_criteria) {
                    $matrix1[$index][] = $anhipro->firstWhere('kriteria_id', $_criteria->id)?->hasil;
                }
            }

            $ratio = MatrixMultiplication::count($matrix1, $matrix2);
            $store = [];

            foreach ($ratio as $index => $_ratio) {
                $store[] = [
                    'name' => $index,
                    'hasil' => $_ratio,
                ];
            }

            /** store to database the result */
            ConsistencyRatio::insert($store);

            $status = true;
        } catch (\Throwable $th) {
            // throw $th;
        }

        return $status;
    }

    protected function devide_consistency_ratio_with_pw($criteria): bool
    {
        $status = false;

        try {
            /** take CCR result */
            $consistencyRatio = ConsistencyRatio::all();

            /** delete prev result */
            ConsistencyRatioResult::query()->delete();

            /** get the pw */
            $calculatePriorityWeights = CalculatePriorityWeights::query()->where('name', 'like', '%-pw')->get();

            $store = [];

            foreach ($consistencyRatio as $ratio) {
                $_ratio = $ratio?->hasil;
                $pw = $calculatePriorityWeights->firstWhere('name', "{$ratio?->name}-pw")?->hasil;

                $store[] = [
                    'name' => $ratio->name,
                    'hasil' => $_ratio / $pw,
                ];
            }

            /** store to database */
            ConsistencyRatioResult::insert($store);

            $status = true;
        } catch (\Throwable $th) {
            //throw $th;
        }

        return $status;
    }

    protected function consistency_ratio(): bool
    {
        $status = false;

        try {
            /** get thr result from devide concistency ratio*/
            $consistencyRatioResult = ConsistencyRatioResult::all();

            /** delete entry before */
            ConsistencyRatioResultConsistent::query()->delete();

            $result = 0;

            foreach ($consistencyRatioResult as $ratio) {
                $result += $ratio->hasil;
            }

            /**
             * $/8
             * ($-8)/(8-1)
             * $/1.41
             */

            /** c. Menghitung λmaks */
            $amaks = $result / 8;

            /** d. Menghitung Consistency Index(CI) */
            $ci = ($amaks - 8) / (8 - 1);

            /** e. Menghitung Consistency Ratio(CR) */
            $cr = $ci / 1.41;

            ConsistencyRatioResultConsistent::insert([
                'hasil' => $cr
            ]);

            $status = true;
        } catch (\Throwable $th) {
            //throw $th;
        }

        return $status;
    }
}

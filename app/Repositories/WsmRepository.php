<?php

namespace App\Repositories;

use App\Helpers\WeightedSumModel;
use App\Models\{
    Alat,
    CalculatePriorityWeights,
    Criteria,
    WsmNormalization,
    WsmPrepareNormalization,
    WsmResultNormalization,
};
use Error;
use Illuminate\Support\Facades\DB;

class WsmRepository
{
    public static function Calculate()
    {
        $status = false;
        $message = 'Tidak dapat menghitung WSM saat ini. Silakan coba lagi nanti';

        DB::beginTransaction();

        $_this = new self();

        try {

            if (!$_this->normalization()) {
                return throw new Error('Normalisasi Gagal!');
            }

            if (!$_this->wsm_normalization()) {
                return throw new Error('WSM Normalisasi Gagal!');
            }

            if (!$_this->wsm_result_normalization()) {
                return throw new Error('WSM Hasil Normalisasi Gagal!');
            }

            $status = true;
            $message = 'Perhitungan WSM berhasil diselesaikan';

            DB::commit();
        } catch (\Throwable $th) {
            $message = $th->getMessage();

            DB::rollBack();
        }

        return [$status, $message];
    }

    protected function normalization(): bool
    {
        $status = false;
        $equipments = Alat::all();

        /**
         * jam tersedia =(alternatif!I2 / MAX(alternatif!$I$2:$I$41)) * 100 (similar formula)
         * jam operasi  =(alternatif!J2 / MAX(alternatif!$J$2:$J$41)) * 100 (similar formula)
         * jam bda      =(alternatif!K2 / MAX(alternatif!$K$2:$K$41)) * 100 (similar formula)
         * jumlah bda   =(alternatif!L2 / MAX(alternatif!$L$2:$L$41)) * 100 (similar formula)
         */

        $alternatif_jam_tersedia = [];
        $alternatif_jam_operasi  = [];
        $alternatif_jam_bda      = [];
        $alternatif_jumlah_bda   = [];

        $_store = [];

        try {
            /** clear data before use */
            WsmPrepareNormalization::query()->delete();

            /** data store for each variable */
            foreach ($equipments as $equipment) {
                $alternatif_jam_tersedia[] = $equipment->jam_tersedia;
                $alternatif_jam_operasi[]  = $equipment->jam_operasi;
                $alternatif_jam_bda[]      = $equipment->jam_bda;
                $alternatif_jumlah_bda[]   = $equipment->jumlah_bda;
            }

            /** calculate the number */
            foreach ($equipments as $index => $equipment) {
                $_jam_tersedia = WeightedSumModel::number_devide_max_of($equipment->jam_tersedia, $alternatif_jam_tersedia);
                $_jam_operasi  = WeightedSumModel::number_devide_max_of($equipment->jam_operasi, $alternatif_jam_operasi);
                $_jam_bda      = WeightedSumModel::number_devide_max_of($equipment->jam_bda, $alternatif_jam_bda);
                $_jumlah_bda   = WeightedSumModel::number_devide_max_of($equipment->jumlah_bda, $alternatif_jumlah_bda);

                $_store[] = [
                    'kode'         => $equipment->kode,
                    'nama'         => $equipment->nama,
                    'utilisasi'    => $equipment->utilisasi,
                    'availability' => $equipment->availability,
                    'reliability'  => $equipment->reliability,
                    'idle'         => $equipment->idle,
                    'jam_tersedia' => $_jam_tersedia * 100,
                    'jam_operasi'  => $_jam_operasi * 100,
                    'jam_bda'      => $_jam_bda * 100,
                    'jumlah_bda'   => $_jumlah_bda * 100,
                ];
            }

            /** store data to database */
            WsmPrepareNormalization::insert($_store);

            $status = true;
        } catch (\Throwable $th) {
            //throw $th;
        }

        return $status;
    }

    protected function wsm_normalization()
    {
        $status = false;
        $criteria = Criteria::all();
        $equipments = WsmPrepareNormalization::all();

        /**
         * utilisasi    =(MIN(normalisasi!$E$2:$E$41))/normalisasi!E2      Utilisasi	 Cost
         * availability =(MIN(normalisasi!$F$2:$F$41))/normalisasi!F2      Availability	 Cost
         * reliability  =(MIN(normalisasi!$G$2:$G$41))/normalisasi!G2      Reliability	 Cost
         * idle         =normalisasi!H2/(MAX(normalisasi!$H$2:$H$41))      Jam idle	     Benefit
         * jam tersedia =(MIN(normalisasi!$I$2:$I$41))/normalisasi!I2      Jam tersedia	 Cost
         * jam operasi  =normalisasi!J2/(MAX(normalisasi!$J$2:$J$41))      Jam operasi	 Benefit
         * jam bda      =normalisasi!K2/(MAX(normalisasi!$K$2:$K$41))      Jumlah BDA	 Benefit
         * jumlah bda   =normalisasi!L2/(MAX(normalisasi!$L$2:$L$41))      Jam BDA	     Benefit
         */

        $normalisasi_utilisasi    = [];
        $normalisasi_availability = [];
        $normalisasi_reliability  = [];
        $normalisasi_idle         = [];
        $normalisasi_jam_tersedia = [];
        $normalisasi_jam_operasi  = [];
        $normalisasi_jam_bda      = [];
        $normalisasi_jumlah_bda   = [];

        $_store = [];

        try {
            /** clear data before use */
            WsmNormalization::query()->delete();

            /** data store for each variable */
            foreach ($equipments as $equipment) {
                $normalisasi_utilisasi[]    = $equipment->utilisasi;
                $normalisasi_availability[] = $equipment->availability;
                $normalisasi_reliability[]  = $equipment->reliability;
                $normalisasi_idle[]         = $equipment->idle;
                $normalisasi_jam_tersedia[] = $equipment->jam_tersedia;
                $normalisasi_jam_operasi[]  = $equipment->jam_operasi;
                $normalisasi_jam_bda[]      = $equipment->jam_bda;
                $normalisasi_jumlah_bda[]   = $equipment->jumlah_bda;
            }

            /** calculate the number */
            foreach ($equipments as $equipment) {
                $_store[] = [
                    'kode'         => $equipment->kode,
                    'nama'         => $equipment->nama,
                    'utilisasi'    => $this->wsm_normalization_count($criteria, 'Utilisasi', $equipment->utilisasi, $normalisasi_utilisasi),
                    'availability' => $this->wsm_normalization_count($criteria, 'Availability', $equipment->availability, $normalisasi_availability),
                    'reliability'  => $this->wsm_normalization_count($criteria, 'Reliability', $equipment->reliability, $normalisasi_reliability),
                    'idle'         => $this->wsm_normalization_count($criteria, 'Jam idle', $equipment->idle, $normalisasi_idle),
                    'jam_tersedia' => $this->wsm_normalization_count($criteria, 'Jam tersedia', $equipment->jam_tersedia, $normalisasi_jam_tersedia),
                    'jam_operasi'  => $this->wsm_normalization_count($criteria, 'Jam operasi', $equipment->jam_operasi, $normalisasi_jam_operasi),
                    'jam_bda'      => $this->wsm_normalization_count($criteria, 'Jumlah BDA', $equipment->jam_bda, $normalisasi_jam_bda),
                    'jumlah_bda'   => $this->wsm_normalization_count($criteria, 'Jam BDA', $equipment->jumlah_bda, $normalisasi_jumlah_bda),
                ];
            }

            /** store data to database */
            WsmNormalization::insert($_store);

            $status = true;
        } catch (\Throwable $th) {
            //throw $th;
        }

        return $status;
    }

    protected function wsm_result_normalization()
    {
        $status = false;
        $equipments = WsmNormalization::all();
        $ahp_pw = CalculatePriorityWeights::query()->where('name', 'like', '%-pw')->get();
        $pw = [];

        if ($ahp_pw->count() == 0) {
            return $status;
        }

        foreach ($ahp_pw as $ahp) {
            $pw[$ahp->name] = $ahp->hasil;
        }

        /**
         * utilisasi    ='WSM(normalisasi)'!E2*'WSM(normalisasi)'!$O$2
         * availability ='WSM(normalisasi)'!F2*'WSM(normalisasi)'!$O$3
         * reliability  ='WSM(normalisasi)'!G2*'WSM(normalisasi)'!O4
         * idle         ='WSM(normalisasi)'!H2*'WSM(normalisasi)'!$O$5
         * jam tersedia ='WSM(normalisasi)'!I2*'WSM(normalisasi)'!$O$6
         * jam operasi  ='WSM(normalisasi)'!J2*'WSM(normalisasi)'!$O$7
         * jam bda      ='WSM(normalisasi)'!K2*'WSM(normalisasi)'!$O$8
         * jumlah bda   ='WSM(normalisasi)'!L2*'WSM(normalisasi)'!$O$9
         * 
         * hasil        =SUM(F2;H2;I2;K2;L2)
         * rangking     =RANK.EQ(N2;$N$2:$N$41;0)
         */

        $_store = [];

        try {
            /** clear data before use */
            WsmResultNormalization::query()->delete();

            /** calculate the number */
            foreach ($equipments as $equipment) {
                $raw_data = [
                    'utilisasi'    => WeightedSumModel::multiple($equipment->utilisasi, $pw['Utilisasi-pw']),
                    'availability' => WeightedSumModel::multiple($equipment->availability, $pw['Availability-pw']),
                    'reliability'  => WeightedSumModel::multiple($equipment->reliability, $pw['Reliability-pw']),
                    'idle'         => WeightedSumModel::multiple($equipment->idle, $pw['Jam idle-pw']),
                    'jam_tersedia' => WeightedSumModel::multiple($equipment->jam_tersedia, $pw['Jam tersedia-pw']),
                    'jam_operasi'  => WeightedSumModel::multiple($equipment->jam_operasi, $pw['Jam operasi-pw']),
                    'jumlah_bda'   => WeightedSumModel::multiple($equipment->jumlah_bda, $pw['Jumlah BDA-pw']),
                    'jam_bda'      => WeightedSumModel::multiple($equipment->jam_bda, $pw['Jam BDA-pw']),
                ];

                $_store[] = array_merge(
                    [
                        'kode'         => $equipment->kode,
                        'nama'         => $equipment->nama,
                    ],
                    $raw_data,
                    [
                        'hasil'         => array_sum(array_values($raw_data)),
                    ]
                );
            }

            /** store data to database */
            WsmResultNormalization::insert($_store);

            /** sort by ranking */
            $wsm_results = WsmResultNormalization::all();
            $wsm_hasils  = DB::table('wsm_result_normalizations')->select('hasil')->get();
            $hasil = [];

            $__store = [];

            foreach ($wsm_hasils as $_hasil) {
                $hasil[] = $_hasil->hasil;
            }

            /** set ranking */
            foreach ($wsm_results as $wsm) {
                unset($wsm['id']);
                unset($wsm['created_at']);
                unset($wsm['updated_at']);

                $__store[] =  array_merge(
                    $wsm->toArray(),
                    [
                        'rangking' => WeightedSumModel::rank($wsm->hasil, $hasil)
                    ]
                );
            }

            /** clear data before use */
            WsmResultNormalization::query()->delete();

            /** store data to database */
            WsmResultNormalization::insert($__store);

            $status = true;
        } catch (\Throwable $th) {
            dd($th);
            //throw $th;
        }

        return $status;
    }

    protected function wsm_normalization_count($criteria, $name, $number, $numbers)
    {
        return $criteria->firstWhere('name', $name)->jenis === 'Cost'
            ? WeightedSumModel::min_devide_by_number($numbers, $number)
            : WeightedSumModel::number_devide_max_of($number, $numbers);
    }
}

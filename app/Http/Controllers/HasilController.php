<?php

namespace App\Http\Controllers;

use App\Helpers\GeoMetricMean;
use App\Models\Bobot;
use App\Models\Geomean;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        if ($name == 'gmm') {
            $status = $this->gmm_calculate();
        }

        return $status
            ? redirect()->route('Hasil::index')->with('success', 'Hasil berhasil hitung!')
            : redirect()->route('Hasil::index')->with('failed', 'bobot gagal dihitung!');
    }

    protected function gmm_calculate(): bool
    {
        $gmm = new GeoMetricMean();

        $bobot = Bobot::all()->groupBy('id_kriteria');

        $status = false;

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
                    'hasil' => $gmm->count($numbers)
                ];
            }

            Geomean::insert($store);

            $status = true;
        } catch (\Throwable $th) {
            DB::rollBack();
        }

        DB::commit();

        return $status;
    }
}

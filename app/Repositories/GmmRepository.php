<?php

namespace App\Repositories;

use App\Helpers\GeoMetricMean;
use App\Models\Bobot;
use App\Models\Geomean;
use Illuminate\Support\Facades\DB;

class GmmRepository
{
    public static function Calculate(): array
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
}

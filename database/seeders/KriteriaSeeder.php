<?php

namespace Database\Seeders;

use App\Models\Kriteria;
use Illuminate\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gmm_criteria = ['Utilisasi', 'Availability', 'Reliability', 'Jam idle', 'Jam tersedia', 'Jam operasi', 'Jumlah BDA', 'Jam BDA'];

        /** parent */
        collect($gmm_criteria)->each(function ($criteria) use ($gmm_criteria) {
            /** child */
            collect($gmm_criteria)->each(function ($_criteria) use ($criteria) {
                /** insert to database */
                Kriteria::create(['name' => $criteria, 'jenis' => $_criteria]);
            });
        });
    }
}

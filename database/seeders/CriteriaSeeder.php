<?php

namespace Database\Seeders;

use App\Models\Criteria;
use Illuminate\Database\Seeder;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $store = [
            [
                'name' => 'Utilisasi',
                'jenis' => 'Cost'
            ],
            [
                'name' => 'Availability',
                'jenis' => 'Cost'
            ],
            [
                'name' => 'Reliability',
                'jenis' => 'Cost'
            ],
            [
                'name' => 'Jam idle',
                'jenis' => 'Benefit'
            ],
            [
                'name' => 'Jam tersedia',
                'jenis' => 'Cost'
            ],
            [
                'name' => 'Jam operasi',
                'jenis' => 'Benefit'
            ],
            [
                'name' => 'Jumlah BDA',
                'jenis' => 'Benefit'
            ],
            [
                'name' => 'Jam BDA',
                'jenis' => 'Benefit'
            ],
        ];

        Criteria::insert($store);
    }
}

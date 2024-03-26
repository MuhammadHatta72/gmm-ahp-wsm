<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KriteriaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('kriteria')->delete();
        
        \DB::table('kriteria')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Utilisasi',
                'jenis' => 'Utilisasi',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Utilisasi',
                'jenis' => 'Availability',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Utilisasi',
                'jenis' => 'Reliability',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Utilisasi',
                'jenis' => 'Jam idle',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Utilisasi',
                'jenis' => 'Jam tersedia',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Utilisasi',
                'jenis' => 'Jam operasi',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Utilisasi',
                'jenis' => 'Jumlah BDA',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Utilisasi',
                'jenis' => 'Jam BDA',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Availability',
                'jenis' => 'Utilisasi',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Availability',
                'jenis' => 'Availability',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Availability',
                'jenis' => 'Reliability',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Availability',
                'jenis' => 'Jam idle',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Availability',
                'jenis' => 'Jam tersedia',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Availability',
                'jenis' => 'Jam operasi',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Availability',
                'jenis' => 'Jumlah BDA',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Availability',
                'jenis' => 'Jam BDA',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Reliability',
                'jenis' => 'Utilisasi',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Reliability',
                'jenis' => 'Availability',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Reliability',
                'jenis' => 'Reliability',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Reliability',
                'jenis' => 'Jam idle',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Reliability',
                'jenis' => 'Jam tersedia',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'Reliability',
                'jenis' => 'Jam operasi',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'Reliability',
                'jenis' => 'Jumlah BDA',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'Reliability',
                'jenis' => 'Jam BDA',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'Jam idle',
                'jenis' => 'Utilisasi',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'Jam idle',
                'jenis' => 'Availability',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'Jam idle',
                'jenis' => 'Reliability',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'Jam idle',
                'jenis' => 'Jam idle',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'Jam idle',
                'jenis' => 'Jam tersedia',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'Jam idle',
                'jenis' => 'Jam operasi',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'Jam idle',
                'jenis' => 'Jumlah BDA',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'Jam idle',
                'jenis' => 'Jam BDA',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'Jam tersedia',
                'jenis' => 'Utilisasi',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'Jam tersedia',
                'jenis' => 'Availability',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'Jam tersedia',
                'jenis' => 'Reliability',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'Jam tersedia',
                'jenis' => 'Jam idle',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'Jam tersedia',
                'jenis' => 'Jam tersedia',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'Jam tersedia',
                'jenis' => 'Jam operasi',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            38 => 
            array (
                'id' => 39,
                'name' => 'Jam tersedia',
                'jenis' => 'Jumlah BDA',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            39 => 
            array (
                'id' => 40,
                'name' => 'Jam tersedia',
                'jenis' => 'Jam BDA',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            40 => 
            array (
                'id' => 41,
                'name' => 'Jam operasi',
                'jenis' => 'Utilisasi',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            41 => 
            array (
                'id' => 42,
                'name' => 'Jam operasi',
                'jenis' => 'Availability',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            42 => 
            array (
                'id' => 43,
                'name' => 'Jam operasi',
                'jenis' => 'Reliability',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            43 => 
            array (
                'id' => 44,
                'name' => 'Jam operasi',
                'jenis' => 'Jam idle',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            44 => 
            array (
                'id' => 45,
                'name' => 'Jam operasi',
                'jenis' => 'Jam tersedia',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            45 => 
            array (
                'id' => 46,
                'name' => 'Jam operasi',
                'jenis' => 'Jam operasi',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            46 => 
            array (
                'id' => 47,
                'name' => 'Jam operasi',
                'jenis' => 'Jumlah BDA',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            47 => 
            array (
                'id' => 48,
                'name' => 'Jam operasi',
                'jenis' => 'Jam BDA',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            48 => 
            array (
                'id' => 49,
                'name' => 'Jumlah BDA',
                'jenis' => 'Utilisasi',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            49 => 
            array (
                'id' => 50,
                'name' => 'Jumlah BDA',
                'jenis' => 'Availability',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            50 => 
            array (
                'id' => 51,
                'name' => 'Jumlah BDA',
                'jenis' => 'Reliability',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            51 => 
            array (
                'id' => 52,
                'name' => 'Jumlah BDA',
                'jenis' => 'Jam idle',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            52 => 
            array (
                'id' => 53,
                'name' => 'Jumlah BDA',
                'jenis' => 'Jam tersedia',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            53 => 
            array (
                'id' => 54,
                'name' => 'Jumlah BDA',
                'jenis' => 'Jam operasi',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            54 => 
            array (
                'id' => 55,
                'name' => 'Jumlah BDA',
                'jenis' => 'Jumlah BDA',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            55 => 
            array (
                'id' => 56,
                'name' => 'Jumlah BDA',
                'jenis' => 'Jam BDA',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            56 => 
            array (
                'id' => 57,
                'name' => 'Jam BDA',
                'jenis' => 'Utilisasi',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            57 => 
            array (
                'id' => 58,
                'name' => 'Jam BDA',
                'jenis' => 'Availability',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            58 => 
            array (
                'id' => 59,
                'name' => 'Jam BDA',
                'jenis' => 'Reliability',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            59 => 
            array (
                'id' => 60,
                'name' => 'Jam BDA',
                'jenis' => 'Jam idle',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            60 => 
            array (
                'id' => 61,
                'name' => 'Jam BDA',
                'jenis' => 'Jam tersedia',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            61 => 
            array (
                'id' => 62,
                'name' => 'Jam BDA',
                'jenis' => 'Jam operasi',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            62 => 
            array (
                'id' => 63,
                'name' => 'Jam BDA',
                'jenis' => 'Jumlah BDA',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
            63 => 
            array (
                'id' => 64,
                'name' => 'Jam BDA',
                'jenis' => 'Jam BDA',
                'created_at' => '2024-03-19 10:19:30',
                'updated_at' => '2024-03-19 10:19:30',
            ),
        ));
        
        
    }
}
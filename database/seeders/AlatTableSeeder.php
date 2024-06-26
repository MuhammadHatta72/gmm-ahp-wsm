<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AlatTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('alat')->delete();

        \DB::table('alat')->insert(array(
            0 =>
            array(
                'kode' => 'TPNM-T2-FL-2-TON',
                'nama' => 'FL-2-TON-MITSUBISHI-TPNM T2',
                'utilisasi' => '1.00',
                'availability' => '100.00',
                'reliability' => '0.00',
                'idle' => '100.00',
                'jam_tersedia' => '720.00',
                'jam_operasi' => '0.00',
                'jam_bda' => '0.00',
                'jumlah_bda' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            1 =>
            array(
                'kode' => 'TPNM-T2-QCC-01',
                'nama' => 'QCC-01-I H I/STS-TPNM T2',
                'utilisasi' => '0.00',
                'availability' => '96.34',
                'reliability' => '0.00',
                'idle' => '96.34',
                'jam_tersedia' => '720.00',
                'jam_operasi' => '0.00',
                'jam_bda' => '21.32',
                'jumlah_bda' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            2 =>
            array(
                'kode' => 'TPNM-T2-QCC-02',
                'nama' => 'QCC-02-DOOSAN-TPNM T2',
                'utilisasi' => '0.00',
                'availability' => '75.81',
                'reliability' => '0.00',
                'idle' => '75.81',
                'jam_tersedia' => '720.00',
                'jam_operasi' => '0.00',
                'jam_bda' => '174.17',
                'jumlah_bda' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            3 =>
            array(
                'kode' => 'TPNM-T2-QCC-03',
                'nama' => 'QCC-03-MITSUBISHI-TPNM T2',
                'utilisasi' => '0.00',
                'availability' => '84.15',
                'reliability' => '0.00',
                'idle' => '84.15',
                'jam_tersedia' => '720.00',
                'jam_operasi' => '0.00',
                'jam_bda' => '114.10',
                'jumlah_bda' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            4 =>
            array(
                'kode' => 'TPNM-T2-QCC-04',
                'nama' => 'QCC-04-MITSUBISHI-TPNM T2',
                'utilisasi' => '0.00',
                'availability' => '98.75',
                'reliability' => '0.00',
                'idle' => '98.75',
                'jam_tersedia' => '720.00',
                'jam_operasi' => '0.00',
                'jam_bda' => '0.00',
                'jumlah_bda' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            5 =>
            array(
                'kode' => 'TPNM-T2-QCC-05',
                'nama' => 'QCC-05-NOELL-TPNM T2',
                'utilisasi' => '0.00',
                'availability' => '100.00',
                'reliability' => '0.00',
                'idle' => '100.00',
                'jam_tersedia' => '720.00',
                'jam_operasi' => '0.00',
                'jam_bda' => '0.00',
                'jumlah_bda' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            6 =>
            array(
                'kode' => 'TPNM-T2-QCC-06',
                'nama' => 'QCC-06-NOELL-TPNM T2',
                'utilisasi' => '0.00',
                'availability' => '100.00',
                'reliability' => '0.00',
                'idle' => '100.00',
                'jam_tersedia' => '720.00',
                'jam_operasi' => '0.00',
                'jam_bda' => '0.00',
                'jumlah_bda' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            7 =>
            array(
                'kode' => 'TPNM-T2-RST-01',
                'nama' => 'RST-01-KALMAR-TPNM T2',
                'utilisasi' => '0.00',
                'availability' => '99.25',
                'reliability' => '0.00',
                'idle' => '99.25',
                'jam_tersedia' => '720.00',
                'jam_operasi' => '0.00',
                'jam_bda' => '2.42',
                'jumlah_bda' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            8 =>
            array(
                'kode' => 'TPNM-T2-RST-02',
                'nama' => 'RST-02-KALMAR-TPNM T2',
                'utilisasi' => '0.00',
                'availability' => '100.00',
                'reliability' => '0.00',
                'idle' => '100.00',
                'jam_tersedia' => '720.00',
                'jam_operasi' => '0.00',
                'jam_bda' => '0.00',
                'jumlah_bda' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            9 =>
            array(
                'kode' => 'TPNM-T2-RTG-01',
                'nama' => 'RTG-01-KALMAR-TPNM T2',
                'utilisasi' => '0.00',
                'availability' => '100.00',
                'reliability' => '0.00',
                'idle' => '100.00',
                'jam_tersedia' => '720.00',
                'jam_operasi' => '0.00',
                'jam_bda' => '0.00',
                'jumlah_bda' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            10 =>
            array(
                'kode' => 'TPNM-T2-RTG-02',
                'nama' => 'RTG-02-KALMAR-TPNM T2',
                'utilisasi' => '0.00',
                'availability' => '100.00',
                'reliability' => '0.00',
                'idle' => '100.00',
                'jam_tersedia' => '720.00',
                'jam_operasi' => '0.00',
                'jam_bda' => '0.00',
                'jumlah_bda' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            11 =>
            array(
                'kode' => 'TPNM-T2-RTG-03',
                'nama' => 'RTG-03-KALMAR-TPNM T2',
                'utilisasi' => '0.00',
                'availability' => '100.00',
                'reliability' => '0.00',
                'idle' => '100.00',
                'jam_tersedia' => '720.00',
                'jam_operasi' => '0.00',
                'jam_bda' => '0.00',
                'jumlah_bda' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            12 =>
            array(
                'kode' => 'TPNM-T2-RTG-04',
                'nama' => 'RTG-04-KALMAR-TPNM T2',
                'utilisasi' => '0.00',
                'availability' => '100.00',
                'reliability' => '0.00',
                'idle' => '100.00',
                'jam_tersedia' => '720.00',
                'jam_operasi' => '0.00',
                'jam_bda' => '0.00',
                'jumlah_bda' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            13 =>
            array(
                'kode' => 'TPNM-T2-RTG-05',
                'nama' => 'RTG-05-KALMAR-TPNM T2',
                'utilisasi' => '0.00',
                'availability' => '100.00',
                'reliability' => '0.00',
                'idle' => '100.00',
                'jam_tersedia' => '720.00',
                'jam_operasi' => '0.00',
                'jam_bda' => '0.00',
                'jumlah_bda' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            14 =>
            array(
                'kode' => 'TPNM-T2-RTG-06',
                'nama' => 'RTG-06-KALMAR-TPNM T2',
                'utilisasi' => '0.00',
                'availability' => '99.29',
                'reliability' => '0.00',
                'idle' => '99.29',
                'jam_tersedia' => '720.00',
                'jam_operasi' => '0.00',
                'jam_bda' => '3.63',
                'jumlah_bda' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            15 =>
            array(
                'kode' => 'TPNM-T2-RTG-07',
                'nama' => 'RTG-07-KALMAR-TPNM T2',
                'utilisasi' => '0.00',
                'availability' => '99.57',
                'reliability' => '0.00',
                'idle' => '99.57',
                'jam_tersedia' => '720.00',
                'jam_operasi' => '0.00',
                'jam_bda' => '0.00',
                'jumlah_bda' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            16 =>
            array(
                'kode' => 'TPNM-T2-RTG-08',
                'nama' => 'RTG-08-KALMAR-TPNM T2',
                'utilisasi' => '0.00',
                'availability' => '31.68',
                'reliability' => '0.00',
                'idle' => '31.68',
                'jam_tersedia' => '720.00',
                'jam_operasi' => '0.00',
                'jam_bda' => '491.88',
                'jumlah_bda' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            17 =>
            array(
                'kode' => 'TPNM-T2-RTG-09',
                'nama' => 'RTG-09-KALMAR-TPNM T2',
                'utilisasi' => '0.00',
                'availability' => '100.00',
                'reliability' => '0.00',
                'idle' => '100.00',
                'jam_tersedia' => '720.00',
                'jam_operasi' => '0.00',
                'jam_bda' => '0.00',
                'jumlah_bda' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            18 =>
            array(
                'kode' => 'TPNM-T2-RTG-10',
                'nama' => 'RTG-10-KALMAR-TPNM T2',
                'utilisasi' => '0.00',
                'availability' => '100.00',
                'reliability' => '0.00',
                'idle' => '100.00',
                'jam_tersedia' => '720.00',
                'jam_operasi' => '0.00',
                'jam_bda' => '0.00',
                'jumlah_bda' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            19 =>
            array(
                'kode' => 'TPNM-T2-RTG-11',
                'nama' => 'RTG-11-KALMAR-TPNM T2',
                'utilisasi' => '0.00',
                'availability' => '98.85',
                'reliability' => '0.00',
                'idle' => '98.85',
                'jam_tersedia' => '720.00',
                'jam_operasi' => '0.00',
                'jam_bda' => '8.28',
                'jumlah_bda' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            20 =>
            array(
                'kode' => 'TPNM-T2-RTG-12',
                'nama' => 'RTG-12-KALMAR-TPNM T2',
                'utilisasi' => '0.00',
                'availability' => '99.66',
                'reliability' => '0.00',
                'idle' => '99.66',
                'jam_tersedia' => '720.00',
                'jam_operasi' => '0.00',
                'jam_bda' => '0.00',
                'jumlah_bda' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            21 =>
            array(
                'kode' => 'TPNM-T2-RTG-13',
                'nama' => 'RTG-13-KALMAR-TPNM T2',
                'utilisasi' => '0.00',
                'availability' => '100.00',
                'reliability' => '0.00',
                'idle' => '100.00',
                'jam_tersedia' => '720.00',
                'jam_operasi' => '0.00',
                'jam_bda' => '0.00',
                'jumlah_bda' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            22 =>
            array(
                'kode' => 'TPNM-T2-RTG-14',
                'nama' => 'RTG-14-KALMAR-TPNM T2',
                'utilisasi' => '0.00',
                'availability' => '99.50',
                'reliability' => '0.00',
                'idle' => '99.50',
                'jam_tersedia' => '720.00',
                'jam_operasi' => '0.00',
                'jam_bda' => '3.60',
                'jumlah_bda' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            23 =>
            array(
                'kode' => 'TPNM-T2-RTG-15',
                'nama' => 'RTG-15-KALMAR-TPNM T2',
                'utilisasi' => '0.00',
                'availability' => '99.41',
                'reliability' => '0.00',
                'idle' => '99.41',
                'jam_tersedia' => '720.00',
                'jam_operasi' => '0.00',
                'jam_bda' => '0.00',
                'jumlah_bda' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            24 =>
            array(
                'kode' => 'TPNM-T2-RTG-16',
                'nama' => 'RTG-16-KALMAR-TPNM T2',
                'utilisasi' => '0.00',
                'availability' => '99.66',
                'reliability' => '0.00',
                'idle' => '99.66',
                'jam_tersedia' => '720.00',
                'jam_operasi' => '0.00',
                'jam_bda' => '2.48',
                'jumlah_bda' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            25 =>
            array(
                'kode' => 'TPNM-T2-TTR-01',
                'nama' => 'TTR-01-OTTAWA-TPNM T2',
                'utilisasi' => '0.00',
                'availability' => '99.65',
                'reliability' => '0.00',
                'idle' => '99.65',
                'jam_tersedia' => '720.00',
                'jam_operasi' => '0.00',
                'jam_bda' => '0.00',
                'jumlah_bda' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            26 =>
            array(
                'kode' => 'TPNM-T2-TTR-02',
                'nama' => 'TTR-02-OTTAWA-TPNM T2',
                'utilisasi' => '0.00',
                'availability' => '99.67',
                'reliability' => '0.00',
                'idle' => '99.67',
                'jam_tersedia' => '720.00',
                'jam_operasi' => '0.00',
                'jam_bda' => '0.00',
                'jumlah_bda' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            27 =>
            array(
                'kode' => 'TPNM-T2-TTR-03',
                'nama' => 'TTR-03-OTTAWA-TPNM T2',
                'utilisasi' => '0.00',
                'availability' => '99.56',
                'reliability' => '0.00',
                'idle' => '99.56',
                'jam_tersedia' => '720.00',
                'jam_operasi' => '0.00',
                'jam_bda' => '0.00',
                'jumlah_bda' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            28 =>
            array(
                'kode' => 'TPNM-T2-TTR-04',
                'nama' => 'TTR-04-OTTAWA-TPNM T2',
                'utilisasi' => '0.00',
                'availability' => '99.43',
                'reliability' => '0.00',
                'idle' => '99.43',
                'jam_tersedia' => '720.00',
                'jam_operasi' => '0.00',
                'jam_bda' => '0.00',
                'jumlah_bda' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            29 =>
            array(
                'kode' => 'TPNM-T2-TTR-05',
                'nama' => 'TTR-05-OTTAWA-TPNM T2',
                'utilisasi' => '0.00',
                'availability' => '99.58',
                'reliability' => '0.00',
                'idle' => '99.58',
                'jam_tersedia' => '720.00',
                'jam_operasi' => '0.00',
                'jam_bda' => '0.00',
                'jumlah_bda' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            30 =>
            array(
                'kode' => 'TPNM-T2-TTR-06',
                'nama' => 'TTR-06-OTTAWA-TPNM T2',
                'utilisasi' => '0.00',
                'availability' => '96.28',
                'reliability' => '0.00',
                'idle' => '96.28',
                'jam_tersedia' => '720.00',
                'jam_operasi' => '0.00',
                'jam_bda' => '0.00',
                'jumlah_bda' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            31 =>
            array(
                'kode' => 'TPNM-T2-TTR-07',
                'nama' => 'TTR-07-OTTAWA-TPNM T2',
                'utilisasi' => '0.00',
                'availability' => '99.11',
                'reliability' => '0.00',
                'idle' => '99.11',
                'jam_tersedia' => '720.00',
                'jam_operasi' => '0.00',
                'jam_bda' => '0.00',
                'jumlah_bda' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            32 =>
            array(
                'kode' => 'TPNM-T2-TTR-08',
                'nama' => 'TTR-08-OTTAWA-TPNM T2',
                'utilisasi' => '0.00',
                'availability' => '98.67',
                'reliability' => '0.00',
                'idle' => '98.67',
                'jam_tersedia' => '720.00',
                'jam_operasi' => '0.00',
                'jam_bda' => '7.27',
                'jumlah_bda' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            33 =>
            array(
                'kode' => 'TPNM-T2-TTR-09',
                'nama' => 'TTR-09-OTTAWA-TPNM T2',
                'utilisasi' => '0.00',
                'availability' => '99.56',
                'reliability' => '0.00',
                'idle' => '99.56',
                'jam_tersedia' => '720.00',
                'jam_operasi' => '0.00',
                'jam_bda' => '0.00',
                'jumlah_bda' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            34 =>
            array(
                'kode' => 'TPNM-T2-TTR-10',
                'nama' => 'TTR-10-OTTAWA-TPNM T2',
                'utilisasi' => '0.00',
                'availability' => '99.58',
                'reliability' => '0.00',
                'idle' => '99.58',
                'jam_tersedia' => '720.00',
                'jam_operasi' => '0.00',
                'jam_bda' => '0.00',
                'jumlah_bda' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            35 =>
            array(
                'kode' => 'TPNM-T2-TTR-11',
                'nama' => 'TTR-11-OTTAWA-TPNM T2',
                'utilisasi' => '0.00',
                'availability' => '88.19',
                'reliability' => '0.00',
                'idle' => '88.19',
                'jam_tersedia' => '720.00',
                'jam_operasi' => '0.00',
                'jam_bda' => '0.00',
                'jumlah_bda' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            36 =>
            array(
                'kode' => 'TPNM-T2-TTR-12',
                'nama' => 'TTR-12-OTTAWA-TPNM T2',
                'utilisasi' => '0.00',
                'availability' => '80.88',
                'reliability' => '0.00',
                'idle' => '80.88',
                'jam_tersedia' => '720.00',
                'jam_operasi' => '0.00',
                'jam_bda' => '137.65',
                'jumlah_bda' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            37 =>
            array(
                'kode' => 'TPNM-T2-TTR-13',
                'nama' => 'TTR-13-OTTAWA-TPNM T2',
                'utilisasi' => '0.00',
                'availability' => '99.69',
                'reliability' => '0.00',
                'idle' => '99.69',
                'jam_tersedia' => '720.00',
                'jam_operasi' => '0.00',
                'jam_bda' => '0.00',
                'jumlah_bda' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            38 =>
            array(
                'kode' => 'TPNM-T2-TTR-14',
                'nama' => 'TTR-14-OTTAWA-TPNM T2',
                'utilisasi' => '0.00',
                'availability' => '99.65',
                'reliability' => '0.00',
                'idle' => '99.65',
                'jam_tersedia' => '720.00',
                'jam_operasi' => '0.00',
                'jam_bda' => '0.00',
                'jumlah_bda' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            39 =>
            array(
                'kode' => 'TPNM-T2-TTR-15',
                'nama' => 'TTR-15-OTTAWA-TPNM T2',
                'utilisasi' => '0.00',
                'availability' => '99.63',
                'reliability' => '0.00',
                'idle' => '99.63',
                'jam_tersedia' => '720.00',
                'jam_operasi' => '0.00',
                'jam_bda' => '0.00',
                'jumlah_bda' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ),
        ));
    }
}

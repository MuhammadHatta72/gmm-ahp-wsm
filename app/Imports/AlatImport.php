<?php

namespace App\Imports;

use App\Models\Alat;
use App\Models\AlatMaster;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class AlatImport implements WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    public function updateOrInsertData(array $row)
    {

        //cek row pada nama dan kode pada alat master, kalo ada tidak masuk ke database. Kalo gak ada masuk ke database

        $cek = AlatMaster::where('kode', $row[2])->where('nama', $row[3])->first();
        if (!$cek) {
            return null;
        }

        return Alat::updateOrInsert(
            ['kode' => $row[2]], // Kolom untuk mencocokkan data yang sudah ada
            [
                'nama' => $row[3],
                'utilisasi' => $row[4],
                'availability' => $row[5],
                'reliability' => $row[6],
                'idle' => $row[7],
                'jam_tersedia' => $row[8],
                'jam_operasi' => $row[9],
                'jam_bda' => $row[10],
                'jumlah_bda' => $row[11],
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }

    public function startRow(): int
    {
        return 2;
    }
}

<?php

namespace App\Imports;

use App\Models\Alat;
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
            ]
        );
    }
    
    public function startRow(): int
    {
        return 2;
    }
    
}

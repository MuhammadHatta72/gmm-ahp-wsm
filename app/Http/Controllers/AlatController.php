<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alat;
use App\Imports\AlatImport;
use Maatwebsite\Excel\Facades\Excel;

class AlatController extends Controller
{
    public function index(Request $request)
    {
        $query = Alat::query();

        $month = $request->get('month');
        if ($month) {
            $query->whereMonth('updated_at', '=', \Carbon\Carbon::parse($month)->month)
                ->whereYear('updated_at', '=', \Carbon\Carbon::parse($month)->year);
        }

        $alat = $query->get();

        return view('alat.index', compact('alat', 'month'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ], [
            'file.required' => 'Pilih file terlebih dahulu.',
            'file.mimes' => 'File harus berformat Excel (xlsx) atau CSV.',
        ]);

        $data = $request->file('file');

        $namaFile = $data->getClientOriginalName();
        $data->move('DataAlat', $namaFile);

        $import = new AlatImport();
        Excel::import($import, public_path('/DataAlat/' . $namaFile));

        // Ambil data dari file Excel
        $dataFromExcel = Excel::toArray($import, public_path('/DataAlat/' . $namaFile));

        // Loop melalui setiap baris data dan lakukan operasi update atau insert
        foreach ($dataFromExcel[0] as $row) {
            $import->updateOrInsertData($row);
        }

        return redirect()->route('Alat::index')->with('success', 'Import data berhasil');
    }
}

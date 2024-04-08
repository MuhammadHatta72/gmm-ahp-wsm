<?php

namespace App\Http\Controllers;

use App\Exports\HasilExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class HasilExportController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return Excel::download(new HasilExport, 'hasil.xlsx');
    }
}

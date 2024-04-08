<?php

namespace App\Exports;

use App\Models\WsmResultNormalization;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class HasilExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('exports.hasil', [
            'results' => WsmResultNormalization::query()->orderBy('rangking')->get()
        ]);
    }
}

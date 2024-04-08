<?php

namespace App\View\Components;

use App\Models\WsmPrepareNormalization;
use Illuminate\View\Component;

class TableNormalisasiShowComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $normalisasi = WsmPrepareNormalization::all();

        return view('components.table-normalisasi-show-component', compact('normalisasi'));
    }
}

<?php

namespace App\View\Components;

use App\Models\WsmNormalization;
use Illuminate\View\Component;

class TableWSMNormalisasiShowComponent extends Component
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
        $wsm_prep_normalisasi = WsmNormalization::all();

        return view('components.table-w-s-m-normalisasi-show-component', compact('wsm_prep_normalisasi'));
    }
}

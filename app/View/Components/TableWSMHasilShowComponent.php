<?php

namespace App\View\Components;

use App\Models\WsmResultNormalization;
use Illuminate\View\Component;

class TableWSMHasilShowComponent extends Component
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
        $wsm_result_normalisasi = WsmResultNormalization::all();

        return view('components.table-w-s-m-hasil-show-component', compact('wsm_result_normalisasi'));
    }
}

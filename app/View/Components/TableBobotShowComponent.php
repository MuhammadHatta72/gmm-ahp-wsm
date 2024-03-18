<?php

namespace App\View\Components;

use App\Models\Geomean;
use App\Models\Kriteria;
use Illuminate\View\Component;

class TableBobotShowComponent extends Component
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
        $geomean = Geomean::with('kriteria')->get();
        $gmm_criteria = Kriteria::all()->groupBy('name');

        return view('components.table-bobot-show-component', compact('geomean', 'gmm_criteria'));
    }
}

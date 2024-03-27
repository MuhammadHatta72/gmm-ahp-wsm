<?php

namespace App\View\Components;

use App\Models\ConsistencyRatioResult;
use Illuminate\View\Component;

class TableMenghitungConsistencyRatioCRShowComponent extends Component
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
        $consistencyRatioResult = ConsistencyRatioResult::all();

        return view('components.table-menghitung-consistency-ratio-c-r-show-component', [
            'consistencyRatioResult' => $consistencyRatioResult,
        ]);
    }
}

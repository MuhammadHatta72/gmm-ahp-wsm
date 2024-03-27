<?php

namespace App\View\Components;

use App\Models\ConsistencyRatioResult;
use Illuminate\View\Component;

class TableDevideConsistencyRatioWithPwShowComponent extends Component
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

        return view('components.table-devide-consistency-ratio-with-pw-show-component', [
            'consistencyRatioResult' => $consistencyRatioResult,
        ]);
    }
}

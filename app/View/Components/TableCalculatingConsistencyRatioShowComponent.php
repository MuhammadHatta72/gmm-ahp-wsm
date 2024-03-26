<?php

namespace App\View\Components;

use App\Models\Anhipro;
use App\Models\CalculatePriorityWeights;
use App\Models\ConsistencyRatio;
use App\Models\Kriteria;
use App\Models\PairComparisonMatrix;
use Illuminate\View\Component;

class TableCalculatingConsistencyRatioShowComponent extends Component
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
        $anhipro = Anhipro::with('kriteria')->get();
        $pairComparisonMatrix = PairComparisonMatrix::all();
        $calculatePriorityWeights = CalculatePriorityWeights::query()->where('name', 'like', '%-pw')->get();
        $consistencyRatio = ConsistencyRatio::all();
        $criteria = Kriteria::all();
        $criteria_gb_name = $criteria->groupBy('name');
        $criteria_gb_jenis = $criteria->groupBy('jenis');

        return view('components.table-calculating-consistency-ratio-show-component', [
            'anhipro' => $anhipro,
            'pairComparisonMatrix' => $pairComparisonMatrix,
            'calculatePriorityWeights' => $calculatePriorityWeights,
            'consistencyRatio' => $consistencyRatio,
            'criteria_gb_name' => $criteria_gb_name,
            'criteria_gb_jenis' => $criteria_gb_jenis,
        ]);
    }
}

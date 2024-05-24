<?php

namespace App\View\Components;

use App\Models\Anhipro;
use App\Models\CalculatePriorityWeights;
use App\Models\Kriteria;
use App\Models\PairComparisonMatrix;
use Illuminate\View\Component;

class TableCalculatePriorityWeightsShowComponent extends Component
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
        // $calculatePriorityWeights = CalculatePriorityWeights::all()->sortByDesc('hasil');
        // Mengambil dan mengurutkan data sesuai kriteria
        $calculatePriorityWeights = CalculatePriorityWeights::where('name', 'like', '%-pw')
            ->orderBy('hasil', 'desc')
            ->get();
        $criteria = Kriteria::all();
        $criteria_gb_name = $criteria->groupBy('name');
        $criteria_gb_jenis = $criteria->groupBy('jenis');

        $dataCalculatePriorityWeights = [];
        foreach ($criteria_gb_name as $index => $criteria) {
            $dataCalculatePriorityWeights[$index] = number_format($calculatePriorityWeights->firstWhere('name', "{$index}-pw")?->hasil, 2);
        }
        arsort($dataCalculatePriorityWeights);

        return view('components.table-calculate-priority-weights-show-component', [
            'anhipro' => $anhipro,
            'pairComparisonMatrix' => $pairComparisonMatrix,
            'calculatePriorityWeights' => $calculatePriorityWeights,
            'criteria_gb_name' => $criteria_gb_name,
            'criteria_gb_jenis' => $criteria_gb_jenis,
            'dataCalculatePriorityWeights' => $dataCalculatePriorityWeights
        ]);
    }
}

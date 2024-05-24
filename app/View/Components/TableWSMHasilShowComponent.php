<?php

namespace App\View\Components;

use App\Models\WsmResultNormalization;
use Illuminate\View\Component;

class TableWSMHasilShowComponent extends Component
{
    public $filter;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($filter = null)
    {
        $this->filter = $filter;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        // $wsm_result_normalisasi = WsmResultNormalization::query()->orderBy('rangking')->get();

        // dd($this->filter);

        // $wsm_result_normalisasi = WsmResultNormalization::query()
        //     ->orderBy('hasil', 'desc') // Urutkan berdasarkan 'hasil' dalam urutan menurun
        //     ->orderBy('rangking')      // Urutkan berdasarkan 'rangking' setelahnya
        //     ->get();

        $query = WsmResultNormalization::query()
            ->orderBy('hasil', 'desc') // Urutkan berdasarkan 'hasil' dalam urutan menurun
            ->orderBy('rangking');     // Urutkan berdasarkan 'rangking' setelahnya

        if ($this->filter) {
            $query->where('nama', 'like', "{$this->filter}%");
        }

        $wsm_result_normalisasi = $query->get();


        return view('components.table-w-s-m-hasil-show-component', compact('wsm_result_normalisasi'));
    }
}

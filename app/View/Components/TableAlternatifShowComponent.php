<?php

namespace App\View\Components;

use App\Models\Alat;
use Illuminate\View\Component;

class TableAlternatifShowComponent extends Component
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
        $alternatif = Alat::all();

        return view('components.table-alternatif-show-component', compact('alternatif'));
    }
}

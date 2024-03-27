<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SelectInputBobot extends Component
{
    protected $id;
    protected $name;
    protected $dvalue;
    protected $readonly;
    protected $disabled;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $id,
        $name,
        $dvalue = 0,
        $readonly = 0,
        $disabled = 0,
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->dvalue = $dvalue;
        $this->readonly = $readonly;
        $this->disabled = $disabled;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.select-input-bobot', [
            'id' => $this->id,
            'name' => $this->name,
            'dvalue' => $this->dvalue,
            'readonly' => $this->readonly,
            'disabled' => $this->disabled,
        ]);
    }
}

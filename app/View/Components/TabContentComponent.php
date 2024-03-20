<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TabContentComponent extends Component
{

    protected $key;
    protected $active;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $key, string $active = '')
    {
        $this->key = $key;
        $this->active = $active;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tab-content-component', [
            'key' => $this->key,
            'active' => $this->active,
        ]);
    }
}

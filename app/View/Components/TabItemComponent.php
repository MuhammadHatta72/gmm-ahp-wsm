<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TabItemComponent extends Component
{

    protected $key;
    protected $icon;
    protected $title;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        string $key,
        string $title,
        string $icon = '',
    ) {
        $this->key = $key;
        $this->icon = $icon;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tab-item-component', [
            'key' => $this->key,
            'icon' => $this->icon,
            'title' => $this->title,
        ]);
    }
}

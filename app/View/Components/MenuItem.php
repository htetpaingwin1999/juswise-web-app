<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MenuItem extends Component
{
    public $link, $icon, $name;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($link, $icon, $name)
    {
        $this->link = $link;
        $this->icon = $icon;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.menu-item');
    }
}

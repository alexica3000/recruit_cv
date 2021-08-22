<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Search extends Component
{
    public string $name;
    public string $placeholder;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $name = 'search', string $placeholder = 'Search')
    {
        $this->name = $name;
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.search');
    }
}

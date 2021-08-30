<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ErrorInput extends Component
{
    public string $inputName;

    public function __construct(string $inputName)
    {
        $this->inputName = $inputName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.error-input');
    }
}

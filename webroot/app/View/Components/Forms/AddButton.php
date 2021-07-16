<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;
use Illuminate\View\View;

class AddButton extends Component
{
    public string $route;

    public function __construct($route)
    {
        $this->route = $route;
    }

    public function render(): View
    {
        return view('components.forms.add-button');
    }
}

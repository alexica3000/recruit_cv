<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;
use Illuminate\View\View;

class AddButton extends Component
{
    public string $route;
    public string $text;

    public function __construct(string $route, string $text = 'Add')
    {
        $this->route = $route;
        $this->text = $text;
    }

    public function render(): View
    {
        return view('components.forms.add-button');
    }
}

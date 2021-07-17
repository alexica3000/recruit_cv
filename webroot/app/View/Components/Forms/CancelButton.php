<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;
use Illuminate\View\View;

class CancelButton extends Component
{
    public string $text;
    public string $route;

    public function __construct(string $route, string $text = 'Cancel')
    {
        $this->route = $route;
        $this->text = $text;
    }

    public function render(): View
    {
        return view('components.forms.cancel-button');
    }
}

<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Errors extends Component
{
    public function render(): View
    {
        return view('components.errors');
    }
}

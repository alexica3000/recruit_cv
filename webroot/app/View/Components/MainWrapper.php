<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class MainWrapper extends Component
{
    public function render(): View
    {
        return view('components.main-wrapper');
    }
}

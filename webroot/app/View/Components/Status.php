<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Status extends Component
{
    public function render(): View
    {
        return view('components.status');
    }
}

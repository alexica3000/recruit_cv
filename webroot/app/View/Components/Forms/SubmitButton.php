<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;
use Illuminate\View\View;

class SubmitButton extends Component
{
    public string $text;

    public function __construct(string $text)
    {
        $this->text = $text;
    }

    public function render(): View
    {
        return view('components.forms.submit-button');
    }
}

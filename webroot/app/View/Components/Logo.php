<?php

namespace App\View\Components;

use App\Interfaces\HasImagesInterface;
use Illuminate\View\Component;

class Logo extends Component
{
    public HasImagesInterface $model;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(HasImagesInterface $model)
    {
        $this->model = $model;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.logo');
    }
}

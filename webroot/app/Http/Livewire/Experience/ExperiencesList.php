<?php

namespace App\Http\Livewire\Experience;

use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class ExperiencesList extends Component
{
    public string $title;
    public string $field_name;
    public string $field_short;
    public Collection $experiences;

    public function mount()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.experience.experiences-list');
    }

    public function editExperience()
    {
//        $this->showModal = true;
    }
}

<?php

namespace App\Http\Livewire\Experience;

use App\Models\Experience;
use App\Models\Recruit;

class ExperiencesListEducation extends ExperiencesList
{
    protected $listeners = [
        ExperiencesList::TYPE_EDUCATION => 'updateTypeEducation',
    ];

    public function updateTypeEducation(Recruit $recruit)
    {
        $this->experiences = $recruit->educations;
    }

    public function create()
    {
        $this->emit('createExperience', $this->recruit->id, Experience::TYPE_EDUCATION);
    }
}

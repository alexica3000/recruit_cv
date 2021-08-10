<?php

namespace App\Http\Livewire\Experience;

use App\Models\Experience;
use App\Models\Recruit;

class ExperiencesListCourse extends ExperiencesList
{
    protected $listeners = [
        ExperiencesList::TYPE_COURSE => 'updateTypeCourse',
    ];

    public function updateTypeCourse(Recruit $recruit)
    {
        $this->experiences = $recruit->courses;
    }

    public function create()
    {
        $this->emit('createExperience', $this->recruit->id, Experience::TYPE_COURSE);
    }
}

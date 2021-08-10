<?php

namespace App\Http\Livewire\Experience;

use App\Models\Recruit;

class ExperiencesListCourse extends ExperiencesList
{
    protected $listeners = [
        ExperiencesList::TYPE_COURSE => 'updateTypeCourse',
    ];

    public function updateTypeCourse(Recruit $recruit)
    {
        $this->experiences = $recruit->educations;
    }
}

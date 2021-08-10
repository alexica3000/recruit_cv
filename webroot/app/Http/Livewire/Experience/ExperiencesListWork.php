<?php

namespace App\Http\Livewire\Experience;

use App\Models\Recruit;

class ExperiencesListWork extends ExperiencesList
{
    protected $listeners = [
        ExperiencesList::TYPE_WORK => 'updateTypeWork',
    ];

    public function updateTypeWork(Recruit $recruit)
    {
        $this->experiences = $recruit->works;
    }
}

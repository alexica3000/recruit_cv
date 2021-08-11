<?php

namespace App\Http\Livewire\Experience;

use App\Models\Experience;
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

    public function create()
    {
        $this->emit('createExperience', $this->recruit->id, Experience::TYPE_WORK);
    }

    public function delete(Experience $experience)
    {
        $recruit = $experience->recruit;
        $experience->delete();
        $this->updateTypeWork($recruit);
    }
}

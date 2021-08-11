<?php

namespace App\Http\Livewire\Qualification;

use App\Models\Qualification;

class QualificationsListSkill extends QualificationsList
{
    protected $listeners = [
        self::TYPE_LISTENER_SKILL => 'updateQualifications',
    ];

    public function mount()
    {
        $this->title = Qualification::TYPES[Qualification::TYPE_SKILL];
        $this->qualifications = $this->recruit->qualificationsByType(Qualification::TYPE_SKILL);
        $this->fieldName = 'Skills';
        $this->fieldShort = 'Level';
    }

    public function create()
    {
        $this->emit('createQualification', $this->recruit->id, Qualification::TYPE_SKILL);
    }

    public function updateQualifications()
    {
        $this->qualifications = $this->recruit->qualificationsByType(Qualification::TYPE_SKILL);
    }
}

<?php

namespace App\Http\Livewire\Qualification;

use App\Models\Qualification;
use Livewire\Component;

class QualificationsListSocial extends QualificationsList
{
    protected $listeners = [
        self::TYPE_LISTENER_SOCIAL => 'updateQualifications',
    ];

    public function mount()
    {
        $this->title = Qualification::TYPES[Qualification::TYPE_SOCIAL];
        $this->qualifications = $this->recruit->qualificationsByType(Qualification::TYPE_SOCIAL);
        $this->fieldName = 'Platform';
        $this->fieldShort = 'Link';
    }

    public function create()
    {
        $this->emit('createQualification', $this->recruit->id, Qualification::TYPE_SOCIAL);
    }

    public function updateQualifications()
    {
        $this->qualifications = $this->recruit->qualificationsByType(Qualification::TYPE_SOCIAL);
    }
}

<?php

namespace App\Http\Livewire\Qualification;

use App\Models\Qualification;
use Livewire\Component;

class QualificationsListInterest extends QualificationsList
{
    protected $listeners = [
        self::TYPE_LISTENER_INTEREST => 'updateQualifications',
    ];

    public function mount()
    {
        $this->title = Qualification::TYPES[Qualification::TYPE_INTEREST];
        $this->qualifications = $this->recruit->qualificationsByType(Qualification::TYPE_INTEREST);
        $this->fieldName = 'Interest';
        $this->fieldShort = 'Description';
    }

    public function create()
    {
        $this->emit('createQualification', $this->recruit->id, Qualification::TYPE_INTEREST);
    }

    public function updateQualifications()
    {
        $this->qualifications = $this->recruit->qualificationsByType(Qualification::TYPE_INTEREST);
    }
}

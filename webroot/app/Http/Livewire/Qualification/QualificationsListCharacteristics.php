<?php

namespace App\Http\Livewire\Qualification;

use App\Models\Qualification;
use Livewire\Component;

class QualificationsListCharacteristics extends QualificationsList
{
    protected $listeners = [
        self::TYPE_LISTENER_CHARACTERISTIC => 'updateQualifications',
    ];

    public function mount()
    {
        $this->title = Qualification::TYPES[Qualification::TYPE_CHARACTERISTIC];
        $this->qualifications = $this->recruit->qualificationsByType(Qualification::TYPE_CHARACTERISTIC);
        $this->fieldName = 'Characteristic';
        $this->fieldShort = 'Description';
    }

    public function create()
    {
        $this->emit('createQualification', $this->recruit->id, Qualification::TYPE_CHARACTERISTIC);
    }

    public function updateQualifications()
    {
        $this->qualifications = $this->recruit->qualificationsByType(Qualification::TYPE_CHARACTERISTIC);
    }
}

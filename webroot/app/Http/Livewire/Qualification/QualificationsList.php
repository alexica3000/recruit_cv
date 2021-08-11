<?php

namespace App\Http\Livewire\Qualification;

use App\Models\Qualification;
use App\Models\Recruit;
use Illuminate\Support\Collection;
use Livewire\Component;

abstract class QualificationsList extends Component
{
    public const TYPE_LISTENER_SKILL          = 'TYPE_LISTENER_SKILL';
    public const TYPE_LISTENER_SOCIAL         = 'TYPE_LISTENER_SOCIAL';
    public const TYPE_LISTENER_INTEREST       = 'TYPE_LISTENER_INTEREST';
    public const TYPE_LISTENER_CHARACTERISTIC = 'TYPE_LISTENER_CHARACTERISTIC';

    public string $title;
    public Collection $qualifications;
    public Recruit $recruit;

    public string $fieldName;
    public string $fieldShort;

    public abstract function mount();
    public abstract function updateQualifications();

    public function render()
    {
        return view('livewire.qualification.qualifications-list');
    }

    public function delete(Qualification $qualification)
    {
        $qualification->delete();
        $this->updateQualifications();
    }
}

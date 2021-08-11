<?php

namespace App\Http\Livewire\Qualification;

use App\Models\Qualification;
use App\Models\Recruit;
use Livewire\Component;

class Form extends Component
{
    public string $name;
    public string $short;
    public Recruit $recruit;
    public Qualification $qualification;
    public bool $showModal;
    public string $type;

    protected $listeners = [
        'createQualification'  => 'create',
        'editQualification'    => 'edit',
    ];

    protected $rules = [
        'name'  => 'required|string|max:191',
        'short' => 'required|string|max:191',
    ];

    public function render()
    {
        return view('livewire.qualification.form');
    }

    public function create(Recruit $recruit, string $type): void
    {
        $this->resetData();
        $this->recruit = $recruit;
        $this->type = $type;
        $this->showModal = true;
    }

    public function edit(Qualification $qualification): void
    {
        $this->name          = $qualification->name;
        $this->short         = $qualification->short;
        $this->showModal     = true;
        $this->qualification = $qualification;
    }

    public function submit(): void
    {
        isset($this->qualification->id) ? $this->updateQualification() : $this->addQualification();
    }

    public function addQualification(): void
    {
        $this->validate();

        $this->recruit->qualifications()->create([
            'name'  => $this->name,
            'short' => $this->short,
            'type'  => $this->type,
        ]);

        $this->emit($this->getTypeListener($this->type));
        $this->hideModal();
    }

    public function updateQualification(): void
    {
        $this->validate();

        $this->qualification->update([
            'name'  => $this->name,
            'short' => $this->short,
        ]);

        $this->emit($this->getTypeListener($this->type));
        $this->hideModal();
    }

    public function resetData(): void
    {
        $this->name = '';
        $this->short = '';
        $this->qualification = new Qualification();
    }

    public function hideModal(): void
    {
        $this->showModal = false;
    }

    public function getTypeListener(string $type): string
    {
        return match ($type) {
            Qualification::TYPE_SKILL => QualificationsList::TYPE_LISTENER_SKILL,
            Qualification::TYPE_SOCIAL => QualificationsList::TYPE_LISTENER_SOCIAL,
            Qualification::TYPE_INTEREST => QualificationsList::TYPE_LISTENER_INTEREST,
            Qualification::TYPE_CHARACTERISTIC => QualificationsList::TYPE_LISTENER_CHARACTERISTIC,
            default => '',
        };
    }
}

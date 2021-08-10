<?php

namespace App\Http\Livewire\Experience;

use App\Models\Experience;
use Livewire\Component;

class ModalExperienceForm extends Component
{
    public Experience $experience;
    public bool $showModal;
    public string $field;
    public string $title;

    public string $name = '';
    public string $short = '';
    public string $start = '';
    public string $end = '';
    public string $description = '';

    protected $listeners = ['editExperience' => 'edit'];

    protected $rules = [
        'name'             => 'required|string|max:191',
        'short'            => 'required|string|max:191',
        'start'            => 'required|date',
        'end'              => 'nullable|date',
        'description'      => 'required|string',
    ];

    public function render()
    {
        return view('livewire.experience.modal-experience-form');
    }

    public function edit(Experience $experience)
    {
        $this->name        = $experience->name;
        $this->short       = $experience->short;
        $this->start       = $experience->start ? $experience->start->format('Y-m-d') : '';
        $this->end         = $experience->end ? $experience->end->format('Y-m-d') : '';
        $this->description = $experience->description;
        $this->showModal   = true;
        $this->experience  = $experience;
    }

    public function hideModal()
    {
        $this->showModal = false;
    }

    public function updateExperience()
    {
        $this->validate();

        $this->experience->update([
            'name'        => $this->name,
            'short'       => $this->short,
            'start'       => $this->start,
            'end'         => $this->end,
            'description' => $this->description,
        ]);

        $this->emit($this->getTypeListener(), $this->experience->recruit->id);
        $this->hideModal();
    }

    public function getTypeListener(): string
    {
        return match ($this->experience->type) {
            Experience::TYPE_WORK => ExperiencesList::TYPE_WORK,
            Experience::TYPE_COURSE => ExperiencesList::TYPE_COURSE,
            Experience::TYPE_EDUCATION => ExperiencesList::TYPE_EDUCATION,
            default => '',
        };
    }
}

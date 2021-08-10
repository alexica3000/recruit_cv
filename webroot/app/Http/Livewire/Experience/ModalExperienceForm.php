<?php

namespace App\Http\Livewire\Experience;

use App\Models\Experience;
use Livewire\Component;

class ModalExperienceForm extends Component
{
    public Experience $experience;
    public int $recruitId;
    public string $type;
    public bool $showModal;
    public string $field;
    public string $title;

    public string $name;
    public string $short;
    public string $start;
    public string $end;
    public string $description;

    protected $listeners = [
        'createExperience'  => 'create',
        'editExperience'    => 'edit',
    ];

    protected $rules = [
        'name'             => 'required|string|max:191',
        'short'            => 'required|string|max:191',
        'start'            => 'required|date',
        'end'              => 'nullable|date',
        'description'      => 'required|string',
    ];

    public function mount()
    {
        $this->experience = new Experience();
    }

    public function render()
    {
        return view('livewire.experience.modal-experience-form');
    }


    public function create(int $recruitId, string $type): void
    {
        $this->resetData();
        $this->recruitId = $recruitId;
        $this->type = $type;
        $this->showModal = true;
    }

    public function edit(Experience $experience): void
    {
        $this->name        = $experience->name;
        $this->short       = $experience->short;
        $this->start       = $experience->start ? $experience->start->format('Y-m-d') : '';
        $this->end         = $experience->end ? $experience->end->format('Y-m-d') : '';
        $this->description = $experience->description;
        $this->showModal   = true;
        $this->experience  = $experience;
        $this->recruitId   = $experience->recruit->id;
    }

    public function addExperience()
    {
        $this->validate();

        Experience::query()->create([
            'recruit_id'  => $this->recruitId,
            'type'        => $this->type,
            'name'        => $this->name,
            'short'       => $this->short,
            'start'       => $this->start,
            'end'         => $this->end,
            'description' => $this->description,
        ]);

        $this->hideModal();
        $this->emit($this->getTypeListener($this->type), $this->recruitId);
    }

    public function updateExperience(): void
    {
        $this->validate();

        $this->experience->update([
            'name'        => $this->name,
            'short'       => $this->short,
            'start'       => $this->start,
            'end'         => $this->end,
            'description' => $this->description,
        ]);

        $this->emit($this->getTypeListener($this->experience->type), $this->recruitId);
        $this->hideModal();
    }

    public function getTypeListener(string $type): string
    {
        return match ($type) {
            Experience::TYPE_WORK => ExperiencesList::TYPE_WORK,
            Experience::TYPE_COURSE => ExperiencesList::TYPE_COURSE,
            Experience::TYPE_EDUCATION => ExperiencesList::TYPE_EDUCATION,
            default => '',
        };
    }

    public function resetData()
    {
        $this->name = '';
        $this->short = '';
        $this->start = '';
        $this->end = '';
        $this->description = '';
        $this->experience = new Experience();
    }

    public function submit()
    {
        isset($this->experience->id) ? $this->updateExperience() : $this->addExperience();
    }

    public function hideModal(): void
    {
        $this->showModal = false;
    }
}

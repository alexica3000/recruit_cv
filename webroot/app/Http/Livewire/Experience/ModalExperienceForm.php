<?php

namespace App\Http\Livewire\Experience;

use App\Models\Experience;
use Livewire\Component;

class ModalExperienceForm extends Component
{
    public Experience $experience;
    public bool $showModal;

    protected $listeners = ['editExperience' => 'edit'];

    public function render()
    {
        return view('livewire.experience.modal-experience-form');
    }

    public function edit()
    {
        $this->showModal = true;
    }

    public function hideModal()
    {
        $this->showModal = false;
    }
}

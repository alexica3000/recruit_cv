<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Modal extends Component
{
    public bool $hidden = true;
    public ?User $user;

    protected $listeners = ['showModal' => 'show'];

    public function render()
    {
        return view('livewire.modal');
    }

    public function show(User $user)
    {
        $this->user = $user;

        $this->hidden = false;
    }

    public function hide()
    {
        $this->hidden = true;
    }

    public function confirm()
    {
        $this->emit('deleteUser', $this->user);
        $this->hide();
        $this->user = null;
    }
}

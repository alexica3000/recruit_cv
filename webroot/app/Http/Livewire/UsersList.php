<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\View\View;
use Livewire\Component;

class UsersList extends Component
{
    public $users;

    public function mount()
    {
        $this->users = User::query()->latest()->get();
    }

    public function render(): View
    {
        return view('livewire.users-list');
    }

    public function destroy(User $user)
    {
        $user->delete();

        $this->users = User::query()->latest()->get();
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;

class UsersList extends Component
{
    public Collection $users;

    protected $listeners = ['deleteUser' => 'destroy'];

    public function mount()
    {
        $this->users = User::query()->latest()->get();
    }

    public function render(): View
    {
        return view('livewire.users-list');
    }

    /**
     * @throws \Throwable
     */
    public function destroy(User $user)
    {
        abort_if(auth()->id() == $user->id, 403, 'You cannot delete yourself.');

        $user->delete();
        $this->users = User::query()->latest()->get();
    }
}

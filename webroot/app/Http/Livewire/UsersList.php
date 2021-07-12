<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;

class UsersList extends Component
{
    public Collection $users;
    public ?string $roleId = null;

    protected $listeners = ['deleteUser' => 'destroy'];

    public function mount()
    {

    }

    public function render(): View
    {
        $this->users = $this->getUsers();

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

    private function getUsers(): Collection
    {
        return User::query()
            ->when($this->roleId, function(Builder $query) {
                $query->where('role_id', $this->roleId);
            })
            ->latest()
            ->get();
    }
}

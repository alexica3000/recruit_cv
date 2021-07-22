<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

/**
 * Class UsersList
 * @package App\Http\Livewire
 * @property string $search;
 * @property string $roleId;
 */
class UsersList extends Component
{
    use WithPagination;

    protected LengthAwarePaginator $users;
    public string $search;
    public string $roleId;

    protected $listeners = ['deleteUser' => 'destroy'];

    public function mount()
    {
        $this->clear();
    }

    public function render(): View
    {
        return view('livewire.users-list', ['users' => $this->getUsers()]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function destroy(User $user): void
    {
        abort_if(auth()->id() == $user->id, 403, 'You cannot delete yourself.');

        $user->delete();
    }

    private function getUsers(): LengthAwarePaginator
    {
        return User::query()
            ->when($this->search, function(Builder $query) {
                $query->where('name', 'like', "%$this->search%");
            })
            ->when($this->roleId, function(Builder $query) {
                $query->where('role_id', $this->roleId);
            })
            ->orderBy('id', 'desc')
            ->paginate();
    }

    public function clear(): void
    {
        $this->search = '';
        $this->roleId = '';
    }
}

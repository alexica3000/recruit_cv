<?php

namespace App\Http\Livewire;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
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
    public ?string $companyId;

    protected $listeners = ['deleteUser' => 'destroy'];

    public function mount(string $companyId = null)
    {
        $this->clear();
        $this->companyId = $companyId ?? '';
    }

    public function render(): View
    {
        return view('livewire.users-list', ['users' => $this->getUsers(), 'companies' => $this->getCompanies()]);
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
            ->with('company')
            ->when($this->search, function(Builder $query) {
                $query->where('name', 'like', "%$this->search%");
            })
            ->when($this->roleId, function(Builder $query) {
                $query->where('role_id', $this->roleId);
            })
            ->when($this->companyId, function(Builder $query) {
                $query->where('company_id', $this->companyId);
            })
            ->orderBy('id', 'desc')
            ->paginate();
    }

    private function getCompanies(): Collection
    {
        return Company::query()
            ->whereHas('users')
            ->orderBy('name')
            ->get();
    }

    public function clear(): void
    {
        $this->search = '';
        $this->roleId = '';
        $this->companyId = '';
        request()->query->remove('companyId');
    }
}

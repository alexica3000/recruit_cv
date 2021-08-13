<?php

namespace App\Http\Livewire\Client;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;

class ClientRecruits extends Component
{
    use WithPagination;

    public string $search = '';

    public function render()
    {
        return view('livewire.client.client-recruits', ['recruits' => $this->getRecruits()]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    private function getRecruits(): LengthAwarePaginator
    {
        /** @var User $user */
        $user = auth()->user();
        return $user->company->recruits()->paginate();
    }
}

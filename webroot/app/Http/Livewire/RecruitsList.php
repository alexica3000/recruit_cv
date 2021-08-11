<?php

namespace App\Http\Livewire;

use App\Models\Recruit;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class RecruitsList extends Component
{
    use WithPagination;

    public string $search = '';

    public function render(): View
    {
        return view('livewire.recruits-list', ['recruits' => $this->getRecruits()]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    private function getRecruits(): LengthAwarePaginator
    {
        return Recruit::query()
            ->when($this->search, fn(Builder $query) => $query->where('name', 'like', '%' . $this->search . '%'))
            ->orderByDesc('id')
            ->paginate();
    }
}

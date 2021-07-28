<?php

namespace App\Http\Livewire;

use App\Models\Recruit;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class RecruitsList extends Component
{
    use WithPagination;

    public function render(): View
    {
        return view('livewire.recruits-list', ['recruits' => $this->getRecruits()]);
    }

    private function getRecruits(): LengthAwarePaginator
    {
        return Recruit::query()
            ->orderByDesc('id')
            ->paginate();
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Department;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Livewire\Component;

class DepartmentsList extends Component
{
    public Collection $departments;
    public ?string $search = null;

    public function render()
    {
        $this->departments = $this->getDepartments();

        return view('livewire.departments-list');
    }

    private function getDepartments(): Collection
    {
        return Department::query()
            ->when($this->search, function(Builder $query) {
                $query->where('name', 'like', "%$this->search%");
            })
            ->latest()
            ->get();
    }
}

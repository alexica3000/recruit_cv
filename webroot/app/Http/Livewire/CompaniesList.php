<?php

namespace App\Http\Livewire;

use App\Models\Company;
use App\Services\ImageService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

/**
 * Class CompaniesList
 * @package App\Http\Livewire
 * @property string $search;
 */
class CompaniesList extends Component
{
    use WithPagination;

    public string $search = '';

    public function render(): View
    {
        return view('livewire.companies-list', ['companies' => $this->getCompanies()]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    private function getCompanies(): LengthAwarePaginator
    {
        return Company::query()
            ->with('images')
            ->when($this->search, function(Builder $query) {
                $query->where('name', 'like', "%$this->search%");
            })
            ->orderBy('id', 'desc')
            ->paginate();
    }

    public function destroy(Company $company, ImageService $service): void
    {
        $service->deleteImage($company->logo);
        $company->delete();
    }
}

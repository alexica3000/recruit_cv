<?php

namespace App\Http\Livewire;

use App\Models\Company;
use App\Services\ImageService;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class CompaniesList extends Component
{
    use WithPagination;

    protected $companies;
    public ?string $search = null;

    public function render()
    {
        $this->companies = $this->getCompanies();

        return view('livewire.companies-list', ['companies' => $this->companies]);
    }

    private function getCompanies()
    {
        return Company::query()
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
        $this->companies = $this->getCompanies();
    }
}

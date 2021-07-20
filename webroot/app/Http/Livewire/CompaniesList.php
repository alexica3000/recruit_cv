<?php

namespace App\Http\Livewire;

use App\Models\Company;
use App\Services\ImageService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Livewire\Component;

class CompaniesList extends Component
{
    public Collection $companies;
    public ?string $search = null;

    public function render()
    {
        $this->companies = $this->getCompanies();

        return view('livewire.companies-list');
    }

    private function getCompanies(): Collection
    {
        return Company::query()
            ->when($this->search, function(Builder $query) {
                $query->where('name', 'like', "%$this->search%");
            })
            ->orderBy('id', 'desc')
            ->get();
    }

    public function destroy(Company $company, ImageService $service): void
    {
        $service->deleteImage($company->logo);
        $company->delete();
        $this->companies = $this->getCompanies();
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Company;
use App\Models\Recruit;
use Illuminate\Support\Collection;
use Livewire\Component;

class ClientRecruits extends Component
{
    public Collection $availableCompanies;
    public Collection $sharedCompanies;
    public Recruit $recruit;
    public string $selectedCompany;

    protected $rules = [
        'selectedCompany' => 'required|string'
    ];

    public function mount()
    {
        $this->loadData();
    }

    public function updatedSelectedCompany()
    {
        $this->recruit->companies()->attach($this->selectedCompany);
        $this->loadData();
    }

    public function delete(int $companyId)
    {
        $this->recruit->companies()->detach($companyId);
        $this->loadData();
    }

    public function render()
    {
        return view('livewire.client-recruits');
    }

    public function getAvailableCompanies(): Collection
    {
        $sharedCompaniesId = $this->recruit->companies->pluck('id')->toArray();
        $companies = Company::query()->orderBy('name')->get();

        return $companies->filter(function(Company $company) use ($sharedCompaniesId) {
            return !in_array($company->id, $sharedCompaniesId);
        });
    }

    public function loadData()
    {
        $this->recruit->load('companies');
        $this->sharedCompanies = $this->recruit->companies;
        $this->availableCompanies = $this->getAvailableCompanies();
        $this->selectedCompany = '';
    }
}

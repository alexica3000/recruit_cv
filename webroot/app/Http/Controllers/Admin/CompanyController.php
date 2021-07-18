<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\View\View;

class CompanyController extends Controller
{
    public function index(): View
    {
        return view('admin.companies.index');
    }

    public function create(): View
    {
        return view('admin.companies.create');
    }

    public function store(CompanyRequest $request): View
    {
        Company::query()->create($request->validated());

        return view('admin.companies.index');
    }

    public function show()
    {
        abort(404);
    }

    public function edit(Company $company): View
    {
        return view('admin.companies.edit', compact('company'));
    }

    public function update(CompanyRequest $request, Company $company): View
    {
        $company->update($request->validated());

        return view('admin.companies.edit', compact('company'));
    }

    public function destroy()
    {
        abort(404);
    }
}

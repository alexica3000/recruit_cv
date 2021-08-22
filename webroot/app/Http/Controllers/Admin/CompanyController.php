<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use App\Services\ImageService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CompanyController extends Controller
{
    public function index(): View
    {
        return view('admin.companies.index');
    }

    public function create(): View
    {
        return view('admin.companies.create_edit');
    }

    public function store(CompanyRequest $request, ImageService $service): RedirectResponse
    {
        /** @var Company $company */
        $company = Company::query()->create($request->validated());
        $service->saveImage($request, $company);

        return redirect()->route('companies.index')->with('status', 'The Company has been saved successfully.');
    }

    public function show()
    {
        abort(404);
    }

    public function edit(Company $company): View
    {
        return view('admin.companies.create_edit', compact('company'));
    }

    public function update(CompanyRequest $request, Company $company, ImageService $service): RedirectResponse
    {
        $company->update($request->validated());
        $service->updateImage($request, $company);

        return redirect()->route('companies.edit', $company)->with('status', 'The Company has been saved successfully.');
    }

    public function destroy()
    {
        abort(404);
    }
}

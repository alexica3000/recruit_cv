<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Base\BaseRecruitController;
use App\Http\Requests\RecruitRequest;
use App\Models\Recruit;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RecruitController extends BaseRecruitController
{
    public function index(): View
    {
        return view('admin.recruits.index');
    }

    public function create(): View
    {
        return view('admin.recruits.create');
    }

    public function store(RecruitRequest $request): RedirectResponse
    {
        $this->storeRecruit($request);

        return redirect()->route('recruits.index')->with('status', 'The recruit has been saved successfully.');
    }

    public function show()
    {
        abort(404);
    }

    public function edit(Recruit $recruit): View
    {
        return view('admin.recruits.edit', compact('recruit'));
    }

    public function update(RecruitRequest $request, Recruit $recruit): RedirectResponse
    {
        $this->updateRecruit($request, $recruit);

        return redirect()->route('recruits.edit', $recruit)->with('status', 'The recruit has been updated successfully.');
    }

    public function destroy()
    {
        abort(404);
    }
}

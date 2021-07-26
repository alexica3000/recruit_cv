<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RecruitRequest;
use App\Models\Recruit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RecruitController extends Controller
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
        Recruit::query()->create($request->validated());

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
        $recruit->update($request->validated());

        return redirect()->route('recruits.edit', $recruit)->with('status', 'The recruit has been updated successfully.');
    }

    public function destroy()
    {
        abort(404);
    }
}

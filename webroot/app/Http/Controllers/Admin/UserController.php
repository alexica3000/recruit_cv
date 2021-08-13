<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        return view('admin.users.index');
    }

    public function create(): View
    {
        $companies = Company::query()->orderBy('name')->get();

        return view('admin.users.create', compact('companies'));
    }

    public function store(UserRequest $request) : RedirectResponse
    {
        /** @var User $user */
        $user = User::query()->create($request->only('name', 'email', 'role_id') + ['password' => bcrypt($request->input('password'))]);
        $this->saveCompany($request, $user);

        return redirect()->route('users.index')->with('status', 'User has been saved successfully.');
    }

    public function show()
    {
        abort(404);
    }

    public function edit(User $user): View
    {
        $companies = Company::query()->orderBy('name')->get();

        return view('admin.users.edit', compact('user', 'companies'));
    }

    public function update(UserRequest $request, User $user): RedirectResponse
    {
        $user->update($request->only(['name', 'email', 'role_id']));

        if ($request->input('password')) {
            $user->update(['password' => bcrypt($request->input('password'))]);
        }

        $this->saveCompany($request, $user);

        return redirect()->route('users.edit', $user)->with('status', 'User has been updated successfully.');
    }

    public function destroy()
    {
        abort(404);
    }

    private function saveCompany(UserRequest $request, User $user)
    {
        if ($request->input('company')) {
            $company = Company::query()->where('id', $request->input('company'))->first();
            $user->company()->associate($company);
            $user->save();
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Actions\UserActions;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Company;
use App\Models\User;
use App\Services\CompanyService;
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

        return view('admin.users.create_edit', compact('companies'));
    }

    public function store(UserRequest $request, UserActions $actions) : RedirectResponse
    {
        /** @var User $user */
        $user = User::query()->create($request->only('name', 'email', 'role_id') + ['password' => bcrypt($request->input('password'))]);
        $actions->saveCompany($request, $user);

        return redirect()->route('users.index')->with('status', 'User has been saved successfully.');
    }

    public function show()
    {
        abort(404);
    }

    public function edit(User $user): View
    {
        $companies = Company::query()->orderBy('name')->get();

        return view('admin.users.create_edit', compact('user', 'companies'));
    }

    public function update(UserRequest $request, User $user, UserActions $actions): RedirectResponse
    {
        $user->update($request->only(['name', 'email', 'role_id']));

        if ($request->input('password')) {
            $user->update(['password' => bcrypt($request->input('password'))]);
        }

        $actions->saveCompany($request, $user);

        return redirect()->route('users.edit', $user)->with('status', 'User has been updated successfully.');
    }

    public function destroy()
    {
        abort(404);
    }
}

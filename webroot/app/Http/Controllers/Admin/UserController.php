<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
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
        return view('admin.users.create');
    }

    public function store(UserRequest $request) : RedirectResponse
    {
        User::query()->create($request->only('name', 'email', 'role_id') + ['password' => bcrypt($request->input('password'))]);

        return redirect()->route('users.index');
    }

    public function show()
    {
        abort(404);
    }

    public function edit(User $user): View
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(UserRequest $request, User $user): RedirectResponse
    {
        $user->update($request->only(['name', 'email', 'role_id']));

        if ($request->input('password')) {
            $user->update(['password' => bcrypt($request->input('password'))]);
        }

        return redirect()->route('users.edit', $user);
    }

    public function destroy()
    {
        abort(404);
    }
}

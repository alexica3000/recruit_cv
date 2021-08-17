<?php

namespace App\Actions;

use App\Http\Requests\UserRequest;
use App\Models\Company;
use App\Models\User;

class UserActions
{
    public function saveCompany(UserRequest $request, User $user): void
    {
        if ($request->input('company')) {
            $company = Company::query()->where('id', $request->input('company'))->first();
            $user->company()->associate($company);
            $user->save();
        }
    }
}

<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'     => 'required|max:255',
            'email'    => 'required|email|max:255',
            'password' => 'required|confirmed|max:255',
            'role_id'  => 'required|in:' . implode(',', array_keys(User::ROLES))
        ];
    }
}

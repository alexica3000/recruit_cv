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
        $method = request()->getMethod();

        return [
            'name'     => 'required|max:255',
            'email'    => 'required|email|max:255',
            'password' => $this->passwordRules(),
            'role_id'  => 'required|in:' . implode(',', array_keys(User::ROLES))
        ];
    }

    private function passwordRules(): array
    {
        $putRules = ['required', 'confirmed', 'max:255'];
        $postRules = ['nullable', 'confirmed', 'max:255'];

        return request()->getMethod() == 'put' ? $putRules : $postRules;
    }
}

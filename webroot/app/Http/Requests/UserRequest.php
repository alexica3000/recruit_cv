<?php

namespace App\Http\Requests;

use App\Interfaces\HasRoleInterface;
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
            'password' => $this->passwordRules(),
            'role_id'  => 'required|in:' . implode(',', array_keys(HasRoleInterface::ROLES)),
            'company'  => 'nullable|required_if:role_id,2|exists:users,id'
        ];
    }

    private function passwordRules(): array
    {
        $putRules = ['required', 'confirmed', 'max:255'];
        $postRules = ['nullable', 'confirmed', 'max:255'];

        return request()->getMethod() == 'put' ? $putRules : $postRules;
    }

    public function messages(): array
    {
        return [
            'role_id.in'          => 'The role field is invalid.',
            'role_id.required'    => 'The role field is required.',
            'company.required_if' => 'The company field is required when role is client.',
        ];
    }
}

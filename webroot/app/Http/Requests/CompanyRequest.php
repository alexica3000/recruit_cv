<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'name'  => 'required|max:100',
        ];

        $rules['image'] = $this->getMethod() == 'PUT' ? 'nullable|image|max:5000' : 'required|image|max:5000';

        return $rules;
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecruitRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'                  => 'required|string|max:191',
            'city'                  => 'required|string|max:191',
            'job'                   => 'required|string|max:191',
            'description'           => 'required|string|max:191',
            'birth_date'            => 'required|date',
            'image'                 => 'nullable|image|max:5000',
        ];
    }
}

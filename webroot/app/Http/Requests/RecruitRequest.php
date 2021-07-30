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
            'work.name'             => 'required|string|max:191',
            'work.short'            => 'required|string|max:191',
            'work.start'            => 'required|date',
            'work.end'              => 'nullable|date',
            'work.description'      => 'required|string',
            'education.name'        => 'required|string|max:191',
            'education.short'       => 'required|string|max:191',
            'education.start'       => 'required|date',
            'education.end'         => 'nullable|date',
            'education.description' => 'required|string',
            'course.name'           => 'required|string|max:191',
            'course.short'          => 'required|string|max:191',
            'course.start'          => 'required|date',
            'course.end'            => 'nullable|date',
            'course.description'    => 'required|string',
        ];
    }
}

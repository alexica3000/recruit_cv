<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddWorkRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fields.modal_employer'         => 'required|max:255',
            'fields.modal_edit_name'        => 'required|max:255',
            'fields.start_year'             => 'required|max:2100|numeric',
            'fields.end_year'               => 'nullable|max:2100|numeric',
            'fields.modal_edit_description' => 'required|max:255',
            'type'                          => 'required|max:21'
        ];
    }
}

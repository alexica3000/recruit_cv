<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddRecruitRequest extends FormRequest
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
            'name'          =>  'required|min:3 |max:255',
            'date_of_birth' =>  'required|min:10|max:11',
            'city'          =>  'required|min:3 |max:255',
            'job'           =>  'required|min:3 |max:255',
            'description'   =>  'required|min:3 |max:255',

            'experience.*.*'    => 'required|min:3|max:255',
            'education.*.*'     => 'required|min:3|max:255',
            'course.*.*'        => 'required|min:3|max:255',

            'skills.*.*'            => 'required|min:3|max:255',
            'characteristics.*.*'   => 'required|min:3|max:255',
            'social.*.*'            => 'required|min:3|max:255',
            'interests.*.*'         => 'required|min:3|max:255',


//            'experience.*.employer'     => 'required|min:3|max:255',
//            'experience.*.job'          => 'required|min:3|max:255',
//            'experience.*.start'        => 'required|min:3|max:50',
//            'experience.*.end'          => 'required|min:3|max:50',
//            'experience.*.description'  => 'required|min:3|max:255',

//            'education.*.employer'     => 'required|min:3|max:255',
//            'education.*.job'          => 'required|min:3|max:255',
//            'education.*.start'        => 'required|min:3|max:50',
//            'education.*.end'          => 'required|min:3|max:50',
//            'education.*.description'  => 'required|min:3|max:255',

//            'course.*.employer'     => 'required|min:3|max:255',
//            'course.*.job'          => 'required|min:3|max:255',
//            'course.*.start'        => 'required|min:3|max:50',
//            'course.*.end'          => 'required|min:3|max:50',
//            'course.*.description'  => 'required|min:3|max:255',

//            '*.*.char'         => 'required|min:3|max:255',
//            '*.*.description'  => 'required|min:3|max:255',
        ];
    }

    public function messages()
    {
        return [
            'experience.*.*.required'   => 'The all experience fields are required.',
            'experience.*.*.min'        => 'The all experience fields must be minim 3 characters.',
            'experience.*.*.max'        => 'The all experience fields must be maxim 255 characters.',

            'education.*.*.required'   => 'The all education fields are required.',
            'education.*.*.min'        => 'The all education fields must be minim 3 characters.',
            'education.*.*.max'        => 'The all education fields must be maxim 255 characters.',

            'course.*.*.required'   => 'The all course fields are required.',
            'course.*.*.min'        => 'The all course fields must be minim 3 characters.',
            'course.*.*.max'        => 'The all course fields must be maxim 255 characters.',

            'skills.*.*.required'   => 'The all skills fields are required.',
            'skills.*.*.min'        => 'The all skills fields must be minim 3 characters.',
            'skills.*.*.max'        => 'The all skills fields must be maxim 255 characters.',

            'characteristics.*.*.required'   => 'The all characteristics fields are required.',
            'characteristics.*.*.min'        => 'The all characteristics fields must be minim 3 characters.',
            'characteristics.*.*.max'        => 'The all characteristics fields must be maxim 255 characters.',

            'social.*.*.required'   => 'The all social fields are required.',
            'social.*.*.min'        => 'The all social fields must be minim 3 characters.',
            'social.*.*.max'        => 'The all social fields must be maxim 255 characters.',

            'interests.*.*.required'   => 'The all interests fields are required.',
            'interests.*.*.min'        => 'The all interests fields must be minim 3 characters.',
            'interests.*.*.max'        => 'The all interests fields must be maxim 255 characters.',

//            'experience.*.employer.min'         => 'The experience employer field minimum 3 characters.',
//            'experience.*.employer.max'         => 'The experience employer field maximum 255 characters.',
//            'experience.*.job.required'         => 'The experience job field is required.',
//            'experience.*.job.min'              => 'The experience job field minimum 3 characters.',
//            'experience.*.job.max'              => 'The experience job field maximum 255 characters.',
//            'experience.*.start.required'       => 'The experience start field is required.',
//            'experience.*.start.min'            => 'The experience start field minimum 3 characters.',
//            'experience.*.start.max'            => 'The experience start field maximum 50 characters.',
//            'experience.*.end.required'         => 'The experience end field is required.',
//            'experience.*.end.min'              => 'The experience end field minimum 3 characters.',
//            'experience.*.end.max'              => 'The experience end field maximum 50 characters.',
//            'experience.*.description.required' => 'The experience description field is required.',
//            'experience.*.description.min'      => 'The experience description field minimum 3 characters.',
//            'experience.*.description.max'      => 'The experience description field maximum 255 characters.',

//            'education.*.employer.required'     => 'The education employer field is required.',
//            'education.*.employer.min'          => 'The education employer field minimum 3 characters.',
//            'education.*.employer.max'          => 'The education employer field maximum 255 characters.',
//            'education.*.job.required'          => 'The education job field is required.',
//            'education.*.job.min'               => 'The education job field minimum 3 characters.',
//            'education.*.job.max'               => 'The education job field maximum 255 characters.',
//            'education.*.start.required'        => 'The education start field is required.',
//            'education.*.start.min'             => 'The education start field minimum 3 characters.',
//            'education.*.start.max'             => 'The education start field maximum 50 characters.',
//            'education.*.end.required'          => 'The education end field is required.',
//            'education.*.end.min'               => 'The education end field minimum 3 characters.',
//            'education.*.end.max'               => 'The education end field maximum 50 characters.',
//            'education.*.description.required'  => 'The education description field is required.',
//            'education.*.description.min'       => 'The education description field minimum 3 characters.',
//            'education.*.description.max'       => 'The education description field maximum 255 characters.',

//            'course.*.employer.required'        => 'The course employer field is required.',
//            'course.*.employer.min'             => 'The course employer field minimum 3 characters.',
//            'course.*.employer.max'             => 'The course employer field maximum 255 characters.',
//            'course.*.job.required'             => 'The course job field is required.',
//            'course.*.job.min'                  => 'The course job field minimum 3 characters.',
//            'course.*.job.max'                  => 'The course job field maximum 255 characters.',
//            'course.*.start.required'           => 'The course start field is required.',
//            'course.*.start.min'                => 'The course start field minimum 3 characters.',
//            'course.*.start.max'                => 'The course start field maximum 50 characters.',
//            'course.*.end.required'             => 'The course end field is required.',
//            'course.*.end.min'                  => 'The course end field minimum 3 characters.',
//            'course.*.end.max'                  => 'The course end field maximum 50 characters.',
//            'course.*.description.required'     => 'The course description field is required.',
//            'course.*.description.min'          => 'The course description field minimum 3 characters.',
//            'course.*.description.max'          => 'The course description field maximum 255 characters.',
        ];
    }
}

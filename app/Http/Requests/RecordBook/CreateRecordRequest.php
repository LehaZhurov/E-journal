<?php

namespace App\Http\Requests\RecordBook;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRecordRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'value'      => ['required', 'string',Rule::in([5,4,3,2,'З','з','нб','НБ'])],
            'student_id' => ['required', 'int'],
            'teacher_id' => ['int'],
            'subject_id' => ['required', 'int'],
            'type_id'    => ['required', 'int'],
        ];
    }
}

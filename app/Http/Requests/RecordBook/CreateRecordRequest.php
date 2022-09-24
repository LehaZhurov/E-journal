<?php

namespace App\Http\Requests\RecordBook;

use Illuminate\Foundation\Http\FormRequest;

class CreateRecordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'value'      => ['required', 'string'],
            'student_id' => ['required', 'int'],
            'teacher_id' => ['int'],
            'subject_id' => ['required', 'int'],
            'type_id'    => ['required', 'int'],
        ];
    }
}

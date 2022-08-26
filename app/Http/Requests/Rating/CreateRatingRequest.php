<?php

namespace App\Http\Requests\Rating;

use Illuminate\Foundation\Http\FormRequest;

class CreateRatingRequest extends FormRequest
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
            'value' => ['required', 'int','min:2','max:5'],
            'user_id' => ['required','int'],
            'teacher_id' => [],
            'subject_id' => ['required', 'int'],
            'num_day' => ['required','string'],
            'num_month' => ['required','string'],
            'year' => ['required','string'],
        ];
    }
}

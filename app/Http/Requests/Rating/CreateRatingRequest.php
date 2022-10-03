<?php

namespace App\Http\Requests\Rating;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRatingRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;
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
            'value' => ['required', 'string', Rule::in([5,4,3,2,'нб'])],
            'user_id' => ['required', 'int'],
            'teacher_id' => [],
            'subject_id' => ['required', 'int'],
            'num_day' => ['required', 'string'],
            'num_month' => ['required', 'string'],
            'year' => ['required', 'string'],
        ];
    }
}

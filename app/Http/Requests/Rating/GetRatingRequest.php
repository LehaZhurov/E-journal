<?php

namespace App\Http\Requests\Rating;

use Illuminate\Foundation\Http\FormRequest;

class GetRatingRequest extends FormRequest
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
            'group' => ['required', 'string','min:1'],
            'subject' => ['required', 'string','min:1'],
            'month' => ['string','min:1'],
            'day' => ['string','min:1'],
            'year' => ['string','min:1'],
        ];
    }
}

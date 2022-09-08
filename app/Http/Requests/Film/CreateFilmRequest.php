<?php

namespace App\Http\Requests\Film;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateFilmRequest extends FormRequest
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
            'poster' => 'nullable|image',
            'name' => 'required|string',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'name cannot be null',
            'poster.image' => 'poster image must be image type',
        ];
    }
}

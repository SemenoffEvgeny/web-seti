<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TutorCreateRequest extends FormRequest
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
            'name'  => 'required|string|max:20',
            'rate' => 'required|regex:/^\d*[\.]?[\d]{0,2}?$/',
            'subject' => 'required|string|max:50',
            'experience' => 'required|integer'
        ];
    }
}

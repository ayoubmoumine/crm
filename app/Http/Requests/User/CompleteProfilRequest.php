<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class CompleteProfilRequest extends FormRequest
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
            'name' => 'required',
            'address' => 'sometimes',
            'phone_number' => 'sometimes',
            'birth_date' => 'sometimes|date',
        ];
    }
}

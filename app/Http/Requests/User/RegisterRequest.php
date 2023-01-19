<?php

namespace App\Http\Requests\User;

use App\Models\Invitation;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            "name" => 'required',
            "token" => [
                'required',
                Rule::exists('invitations')->where(function ($query) {
                    return $query->where(Invitation::STATUS_COLUMN, Invitation::PENDING);
                })
            ],
            'email' => [
                'required',
                'unique:users,email'
            ],
            'company_id' => 'exists:companies,id',
            'password' => 'required|min:6|max:15',
            'confirmPassword' => 'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'token.exists' => 'The status of the invitation is invalid, for more information pleasse contact your administrator',
        ];
    }
}

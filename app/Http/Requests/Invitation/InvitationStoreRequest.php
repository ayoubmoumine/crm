<?php

namespace App\Http\Requests\Invitation;

use App\Models\Invitation;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class InvitationStoreRequest extends FormRequest
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
            'company_id' => 'required|exists:companies,id',
            'employee_name' => 'required',
            'employee_email' => [
                'required',
                'email',
                Rule::unique('users', 'email'), 
                Rule::unique('invitations', 'employee_email')->where(function ($query) {
                    return $query->where(Invitation::STATUS_COLUMN, Invitation::PENDING);
                })
            ],
        ];
    }

    public function messages()
    {
        return [
            'employee_email' => 'The employee with this email have been already invited'
        ];
    }
}

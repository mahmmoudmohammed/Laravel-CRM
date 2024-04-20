<?php

namespace App\Http\Api\Modules\Employee\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class CreateEmployeeRequest extends FormRequest
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

    public function rules()
    {
        return [
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:100',
                Rule::unique('employees', 'email')->whereNull('deleted_at')
            ],
            'phone' => ['required', 'min:11',
                Rule::unique('employees', 'phone')->whereNull('deleted_at')
            ],
            'password' => ['required', 'confirmed',
                Password::min(8)
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
            ],
            'is_intern' => ['nullable', 'boolean'],
            'started_at' => ['required', 'date', 'after_or_equal:today'],
            'company_id' => ['required', 'exists:companies,id'],
        ];
    }

    public function messages()
    {
        return [
            //TODO:: For any customized messages
        ];
    }
}

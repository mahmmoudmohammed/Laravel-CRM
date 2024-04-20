<?php

namespace App\Http\Api\Modules\Employee\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UpdateEmployeeRequest extends FormRequest
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
            'first_name' => ['nullable', 'string', 'max:50'],
            'last_name' => ['nullable', 'string', 'max:50'],
            'email' => ['nullable', 'email', 'max:100',
                Rule::unique('employees', 'email')->whereNull('deleted_at')
            ],
            'phone' => ['nullable', 'min:11',
                Rule::unique('employees', 'phone')->whereNull('deleted_at')
            ],
            'password' => ['nullable', 'confirmed',
                Password::min(8)
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
            ],
            'is_intern' => ['nullable', 'boolean'],
            'started_at' => ['nullable', 'date', 'after_or_equal:today'],
            'company_id' => ['nullable', 'exists:companies,id'],
        ];
    }

    public function messages()
    {
        return [
            //TODO:: For any customized messages
        ];
    }
}

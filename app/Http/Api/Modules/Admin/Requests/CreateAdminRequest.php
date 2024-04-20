<?php

namespace App\Http\Api\Modules\Admin\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class CreateAdminRequest extends FormRequest
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
                Rule::unique('admins', 'email')->whereNull('deleted_at'),
            ],
            'phone' => ['required', 'min:11',
                Rule::unique('admins', 'phone')->whereNull('deleted_at')
            ],
            'password' => ['required', 'confirmed',
                Password::min(8)
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
            ],
        ];
    }

    public function messages()
    {
        return [
            //TODO:: For any customized messages
        ];
    }
}

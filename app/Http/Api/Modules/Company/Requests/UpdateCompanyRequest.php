<?php

namespace App\Http\Api\Modules\Company\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCompanyRequest extends FormRequest
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
            'name' => ['nullable', 'string', 'max:100'],
            'email' => ['nullable', 'email', 'max:100',
                Rule::unique('admins', 'email')->whereNull('deleted_at'),
            ],
            'URL' => ['nullable', 'string', 'max:255'],
            'logo' => ['nullable','mimes:png,jpg,jpeg','max:1024']
        ];
    }
}

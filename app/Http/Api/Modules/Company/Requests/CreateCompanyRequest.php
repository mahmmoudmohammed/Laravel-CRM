<?php

namespace App\Http\Api\Modules\Company\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateCompanyRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:100',
                Rule::unique('companies', 'email')->whereNull('deleted_at'),
            ],
            'URL' => ['required', 'string', 'max:255'],
            'logo' => ['nullable','mimes:png,jpg,jpeg','max:1024']
        ];
    }
}

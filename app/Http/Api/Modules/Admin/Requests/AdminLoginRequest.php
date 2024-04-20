<?php

namespace App\Http\Api\Modules\Admin\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminLoginRequest extends FormRequest
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
            'email' => 'required','email','exists:admins,email',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            //TODO:: Any Customized message
             ];
    }
}

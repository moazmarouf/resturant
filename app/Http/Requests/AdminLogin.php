<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminLogin extends FormRequest
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
            'phone' => 'required|numeric',
            'password' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'phone.required' => 'من فضلك قم بتسجيل رثم التجوال ',
            'phone.numeric' => 'من قضلك قم بتسجيل رقم تجوال صحيح',
            'password.required' => 'من فضلك قم بتسجيل الرقم السري',
        ];
    }
}

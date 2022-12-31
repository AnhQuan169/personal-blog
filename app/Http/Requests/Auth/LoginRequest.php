<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email|max:30',
            'password' => 'required|min:6|max:30'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Please enter your email',
            'email.email' => 'Your email address is not valid',
            'email.max' => 'Your email address can not exceed 30 characters',
            'password.required' => 'Please enter your password',
            'password.max' => 'Your password address can not exceed 30 characters',
            'password.min' => 'Your password address cannot be less than 6 characters'
        ];
    }
}

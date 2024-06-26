<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password as Password_rule;

class OrganizedRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:55|string',
            'role' => 'required|string|in:user',
            'phone' => 'required|digits:10',
            'email' => 'required|unique:users|email',
             'password' => [
                'required',
                'confirmed',
                Password_rule::min(8)
                    ->mixedCase()
                    ->numbers()
                    ->symbols(),
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name filed is required',
            'name.max' => 'Name should be less than 55 characters',
            'name.string' => 'Name should be string',
            'role.required' => 'Role filed is required',
            'role.string' => 'Role should be string',
            'role.in' => 'Role should be "user"',
            'phone.required' => 'Phone filed is required',
            'phone.digits' => 'Phone should be 12 number',
            'email.required' => 'email filed is required',
            'password.required' => 'password filed is required',
        ];
}
}

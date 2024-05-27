<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrganizedLoginRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'role' => 'required|string|in:user',
            'email' => 'required|email',
             'password' => [
                'required'
            ],
        ];
    }
    public function messages()
    {
        return [
            'role.required' => 'Role filed is required',
            'role.string' => 'Role should be string',
            'role.in' => 'Role should be "user"',
            'email.required' => 'email filed is required',
            'password.required' => 'password filed is required',
        ];
}
}

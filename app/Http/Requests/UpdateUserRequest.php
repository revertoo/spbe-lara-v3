<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['sometimes', 'min:4', 'max:255'],
            'email' => ['nullable', 'email:dns',  'max:255', 'unique:users'],
            'password' => ['nullable', 'required_with:confirm_password', 'same:confirm_password', 'max:255'],
            'confirm_password' => ['nullable', 'max:255'],
        ];
    }
}

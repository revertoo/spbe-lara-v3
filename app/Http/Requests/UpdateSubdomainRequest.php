<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSubdomainRequest extends FormRequest
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
            'url' => ['required', 'url:http,https', 'max:255'],
            'status' => ['required'],
            'op_teknis' => ['nullable', 'string', 'max:255'],
            'kontak_teknis' => ['nullable', 'regex:/^[0-9]{9,14}$/'],
            'opd_id' => ['required', 'max:255'],
            'keterangan' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'kontak_teknis.regex' => 'Nomor kontak hanya boleh berupa angka dan panjangnya antara 9 sampai 14 digit.',
        ];
    }
}

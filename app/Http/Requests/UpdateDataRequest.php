<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDataRequest extends FormRequest
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
            'application_id' => ['required'],
            'siapa_produsen_data' => ['required', 'string', 'max:255'],
            'siapa_pengguna_data_yg_dihasilkan_sistem' => ['required', 'string', 'max:255'],
            'kapan_update_data_terakhir' => ['required', 'date', 'before_or_equal:today'],
            'data_sistem_menggunakan_kode_referensi' => ['required', 'string', 'max:255'],
            'app_memiliki_kebijakan_privasi_terkait_data' => ['required', 'string', 'max:255'],
            'siapa_melakukan_backup' => ['required', 'string', 'max:255'],
            'periode_backup' => ['required', 'string', 'max:255'],
            'lokasi_penyimpanan_backup' => ['required', 'string', 'max:255'],
            'kapan_terakhir_backup' => ['nullable', 'date', 'before_or_equal:today'],
            'user_id' => ['required'],
        ];
    }
}

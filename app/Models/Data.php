<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Data extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'application_id',
        'siapa_produsen_data',
        'siapa_pengguna_data_yg_dihasilkan_sistem',
        'kapan_update_data_terakhir',
        'data_sistem_menggunakan_kode_referensi',
        'app_memiliki_kebijakan_privasi_terkait_data',
        'siapa_melakukan_backup',
        'periode_backup',
        'lokasi_penyimpanan_backup',
        'kapan_terakhir_backup',
        'user_id',
    ];

    protected $casts = [
        'kapan_update_data_terakhir' => 'datetime',
        'kapan_terakhir_backup' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengembangan extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'application_id',
        'tahun_pengembangan',
        'riwayat_pengembangan',
        'fitur',
        'nda',
        'doc_perancangan',
        'surat_mohon',
        'kak',
        'sop',
        'doc_pentest',
        'doc_uat',
        'video_penggunaan',
        'buku_manual',
        'katplatform_id',
        'katdb_id',
        'bahasaprogram_id',
        'frameworkapp_id',
        'capture_frontend',
        'capture_backend',
        'user_id',
    ];

    public function app(): BelongsTo
    {
        return $this->belongsTo(Application::class, 'application_id');
    }

    public function platform(): BelongsTo
    {
        return $this->belongsTo(Katplatform::class, 'katplatform_id');
    }

    public function db(): BelongsTo
    {
        return $this->belongsTo(Katdb::class, 'katdb_id');
    }

    public function bahasaprogram(): BelongsTo
    {
        return $this->belongsTo(Bahasaprogram::class, 'bahasaprogram_id');
    }

    public function frameworkapp(): BelongsTo
    {
        return $this->belongsTo(Frameworkapp::class, 'frameworkapp_id');
    }
    public function sdmpengembang()
    {
        return $this->hasMany(Sdmpengembang::class, 'pengembangan_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sdmpengembang extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'pengembangan_id',
        'nama_pengembang',
        'alamat_pengembang',
        'nohp_pengembang',
        'nokantor_pengembang',
        'email_pengembang',
    ];

    public function app(): BelongsTo
    {
        return $this->belongsTo(Application::class, 'application_id');
    }
}

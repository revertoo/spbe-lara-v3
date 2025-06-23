<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id')->constrained()->onDelete('cascade');
            $table->string('siapa_produsen_data')->nullable();
            $table->string('siapa_pengguna_data_yg_dihasilkan_sistem')->nullable();
            $table->date('kapan_update_data_terakhir')->nullable();
            $table->string('data_sistem_menggunakan_kode_referensi')->nullable();
            $table->string('app_memiliki_kebijakan_privasi_terkait_data')->nullable();
            $table->string('siapa_melakukan_backup')->nullable();
            $table->string('periode_backup')->nullable();
            $table->string('lokasi_penyimpanan_backup')->nullable();
            $table->date('kapan_terakhir_backup')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data');
    }
};

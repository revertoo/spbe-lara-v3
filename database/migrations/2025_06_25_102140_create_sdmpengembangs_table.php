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
        Schema::create('sdmpengembangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengembangan_id')->constrained()->onDelete('cascade');
            $table->string('nama_pengembang');
            $table->text('alamat_pengembang')->nullable();
            $table->string('nohp_pengembang');
            $table->string('nokantor_pengembang')->nullable();
            $table->string('email_pengembang')->unique()->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sdmpengembangs');
    }
};

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
        Schema::create('kerjasama_nasional', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('nama_kerjasama'); // Nama kerjasama
            $table->text('deskripsi')->nullable(); // Deskripsi kerjasama
            $table->string('ikon_kerjasama')->nullable(); // Ikon kerjasama (URL atau path)
            $table->boolean('status')->default(1); // Status (1=Aktif, 0=Nonaktif)
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kerjasama_nasional');
    }
};

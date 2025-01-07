<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pola_acara', function (Blueprint $table) {
            $table->id('pilihan_id');
            $table->foreignId('stasiun_id');
            $table->foreignId('kerjasama_id');
            $table->foreignId('kategori_id');
            $table->string('nama_pola');
            $table->text('deskripsi_singkat');
            $table->string('video_sample');
            $table->string('marketing');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_pola_acara');
    }
};

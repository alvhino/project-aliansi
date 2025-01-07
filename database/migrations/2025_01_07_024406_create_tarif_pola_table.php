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
        Schema::create('tarif_pola', function (Blueprint $table) {
            $table->id('tarif_id');
            $table->foreignId('pilihan_id');
            $table->string('nama_tarif');
            $table->integer('durasi');
            $table->integer('tarif');
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
        Schema::dropIfExists('_tarif_pola');
    }
};

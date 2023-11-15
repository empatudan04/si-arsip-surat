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
        Schema::create('surat', function (Blueprint $table) {
            Schema::create('surat', function (Blueprint $table) {
                $table->id('id_surat');
                $table->string('nomor_surat');
                $table->unsignedBigInteger('kategori_id');
                $table->foreign('kategori_id')->references('id_kategori')->on('kategori');
                $table->string('judul');
                $table->string('waktu_pengarsipan');
                $table->string('file_surat');
                $table->timestamps();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat');
    }
};

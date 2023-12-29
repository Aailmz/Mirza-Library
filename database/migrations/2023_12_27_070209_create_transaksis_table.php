<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_email')->constrained();
            $table->foreignId('nama_siswa')->constrained(); 
            $table->foreignId('kelas_siswa')->constrained(); 
            $table->foreignId('buku_id')->constrained();  
            $table->foreignId('judul_buku')->constrained();  
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
};

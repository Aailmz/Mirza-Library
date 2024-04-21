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
            $table->string('siswa_email')->constrained();
            $table->foreignId('siswa_id')->constrained();
            $table->string('nama_siswa')->constrained(); 
            $table->string('kelas_siswa')->constrained(); 
            $table->foreignId('buku_id')->constrained();  
            $table->string('judul_buku')->constrained();  
            $table->datetime('returned_at')->constrained();  
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblAyahSiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_ayah_siswa', function (Blueprint $table) {
            $table->uuid('id_ayah')->primary();
            $table->string('nama_ayah', 70);   
            $table->string('ttl_ayah', 100);
            $table->string('pekerjaan_ayah', 100);
            $table->string('pendidikan_ayah', 100);
            $table->string('agama_ayah', 15);
            $table->string('nomer_hub_ayah', 20);
            $table->string('penghasilan_ayah', 20);
            $table->string('keterangan_ayah', 20);            
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
        Schema::dropIfExists('tbl_ayah_siswa');
    }
}

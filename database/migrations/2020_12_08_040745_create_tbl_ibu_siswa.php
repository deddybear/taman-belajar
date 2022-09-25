<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblIbuSiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_ibu_siswa', function (Blueprint $table) {
            $table->uuid('id_ibu')->primary();
            $table->string('nama_ibu', 70);   
            $table->string('ttl_ibu', 100);
            $table->string('pekerjaan_ibu', 100);
            $table->string('pendidikan_ibu', 100);
            $table->string('agama_ibu', 15);
            $table->string('nomer_hub_ibu', 20);
            $table->string('penghasilan_ibu', 20);
            $table->string('keterangan_ibu', 20);            
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
        Schema::dropIfExists('tbl_ibu_siswa');
    }
}

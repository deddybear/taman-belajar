<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblWaliSiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_wali_siswa', function (Blueprint $table) {
            $table->uuid('id_wali')->primary();
            $table->string('nama_wali', 70);   
            $table->string('ttl_wali', 100);
            $table->string('pekerjaan_wali', 100);
            $table->string('pendidikan_wali', 100);
            $table->string('agama_wali', 15);
            $table->string('nomer_hub_wali', 20);         
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
        Schema::dropIfExists('tbl_wali_siswa');
    }
}

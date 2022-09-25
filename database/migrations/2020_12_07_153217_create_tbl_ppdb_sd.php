<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPpdbSd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_ppdb_sd', function (Blueprint $table) {
            $table->uuid('id_calon')->primary();
            $table->uuid('id_ayah')->index();
            $table->uuid('id_ibu')->index();
            $table->uuid('id_wali')->index();
            $table->string('nama_calon', 70);
            $table->string('kelamin', 7);
            $table->string('ttl', 100);
            $table->string('agama_siswa', 15);
            $table->integer('anak_ke');
            $table->integer('jumlah_saudara');
            $table->string('alamat_lengkap', 150);
            $table->string('file_akte', 100);
            $table->string('file_kk', 100);
            $table->string('file_foto', 100);
            $table->string('file_kip', 100)->nullable();
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
        Schema::dropIfExists('tbl_ppdb_sd');
    }
}

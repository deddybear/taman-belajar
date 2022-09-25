<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPpdbSmp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_ppdb_smp', function (Blueprint $table) {
            $table->uuid('id_calon')->primary();
            $table->uuid('id_ayah')->index();
            $table->uuid('id_ibu')->index();
            $table->uuid('id_periodik')->index();
            $table->string('nama_calon', 70);
            $table->string('kelamin', 7);
            $table->string('nisn', 15);
            $table->string('nik', 20);
            $table->string('ttl', 100);
            $table->string('agama_siswa', 15);
            $table->string('alamat_lengkap', 150);
            $table->string('tempat_tinggal', 30);
            $table->string('transportasi', 30);
            $table->string('no_hub', 20)->nullable();
            $table->string('no_kps_khs', 50)->nullable();
            $table->string('asal_sekolah', 100);
            $table->string('file_shus', 100);
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
        Schema::dropIfExists('tbl_ppdb_smp');
    }
}

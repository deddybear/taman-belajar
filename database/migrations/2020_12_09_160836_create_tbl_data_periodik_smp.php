<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDataPeriodikSmp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_data_periodik_smp', function (Blueprint $table) {
            $table->uuid('id_periodik')->primary();
            $table->string('tinggi');
            $table->string('berat_badan');
            $table->string('jarak_sekolah');
            $table->string('waktu_tempuh');
            $table->integer('anak_ke');
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
        Schema::dropIfExists('tbl_data_periodik_smp');
    }
}

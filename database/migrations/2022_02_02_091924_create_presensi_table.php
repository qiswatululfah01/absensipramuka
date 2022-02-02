<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presensi', function (Blueprint $table) {
            $table->bigIncrements('kode_presensi');
            $table->integer('kode_tp')->unsigned();
            $table->integer('kode_j')->unsigned();
            $table->integer('kode_k')->unsigned();
            $table->integer('kode_s')->unsigned();
            $table->integer('kode_siswa')->unsigned();
            $table->integer('kode_pembina')->unsigned();
            $table->text('foto');
            $table->string('ket');
            $table->integer('sakit');
            $table->integer('ijin');
            $table->integer('alpha');
            $table->string('nilai');
            $table->softDeletes();
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
        Schema::dropIfExists('presensi');
    }
}

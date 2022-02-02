<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDadminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dadmin', function (Blueprint $table) {
            $table->bigIncrements('kode_admin');
            $table->string('nama_admin');
            $table->integer('nta');
            $table->string('tempat_lahir');
            $table->dateTime('tanggal_lahir');
            $table->string('alamat');
            $table->string('tlp');
            $table->string('agama');
            $table->string('golongan');
            $table->string('pangkalan');
            $table->integer('id');
            $table->integer('kode_k');
            $table->integer('kode_s');
            $table->integer('kode_j');
            $table->integer('kode_tp');
            $table->text('foto');
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
        Schema::dropIfExists('dadmin');
    }
}

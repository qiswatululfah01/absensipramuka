<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDpembinaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dpembina', function (Blueprint $table) {
            $table->bigIncrements('kode_pembina');
            $table->string('nama_pembina');
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
        Schema::dropIfExists('dpembina');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatalatihansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datalatihans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nama_pembina')->nullable();
            $table->string('nama_ekskul')->nullable();
            $table->string('hari_latihan')->nullable();
            $table->string('tgl_latihan')->nullable();
            $table->string('jam_mulai')->nullable();
            $table->string('jam_selesai')->nullable();
            $table->string('tempat_latihan')->nullable();
            $table->string('materi_latihan')->nullable();
            $table->string('foto_latihan')->nullable();
            $table->string('jml_pria')->nullable();
            $table->string('jml_perempuan')->nullable();
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
        Schema::dropIfExists('datalatihans');
    }
}

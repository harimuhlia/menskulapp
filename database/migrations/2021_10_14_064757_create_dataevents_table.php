<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataeventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dataevents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('status_kegiatan')->nullable();
            $table->string('nama_kegiatan')->nullable();
            $table->text('tempat_kegiatan')->nullable();
            $table->string('tanggal_mulai_kegiatan')->nullable();
            $table->string('tanggal_akhir_kegiatan')->nullable();
            $table->string('penyelenggara_kegiatan')->nullable();
            $table->string('nama_pembimbing')->nullable();
            $table->string('jenis_lomba')->nullable();
            $table->string('cabang_lomba')->nullable();
            $table->string('foto_kegiatan')->nullable();
            $table->text('nama_peserta')->nullable();
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
        Schema::dropIfExists('dataevents');
    }
}

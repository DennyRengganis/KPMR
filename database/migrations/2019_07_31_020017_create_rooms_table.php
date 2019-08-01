<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buildings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_gedung');
            $table->string('jumlah_lantai');
            //$table->timestamps();
        });
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nomor');
            $table->unsignedBigInteger('id_gedung');
            $table->string('lantai');
            $table->string('status_now');
            $table->foreign('id_gedung')->references('id')->on('buildings');
            //$table->timestamps();
        });
        Schema::create('booklists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_Ruangan');
            $table->string('nama');
            $table->string('NPK');
            $table->string('email');
            $table->string('PIN');
            $table->datetime('waktu_Pinjam_Mulai');
            $table->datetime('waktu_Pinjam_Selesai');
            $table->string('keperluan');
            $table->foreign('id_Ruangan')->references('id')->on('rooms');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booklists');
        Schema::dropIfExists('rooms');
        Schema::dropIfExists('buildings');
    }
}

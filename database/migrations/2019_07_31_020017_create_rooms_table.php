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
        Schema::create('admins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('status');
            //$table->timestamps();
        });

        Schema::create('configs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('booklists_timeout');
        });
        DB::table('configs')->insert(
                array(
                    'booklists_timeout' => 10,
                )
            );


        DB::table('admins')->insert(
                array(
                    'username' => 'admin',
                    'password' => Hash::make('KPMR2019'),
                    'status'   => 'admin'
                )
            );
        Schema::create('buildings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_gedung');
            $table->string('jumlah_lantai');
            //$table->timestamps();
        });
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_ruangan');
            $table->unsignedBigInteger('id_gedung');
            $table->string('lantai');
            $table->string('status_now');
            $table->foreign('id_gedung')->references('id')->on('buildings')->onDelete('cascade');
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
            $table->datetime('waktu_Pinjam_Timeout');
            $table->string('keperluan');
            $table->string('status');
            $table->boolean('is_deleted');
            $table->foreign('id_Ruangan')->references('id')->on('rooms')->onDelete('cascade');
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
        Schema::dropIfExists('admins');
    }
}

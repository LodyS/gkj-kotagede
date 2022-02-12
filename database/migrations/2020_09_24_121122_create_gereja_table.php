<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGerejaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gereja', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 255)->nullable();
            $table->text('alamat')->nullable();
            $table->integer('id_provinsi')->nullable()->unsigned();
            $table->integer('id_kabupaten')->nullable()->unsigned();
            $table->integer('id_kecamatan')->nullable()->unsigned();
            $table->integer('id_kelurahan')->nullable()->unsigned();
            $table->bigInteger('user_input')->unsigned()->nullable();
            $table->bigInteger('user_update')->nullable()->unsigned();
            $table->timestamps();

            $table->foreign('user_input')->references('id')->on('users');
            $table->foreign('user_update')->references('id')->on('users');
            //$table->foreign('id_provinsi')->references('id')->on('provinsi');
            //$table->foreign('id_kabupaten')->references('id')->on('kabupaten');
            //$table->foreign('id_kecamatan')->references('id')->on('kecamatan');
            //$table->foreign('id_kelurahan')->references('id')->on('kelurahan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gereja');
    }
}

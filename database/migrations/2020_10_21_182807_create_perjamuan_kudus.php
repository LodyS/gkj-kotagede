<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerjamuanKudus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perjamuan_kudus', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_jemaat')->unsigned();
            $table->date('tanggal');
            $table->string('jam_ibadah', 50);
            $table->string('keterangan', 50);
            $table->bigInteger('user_input')->unsigned();
            $table->bigInteger('user_update')->nullable()->unsigned();
            $table->timestamps();

            $table->foreign('id_jemaat')->references('id')->on('jemaat');
            $table->foreign('user_input')->references('id')->on('users');
            $table->foreign('user_update')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perjamuan_kudus');
    }
}

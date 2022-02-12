<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePernikahanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pernikahan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('suami')->unsigned();
            $table->bigInteger('istri')->unsigned();
            $table->date('tanggal');
            $table->bigInteger('id_gereja')->unsigned();
            $table->string('pendeta', 255);
            $table->string('catatan_sipil', 255);
            $table->string('no_surat', 255);
            $table->bigInteger('user_input')->unsigned();
            $table->bigInteger('user_update')->nullable()->unsigned();
            $table->timestamps();

            $table->foreign('suami')->references('id')->on('jemaat');
            $table->foreign('istri')->references('id')->on('jemaat');
            $table->foreign('id_gereja')->references('id')->on('gereja');
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
        Schema::dropIfExists('pernikahan');
    }
}

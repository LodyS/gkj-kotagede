<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJemaatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jemaat', function (Blueprint $table) {
            $table->id();
            $table->string('id_jemaat', 255)->unique();
            $table->string('foto', 255)->nullable();
            $table->string('status', 255)->nullable();
            $table->string('nama_orangtua', 255)->nullable();
            $table->string('nama_jemaat', 255)->nullable();
            $table->string('ttl', 255)->nullable();
            $table->date('tanggal');
            $table->string('jkel', 2)->nullable();
            $table->string('gol_darah', 2)->nullable();
            $table->text('alamat')->nullable();
            $table->string('no_hp', 20)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('pernikahan', 20)->nullable();
            $table->bigInteger('asal_gereja')->nullable()->unsigned();
            $table->string('ket', 10)->nullable();
            $table->string('no_kk', 255)->nullable();
            $table->bigInteger('user_input')->unsigned();
            $table->bigInteger('user_update')->nullable()->unsigned();
            $table->timestamps();

            $table->foreign('user_input')->references('id')->on('users');
            $table->foreign('user_update')->references('id')->on('users');
            $table->foreign('asal_gereja')->references('id')->on('gereja');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jemaat');
    }
}

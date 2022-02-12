<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePekerjaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pekerjaan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_jemaat')->unsigned();
            $table->string('jenis_pekerjaan', 255);
            $table->string('tempat_kerja', 255);
            $table->string('alamat_kerja', 255);
            $table->string('jabatan', 255);
            $table->string('no_telp', 255)->nullable();
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
        Schema::dropIfExists('pekerjaan');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendidikanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendidikan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_jemaat')->unsigned();
            $table->string('jenjang_pendidikan', 10);
            $table->string('nama_sekolah', 255);
            $table->char('tahun_lulus', 4)->nullable();
            $table->string('tempat', 255)->nullable();
            $table->string('gelar', 255)->nullable();
            $table->string('pendidikan_khusus', 255);
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
        Schema::dropIfExists('pendidikan');
    }
}

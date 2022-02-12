<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBabtisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('babtis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_jemaat')->unsigned();
            $table->date('tanggal_babtis');
            $table->string('no_surat_babtis', 255);
            $table->string('pendeta_babtis', 255);
            $table->bigInteger('gereja_atestasi')->nullable()->unsigned();
            $table->date('tanggal_atestasi');
            $table->string('no_surat', 255);
            $table->bigInteger('gereja_sidi')->nullable()->unsigned();
            $table->date('tanggal_sidi');
            $table->string('pendeta_sidi', 255);
            $table->string('no_surat_sidi', 255);
            $table->bigInteger('gereja_penyerahan')->nullable()->unsigned();
            $table->date('tanggal_penyerahan');
            $table->string('pendeta_penyerahan', 255);
            $table->bigInteger('user_input')->unsigned();
            $table->bigInteger('user_update')->nullable()->unsigned();
            $table->timestamps();

            $table->foreign('id_jemaat')->references('id')->on('jemaat');
            $table->foreign('gereja_atestasi')->references('id')->on('gereja');
            $table->foreign('gereja_sidi')->references('id')->on('gereja');
            $table->foreign('gereja_penyerahan')->references('id')->on('gereja');
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
        Schema::dropIfExists('babtis');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antrian_dine_ins', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('nohp')->nullable();
            $table->string('status_kehadiran')->nullable();
            $table->string('antrian_sekarang')->nullable();
            $table->integer('panggilan')->nullable();
            $table->string('jumlah_orang')->nullable();
            $table->string('jam_kedatangan')->nullable();
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
        Schema::dropIfExists('antrian_dine_ins');
    }
};

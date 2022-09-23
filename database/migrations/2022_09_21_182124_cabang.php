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
        Schema::create('cabang', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('fee')->nullable();
            $table->string('jumlah_meja')->nullable();
            $table->string('status_reservasi')->nullable();
            $table->string('status_dinein')->nullable();
            $table->string('status_takeaway')->nullable();
            $table->integer('no_antrian')->nullable();
            $table->integer('tanggal_tutup')->nullable();
            $table->string('jam_tutup')->nullable();
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
        Schema::dropIfExists('cabang');
    }
};

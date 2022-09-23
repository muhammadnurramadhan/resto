<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('role')->nullable();
            $table->string('cabang')->nullable();
            $table->string('status_aktif')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('userid')->nullable();   // waiters
            $table->string('password'); // admin - waiters
            $table->bigInteger('phone')->nullable();
            $table->string('pilih_cabang')->nullable(); // pelanggan
            $table->string('pilih_jenis_reservasi')->nullable(); // pelanggan
            $table->bigInteger('jumlah_kedatangan')->nullable(); // pelanggan
            $table->string('waktu_kedatangan')->nullable(); // pelanggan
            $table->string('meja')->nullable(); // pelanggan
            $table->string('pesanan')->nullable(); // pelanggan
            $table->bigInteger('no_va')->nullable(); // pelanggan
            $table->string('status_message')->nullable(); // pelanggan
            $table->string('order_id')->nullable(); // pelanggan
            $table->string('transaction_id')->nullable(); // pelanggan
            $table->string('gross_amount')->nullable(); // pelanggan
            $table->bigInteger('no_antrian')->nullable();   // pelanggan
            $table->string('reservasi_konfirmasi_pembayaran')->nullable(); // pelanggan
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

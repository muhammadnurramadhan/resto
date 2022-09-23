<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'role',
        'name',
        'email',
        'userid',   // waiters
        'password',
        'phone',
        'pilih_cabang', // pelanggan
        'pilih_jenis_reservasi', // pelanggan
        'jumlah_kedatangan', // pelanggan
        'waktu_kedatangan', // pelanggan
        'meja', // pelanggan
        'pesanan', // pelanggan
        'no_va', // pelanggan
        
        'status_message', // pelanggan
        'transaction_id', // pelanggan
        'order_id', // pelanggan
        'gross_amount', // pelanggan

        'no_antrian', // pelanggan
        'reservasi_konfirmasi_pembayaran', // pelanggan
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
}

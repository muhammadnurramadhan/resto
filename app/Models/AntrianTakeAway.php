<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class AntrianTakeAway extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    // $table->string('jam_kedatangan')->nullable();
    // $table->string('nama')->nullable();
    // $table->string('nohp')->nullable();
    // $table->string('status_kehadiran')->nullable();
    // $table->string('antrian_sekarang')->nullable();
    // $table->string('jumlah_orang')->nullable();
    protected $fillable = [
        'jam_kedatangan',
        'nama',
        'nohp',
        'status_kehadiran',
        'antrian_sekarang',
        'jumlah_orang',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        // 'password',
        // 'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        // 'email_verified_at' => 'datetime',
    ];
}

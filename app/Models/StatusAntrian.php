<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class StatusAntrian extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    // $table->string('status')->nullable();
    
    // 'antrian_dinein_status' => 'required|max:255',
    // 'antrian_reservasi_status' => 'required|max:255',
    // 'antrian_takeaway_status' => 'required|max:255',
    
    // 'no_reservasi_sekarang' => 'required|max:255',
    // 'no_dinein_sekarang' => 'required|max:255',
    // 'no_takeaway_sekarang' => 'required|max:255',
    // $table->string('antrian_sekarang')->nullable();
    // $table->string('jumlah_antrian')->nullable();
    protected $fillable = [
        'antrian_dinein_status',
        'antrian_reservasi_status',
        'antrian_takeaway_status',
        'no_reservasi_sekarang',
        'no_dinein_sekarang',
        'no_takeaway_sekarang',
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

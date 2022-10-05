<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class CabangModel extends Model
{
    protected $table = "cabang";
    use HasFactory;
    // 
    // 'nama' => 'max:255',
    // 'fee' => 'max:255',
    // 'sub_nama' => 'max:255',
    // 'jumlah_meja' => 'max:255',

    // // more than 1 input value
    // 'addMoreInputFields.*.tanggal_tutup' =>  'max:255',
    // 'addMoreInputFields.*.jam_tutup' => 'max:255',

    // 'status_reservasi' => 'max:255',
    // 'status_dinein' => 'max:255',
    // 'status_takeaway' => 'max:255',

    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'nama',
        'fee',
        'sub_nama',
        'jumlah_meja',
        'tanggal_tutup',
        'jam_tutup',
        'status_reservasi',
        'status_dinein',
        'status_takeaway',
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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CabangLibur extends Model
{
    use HasFactory;
    protected $fillable = [
        'jam_libur',
        'tanggal_libur',
        'cabang'
    ];
}

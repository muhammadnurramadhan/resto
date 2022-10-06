<?php

namespace App\Http\Controllers;

use App\Models\AntrianDineIn;
use App\Models\AntrianReservasi;
use App\Models\AntrianTakeAway;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;


class RestoCabang extends Controller
{
    public function create()
    {
        $cabang = DB::table('cabang')->get();
        
        // return view('livewire.resto.user.reservasi.reservasi-cabang');
        return view('livewire.resto.user.reservasi.reservasi-cabang', ['cabang' => $cabang]);
    }

    public function store()
    {
        $antrian_terakhir = DB::table('users')->latest('id')->first()->id;
        $jenis_reservasi = Auth::user()->pilih_jenis_reservasi;

        $attributes = request()->validate([
            'pilih_cabang' => ['required', 'max:500'],
        ]);

        $attr['status'] = 'aktif';
        $attr['antrian_sekarang'] = $antrian_terakhir;
        $attr['jumlah_antrian'] = '';

        // updae users
        DB::table('users')
            ->where('id', Auth::user()->id)
            ->update(['pilih_cabang' => $attributes['pilih_cabang']]);

            
        session()->flash('success', 'Your account has been created.');
        // $user = User::create($attributes);
        // Auth::login($user); 
        return redirect('/reservasi-antrian');
    }
}

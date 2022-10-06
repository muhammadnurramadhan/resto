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


class ReservasiAntrian extends Controller
{
    public function create()
    {
        // ->where('id', '=', 6)->first()
        $status_reservasi = DB::table('cabang')->where('nama', '=', Auth::user()->pilih_cabang)->get();
        $status_dinein = DB::table('cabang')->where('nama', '=', Auth::user()->pilih_cabang)->get();
        $status_takeaway = DB::table('cabang')->where('nama', '=', Auth::user()->pilih_cabang)->get();

        // echo ($status_reservasi);
        // echo($status_dinein);
        // echo($status_takeaway);
        // return view('livewire.resto.user.reservasi.reservasi-antrian');

        return view('livewire.resto.user.reservasi.reservasi-antrian', ['status_reservasi' => $status_reservasi, 'status_dinein' => $status_dinein, 'status_takeaway' => $status_takeaway]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'pilih_jenis_reservasi' => ['required', 'max:500'],
        ]);

        // update users
        DB::table('users')
            ->where('id', Auth::user()->id)
            ->update(['pilih_jenis_reservasi' => $attributes['pilih_jenis_reservasi']]);

            
        // update cabang parameter no.antrian
        DB::table('cabang')
        ->where('nama', Auth::user()->pilih_cabang)
        ->update(['no_antrian' => Auth::user()->id]);

        session()->flash('success', 'Your account has been created.');
        // $user = User::create($attributes);
        // Auth::login($user); 
        return redirect('/reservasi-input-nama');
    }
}

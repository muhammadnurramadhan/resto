<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;


class WaitingListJumlahOrang extends Controller
{
    public function create()
    {
        return view('livewire.resto.user.waitinglist.input-jumlah-orang');
    }

    public function store()
    {
        $attributes = request()->validate([
            'jumlah_kedatangan' => ['required', 'max:20'],
        ]);

        DB::table('users')
            ->where('id', Auth::user()->id)
            ->update(['jumlah_kedatangan' => $attributes['jumlah_kedatangan']]);

        $jam_kedatangan = '';
        $nama = Auth::user()->name;
        $nohp = Auth::user()->phone;
        $status_kehadiran = 'hadir';
        $antrian_sekarang = Auth::user()->id;
        $jumlah_orang = Auth::user()->jumlah_kedatangan;

        // add user to antrian dinein
        if (Auth::user()->pilih_jenis_reservasi == 'RESERVASI') {
            # code...
            DB::insert('insert into antrian_reservasis (jam_kedatangan, nama, nohp, status_kehadiran, antrian_sekarang, jumlah_orang) values (?, ?, ?, ?, ?, ?)', [$jam_kedatangan, $nama, $nohp, $status_kehadiran, $antrian_sekarang, $jumlah_orang]);
        }
        if (Auth::user()->pilih_jenis_reservasi == 'WAITING LIST') {
            # code...
            DB::insert('insert into antrian_dine_ins (jam_kedatangan, nama, nohp, status_kehadiran, antrian_sekarang, jumlah_orang) values (?, ?, ?, ?, ?, ?)', [$jam_kedatangan, $nama, $nohp, $status_kehadiran, $antrian_sekarang, $jumlah_orang]);
        }
        if (Auth::user()->pilih_jenis_reservasi == 'TAKE AWAY') {
            # code...
            DB::insert('insert into antrian_take_aways (jam_kedatangan, nama, nohp, status_kehadiran, antrian_sekarang, jumlah_orang) values (?, ?, ?, ?, ?, ?)', [$jam_kedatangan, $nama, $nohp, $status_kehadiran, $antrian_sekarang, $jumlah_orang]);
        }

        session()->flash('success', 'Your account has been created.');
        // $user = User::create($attributes);
        // Auth::login($user); 
        return redirect('/waitinglist-konfirmasi');
    }
}

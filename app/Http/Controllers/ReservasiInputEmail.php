<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;


class ReservasiInputEmail extends Controller
{
    public function create()
    {
        // echo(Auth::user()->name);
        DB::insert('insert into antrian (nama ,no_antrian, cabang, tipe_antrian) values (?, ?, ?, ?)', [Auth::user()->name, Auth::user()->id, Auth::user()->pilih_cabang, Auth::user()->pilih_jenis_reservasi]);
        // echo(Auth::user()->pilih_cabang);
        return view('livewire.resto.user.reservasi.reservasi-input-email');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => ['required', 'max:200'],
        ]);

        DB::table('users')
            ->where('id', Auth::user()->id)
            ->update(['email' => $attributes['email']]);

        session()->flash('success', 'Your account has been created.');
        // $user = User::create($attributes);
        // Auth::login($user); 
        return redirect('/reservasi-jumlah');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;


class ReservasiInputNama extends Controller
{
    public function create()
    {

        // echo(Auth::user()->pilih_cabang);
        // echo(Auth::user()->pilih_jenis_reservasi);

        return view('livewire.resto.user.reservasi.reservasi-input-nama');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required', 'max:20'],
        ]);

        DB::table('users')
            ->where('id', Auth::user()->id)
            ->update(['name' => $attributes['name']]);

        // DB::table('antrian')
        //     ->insert([
        //         'no_antrian' => Auth::user()->id, 
        //         'cabang' => Auth::user()->pilih_cabang, 
        //         'tipe_antrian' => Auth::user()->pilih_jenis_reseevasi, 
        // ]);

        session()->flash('success', 'Your account has been created.');
        // $user = User::create($attributes);
        // Auth::login($user); 
        return redirect('/reservasi-input-whatsapp');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;


class ReservasiInputWhatsapp extends Controller
{
    public function create()
    {
        return view('livewire.resto.user.reservasi.reservasi-input-whatsapp');
    }

    public function store()
    {
        $attributes = request()->validate([
            'phone' => ['required', 'max:20'],
        ]);

        DB::table('users')
            ->where('id', Auth::user()->id)
            ->update(['phone' => $attributes['phone']]);

        $antrian_terakhir = DB::table('users')->latest('id')->first()->id;
        $jenis_reservasi = Auth::user()->pilih_jenis_reservasi;
        

        session()->flash('success', 'Your account has been created.');
        // $user = User::create($attributes);
        // Auth::login($user); 
        return redirect('/reservasi-input-email');
    }
}

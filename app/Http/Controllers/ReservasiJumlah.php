<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;


class ReservasiJumlah extends Controller
{
    public function create()
    {
        return view('livewire.resto.user.reservasi.reservasi-jumlah-orang');
    }

    public function store()
    {
        $attributes = request()->validate([
            'jumlah_kedatangan' => ['required', 'max:20'],
        ]);

        DB::table('users')
            ->where('id', Auth::user()->id)
            ->update(['jumlah_kedatangan' => $attributes['jumlah_kedatangan']]);

        session()->flash('success', 'Your account has been created.');
        // $user = User::create($attributes);
        // Auth::login($user); 
        return redirect('/reservasi-jam');
    }
}

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


class WaitingListAntrian extends Controller
{
    public function create()
    {
        return view('livewire.resto.user.reservasi.reservasi-antrian');
    }

    public function store()
    {
        $attributes = request()->validate([
            'pilih_jenis_reservasi' => ['required', 'max:500'],
        ]);


        DB::table('users')
            ->where('id', Auth::user()->id)
            ->update(['pilih_jenis_reservasi' => $attributes['pilih_jenis_reservasi']]);

        session()->flash('success', 'Your account has been created.');
        // $user = User::create($attributes);
        // Auth::login($user); 
        return redirect('/waitinglist-input-nama');
    }
}

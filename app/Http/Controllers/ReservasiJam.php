<?php

namespace App\Http\Controllers;

use App\Models\CabangLibur;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;


class ReservasiJam extends Controller
{
    public function create()
    {
        $libur = DB::table('cabang_liburs')->get();
        
        $cabang = CabangLibur::where('cabang', '=', Auth::user()->pilih_cabang)->get();

        return view('livewire.resto.user.reservasi.reservasi-jam-kedatangan', ['libur' => $libur, 'cabang' => $cabang]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'waktu_kedatangan' => ['required', 'max:20'],
        ]);

        DB::table('users')
            ->where('id', Auth::user()->id)
            ->update(['waktu_kedatangan' => $attributes['waktu_kedatangan']]);

        session()->flash('success', 'Your account has been created.');
        // $user = User::create($attributes);
        // Auth::login($user); 
        return redirect('/reservasi-tanggal');
    }
}

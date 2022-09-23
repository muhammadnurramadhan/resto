<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Waiters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class RegisterWaitersController extends Controller
{
    public function create()
    {
        return view('livewire.resto.waiters.auth.register');
    }

    public function store()
    {
        $attributes = request()->validate([
            // 'role' => ['required', 'max:50'],
            'name' => ['required', 'max:50'],
            'email' => ['required', 'email', 'max:50', Rule::unique('users', 'email')],
            'userid' => ['required', 'min:5', 'max:20'],
            'password' => ['required', 'min:5', 'max:20'],
            // 'status_aktif' => ['required', 'min:5', 'max:20'],
            // 'agreement' => ['accepted']
        ]);
        $attributes['password'] = bcrypt($attributes['password']);
        $attributes['status_aktif'] = '';
        $attributes['phone'] = 0;
        $attributes['role'] = 2;
        $attributes['pilih_cabang'] = '';
        $attributes['pilih_jenis_reservasi'] = '';
        $attributes['jumlah_kedatangan'] = 0;
        $attributes['waktu_kedatangan'] = '';
        $attributes['meja'] = '';
        $attributes['pesanan'] = '';
        $attributes['no_va'] = 0;
        $attributes['no_antrian'] = 0; //reservasi_konfirmasi_pembayaran
        $attributes['reservasi_konfirmasi_pembayaran'] = ''; //reservasi_konfirmasi_pembayaran

        session()->flash('success', 'Your account has been created.');
        $user = User::create($attributes);
        Auth::login($user); 
        return redirect('waiters-menu');
    }
}

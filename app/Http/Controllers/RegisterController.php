<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create()
    {
        return view('session.register');
    }

    public function store()
    {
        $attributes = request()->validate([
            // 'role' => 1,
            'name' => ['required', 'max:50'],
            'email' => ['required', 'email', 'max:50', Rule::unique('users', 'email')],
            'password' => ['required', 'min:5', 'max:20'],
            // 'agreement' => ['accepted']
        ]);
        $attributes['password'] = bcrypt($attributes['password'] );
        $attributes['userid'] = '';
        $attributes['phone'] = 0;
        $attributes['role'] = 1;
        $attributes['pilih_cabang'] = '';
        $attributes['pilih_jenis_reservasi'] = '';
        $attributes['jumlah_kedatangan'] = 0;
        $attributes['waktu_kedatangan'] = '';
        $attributes['meja'] = '';
        $attributes['pesanan'] = '';
        $attributes['no_va'] = 0;
        $attributes['no_antrian'] = 0;

        session()->flash('success', 'Your account has been created.');
        $user = User::create($attributes);
        Auth::login($user); 
        return redirect('/dashboard');
    }
}

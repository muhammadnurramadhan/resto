<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginWaitersController extends Controller
{
    public function create()
    {
        return view('livewire.resto.waiters.auth.login');
    }

    public function store()
    {
        $attributes = request()->validate([
            'userid' => 'required',
            'password' => 'required'
        ]);
        // if ($user = Auth::user()) {
        //     if ($user->level == 'admin') {
        //         return redirect()->intended('admin');
        //     } elseif ($user->level == 'editor') {
        //         return redirect()->intended('editor');
        //     }
        // }
        // if ($user->status_aktif == 'aktif') {
        # code...
        if (Auth::attempt($attributes)) {

            $user = Auth::user();

            session()->regenerate();
            if ($user->role == 2 && $user->status_aktif == 'aktif') {
                # code...
                return redirect('waiters-menu')->with(['success' => 'You are logged in.']);
            } else {
                return back()->withErrors(['role' => 'Kamu bukan waiters.']);
            }
        } else {
            return back()->withErrors(['email' => 'Email or password invalid.']);
        }
        // } else {
        //     return back()->withErrors(['status_aktif' => 'Kamu tidak aktif.']);
        // }
    }

    public function destroy()
    {
        Auth::logout();
        return redirect('/waiters-login')->with(['success' => 'You\'ve been logged out.']);
    }
}

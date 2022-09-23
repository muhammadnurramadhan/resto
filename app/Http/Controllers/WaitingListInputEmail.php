<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;


class WaitingListInputEmail extends Controller
{
    public function create()
    {
        return view('livewire.resto.user.waitinglist.input-email');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => ['required', 'max:20'],
        ]);

        DB::table('users')
            ->where('id', Auth::user()->id)
            ->update(['email' => $attributes['email']]);

        // session()->flash('success', 'Your account has been created.');
        // $user = User::create($attributes);
        // Auth::login($user); 
        return redirect('/waitinglist-input-whatsapp');
    }
}

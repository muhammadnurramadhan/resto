<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;


class WaitingListInputNama extends Controller
{
    public function create()
    {
        return view('livewire.resto.user.waitinglist.input-nama');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required', 'max:20'],
        ]);

        DB::table('users')
            ->where('id', Auth::user()->id)
            ->update(['name' => $attributes['name']]);

        session()->flash('success', 'Your account has been created.');
        // $user = User::create($attributes);
        // Auth::login($user); 
        return redirect('/waitinglist-input-email');
    }
}

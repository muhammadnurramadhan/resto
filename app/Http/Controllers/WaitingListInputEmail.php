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
            'email' => ['required', 'max:200'],
        ]);

        DB::table('users')
            ->where('id', Auth::user()->id)
            ->update(['email' => $attributes['email']]);

        return redirect('/waitinglist-input-whatsapp');
    }
}

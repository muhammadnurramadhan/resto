<?php

namespace App\Http\Controllers;

use App\Models\AntrianDineIn;
use App\Models\AntrianReservasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class Antrian extends Controller
{
    public function create()
    {
        return view('laravel-examples/user-profile');
    }


    public function waiters_profile()
    {
        $user = User::where('id', '=', Auth::user()->id)->first();
        return view('livewire.resto.waiters.edit-profile', ['user' => $user]);
    }


    public function waiters_password()
    {
        $user = User::where('id', '=', Auth::user()->id)->first();
        return view('livewire.resto.waiters.ganti-password', ['user' => $user]);
    }

    public function store_pelanggan(Request $request)
    {
        $storeData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|numeric',
            'password' => 'required|max:255',
        ]);
        $pelanggan = User::create($storeData);
        return redirect('/')->with('completed', 'Pelanggan has been saved!');
    }

    public function update(Request $request, $id)
    {
        $updateData = $request->validate([
            'nama' => 'required|max:255',
            'status_kehadiran' => 'required|max:255',
            'antrian_sekarang' => 'required|max:255',
            'jumlah_orang' => 'required|max:255',
        ]);

        // $updateData['password'] = bcrypt($updateData['password']);

        AntrianDineIn::whereId($id)->update($updateData);
        return redirect('/customer-antrian')->with('completed', 'Pelanggan has been updated');
    }


    public function edit($id)
    {
        $pelanggan = AntrianDineIn::findOrFail($id);
        return view('livewire.edit-pelanggan-antrian', compact('pelanggan'));
    }

    public function destroy($id)
    {
        $pelanggan = AntrianDineIn::findOrFail($id);
        $pelanggan->delete();
        return redirect('/customer-antrian')->with('completed', 'Pelanggan has been deleted');
    }

    public function destroy_antrian($id)
    {

        $pelanggan = User::findOrFail($id);
        $pelanggan->delete();
        return redirect('/customer-antrian')->with('completed', 'Pelanggan has been deleted');
    }

    public function store(Request $request)
    {

        $attributes = request()->validate([
            'name' => ['required', 'max:50'],
            'email' => ['required', 'email', 'max:50', Rule::unique('users')->ignore(Auth::user()->id)],
            'phone'     => ['max:50'],
            // 'location' => ['max:70'],
            // 'about_me'    => ['max:150'],
        ]);
        if ($request->get('email') != Auth::user()->email) {
            if (env('IS_DEMO') && Auth::user()->id == 1) {
                return redirect()->back()->withErrors(['msg2' => 'You are in a demo version, you can\'t change the email address.']);
            }
        } else {
            $attribute = request()->validate([
                'email' => ['required', 'email', 'max:50', Rule::unique('users')->ignore(Auth::user()->id)],
            ]);
        }


        User::where('id', Auth::user()->id)
            ->update([
                'name'    => $attributes['name'],
                'email' => $attribute['email'],
                'phone'     => $attributes['phone'],
                // 'location' => $attributes['location'],
                // 'about_me'    => $attributes["about_me"],
            ]);


        return redirect('/user-profile')->with('success', 'Profile updated successfully');
    }


    public function ganti_password()
    {

        $attributes = request()->validate([
            'password' => ['required', 'max:50'],
            // 'location' => ['max:70'],
            // 'about_me'    => ['max:150'],
        ]);

        $attributes['password'] = bcrypt($attributes['password']);

        DB::table('users')->where('id', Auth::user()->id)->update([
            'password'     => $attributes['password'],
        ]);


        return redirect('/waiters-password')->with('success', 'Password updated successfully');
    }

    public function edit_profile()
    {

        $attributes = request()->validate([
            'name' => ['required', 'max:50'],
            'email' => ['required', 'email'],
            'phone'     => ['max:50'],
            'userid' => ['required', 'max:50'],
            'password' => ['required', 'max:50'],
            // 'location' => ['max:70'],
            // 'about_me'    => ['max:150'],
        ]);

        $attributes['password'] = bcrypt($attributes['password']);

        DB::table('users')->where('id', Auth::user()->id)->update([
            'name'    => $attributes['name'],
            'email' => $attributes['email'],
            'phone'     => $attributes['phone'],
            'userid'     => $attributes['userid'],
            'password'     => $attributes['password'],
            // 'location' => $attributes['location'],
            // 'about_me'    => $attributes["about_me"],
        ]);


        return redirect('/waiters-edit-profile')->with('success', 'Profile updated successfully');
    }

    public function show(User $user)
    {
        $data = User::all();
        return view('tables', ['members' => $data,]);
    }


    public function show_antrian(User $user)
    {
        $antrian = DB::table('antrian')->get();

        $antrian_dinein = DB::table('antrian_dine_ins')->get();
        $antrian_reservasi = DB::table('antrian_reservasis')->get();
        $antrian_takeaway = DB::table('antrian_take_aways')->get();


        return view('tables_antrian', ['antrian' => $antrian, 'antrian_reservasi' => $antrian_reservasi, 'antrian_dinein' => $antrian_dinein, 'antrian_takeaway' => $antrian_takeaway,]);
    }
}

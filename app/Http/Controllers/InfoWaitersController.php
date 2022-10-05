<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\View;

class InfoWaitersController extends Controller
{

    public function create()
    {
        return view('laravel-examples/user-profile');
    }


    public function waiters_profile()
    {
        $user = User::where('id', '=', Auth::user()->id)->first();
        // $rowCount = $rowList->count();
        // //
        // $data = User::all();
        // echo(Auth::user()->id);
        return view('livewire.resto.waiters.edit-profile', ['user' => $user]);
    }


    public function waiters_password()
    {
        $user = User::where('id', '=', Auth::user()->id)->first();
        // $rowCount = $rowList->count();
        // //
        // $data = User::all();
        // echo(Auth::user()->id);
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
        $updateWaiters = $request->validate([
            'name' => 'max:255',
            'status_aktif' => 'max:255',
        ]);
        # code...
        User::whereId($id)->update($updateWaiters);

        return redirect('/customer-data')->with('completed', 'Pelanggan has been updated');
    }


    public function add(Request $request, $id)
    {
        $addData = $request->validate([
            'name' => 'required|max:255',
            // 'pesanan' => 'required|max:255',
            // 'jumlah_dp' => 'required|max:255',
            // 'meja' => 'required|max:255',
            // 'jumlah_kedatangan' => 'required|max:255',
            // 'pilih_jenis_reservasi' => 'required|max:255',
            // 'pilih_cabang' => 'required|max:255',
        ]);

        // $updateData['password'] = bcrypt($updateData['password']);
        User::create($addData);
        // User::whereId($id)->insert($addData);
        return redirect('/customer-antrian')->with('completed', 'Pelanggan has been added');
    }


    // public function edit_antrian($id)
    // {
    //     $pelanggan = User::findOrFail($id);
    //     return view('livewire.edit-pelanggan-antrian', compact('pelanggan'));
    // }

    public function tambah()
    {
        // $pelanggan = User::findOrFail($id);
        return view('livewire.add-pelanggan');
    }

    public function edit($id)
    {
        $pelanggan = User::findOrFail($id);
        return view('livewire.edit-pelanggan-antrian', compact('pelanggan'));
    }

    public function destroy($id)
    {

        $pelanggan = User::findOrFail($id);
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

        // $attributes = request()->validate([
        //     'name' => ['required', 'max:50'],
        //     'email' => ['required', 'email', 'max:50', Rule::unique('users')->ignore(Auth::user()->id)],
        //     'phone'     => ['max:50'],
        //     // 'location' => ['max:70'],
        //     // 'about_me'    => ['max:150'],
        // ]);
        // if ($request->get('email') != Auth::user()->email) {
        //     if (env('IS_DEMO') && Auth::user()->id == 1) {
        //         return redirect()->back()->withErrors(['msg2' => 'You are in a demo version, you can\'t change the email address.']);
        //     }
        // } else {
        //     $attribute = request()->validate([
        //         'email' => ['required', 'email', 'max:50', Rule::unique('users')->ignore(Auth::user()->id)],
        //     ]);
        // }


        // User::where('id', Auth::user()->id)
        //     ->update([
        //         'name'    => $attributes['name'],
        //         'email' => $attribute['email'],
        //         'phone'     => $attributes['phone'],
        //         // 'location' => $attributes['location'],
        //         // 'about_me'    => $attributes["about_me"],
        //     ]);


        // return redirect('/user-profile')->with('success', 'Profile updated successfully');


        $storeData = $request->validate([
            'name' => 'required|max:255',
            'userid' => 'required|max:255',
            'email' => 'required|max:255',
            'pilih_cabang' => 'required|max:255',
            // 'pilih_jenis_reservasi' => 'required|max:255',
            'password' => 'required|max:255',
            'status_aktif' => 'required|max:255',
            // 'jumlah_kedatangan' => 'required|max:255',
            // 'meja' => 'required|max:255',
            // 'pesanan' => 'required|max:255',
        ]);
        $storeData['role'] = 2;
        $storeData['password'] = bcrypt($storeData['password']);
        $storeData['phone'] = 0;
        // $storeData['role'] = 3;
        $storeData['waktu_kedatangan'] = '';
        $storeData['no_va'] = 0;
        $storeData['no_antrian'] = 0; //reservasi_konfirmasi_pembayaran
        // $storeData['reservasi_konfirmasi_pembayaran'] = ''; //reservasi_konfirmasi_pembayaran
        // $waitersCountRow = User::where('role', '=', 2)->get();
        $waitersCountRow = DB::table('users')->where('role', '=', 2)->get();
        $users = DB::table('users')->get();
        // echo($users);

        // foreach ($users as $key => $value) {
        //     # code...
        //     // echo ($users[4]->name);
        //     if ($users[$key]->name == $storeData['name'] ||$users[$key]->email == $storeData['email'] || $users[$key]->userid == $storeData['userid']) {
        //         //     # code...
        //         return back()->withErrors(['name' => 'Nama atau userid sudah pernah dibuat.']);
        //     } 
        //     // else {
                
        //         return back()->withErrors(['name' => 'Nama atau userid belum dibuat.']);
        //     // }

        //     // if ($users[$key]->name != $storeData['name']) {
        //     //     User::create($storeData)->with('completed', 'Waiters telah dibuat!');
        //     //     return redirect('/customer-data')->with('completed', 'Waiters telah dibuat!');
        //     // }
        // }
        // echo($storeData['name']);
        // for ($i = 0; $i < $waitersCountRow->count(); $i++) {
        # code...
        // if (DB::table('users')->where('name', '=', $storeData['name'])) {
        //     //     # code...
        //     return back()->withErrors(['name' => 'Nama atau userid sudah pernah dibuat.']);
        // } else {
        DB::table('users')->insertOrIgnore($storeData);
        // $addWaiters = User::updateOrCreate($storeData)->with('completed', 'Waiters telah dibuat!');
        //   $addWaiters->save();
            return redirect('/customer-data')->with('completed', 'Waiters telah dibuat!');
        // }
        // }
        // echo ($waitersCountRow->count());

        // User::where('name',)->first();
        // return redirect('/customer-data')->with('completed', 'Waiters has been saved!');
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
        // fungsi jumlah row pada table db  
        // $rowList = User::where('id', '>=', 0)->get();
        // $rowCount = $rowList->count();
        //
        $data = User::all();
        // echo($data);
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

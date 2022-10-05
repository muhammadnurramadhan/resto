<?php

namespace App\Http\Controllers;

use App\Models\Waiters;
use App\Http\Requests\StorePelangganRequest;
use App\Http\Requests\UpdatePelangganRequest;
use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Http\Request;
// use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('livewire.add-pelanggan');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ubah()
    {
        // ...
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWaitersRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $storeData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'pilih_cabang' => 'required|max:255',
            'pilih_jenis_reservasi' => 'required|max:255',
            'jumlah_kedatangan' => 'required|max:255',
            'meja' => 'required|max:255',
            'pesanan' => 'required|max:255',
        ]);
        $storeData['role'] = 3;
        $storeData['password'] = bcrypt(123456);
        $storeData['phone'] = 0;
        $storeData['role'] = 3;
        $storeData['waktu_kedatangan'] = '';
        $storeData['no_va'] = 0;
        $storeData['no_antrian'] = 0; //reservasi_konfirmasi_pembayaran
        $storeData['reservasi_konfirmasi_pembayaran'] = ''; //reservasi_konfirmasi_pembayaran
        // User::create($storeData);
        DB::table('users')->insertOrIgnore($storeData);
        return redirect('/customer-data')->with('completed', 'Pelanggan has been saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Waiters  $waiters
     * @return \Illuminate\Http\Response
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Waiters  $waiters
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWaitersRequest  $request
     * @param  \App\Models\Waiters  $waiters
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePelangganRequest $request, Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Waiters  $waiters
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelanggan $pelanggan)
    {
        //
    }
}

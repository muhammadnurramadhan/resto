<?php

namespace App\Http\Controllers;

use App\Models\Waiters;
use App\Http\Requests\StoreWaitersRequest;
use App\Http\Requests\UpdateWaitersRequest;
use App\Models\User;

class WaitersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('livewire.add-waiters');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWaitersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWaitersRequest $request)
    {
        //
        $storeData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'pilih_cabang' => 'required|max:255',
            'pilih_jenis_reservasi' => 'required|max:255',
            'password' => 'required|max:255',
            // 'jumlah_kedatangan' => 'required|max:255',
            // 'meja' => 'required|max:255',
            // 'pesanan' => 'required|max:255',
        ]);
        $storeData['role'] = 3;
        $storeData['password'] = bcrypt($storeData['password']);
        $storeData['phone'] = 0;
        $storeData['role'] = 3;
        $storeData['waktu_kedatangan'] = '';
        $storeData['no_va'] = 0;
        $storeData['no_antrian'] = 0; //reservasi_konfirmasi_pembayaran
        // $storeData['reservasi_konfirmasi_pembayaran'] = ''; //reservasi_konfirmasi_pembayaran
        User::create($storeData);
        return redirect('/customer-data')->with('completed', 'Pelanggan has been saved!');

    }

    // public function store(Request $request)
    // {
    //     $storeData = $request->validate([
    //         'name' => 'required|max:255',
    //         'email' => 'required|max:255',
    //         'pilih_cabang' => 'required|max:255',
    //         'pilih_jenis_reservasi' => 'required|max:255',
    //         'jumlah_kedatangan' => 'required|max:255',
    //         'meja' => 'required|max:255',
    //         'pesanan' => 'required|max:255',
    //     ]);
    //     $storeData['role'] = 3;
    //     $storeData['password'] = bcrypt(123456);
    //     $storeData['phone'] = 0;
    //     $storeData['role'] = 3;
    //     $storeData['waktu_kedatangan'] = '';
    //     $storeData['no_va'] = 0;
    //     $storeData['no_antrian'] = 0; //reservasi_konfirmasi_pembayaran
    //     $storeData['reservasi_konfirmasi_pembayaran'] = ''; //reservasi_konfirmasi_pembayaran
    //     User::create($storeData);
    //     return redirect('/customer-data')->with('completed', 'Pelanggan has been saved!');
    // }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Waiters  $waiters
     * @return \Illuminate\Http\Response
     */
    public function show(Waiters $waiters)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Waiters  $waiters
     * @return \Illuminate\Http\Response
     */
    public function edit(Waiters $waiters)
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
    public function update(UpdateWaitersRequest $request, Waiters $waiters)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Waiters  $waiters
     * @return \Illuminate\Http\Response
     */
    public function destroy(Waiters $waiters)
    {
        //
    }
}

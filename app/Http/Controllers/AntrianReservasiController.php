<?php

namespace App\Http\Controllers;

use App\Exports\UsersReservasiExport;
use App\Models\AntrianReservasi;
use App\Http\Requests\StoreAntrianReservasiRequest;
use App\Http\Requests\UpdateAntrianReservasiRequest;
use App\Models\AntrianDineIn;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AntrianReservasiController extends Controller
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAntrianReservasiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAntrianReservasiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AntrianReservasi  $antrianReservasi
     * @return \Illuminate\Http\Response
     */
    public function show(AntrianReservasi $antrianReservasi)
    {
        // fungsi jumlah row pada table db  
        $rowList = AntrianReservasi::where('id', '>=', 0)->get();
        $rowCount = $rowList->count();
        //
        $data = AntrianReservasi::all();
        // echo($data);
        return view('livewire.resto.waiters.reservers-hari-ini', ['members' => $data, 'count' => $rowCount]);
    }

    public function export()
    {
        return Excel::download(new UsersReservasiExport, 'user_reservasi_hari_ini.xlsx');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AntrianReservasi  $antrianReservasi
     * @return \Illuminate\Http\Response
     */
    
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

    
    // public function edit_antrian($id)
    // {
    //     $pelanggan = User::findOrFail($id);
    //     return view('livewire.edit-pelanggan-antrian', compact('pelanggan'));
    // }

    public function edit($id)
    {
        $pelanggan = AntrianReservasi::findOrFail($id);
        return view('livewire.edit-pelanggan-antrian', compact('pelanggan'));
    }

    public function destroy($id)
    {
        
        $pelanggan = AntrianReservasi::findOrFail($id);
        $pelanggan->delete();
        return redirect('/customer-antrian')->with('completed', 'Pelanggan has been deleted');
    }
}

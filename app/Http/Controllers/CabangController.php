<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CabangController extends Controller
{
    //

    public function create()
    {
        return view('livewire.add-cabang');
    }


    public function store(Request $request)
    {
        $storeData = $request->validate([
            'nama' => 'max:255',
            'fee' => 'max:255',
            'sub_nama' => 'max:255',
            'jumlah_meja' => 'max:255',

            'tanggal_tutup' => 'max:255',
            'jam_tutup' => 'max:255',

            'status_reservasi' => 'max:255',
            'status_dinein' => 'max:255',
            'status_takeaway' => 'max:255',
        ]);

        $storeData['fee'] = 3000;
        $storeData['jumlah_meja'] = 4;
        $storeData['tanggal_tutup'] = '';
        $storeData['jam_tutup'] = '';
        // $storeData['status_reservasi'] = '';
        // $storeData['status_dinein'] = '';
        // $storeData['status_takeaway'] = '';

        DB::insert('insert into cabang (nama, sub_nama, fee, jumlah_meja, tanggal_tutup, jam_tutup, status_reservasi, status_dinein, status_takeaway) values (?,?,?,?,?,?,?,?,?)', [$storeData['nama'], $storeData['sub_nama'], $storeData['fee'], $storeData['jumlah_meja'], $storeData['tanggal_tutup'], $storeData['jam_tutup'], $storeData['status_reservasi'], $storeData['status_dinein'], $storeData['status_takeaway']]);
        // User::create($storeData);
        return redirect('/customer-antrian')->with('completed', 'Pelanggan has been saved!');
    }

    public function update(Request $request, $id)
    {
        $updateData = $request->validate([

            'nama' => 'max:255',
            'fee' => 'max:255',
            'jumlah_meja' => 'max:255',

            'tanggal_tutup' => 'max:255',
            'jam_tutup' => 'max:255',

            'status_reservasi' => 'max:255',
            'status_dinein' => 'max:255',
            'status_takeaway' => 'max:255',

        ]);
        // ModelsStatusAntrian::findOrFail($id);
        // ModelsStatusAntrian::whereId($id)->update($updateData);
        DB::table('cabang')
            ->where('id', $id)
            ->update($updateData);
        return redirect('/customer-antrian')->with('completed', 'Pelanggan has been updated');
    }

    public function edit($id)
    {
        $pelanggan = DB::table('cabang')->where('id', $id)->first();
        // $pelanggan = ModelsStatusAntrian::findOrFail($id);
        return view('livewire.edit-status-antrian', compact('pelanggan'));
    }


    public function destroy($id)
    {

        // $pelanggan = User::findOrFail($id);
        DB::table('cabang')->where('id', $id)->delete();
        // $pelanggan->delete();
        return redirect('/customer-antrian')->with('completed', 'Pelanggan has been deleted');
    }
}

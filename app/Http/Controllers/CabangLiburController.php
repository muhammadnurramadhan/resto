<?php

namespace App\Http\Controllers;

use App\Models\CabangLibur;
use Illuminate\Http\Request;

class CabangLiburController extends Controller
{
    //
    public function index() 
    {
        // return view("welcome");
        return view('livewire.add-cabang-libur');
    }
    public function store(Request $request)
    {
        $request->validate([
            'addMoreInputFields.*.jam_libur' => 'required',
            'addMoreInputFields.*.tanggal_libur' => 'required',
            'addMoreInputFields.*.cabang' => 'required'
        ]);
     
        foreach ($request->addMoreInputFields as $key => $value) {
            CabangLibur::create($value);
        }
     
        return back()->with('success', 'Waktu libur telah ditambahkan.');
    }
}

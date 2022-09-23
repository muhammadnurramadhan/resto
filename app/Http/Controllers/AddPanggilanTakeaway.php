<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddPanggilanTakeaway extends Controller
{
    //

    public function update(Request $request, $id)
    {
        $jml_panggilan = DB::table('antrian')->where('id', '=', $id)->first()->jumlah_panggilan;
        $jumlah_panggilan =  DB::table('antrian')->where('id', '=', $id)->update([
            'jumlah_panggilan' =>
            $jml_panggilan + 1,
        ]);
        // echo ($jml_panggilan);
        return redirect('panggilan-antrian-takeaway');
    }
    public function hadir(Request $request, $id)
    {
        $jml_panggilan = DB::table('antrian')->where('id', '=', $id)->first()->jumlah_panggilan;
        $jumlah_panggilan =  DB::table('antrian')->where('id', '=', $id)->update([
            'status_panggilan' =>
            'hadir',
        ]);

        return redirect('panggilan-antrian-takeaway');
    }
    
    public function tidak(Request $request, $id)
    {
        $jml_panggilan = DB::table('antrian')->where('id', '=', $id)->first()->jumlah_panggilan;
        $jumlah_panggilan =  DB::table('antrian')->where('id', '=', $id)->update([
            'status_panggilan' =>
            'tidak hadir',
        ]);

        return redirect('panggilan-antrian-takeaway');
    }

    public function next(Request $request, $id)
    {
        $jml_panggilan = DB::table('antrian')->where('id', '=', $id)->first()->jumlah_panggilan;
        $jumlah_panggilan =  DB::table('antrian')->where('id', '=', $id)->update([
            'status_panggilan' =>
            'sudah',
        ]);

        return redirect('panggilan-antrian-takeaway');
    }
}

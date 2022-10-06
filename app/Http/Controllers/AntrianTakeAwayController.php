<?php

namespace App\Http\Controllers;

use App\Models\AntrianTakeAway;
use App\Http\Requests\StoreAntrianTakeAwayRequest;
use App\Http\Requests\UpdateAntrianTakeAwayRequest;
use App\Models\AntrianUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AntrianTakeAwayController extends Controller
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
     * @param  \App\Http\Requests\StoreAntrianTakeAwayRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAntrianTakeAwayRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AntrianTakeAway  $antrianTakeAway
     * @return \Illuminate\Http\Response
     */
    public function show(AntrianTakeAway $antrianTakeAway)
    {
        //
        // fungsi jumlah row pada table db  
        $rowList = AntrianTakeAway::where('id', '>=', 0)->get();
        $rowCount = $rowList->count();

        $panggilan = AntrianTakeAway::where('panggilan', '>=', 0)->get();
        $total_panggilan = DB::table('antrian')->where('cabang', '=', Auth::user()->cabang)->where('tipe_antrian', '=', 'TAKE AWAY')->sum('jumlah_panggilan');
        // 
        $status_antrian_takeaway =  DB::table('cabang')->where('nama', '=', Auth::user()->cabang)->first()->status_takeaway;

        // echo($status_antrian_takeaway);

        //
        $data = AntrianTakeAway::all();
        return view('livewire.resto.waiters.antrian-takeaway', ['members' => $data, 'count' => $rowCount, 'panggilan' => $panggilan, 'total_panggilan' => $total_panggilan, 'status_takeaway' => $status_antrian_takeaway]);
    }

    public function start_panggilan(AntrianTakeAway $antrianTakeAway)
    {
        DB::table('cabang')->where('nama', '=', Auth::user()->cabang)->update([
            'status_takeaway' => 'start'
        ]);
        
        return redirect('/antrian-takeaway');
    }

    public function pause_panggilan(AntrianTakeAway $antrianTakeAway)
    {
        DB::table('cabang')->where('nama', '=', Auth::user()->cabang)->update([
            'status_takeaway' => 'pause'
        ]);
     
        return redirect('/antrian-takeaway');
    }


    public function stop_panggilan(AntrianTakeAway $antrianTakeAway)
    {
        DB::table('cabang')->where('nama', '=', Auth::user()->cabang)->update([
            'status_takeaway' => 'stop'
        ]);
        // code...
     
        return redirect('/antrian-takeaway');
    }

    public function show_antrian(AntrianTakeAway $antrianTakeAway)
    {
        //
        // fungsi jumlah row pada table db  
        $rowList = AntrianTakeAway::where('id', '>=', 0)->get();
        $rowCount = $rowList->count();

        $panggilan = AntrianTakeAway::where('panggilan', '>=', 0)->get();
        //
        $data = AntrianTakeAway::all();
        return view('livewire.resto.waiters.cek-antrian-takeaway', ['members' => $data, 'count' => $rowCount, 'panggilan' => $panggilan]);
    }

    public function show_panggilan(AntrianTakeAway $antrianDineIn)
    {

        $dinein_sekarang = DB::table('antrian')->where('tipe_antrian', '=', 'TAKE AWAY')->where('status_panggilan', '=', null)->get();

        $antrian_takeaway_sebelumnya = 0;
        $antrian_takeaway_sekarang = 0;
        $antrian_takeaway_next = 0;

        $status_kehadiran_sekarang = 'belum';
        $status_kehadiran_sebelumnya = 'sudah';
        $status_kehadiran_next = 'belum';



        for ($i = 0; $i < $dinein_sekarang->count(); $i++) {
            # code...
            if ($dinein_sekarang[$i]->jumlah_panggilan <= 3) {
                # code...

                $antrian_dinein_sebelumnya = (empty($dinein_sekarang[2]) == true ? null : $dinein_sekarang[2]);
                $antrian_dinein_sekarang = (empty($dinein_sekarang[0]) == true ? null : $dinein_sekarang[0]);
                $antrian_dinein_next = (empty($dinein_sekarang[1]) == true ? null : $dinein_sekarang[1]);

                // echo($dinein_sekarang[2]->id != null ? 'ada' : 'tidak ada');
                // if (empty($dinein_sekarang[2]) == true) {
                //     # code...
                // echo('test2');
                // }
                // $status_kehadiran_sekarang = ;
                // $status_kehadiran_sebelumnya = ;
                // $status_kehadiran_next = ;
            }
        }
        // echo ($dinein_sekarang->count());
        // $rowCount = $antrian_takeaway_sekarang->count();

        $panggilan = AntrianTakeAway::where('panggilan', '>=', 0)->get();

        // get all record db table antrian dine in
        $data = AntrianTakeAway::all();
        // $count = DB::table('antrian_take_aways')->latest('id')->first()->panggilan;

        // echo(DB::table('antrian')->latest('id')->first()->no_dinein_sekarang);
        // echo($antrian_dinein_sebelumnya);
        if (empty($antrian_dinein_sekarang) == true) {
            # code...
            return view('livewire.resto.waiters.panggilan-antrian-takeaway', ['members' => $data,  'panggilan' => $panggilan, 'user' => null, 'user_prev' => null, 'user_next' => null]);
        } else {

            return view('livewire.resto.waiters.panggilan-antrian-takeaway', ['members' => $data,  'panggilan' => $panggilan, 'user' => $antrian_dinein_sekarang, 'user_prev' => $antrian_dinein_sebelumnya, 'user_next' => $antrian_dinein_next]);
        }
    }


    public function edit_next_antrian(AntrianTakeAway $antrianDineIn)
    {
        //
        DB::table('antrian')->where('id', 1)->update([
            'no_takeaway_sekarang' =>
            DB::table('antrian')->latest('id')->first()->no_dinein_sekarang + 1,
        ]);

        // $user = AntrianDineIn::where('id', '>', $this->id)->orderBy('id','asc')->first();
        // 
        // return view('livewire.resto.waiters.panggilan-antrian');
        return redirect('panggilan-antrian-takeaway');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AntrianTakeAway  $antrianTakeAway
     * @return \Illuminate\Http\Response
     */
    // public function edit(AntrianTakeAway $antrianTakeAway)
    // {
    //     //
    // }

    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari =
            request()->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        // $data_cari = DB::table('antrian_take_aways')
        //     ->where('nama', 'like', "%" . . "%")
        //     ->get();

        // mengambil data dari table pegawai sesuai pencarian data
        // $data_cari = DB::table('antrian_take_aways')
        //     ->where('nama', 'like', "%" . . "%")
        //     ->get();

        $data_cari = AntrianUser::where('nama', 'LIKE', '%' . $cari == null ? 'ra' : $cari . '%')->get();

        // echo($data_cari[0]->nama);
        //  ================================================
        //  ================================================
        //  ================================================
        // mengirim data pegawai ke view index
        $rowList = AntrianUser::where('id', '>=', 0)->get();
        $rowCount = $rowList->count();

        $panggilan = AntrianUser::where('jumlah_panggilan', '>=', 0)->get();
        //
        $data = AntrianUser::all();
        return view('livewire.resto.waiters.cek-antrian-takeaway', ['members' => $data, 'count' => $rowCount, 'panggilan' => $panggilan, 'data_cari' => $data_cari]);
    }

    public function edit(AntrianTakeAway $antrianTakeAway, $id)
    {
        DB::table('antrian_take_aways')
            ->where('id', $id)
            ->update(['panggilan' => (DB::table('antrian_take_aways')->latest('id')->first()->panggilan) + 1]);

        return redirect('antrian-takeaway');
    }

    // public function edit_pause(AntrianTakeAway $antrianTakeAway)
    // {
    //     DB::table('antrian')
    //         ->where('id', 1)
    //         ->update(['antrian_takeaway_status' => 'pause']);

    //     return redirect('antrian-takeaway');
    // }

    // public function edit_stop(AntrianTakeAway $antrianTakeAway)
    // {
    //     DB::table('antrian')
    //         ->where('id', 1)
    //         ->update(['antrian_takeaway_status' => 'stop']);

    //     return redirect('antrian-takeaway');
    // }

    // public function edit_start(AntrianTakeAway $antrianTakeAway)
    // {
    //     DB::table('antrian')
    //         ->where('id', 1)
    //         ->update(['antrian_takeaway_status' => 'run']);

    //     return redirect('antrian-takeaway');
    // }

    // kehadiran

    public function tidak_hadir(AntrianTakeAway $antrianTakeAway)
    {
        // DB::table('antrian')
        //     ->where('id', 1)
        //     ->update(['antrian_takeaway_status' => 'stop']);


        AntrianTakeAway::where('id', '=', DB::table('antrian')->latest('id')->first()->no_takeaway_sekarang)->update([
            'status_kehadiran' => 'tidak hadir'
        ]);


        return redirect('panggilan-antrian-takeaway');
    }

    public function hadir(AntrianTakeAway $antrianTakeAway)
    {

        AntrianTakeAway::where('id', '=', DB::table('antrian')->latest('id')->first()->no_takeaway_sekarang)->update([
            'status_kehadiran' => 'hadir'
        ]);

        return redirect('panggilan-antrian-takeaway');
    }


    public function add_panggilan(AntrianTakeAway $antrianTakeAway, $id)
    {
        AntrianTakeAway::where('id', '=', DB::table('antrian')->latest('id')->first()->no_takeaway_sekarang)->update([
            'panggilan' => DB::table('antrian_take_aways')->where('id', '=', DB::table('antrian')->latest('id')->first()->no_takeaway_sekarang)->first()->panggilan + 1
        ]);

        return redirect('panggilan-antrian-takeaway');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAntrianTakeAwayRequest  $request
     * @param  \App\Models\AntrianTakeAway  $antrianTakeAway
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAntrianTakeAwayRequest $request, AntrianTakeAway $antrianTakeAway)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AntrianTakeAway  $antrianTakeAway
     * @return \Illuminate\Http\Response
     */
    public function destroy(AntrianTakeAway $antrianTakeAway)
    {
        //
    }
}

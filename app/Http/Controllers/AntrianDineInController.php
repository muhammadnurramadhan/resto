<?php

namespace App\Http\Controllers;

use App\Models\AntrianDineIn;
use App\Http\Requests\StoreAntrianDineInRequest;
use App\Http\Requests\UpdateAntrianDineInRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AntrianDineInController extends Controller
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
        // return view('livewire.resto.user.reservasi.reservasi-input-nama');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAntrianDineInRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAntrianDineInRequest $request)
    {
        $this->authorize('ownItems', $request);
        // session()->flash('success', 'Your account has been created.');
        // $user = User::create($attributes);
        // Auth::login($user); 
        $test = DB::table('antrian_dine_ins')->where('id', 1)->update([
            'panggilan' =>
            DB::table('antrian_dine_ins')->latest('id')->first()->panggilan + 1,
        ]);
        return redirect('/antrian-dine-in');
    }


    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari =
            request()->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        // $data_cari = DB::table('antrian_take_aways')
        //     ->where('nama', 'like', "%" . . "%")
        //     ->get();

        $data_cari = AntrianDineIn::where('nama', 'LIKE', '%' . $cari == null ? 'take' : $cari . '%')->get();

        // echo($data_cari[0]->nama);
        //  ================================================
        //  ================================================
        //  ================================================
        // mengirim data pegawai ke view index
        $rowList = AntrianDineIn::where('id', '>=', 0)->get();
        $rowCount = $rowList->count();

        $panggilan = AntrianDineIn::where('panggilan', '>=', 0)->get();
        //
        $data = AntrianDineIn::all();

        return view('livewire.resto.waiters.cek-antrian', ['members' => $data, 'count' => $rowCount, 'panggilan' => $panggilan, 'data_cari' => $data_cari]);
    }

    public function addclick()
    {

        // assume you have a clicks  field in your DB

        // $this->clicks = $this->clicks + 1;
        $this->DB::table('antrian_dine_ins')->where('id', 1)->update([
            'panggilan' =>
            DB::table('antrian_dine_ins')->latest('id')->first()->panggilan + 1,
        ]);
        $this->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AntrianDineIn  $antrianDineIn
     * @return \Illuminate\Http\Response
     */
    public function show(AntrianDineIn $antrianDineIn)
    {
        //
        // fungsi jumlah row pada table db  
        $rowList = AntrianDineIn::where('id', '>=', 0)->get();
        $rowCount = $rowList->count();

        $panggilan = AntrianDineIn::where('panggilan', '>=', 0)->get();
        $total_panggilan = DB::table('antrian')->where('cabang', '=', Auth::user()->cabang)->where('tipe_antrian', '=', 'WAITING LIST')->sum('jumlah_panggilan');
        // 
        $status_antrian_dinein =  DB::table('cabang')->where('nama', '=', Auth::user()->cabang)->first()->status_dinein;
        // $status_antrian_takeaway =  DB::table('cabang')->where('nama', '=', Auth::user()->cabang)->first()->status_takeaway;

        // echo(Auth::user()->cabang);
        // echo($status_antrian_dinein);

        //
        $data = AntrianDineIn::all();
        return view('livewire.resto.waiters.antrian', ['members' => $data, 'count' => $rowCount, 'panggilan' => $panggilan, 'total_panggilan' => $total_panggilan, 'status_dinein' => $status_antrian_dinein]);
    }

    public function show_panggilan(AntrianDineIn $antrianDineIn)
    {
        $dinein_sekarang = DB::table('antrian')->where('tipe_antrian', '=', 'WAITING LIST')->where('status_panggilan', '=', null)->get();

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

        $panggilan = AntrianDineIn::where('panggilan', '>=', 0)->get();

        // get all record db table antrian dine in
        $data = AntrianDineIn::all();
        // $count = DB::table('antrian_take_aways')->latest('id')->first()->panggilan;

        // echo(DB::table('antrian')->latest('id')->first()->no_dinein_sekarang);
        // echo($antrian_dinein_sebelumnya);
        if (empty($antrian_dinein_sekarang) == true) {
            # code...
            return view('livewire.resto.waiters.panggilan-antrian', ['members' => $data,  'panggilan' => $panggilan, 'user' => null, 'user_prev' => null, 'user_next' => null]);
        }

         else {

            return view('livewire.resto.waiters.panggilan-antrian', ['members' => $data,  'panggilan' => $panggilan, 'user' => $antrian_dinein_sekarang, 'user_prev' => $antrian_dinein_sebelumnya, 'user_next' => $antrian_dinein_next]);
        }
    }


    public function edit_next_antrian(AntrianDineIn $antrianDineIn)
    {
        //
        DB::table('antrian')->where('id', 1)->update([
            'no_dinein_sekarang' =>
            DB::table('antrian')->latest('id')->first()->no_dinein_sekarang + 1,
        ]);

        // $user = AntrianDineIn::where('id', '>', $this->id)->orderBy('id','asc')->first();
        // 
        // return view('livewire.resto.waiters.panggilan-antrian');
        return redirect('panggilan-antrian-dinein');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AntrianDineIn  $antrianDineIn
     * @return \Illuminate\Http\Response
     */
    public function edit(AntrianDineIn $antrianDineIn)
    {
        DB::table('antrian_dine_ins')
            ->where('id', 1)
            ->update(['panggilan' => (DB::table('antrian_dine_ins')->latest('id')->first()->panggilan) + 1]);
        return redirect('antrian-dine-in');
    }

    public function edit_pause(AntrianDineIn $antrianDineIn)
    {
        DB::table('antrian')
            ->where('id', 1)
            ->update(['antrian_dinein_status' => 'pause']);

        return redirect('antrian-dine-in');
    }

    public function edit_stop(AntrianDineIn $antrianDineIn)
    {
        DB::table('antrian')
            ->where('id', 1)
            ->update(['antrian_dinein_status' => 'stop']);

        return redirect('antrian-dine-in');
    }

    public function edit_start(AntrianDineIn $antrianDineIn)
    {
        DB::table('antrian')
            ->where('id', 1)
            ->update(['antrian_dinein_status' => 'run']);

        return redirect('antrian-dine-in');
    }


    public function tidak_hadir(AntrianDineIn $antrianDineIn)
    {
        AntrianDineIn::where('id', '=', DB::table('antrian')->latest('id')->first()->no_dinein_sekarang)->update([
            'status_kehadiran' => 'tidak hadir'
        ]);

        return redirect('panggilan-antrian-dinein');
    }

    public function hadir(AntrianDineIn $antrianDineIn)
    {
        AntrianDineIn::where('id', '=', DB::table('antrian')->latest('id')->first()->no_dinein_sekarang)->update([
            'status_kehadiran' => 'hadir'
        ]);

        return redirect('panggilan-antrian-dinein');
    }


    public function add_panggilan(AntrianDineIn $antrianDineIn)
    {
        AntrianDineIn::where('id', '=', DB::table('antrian')->latest('id')->first()->no_dinein_sekarang)->update([
            'panggilan' => DB::table('antrian_dine_ins')->where('id', '=', DB::table('antrian')->latest('id')->first()->no_dinein_sekarang)->first()->panggilan + 1
        ]);

        return redirect('panggilan-antrian-dinein');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAntrianDineInRequest  $request
     * @param  \App\Models\AntrianDineIn  $antrianDineIn
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAntrianDineInRequest $request, AntrianDineIn $antrianDineIn)
    {
        //
        DB::table('antrian_dine_ins')->where('id', 1)->update([
            'panggilan' =>
            DB::table('antrian_dine_ins')->latest('id')->first()->panggilan + 1,
        ]);
        // return redirect('antrian-dine-in');
        return view('livewire.resto.waiters.antrian');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AntrianDineIn  $antrianDineIn
     * @return \Illuminate\Http\Response
     */
    public function destroy(AntrianDineIn $antrianDineIn)
    {
        //
    }
}

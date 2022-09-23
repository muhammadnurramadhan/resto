<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class RestoIntroController extends Controller
{
    public function create()
    {
        $url_resto = QrCode::size(270)->generate('Url site untuk aplikasi restoran sederhana ini adalah : http://resto.smarteknologi.id/');
        // $aktif = DB::table('users')
        //     ->where('id', '=', 6)->first();
        // echo ($aktif->status_aktif);
        return view('livewire.resto.user.intro.intro', ["url_resto" => $url_resto]);
    }

    public function store()
    {
        // ====================================================
        $uid = rand(000, 999);
        $attributes['name'] = '';
        $attributes['cabang'] = '';
        $attributes['email'] = 'pelanggan_' . $uid . '@mail.com';
        $attributes['password'] = '';
        $attributes['userid'] = 'pelanggan_' . $uid;
        $attributes['phone'] = 0;
        $attributes['role'] = 3;
        $attributes['pilih_cabang'] = '';
        $attributes['pilih_jenis_reservasi'] = '';
        $attributes['jumlah_kedatangan'] = 0;
        $attributes['waktu_kedatangan'] = '';
        $attributes['meja'] = '';
        $attributes['pesanan'] = '';
        $attributes['no_va'] = 0;
        $attributes['order_id'] = '';
        $attributes['status_message'] = '';
        $attributes['transaction_id'] = '';
        $attributes['gross_amount'] = '';
        $attributes['no_antrian'] = 0;
        $attributes['reservasi_konfirmasi_pembayaran'] = ''; //reservasi_konfirmasi_pembayaran

        session()->flash('success', 'Your account has been created.');


        $user = User::create($attributes);
        Auth::login($user);
        return redirect('/reservasi-cabang');
    }
}

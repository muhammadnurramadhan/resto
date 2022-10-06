<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;


class ReservasiPembayaran extends Controller
{
    public function create()
    {

        $cabang = DB::table('cabang')->where('nama', Auth::user()->pilih_cabang)->first();

        return view('livewire.resto.user.reservasi.reservasi-pembayaran', ['cabang' => $cabang]);
        // $page = file_get_contents("https://wa.me/1XXXXXXXXXX?text=I'm%20interested%20in%20your%20car%20for%20sale");

        // echo $page;
    }

    public function store()
    {

        // api curl midtrans

        // $info = array(
        //     'name' => "Alex"
        // );
        // Mail::send(['text' => 'mail'], $info, function ($message)
        // {
        //     $message->to('virgo19buncis@gmail.com', 'W3SCHOOLS')
        //         ->subject('Basic test eMail from W3schools.');
        //     $message->from('sender@example.com', 'Alex');
        // });
        // echo "Successfully sent the email";

        // session()->flash('success', 'Your account has been created.');
        // $user = User::create($attributes);
        // Auth::login($user); 
        
        $cabang = DB::table('cabang')->where('nama', Auth::user()->pilih_cabang)->first();

        $orderid = rand(0000000000, 9999999999);
        $curl = curl_init();
        $no_va = rand(00000000, 99999999);

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.sandbox.midtrans.com/v2/charge',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
    "payment_type": "bank_transfer",
    "transaction_details": {
        "gross_amount": ' . "$cabang->fee" . ',
        "order_id": "order-101q-' . "$orderid" . '"
    },
    "customer_details": {
        "email": "' . Auth::user()->email . '",
        "first_name": "' . Auth::user()->name . '",
        "last_name": "",
        "phone": "' . Auth::user()->phone . '"
    },
    "item_details": [
    {
       "id": "reservasi",
       "price": ' . "$cabang->fee" . ',
       "quantity": 1,
       "name": "Ayam Zozozo"
    }
   ],
   "bank_transfer":{
     "bank": "bni",
     "va_number": ' . $no_va . '
  }
}',
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Content-Type: application/json',
                'Authorization: Basic U0ItTWlkLXNlcnZlci1CekxnWWhpcy05RkxSZUtzUk5xR3pLbnY6'
            ),
        ));

        $response = curl_exec($curl);
        $res = json_decode($response);

        $status_message = $res->status_message;
        $transaction_id = $res->transaction_id;
        $order_id = $res->order_id;
        $gross_amount = $res->gross_amount;
        $transaction_status = $res->transaction_status;

        curl_close($curl);


        // $attributes = request()->validate([
        //     'reservasi_konfirmasi_pembayaran' =>  ['accepted'],
        // ]);

        $jam_kedatangan = Auth::user()->waktu_kedatangan;
        $nama = Auth::user()->name;
        $nohp = Auth::user()->phone;
        $status_kehadiran = 'hadir';
        $antrian_sekarang = Auth::user()->id;
        $jumlah_orang = Auth::user()->jumlah_kedatangan;

        // add user to antrian dinein
        if (Auth::user()->pilih_jenis_reservasi == 'RESERVASI') {
            # code...
            DB::insert('insert into antrian_reservasis (jam_kedatangan, nama, nohp, status_kehadiran, antrian_sekarang, jumlah_orang, panggilan) values (?, ?, ?, ?, ?, ?, ?)', [$jam_kedatangan, $nama, $nohp, $status_kehadiran, $antrian_sekarang, $jumlah_orang, 1]);
        }
        if (Auth::user()->pilih_jenis_reservasi == 'WAITING LIST') {
            # code...
            DB::insert('insert into antrian_dine_ins (jam_kedatangan, nama, nohp, status_kehadiran, antrian_sekarang, jumlah_orang, panggilan) values (?, ?, ?, ?, ?, ?, ?)', [$jam_kedatangan, $nama, $nohp, $status_kehadiran, $antrian_sekarang, $jumlah_orang, 1]);
        }
        if (Auth::user()->pilih_jenis_reservasi == 'TAKE AWAY') {
            # code...
            DB::insert('insert into antrian_take_aways (jam_kedatangan, nama, nohp, status_kehadiran, antrian_sekarang, jumlah_orang, panggilan) values (?, ?, ?, ?, ?, ?, ?)', [$jam_kedatangan, $nama, $nohp, $status_kehadiran, $antrian_sekarang, $jumlah_orang, 1]);
        }

        if (Auth::user()->pilih_jenis_reservasi == 'RESERVASI') {
            # code...
            DB::table('users')
                ->where('id', Auth::user()->id)
                ->update([
                    'role' => 3,
                    'reservasi_konfirmasi_pembayaran' => 'aggreement',
                    'status_message' => $status_message,
                    'transaction_id' => $transaction_id,
                    'order_id' => $order_id,
                    'gross_amount' => $gross_amount,
                    'transaction_status' => $transaction_status,
                ]);
        }
        return redirect('/reservasi-tunggu-payment');
    }
}

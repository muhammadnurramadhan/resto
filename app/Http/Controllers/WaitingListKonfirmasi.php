<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;


class WaitingListKonfirmasi extends Controller
{
    public function create()
    {
        return view('livewire.resto.user.waitinglist.konfirmasi');
        // $page = file_get_contents("https://wa.me/1XXXXXXXXXX?text=I'm%20interested%20in%20your%20car%20for%20sale");
        // echo $page;
    }

    public function store()
    {

        
        // api curl midtrans
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
        "gross_amount": 2100,
        "order_id": "order-101q-' . "$orderid" . '"
    },
    "customer_details": {
        "email": "'. Auth::user()->email.'",
        "first_name": "'. Auth::user()->name.'",
        "last_name": "",
        "phone": "'. Auth::user()->phone.'"
    },
    "item_details": [
    {
       "id": "item01",
       "price": 2100,
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

        curl_close($curl);

        $attributes = request()->validate([
            'reservasi_konfirmasi_pembayaran' =>  ['accepted'],
        ]);


        DB::table('users')
            ->where('id', Auth::user()->id)
            ->update([
                'role' => 3,
                'reservasi_konfirmasi_pembayaran' => $attributes['reservasi_konfirmasi_pembayaran'],
                'status_message' => $status_message,
                'transaction_id' => $transaction_id,
                'order_id' => $order_id,
                'gross_amount' => $gross_amount,
            ]);

        // update table user reservasi
        // var reservasi 


        return redirect('/waitinglist-notifikasi');
    }
}

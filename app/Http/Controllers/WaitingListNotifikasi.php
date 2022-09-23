<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;


class WaitingListNotifikasi extends Controller
{
    public function create()
    {
        // send message to whatsapp with api
        // $number = Auth::user()->phone;
        // $curl = curl_init();
        // curl_setopt_array($curl, array(
        //     CURLOPT_URL => 'https://api.maytapi.com/api/ba072c39-a788-4541-a232-2a9c2952bc62/23687/sendMessage',
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_ENCODING => '',
        //     CURLOPT_MAXREDIRS => 10,
        //     CURLOPT_TIMEOUT => 0,
        //     CURLOPT_FOLLOWLOCATION => true,
        //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //     CURLOPT_CUSTOMREQUEST => 'POST',
        //     CURLOPT_POSTFIELDS => '{
        //         "to_number": '.$number.',
        //         "type": "text",
        //         "message": "Pesanan antrian kamu sudah kami terima"
        //     }',
        //     CURLOPT_HTTPHEADER => array(
        //         'x-maytapi-key: 06961b34-30dd-484e-8554-2b581621edb8',
        //         'Content-Type: application/json'
        //     ),
        // ));

        // $response = curl_exec($curl);
        // curl_close($curl);
        // echo $response;

        // dd($response);
        return view('livewire.resto.user.waitinglist.notifikasi');
        // $page = file_get_contents("https://wa.me/1XXXXXXXXXX?text=I'm%20interested%20in%20your%20car%20for%20sale");
        // echo $page;
    }

    public function store()
    {
        // curl whatsapp api with mytapi
        $number = Auth::user()->phone;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.maytapi.com/api/ba072c39-a788-4541-a232-2a9c2952bc62/23687/sendMessage',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
                "to_number": '.$number.',
                "type": "text",
                "message": "Pesanan antrian kamu sudah kami terima"
            }',
            CURLOPT_HTTPHEADER => array(
                'x-maytapi-key: 06961b34-30dd-484e-8554-2b581621edb8',
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        // echo $response;

        return redirect('/');
    }
}

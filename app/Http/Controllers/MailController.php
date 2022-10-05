<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MailNotify;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
// use Illuminate\Support\Facades\Mail as FacadesMail;

class MailController extends Controller
{
    //

    public function create()
    {
        $to_name = Auth::user()->name; 
        $to_email = Auth::user()->email; // Auth::user()->emmail
        $data = array('name' => Auth::user()->name, "body" => "send notifikasi");
        Mail::send("emails.mail", $data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)->subject("Notifikasi foods pembayaran");
            $message->from("muhammadnurramadhan07@gmail.com", "Email notifikasi foods");
        });
        // return redirect('reservasi-cek-email');
        
        return view('livewire.resto.user.reservasi.reservasi-cek-email');
    }
}

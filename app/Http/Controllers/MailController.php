<?php

namespace App\Http\Controllers;

use App\Mail\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class MailController extends Controller
{
    public function send(Request $req) {
        $name = $req->ad;
        $email = $req->email;
        $telefon = $req->telefon;
        $subject = $req->subject;
        $mesaj = $req->mesaj;
        Mail::send('mail', ['name' => $name, 'email' => $email, 'phone' => $telefon, 'mesaj' => $mesaj], function($message) use ($subject) {
            $message->to("agamedov94@mail.ru")->subject($subject);
        });

        Mail::send('retmail', ['name' => $name], function($message) use ($subject, $email) {
            $message->to($email)->subject($subject);
        });

        return redirect()->back()->with('successsendemail', 'məktubunuz uğurla göndərilmişdir');
    }
}

<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class EnterController extends Controller
{
    public function index() {
        return view('auth.enter');
    }
    public function login(Request $req) {
        $checkemail = User::where('email', $req->email)->where('password', md5($req->password))->get();

        if($checkemail->count() > 0) {
            session()->put('user_email', $req->email);
            return redirect()->route('front.index');
        } else {
            return redirect()->route('auth.enter')->with('errorenter', 'email və ya şifrə yanlışdır');
        }
    }

    public function exit() {
        session()->forget('user_email');
        return redirect()->route('front.index');
    }
}

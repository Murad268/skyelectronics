<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function index() {
        return view('admin.adminlogin.index');
    }

    public function login(Request $req) {

        $checkemail = User::where('email', $req->email)->where('password', md5($req->password))->get();

        if($checkemail[0]->admin != 1) {
            return redirect()->route('admin.loginshow')->with('adminentererror', 'belə admin hesabı mövcud deyil');
        }
        if($checkemail->count() > 0) {
            session()->put('admin_email', $req->email);
            return redirect()->route('admin.index');
        } else {
            return redirect()->route('admin.loginshow')->with('adminentererror', 'email və ya şifrə yanlışdır');
        }
    }


    public function exit() {
        session()->forget('admin_email');
        return redirect()->route('admin.loginshow');
    }
}

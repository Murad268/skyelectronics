<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index() {
        return view('auth.register');
    }
    public function create(Request $req) {
        $email = User::where('email', $req->email)->get();


        $all = $req->all();
        if($email->count() > 0) {
            return redirect()->route('auth.register')->with('errorremail', 'bu email ilə artıq istifadəçi mövcuddur');
        }
        if($req->password_confirmed !== $req->password) {
            return redirect()->route('auth.register')->with('errorpassword', 'şifrələr üst-üstə düşmürlər');
        }

        if($req->ok != "on") {
            return redirect()->route('auth.register')->with('errorok', 'qeydiyyatdan keçmək üçün siz mütləq istifadəçi qaydaları ilə razı olmalısınız');
        }
        $uptaded = User::create($all);
            if($uptaded) {
                return redirect()->route('auth.enter')->with('entersuccess', 'qeydiyyat uğurla tamamlandı');
            }
        }
    }



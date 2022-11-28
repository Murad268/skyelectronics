<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Comments;
use App\Models\User;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function addcomment(Request $req) {
        $user = User::where('email', session('user_email'))->get();
        $store = Comments::create([
            "user_id" => $user[0]->id,
            "good_id" => $req->good_id,
            "comment" => $req->comment
        ]);
        
        if($store) {
            return redirect()->back()->with('addcommsuccess', "şərh uğurla əlavə edildi");
        } else {
            return redirect()->back()->with('addcommerror', "şərh əlavə edilməsi zamanı xəta");
        }
    }
}

<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index() {
        if(session('user_email')) {
            $siteInfo = Settings::find(1);
            $user = User::where('email', session('user_email'))->get();

            $cart = Cart::where('user_id', $user[0]->id)->get();
            return view('front.profile.index', compact('siteInfo', 'cart', 'user'));
        } else {
            return redirect()->route('auth.enter');
        }
    }

    public function updatemain(Request $req) {
        $user = User::where('email', session('user_email'));
        $usercheck = User::where('email', $req->email);
        if($usercheck->count() > 0) {
            return redirect()->back()->with('error', 'belə bir email artıq mövcuddur');
        }
        if($req->email != null) {
            $updated = $user->update([
                "name" => $req->name,
                "email" => $req->email,
                "phone" => $req->phone,
                "mobile" => $req->mobile,
                "address" => $req->address
            ]);
            if($updated) {
                return redirect()->route('auth.exit');
            }
        }

        $updated = $user->update([
            "name" => $req->name,
            "phone" => $req->phone,
            "mobile" => $req->mobile,
            "address" => $req->address
        ]);
        if($updated) {
            return redirect()->back()->with('success', 'məlumatlar uğurla yeniləndilər');
        }
    }

    public function updatelink(Request $req) {
        $user = User::where('email', session('user_email'));
        $usercheck = User::where('email', $req->email);
        if($usercheck->count() > 0) {
            return redirect()->back()->with('error', 'belə bir email artıq mövcuddur');
        }
        if($req->email != null) {
            $updated = $user->update([

                "twitter" => $req->twitter,
                "facebook" => $req->facebook,
                "instagram" => $req->instagram,
                'site' => $req->site
            ]);
            if($updated) {
                return redirect()->route('auth.exit');
            }
        }

        $updated = $user->update([

            "twitter" => $req->twitter,
            "facebook" => $req->facebook,
            "instagram" => $req->instagram,
            'site' => $req->site
        ]);
        if($updated) {
            return redirect()->back()->with('successlink', 'məlumatlar uğurla yeniləndilər');
        } else {
            return redirect()->back()->with('errorlink', 'məlumatlar uğurla yeniləndilər');
        }
    }
}

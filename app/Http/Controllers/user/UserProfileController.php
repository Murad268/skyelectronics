<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\phones;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UserProfileController extends Controller
{
    public function index() {
        if(session('user_email')) {
            $siteInfo = Settings::find(1);
            $user = User::where('email', session('user_email'))->get();

            $cart = Cart::where('user_id', $user[0]->id)->get();
            $phones = phones::all();
            return view('front.profile.index', compact('siteInfo', 'cart', 'user', 'phones'));
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
        } else {
            $updated = $user->update([
                "name" => $req->name,
                "phone" => $req->phone,
                "mobile" => $req->mobile,
                "address" => $req->address
            ]);
            if($updated) {
                return redirect()->back()->with('success', 'məlumatlar uğurla yeniləndilər');
            }  else {
                return redirect()->back()->with('error', 'Məlumatların yenilənməsi zamanı xəta');
            }
        }


    }
    public function updateavatar(Request $req) {
        if($req->hasFile('user_avatar')) {
            $user = User::where('email', session('user_email'));
            $name = explode(' ', User::where('email', session('user_email'))->get()[0]->name)[0].'-'.explode(' ', User::where('email', session('user_email'))->get()[0]->name)[1];
            $image = $req->file('user_avatar');
            $rand = rand();

            $path = public_path('/admin/assets/images/users/'.$name."/");
            $image__path = public_path('/admin/assets/images/users/'.$name."/".User::where('email', session('user_email'))->get()[0]->user_avatar);
            File::delete($image__path);
            $image->move($path, $rand.$image->getClientOriginalName());
            $updated = $user->update([
                "user_avatar" =>  $rand.$image->getClientOriginalName(),
            ]);
            if($updated) {
                return redirect()->back()->with('successavatar', 'Avatar uğurla yeniləndi');
            } else {
                return redirect()->back()->with('erroravatar', 'Avatarın yenilənməsi zamanı xəta');
            }
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

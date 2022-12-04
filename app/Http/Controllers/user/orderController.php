<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Favorites;
use App\Models\phones;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Http\Request;

class orderController extends Controller
{
    public function index(Request $req) {
        if(session('user_email')) {

            $siteInfo = Settings::find(1);
            $user = User::where('email', session('user_email'))->get();
            $cart = Cart::where('user_id', $user[0]->id)->get();
            $phones = phones::all();
            if($req != null) {
                $monthprice = $req->monthprice;
                $monthdur = $req->monthdur;
                return view('front.order.index', compact('siteInfo', 'cart', 'phones', 'monthprice', 'monthdur'));
            }
                return view('front.order.index', compact('siteInfo', 'cart', 'phones'));


        } else {
            return redirect()->route('auth.enter');
        }
    }
}

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
    public function index() {
        if(session('user_email')) {
            $siteInfo = Settings::find(1);
            $user = User::where('email', session('user_email'))->get();
            $cart = Cart::where('user_id', $user[0]->id)->get();
            $phones = phones::all();
            
            return view('front.order.index', compact('siteInfo', 'cart', 'phones'));
        } else {
            return redirect()->route('auth.enter');
        }
    }
}

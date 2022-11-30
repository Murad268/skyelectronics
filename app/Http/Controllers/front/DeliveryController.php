<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Faq;
use App\Models\phones;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function index() {
        if(session('user_email')) {
            $user = User::where('email', session('user_email'))->get();
            $siteInfo = Settings::find(1);
            $cart = Cart::where('user_id', $user[0]->id)->get();
            $faq = Faq::all();
            $phones = phones::all();
            return view('front.delivery.index', compact('siteInfo', 'cart', 'faq', 'phones'));

        } else {
            return redirect()->route('auth.enter');
        }
    }
}

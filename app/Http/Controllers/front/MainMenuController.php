<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\categories;
use App\Models\Goods;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Http\Request;

class MainMenuController extends Controller
{
    public function index() {
        $user = User::where('email', session('user_email'))->get();
        $siteInfo = Settings::find(1);
        $newgoods = Goods::orderBy('id', 'desc')->take(4)->get();
        $populargoods = Goods::orderBy('views', 'desc')->take(4)->get();
        $categories = categories::all();
        $cart = Cart::where('user_id', $user[0]->id)->get();
        return view('front.index', compact('siteInfo', 'newgoods', 'populargoods', 'categories', 'cart'));
    }
}

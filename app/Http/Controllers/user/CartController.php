<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Goods;
use App\Models\phones;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addcart($id) {
        if(session('user_email')) {
            $all = Goods::find($id);
            $user_id = User::where('email', session('user_email'))->get();
            $goods = Cart::where('good_id', $all->id)->where('user_id', $user_id[0]->id)->get();
            if($goods->count() > 0) {
                $quantity = $goods[0]->quantity;
                $updated = $goods[0]->update([
                    'quantity' => $quantity+1
                ]);
                if($updated) {
                    return redirect()->back();
                }
            } else {
                $created = Cart::create([
                    "name" => $all->goods_name,
                    'color_id' => $all->colors[0]->id,
                    'quantity' => 1,
                    'price' => $all->goods_price,
                    'total' => $all->goods_price,
                    'user_id' => $user_id[0]->id,
                    'good_id' => $all->id,
                    'cashdiscount' => $all->cashdicount,
                    'percent' => $all->percent
                ]);
                if($created) {
                    return redirect()->back();
                }
            }
        } else {
            return redirect()->route('auth.enter');
        }


    }

    public function delete($id) {
        $deleted = Cart::destroy($id);
        if($deleted) {
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    public function index() {
        $siteInfo = Settings::find(1);
        $user = User::where('email', session('user_email'))->get();
        $cart = Cart::where('user_id', $user[0]->id)->get();
        $phones = phones::all();
        return view('front.cart.index', compact('siteInfo', 'cart', 'phones'));
    }

    public function addcount($id) {
        $cart = Cart::find($id);
        $goods = Goods::find($cart->good_id);
        $goods__count = $goods->goods__count;

        if($cart->quantity >= $goods__count) {
            return redirect()->back();

        } else {
            $increment = $cart->quantity + 1;

        }

        $updated = $cart->update([
            "quantity" => $increment
        ]);
        if($updated) {
            return redirect()->back();
        }
    }
    public function mincount($id) {
        $cart = Cart::find($id);
        if($cart->quantity > 0) {
            $increment = $cart->quantity - 1;
        } else {
            $increment = 0;
        }

        $updated = $cart->update([
            "quantity" => $increment
        ]);
        if($updated) {
            return redirect()->back();
        }
    }
}

<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Favorites;
use App\Models\Goods;
use App\Models\phones;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    public function index() {
        if(session('user_email')) {
            $siteInfo = Settings::find(1);
            $user = User::where('email', session('user_email'))->get();
            $fav = Favorites::where('user_id', $user[0]->id)->get();
            $cart = Cart::where('user_id', $user[0]->id)->get();
            $phones = phones::all();
            return view('front.favorites.index', compact('siteInfo', "fav", 'cart', 'phones'));
        } else {
            return redirect()->route('auth.enter');
        }

    }
    public function addfav($id) {
        if(session('user_email')) {
            $user = User::where('email', session('user_email'))->get();

            $goods = Goods::find($id);
            $create = Favorites::create([
                'goods_name' =>  $goods->goods_name,
                'goods_price' =>  $goods->goods_price,
                'tags' =>  $goods->tags,
                'views' =>  $goods->views,
                'goods__firm' =>  $goods->goods__firm,
                'goods__category' =>  $goods->goods__category,
                'goods__count' =>  $goods->goods__count,
                'cashdicount' =>  $goods->cashdicount,
                'user_id' => $user[0]->id,
                'good_id' => $id,
                'slug' => $goods->slug,
                'color_id' => $goods->color_id
            ]);
            if($create) {
                return redirect()->back();
            }
        } else {
            return redirect()->route('auth.enter');
        }
    }

    public function delfav($id) {
        if(session('user_email')) {
                $delgood = Favorites::where('good_id', $id)->get();

                $delete = Favorites::destroy($delgood[0]->id);

                if($delete) {
                    return redirect()->back();
                }
        } else {
            return redirect()->route('auth.enter');
        }
    }
}

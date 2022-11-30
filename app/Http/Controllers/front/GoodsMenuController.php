<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\categories;
use App\Models\Colors;
use App\Models\ColorsModel;
use App\Models\Comments;
use App\Models\Favorites;
use App\Models\Goods;
use App\Models\phones;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Http\Request;

class GoodsMenuController extends Controller
{
    public function index($slug, $color) {
        if(session('user_email')) {
            $user = User::where('email', session('user_email'))->get();
            $siteInfo = Settings::find(1);
            $its = Goods::where('slug', $slug)->where('color_id', $color)->get();
            $increment = $its[0]->views + 1;
            $its[0]->update(['views' => $increment]);
            $smiliar = Goods::where('goods__category', $its[0]->goods__category)->take(3)->get();
            $cat = categories::find($its[0]->goods__category);
            $colorsId = ColorsModel::where('good_slug', $its[0]->slug)->get();
            $colors = Colors::all();
            $categories = categories::all();
            $user_id = User::where('email', session('user_email'))->get();
            $cart = Cart::where('user_id', $user_id[0]->id)->get();
            $comments = Comments::all();
            $env = Favorites::where('user_id', $user[0]->id)->where('good_id', $its[0]->id)->get();
            $phones = phones::all();
            if($env->count() > 0) {
                $bool = true;
            } else {
                $bool = false;
            }
            return view('front.goodsown.index', compact('siteInfo', 'its', 'smiliar', 'cat', 'colorsId', 'colors', 'categories', 'cart', 'comments', 'bool', 'phones'));
        } else {
            return redirect()->route('auth.enter');
        }

    }
}

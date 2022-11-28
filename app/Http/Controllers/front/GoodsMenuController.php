<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\categories;
use App\Models\Colors;
use App\Models\ColorsModel;
use App\Models\Comments;
use App\Models\Goods;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Http\Request;

class GoodsMenuController extends Controller
{
    public function index($slug, $color) {
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
        return view('front.goodsown.index', compact('siteInfo', 'its', 'smiliar', 'cat', 'colorsId', 'colors', 'categories', 'cart', 'comments'));
    }
}

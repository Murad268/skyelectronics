<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\categories;
use App\Models\Goods;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index(Request $req, $slug=null) {

        if(session('user_email')) {
            $user = User::where('email', session('user_email'))->get();
            $siteInfo = Settings::find(1);
            $cart = Cart::where('user_id', $user[0]->id)->get();
            $categories = categories::all();
            if(isset($req->good_name)) {
                $q = $req->good_name;
                $goodsAll = Goods::where('goods_name', 'like', '%'.$q.'%')->paginate(9);

            } else if($slug != null){
                if($slug == 'news') {
                    $goodsAll = Goods::orderBy('id', 'desc')->paginate(9);
                } elseif($slug == "popular") {
                    $goodsAll = Goods::orderBy('views', 'desc')->paginate(9);
                } else {
                    $catid = categories::where('slug', $slug)->get();
                    $goodsAll = Goods::where('goods__category', $catid[0]->id)->paginate(9);

                }
            }




                return view('front.store.index', compact('siteInfo', 'cart', 'categories', 'goodsAll'));





        } else {
            return redirect()->route('auth.enter');
        }
    }
}

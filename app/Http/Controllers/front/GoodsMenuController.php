<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\Settings;
use Illuminate\Http\Request;

class GoodsMenuController extends Controller
{
    public function index($slug) {
        $siteInfo = Settings::find(1);
        $its = Goods::where('slug', $slug)->get();
        $smiliar = Goods::where('goods__category', $its[0]->goods__category)->take(3)->get();

        return view('front.goodsown.index', compact('siteInfo', 'its', 'smiliar'));
    }
}

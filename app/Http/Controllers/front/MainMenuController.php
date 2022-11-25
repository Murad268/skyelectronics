<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\Settings;
use Illuminate\Http\Request;

class MainMenuController extends Controller
{
    public function index() {
        $siteInfo = Settings::find(1);
        $newgoods = Goods::orderBy('id', 'desc')->take(4)->get();
        $populargoods = Goods::orderBy('views', 'desc')->take(4)->get();
        return view('front.index', compact('siteInfo', 'newgoods', 'populargoods'));
    }
}

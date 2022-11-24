<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;

class MainMenuController extends Controller
{
    public function index() {
        $siteInfo = Settings::find(1);

        return view('front.index', compact('siteInfo'));
    }
}

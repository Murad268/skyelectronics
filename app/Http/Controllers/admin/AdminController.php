<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $siteInfo = Settings::all();
        return view('admin.index', compact('siteInfo'));
    }
}

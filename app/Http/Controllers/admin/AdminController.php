<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
       if(session('admin_email')) {
        $siteInfo = Settings::all();
            return view('admin.index', compact('siteInfo'));
       } else {
            return redirect()->route('admin.loginshow');
       }
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SiteParametersController extends Controller
{
    public function index() {
        $siteInfo = Settings::all();
        return view('admin.siteParameters.index', compact('siteInfo'));
    }

    public function update(Request $req) {
        if($req->hasFile('sitelogosu')) {
            $image = $req->file('sitelogosu');
            $path = public_path('/admin/assets/images/');
            File::delete($path,'logo.'.$image->getClientOriginalExtension());
            $image->move($path,'logo.'.$image->getClientOriginalExtension());
        }



        $settings = Settings::find(3);
        $all = $req->all();
        $update = $settings->update($all);
        if($update) {
            return redirect()->back()->with('success', 'Məlumatlar uğurla yeniləndilər');
        } else {
            return redirect()->back()->with('success', 'Məlumatlar;n yenilənməsi zamanı xəta');
        }
    }
}

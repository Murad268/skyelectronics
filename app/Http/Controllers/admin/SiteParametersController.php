<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SiteParametersController extends Controller
{
    public function index() {
        if(session('admin_email')) {
            $siteInfo = Settings::all();
            return view('admin.siteparameters.index', compact('siteInfo'));
        } else {
            return redirect()->route('admin.loginshow');
       }
    }

    public function update(Request $req) {
        $settings = Settings::find(1);
        if($req->hasFile('sitelogosu')) {
            $image = $req->file('sitelogosu');
            $path = public_path('/admin/assets/images/firms');
            File::delete($path,'logo.'.$image->getClientOriginalExtension());
            $image->move($path,'logo.'.$image->getClientOriginalExtension());
            $settings->siteLogosu = 'logo.'.$image->getClientOriginalExtension();
            $settings->save();
        }




        $all = $req->except('sitelogosu');
        $update = $settings->update($all);
        if($update) {
            return redirect()->back()->with('success', 'Məlumatlar uğurla yeniləndilər');
        } else {
            return redirect()->back()->with('error', 'Məlumatların yenilənməsi zamanı xəta');
        }
    }
}

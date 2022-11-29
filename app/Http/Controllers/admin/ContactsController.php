<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index() {
        if(session('admin_email')) {
        $siteInfo = Settings::all();
        return view('admin.contactsparameters.index', compact('siteInfo'));
        } else {
            return redirect()->route('admin.loginshow');
       }
    }

    public function edit(Request $req) {
        $settings = Settings::find(3);
        $all = $req->all();
        $update = $settings->update($all);
        if($update) {
            return redirect()->back()->with('success', 'Məlumatlar uğurla yeniləndilər');
        } else {
            return redirect()->back()->with('success', 'Məlumatların yenilənməsi zamanı xəta');
        }
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\phones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class PhonesController extends Controller
{
    public function index() {
        $allPhones = phones::all();
        return view('admin.phoneparameters.index', compact('allPhones'));
    }
    public function edit($id=null) {
        $phone = phones::find($id);
        return view('admin.phoneparameters.create', compact('phone'));
    }
    public function update(Request $req, $id) {
        $all = $req->all();
        $phone = phones::find($id);
        $updated = $phone->update($all);
        if($updated) {
            return redirect()->route('admin.phonesparameters')->with('success', 'Məlumatlar uğurla yeniləndilər');
        } else {
            return redirect()->route('admin.phonesparameters')->with('success', 'Məlumatlar;n yenilənməsi zamanı xəta');
        }
    }
}

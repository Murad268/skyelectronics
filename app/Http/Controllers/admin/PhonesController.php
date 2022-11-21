<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\phones;
use App\Models\Settings;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class PhonesController extends Controller
{
    public function index() {
        $siteInfo = Settings::all();
        $allPhones = phones::all();
       
        return view('admin.phoneparameters.index', compact('allPhones', 'siteInfo'));
    }
    public function create(Request $req) {
        $all = $req->all();
        $created = phones::create($all);
        if($created) {
            return redirect()->route('admin.phonesparameters')->with('addsuccess', 'Telefon uğurla əlavə edildi');
        } else {
            return redirect()->route('admin.phonesparameters')->with('adderror', 'Telefonun əlavə edilməsi zamanı xəta');
        }
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
            return redirect()->route('admin.phonesparameters')->with('error', 'Məlumatlar;n yenilənməsi zamanı xəta');
        }
    }
    public function delete(Request $req) {
        $all = $req->all();
        $deleted = phones::destroy($all);
        if($deleted) {
            return redirect()->route('admin.phonesparameters')->with('deletesuccess', 'Telefon uğurla silindi');
        } else {
            return redirect()->route('admin.phonesparameters')->with('deleterror', 'Telefonun silinməsi zamanı xəta');
        }
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Firms;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FirmsController extends Controller
{
    public function index(Request $req) {

        if($req->catsearch != null) {
            $q = $req->catsearch;
            $firms =  Firms::where('firm__name', 'like', '%'.$q.'%')->paginate(2);
        } else {
            $firms = Firms::paginate(2);
        }
        $siteInfo = Settings::all();

        return view('admin.firmparameters.index', compact('siteInfo', 'firms'));
    }

    public function store(Request $req) {

        if($req->hasFile('firm__logo')) {
            $image = $req->file('firm__logo');
            $path = public_path('/admin/assets/images/firms');
            $image->move($path, $image->getClientOriginalName());
        }

        $created = Firms::create([
            "firm__logo" => $image->getClientOriginalName(),
            "firm__name" => $req->firm__name
        ]);

        if($created) {
            return redirect()->route('admin.firms.index')->with('success', 'Firma uğurla əlavə edildi');
        } else {
            return redirect()->route('admin.firms.index')->with('error', 'Firmanın əlavə edilməsi zamanı xəta');
        }
    }
    public function delete($id) {
        $destroyed = Firms::destroy($id);
        if($destroyed) {
            return redirect()->route('admin.firms.index')->with('success', 'Firma uğurla silindi');
        } else {
            return redirect()->route('admin.firms.index')->with('error', 'Firmanın silinməsi zamanı xəta');
        }
    }

    public function edit($id) {
        $siteInfo = Settings::all();
        $firm = Firms::find($id);
        return view('admin.firmparameters.edit', compact('siteInfo', 'firm'));
    }
    public function update(Request $req, $id) {
        $firms = Firms::find($id);
        if($req->hasFile('firm__logo')) {

            $image = $req->file('firm__logo');
            $path =  public_path('/admin/assets/images/firms');
            $image__path = public_path('/admin/assets/images/firms/'.$firms->firm__logo);

            $f=File::delete($image__path);

            $image->move($path, $image->getClientOriginalName());
            $firms->firm__logo = $image->getClientOriginalName();


        }

        $firms->firm__name = $req->firm__name;
        $update = $firms->save();


        if($update) {
            return redirect()->route('admin.firms.index')->with('success', 'Məlumatlar uğurla yeniləndilər');
        } else {
            return redirect()->route('admin.firms.index')->with('error', 'Məlumatların yenilənməsi zamanı xəta');
        }
    }
}

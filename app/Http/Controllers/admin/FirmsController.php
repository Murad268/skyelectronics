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
        if(session('admin_email')) {
            if($req->catsearch != null) {
                $q = $req->catsearch;
                $firms =  Firms::where('firm__name', 'like', '%'.$q.'%')->paginate(10);
            } else {
                $firms = Firms::paginate(10);
            }
            $siteInfo = Settings::all();

            return view('admin.firmparameters.index', compact('siteInfo', 'firms'));
        } else {
            return redirect()->route('admin.loginshow');
        }

    }

    public function store(Request $req) {
        if(session('admin_email')) {
            $req->validate([
                'firm__logo' => 'required',
                'firm__name' => 'required'
            ]);
            if($req->hasFile('firm__logo')) {
                $image = $req->file('firm__logo');
                $rand = rand();
                $path = public_path('/admin/assets/images/firms');
                $image->move($path, $rand.$image->getClientOriginalName());
            }

            $created = Firms::create([
                "firm__logo" => $rand.$image->getClientOriginalName(),
                "firm__name" => $req->firm__name
            ]);

            if($created) {
                return redirect()->route('admin.firms.index')->with('success', 'Firma uğurla əlavə edildi');
            } else {
                return redirect()->route('admin.firms.index')->with('error', 'Firmanın əlavə edilməsi zamanı xəta');
            }
        } else {
            return redirect()->route('admin.loginshow');
        }
    }
    public function delete($id) {
        if(session('admin_email')) {
            $item = Firms::find($id);
            $image__path = public_path('/admin/assets/images/firms/'.$item->firm__logo);
            File::delete($image__path);
            $destroyed = Firms::destroy($id);
            if($destroyed) {
                return redirect()->route('admin.firms.index')->with('success', 'Firma uğurla silindi');
            } else {
                return redirect()->route('admin.firms.index')->with('error', 'Firmanın silinməsi zamanı xəta');
            }
        } else {
            return redirect()->route('admin.loginshow');
        }
    }

    public function edit($id) {
        if(session('admin_email')) {
            $siteInfo = Settings::all();
            $firm = Firms::find($id);
            return view('admin.firmparameters.edit', compact('siteInfo', 'firm'));
        } else {
            return redirect()->route('admin.loginshow');
        }
    }
    public function update(Request $req, $id) {

        if(session('admin_email')) {
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
        } else {
            return redirect()->route('admin.loginshow');
        }
    }

}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Colors;
use App\Models\Settings;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index() {
        if(session('admin_email')) {

        $siteInfo = Settings::all();
        $colors = Colors::all();
        return view('admin.colorsparameters.index', compact('siteInfo', 'colors'));
        } else {
            return redirect()->route('admin.loginshow');
       }
    }

    public function delete($id) {
        if(session('admin_email')) {
            $deleted = Colors::destroy($id);
            if($deleted) {
                return redirect()->route('admin.colors.index')->with('success', 'Rəng uğurla silindi');
            } else {
                return redirect()->route('admin.colors.index')->with('error', 'Rəngin silinməsi zamanı xəta');
            }
        } else {
            return redirect()->route('admin.loginshow');
        }
    }

    public function store(Request $req) {
        if(session('admin_email')) {
            $req->validate([
                'color_name' => 'required',
                'color' => 'required',
            ]);
            $all = $req->all();
            $created = Colors::create($all);
            if($created) {
                if($created) {
                    return redirect()->route('admin.colors.index')->with('success', 'Rəng uğurla əlavə edildi');
                } else {
                    return redirect()->route('admin.colors.index')->with('error', 'Rəngin əlavə ediıməsi zamanı xəta');
                }
            }
        } else {
                return redirect()->route('admin.loginshow');
        }
    }
}

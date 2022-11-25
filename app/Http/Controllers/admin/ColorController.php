<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Colors;
use App\Models\Settings;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index() {
        $siteInfo = Settings::all();
        $colors = Colors::all();
        return view('admin.colorsparameters.index', compact('siteInfo', 'colors'));
    }

    public function delete($id) {
        $deleted = Colors::destroy($id);
        if($deleted) {
            return redirect()->route('admin.colors.index')->with('success', 'Rəng uğurla silindi');
        } else {
            return redirect()->route('admin.colors.index')->with('error', 'Rəngin silinməsi zamanı xəta');
        }
    }

    public function store(Request $req) {
        $all = $req->all();
        $created = Colors::create($all);
        if($created) {
            if($created) {
                return redirect()->route('admin.colors.index')->with('success', 'Rəng uğurla əlavə edildi');
            } else {
                return redirect()->route('admin.colors.index')->with('error', 'Rəngin əlavə ediıməsi zamanı xəta');
            }
        }
    }
}

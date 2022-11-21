<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\categories;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index() {
        $siteInfo = Settings::all();
        $categories = categories::all();


        return view('admin.categoryparameters.index', compact('siteInfo', 'categories'));
    }
    public function create(Request $req) {
        $categories = new categories();
        $categories->cat__name = $req->cat__name;
        $categories->upid = $req->upid;
        $categories->save();

        if(true) {
            return redirect()->route('admin.categories.index')->with('addsuccess', 'Kateqoriya uğurla əlavə edildi');
        } else {
            return redirect()->route('admin.categories.index')->with('adderror', 'Kateqoriyanın əlavə edilməsi zamanı xəta');
        }
    }
    public function delete($id) {
        $delel = categories::find($id);
        $delup = $delel->upid;
        $deleted = categories::destroy($id);
        if($deleted) {
            categories::destroy($delup);
            return redirect()->route('admin.categories.index')->with('deletesuccess', 'Sual uğurla silindi');
        } else {
            return redirect()->route('admin.categories.index')->with('deleterror', 'Sual silinməsi zamanı xəta');
        }
    }
    public function edit($id) {
        $el = categories::find($id);
        $siteInfo = Settings::all();
        $categories = categories::all();
        return view('admin.categoryparameters.edit', compact('el', 'siteInfo', 'categories'));
    }

    public function update(Request $req, $id) {
        $all = $req->all();
        $category = categories::find($id);

        if($all['upid'] != $category->upid) {
            categories::destroy($all['upid']);
        }
        $uptaded = $category->update($all);
        if($uptaded) {
            return redirect()->route('admin.categories.index')->with('deletesuccess', 'Sual uğurla silindi');
        } else {
            return redirect()->route('admin.categories.index')->with('deleterror', 'Sual silinməsi zamanı xəta');
        }
    }
}

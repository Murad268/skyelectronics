<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\categories;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(Request $req) {
        if(session("admin_email")) {
        if($req->catsearch != null) {
            $q = $req->catsearch;
            $categories =  DB::table('categories')->where('cat__name','LIKE','%'.$q.'%')
            ->get();
        } else {
            $categories = categories::all();
        }

        $siteInfo = Settings::all();
        $catlist = categories::all();

        return view('admin.categoryparameters.index', compact('siteInfo', 'categories', 'catlist'));
     } else {
        return redirect()->route('admin.loginshow');
      }
    }
    public function create(Request $req) {
      if(session("admin_email")) {
        $req->validate([
            'cat__name' => 'required',
            'upid' => 'required'
        ]);


        $categories = new categories();
        $categories->cat__name = $req->cat__name;
        $categories->upid = $req->upid;
        $categories->save();

        if(true) {
            return redirect()->route('admin.categories.index')->with('addsuccess', 'Kateqoriya uğurla əlavə edildi');
        } else {
            return redirect()->route('admin.categories.index')->with('adderror', 'Kateqoriyanın əlavə edilməsi zamanı xəta');
        }
    } else {
        return redirect()->route('admin.loginshow');
      }
    }
    public function delete($id) {
        if(session("admin_email")) {
        $delel = categories::find($id);
        $delup = $delel->upid;
        $deleted = categories::destroy($id);
        if($deleted) {
            categories::destroy($delup);
            return redirect()->route('admin.categories.index')->with('deletesuccess', 'Sual uğurla silindi');
        } else {
            return redirect()->route('admin.categories.index')->with('deleterror', 'Sual silinməsi zamanı xəta');
        }
    } else {
        return redirect()->route('admin.loginshow');
      }
    }
    public function edit($id) {
        if(session("admin_email")) {
            $el = categories::find((int)$id);
            $siteInfo = Settings::all();
            $categories = categories::all();
            return view('admin.categoryparameters.edit', compact('el', 'siteInfo', 'categories'));
        } else {
            return redirect()->route('admin.loginshow');
            }
    }

    public function update(Request $req, $id) {
        if(session("admin_email")) {
            $req->validate([
                'cat__name' => 'required',
                'upid' => 'required'
            ]);
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
        } else {
            return redirect()->route('admin.loginshow');
            }
    }
}

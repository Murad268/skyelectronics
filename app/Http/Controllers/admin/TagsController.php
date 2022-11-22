<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use App\Models\Tags;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function index(Request $req) {
        if(isset($req->catsearch)) {
            $q = $req->catsearch;
            $tags =  Tags::where('tag__name', 'like', '%'.$q.'%')->paginate(2);
        } else {
            $tags = Tags::paginate(2);
        }
        $siteInfo = Settings::all();

        return view('admin.tagsparameters.index', compact('siteInfo', 'tags'));
    }

    public function store(Request $req) {
        $all = $req->all();
        $created = Tags::create($all);

        if($created) {
            return redirect()->route('admin.tags.index')->with('success', 'Tag uğurla əlavə edildi');
        } else {
            return redirect()->route('admin.tags.index')->with('error', 'Tagın əlavə edilməsi zamanı xəta');
        }
    }
    public function delete($id) {
        $deleted = Tags::destroy($id);
        if($deleted) {
            return redirect()->route('admin.tags.index')->with('success', 'Tag uğurla silindi');
        } else {
            return redirect()->route('admin.tags.index')->with('error', 'Tagın silinməsi zamanı xəta');
        }
    }
}

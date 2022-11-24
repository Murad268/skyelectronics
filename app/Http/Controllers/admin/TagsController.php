<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\Settings;
use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TagsController extends Controller
{
    public function index(Request $req) {
        if(isset($req->catsearch)) {
            $q = $req->catsearch;
            $tags =  Tags::where('tag__name', 'like', '%'.$q.'%')->paginate(10);

        } else {
            $tags = Tags::paginate(10);
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
        $id = intval($id);
        $updategoods =  Goods::where('tags', 'like', '%'.$id.'%')->get();

        if(  $updategoods) {
            foreach($updategoods as $goods) {

                $goods->update(['tags' => str_replace($id, '',$goods->tags)]);
            }
        }

        $deleted = Tags::destroy($id);


        if($deleted) {
            return redirect()->route('admin.tags.index')->with('success', 'Tag uğurla silindi');
        } else {
            return redirect()->route('admin.tags.index')->with('error', 'Tagın silinməsi zamanı xəta');
        }
    }
}

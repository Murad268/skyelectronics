<?php


namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\categories;
use App\Models\Firms;
use App\Models\Goods;
use App\Models\Photo;
use App\Models\Settings;
use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GoodController extends Controller
{
    public function index(Request $req) {

        if(isset($req->catsearch)) {
            $q = $req->catsearch;
            $goods =  Goods::where('goods_name', 'like', '%'.$q.'%')->paginate(10);
        } else {
            $goods = Goods::paginate(10);
        }
        $siteInfo = Settings::all();
        $tags = Tags::all();
        $categories = categories::all();
        $firms = Firms::all();

        return view('admin.goodsparameters.index', compact('siteInfo', 'goods', 'categories', 'firms', 'tags'));
    }

    public function store(Request $req) {
        $all = $req->all();
        if(isset($all['tags'])) {
            $all['tags'] = implode(' ', $req->tags);
        }

        $created = Goods::create($all);
        if($created) {
            return redirect()->route('admin.goods.index')->with('addsuccess', 'Məhsul uğurla əlavə edildi');
        } else {
            return redirect()->route('admin.goods.index')->with('adderror', 'Məhsulun əlavə edilməsi zamanı xəta');
        }
    }

    public function edit($id) {
        $siteInfo = Settings::all();
        $el = Goods::find($id);
        $categories = categories::all();
        $firms = Firms::all();
        $tags = Tags::all();
        return view('admin.goodsparameters.edit', compact('el', 'categories', 'firms', 'siteInfo', 'tags'));
    }

    public function update(Request $req, $id) {
        $all = $req->all();
        if(isset($all['tags'])) {
            $all['tags'] = implode(' ', $req->tags);
        }

        $goods = Goods::find($id);
        $updated = $goods->update($all);
        if($updated) {
            return redirect()->route('admin.goods.index')->with('success', 'Məlumatlar uğurla yeniləndilər');
        } else {
            return redirect()->route('admin.goods.index')->with('error', 'Məlumatların yenilənməsi zamanı xəta');
        }
    }

    public function delete($id) {
        $photos = Photo::where('good_id', $id)->get();
        foreach($photos as $photo) {
            $item = Photo::find($photo->id);
            $image__path = public_path('/admin/assets/images/goods/'.$item->good_img);
            File::delete($image__path);
            Photo::destroy($photo->id);
        }


        $deleted = Goods::destroy($id);


        if($deleted) {
            return redirect()->route('admin.goods.index')->with('success', 'Məhsul uğurla silindi');
        } else {
            return redirect()->route('admin.goods.index')->with('error', 'Məshulun silinməsi zamanı xəta');
        }
    }
}

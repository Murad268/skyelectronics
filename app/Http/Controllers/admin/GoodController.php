<?php


namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\categories;
use App\Models\Colors;
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
        if(session('admin_email')) {
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
            $colors = Colors::all();

            return view('admin.goodsparameters.index', compact('siteInfo', 'goods', 'categories', 'firms', 'tags', 'colors'));
        } else {
            return redirect()->route('admin.loginshow');
        }

    }

    public function store(Request $req) {

    if(session('admin_email')) {

        $req->validate([
            'goods_name' => 'required',
            'goods__count' => 'required|integer',
            'goods_price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'goods__category' => 'required',
            'goods__firm' => 'required',
            'percent' => 'required|integer',
            'color_id' => 'required',
            'cashdicount' => 'required',
            'goods__firm' => 'required'
        ]);
        $all = $req->all();
        if(isset($all['tags'])) {
            $all['tags'] = implode(' ', $req->tags);
        } else {
            $all['tags'] = '';
        }

        $created = Goods::create([
            'goods_name' => $req->goods_name,
            'goods__count' => $req->goods__count,
            'goods_price' => $req->goods_price,
            'goods__category' => $req->goods__category,
            'goods__firm' => $req->goods__firm,
            'percent' => $req->percent,
            'color_id' => $req->color_id,
            'cashdicount' => $req->cashdicount,
            'tags' => $all['tags']
        ]);
        if($created) {
            return redirect()->route('admin.goods.index')->with('addsuccess', 'Məhsul uğurla əlavə edildi');
        } else {
            return redirect()->route('admin.goods.index')->with('adderror', 'Məhsulun əlavə edilməsi zamanı xəta');
        }
    } else {
            return redirect()->route('admin.loginshow');
        }
    }

    public function edit($id) {
    if(session('admin_email')) {
        $siteInfo = Settings::all();
        $el = Goods::find($id);
        $categories = categories::all();
        $firms = Firms::all();
        $tags = Tags::all();
        $colors = Colors::all();
        return view('admin.goodsparameters.edit', compact('el', 'categories', 'firms', 'siteInfo', 'tags', 'colors'));
    } else {
        return redirect()->route('admin.loginshow');
    }
    }

    public function update(Request $req, $id) {

    if(session('admin_email')) {

        $req->validate([
            'goods_name' => 'required',
            'goods__count' => 'required|integer',
            'goods_price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'goods__firm' => 'required',
            'percent' => 'required|integer',
            'cashdicount' => 'required',
        ]);
        $all = $req->all();
        if(isset($all['tags'])) {
            $all['tags'] = implode(' ', $req->tags);
        } else {
            $all['tags'] = '';
        }

        $goods = Goods::find($id);
        $updated = $goods->update([
            'goods_name' => $req->goods_name,
            'goods__count' => $req->goods__count,
            'goods_price' => $req->goods_price,
            'goods__category' => $req->goods__category,
            'goods__firm' => $req->goods__firm,
            'percent' => $req->percent,
            'color_id' => $req->color_id,
            'cashdicount' => $req->cashdicount,
            'tags' => $all['tags']
        ]);

        if($updated) {
            return redirect()->route('admin.goods.index')->with('success', 'Məlumatlar uğurla yeniləndilər');
        } else {
            return redirect()->route('admin.goods.index')->with('error', 'Məlumatların yenilənməsi zamanı xəta');
        }
    } else {
            return redirect()->route('admin.loginshow');
        }
    }

    public function delete($id) {
    if(session('admin_email')) {
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
    } else {
        return redirect()->route('admin.loginshow');
    }
    }
}

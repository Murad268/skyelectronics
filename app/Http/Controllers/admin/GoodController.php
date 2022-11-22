<?php


namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\categories;
use App\Models\Firms;
use App\Models\Goods;
use App\Models\Settings;
use Illuminate\Http\Request;

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

        $categories = categories::all();
        $firms = Firms::all();
        return view('admin.goodsparameters.index', compact('siteInfo', 'goods', 'categories', 'firms'));
    }

    public function store(Request $req) {
        $all = $req->all();
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
        return view('admin.goodsparameters.edit', compact('el', 'categories', 'firms', 'siteInfo'));
    }

    public function update(Request $req, $id) {
        $all = $req->all();
        $goods = Goods::find($id);
        $updated = $goods->update($all);
        if($updated) {
            return redirect()->route('admin.goods.index')->with('success', 'Məlumatlar uğurla yeniləndilər');
        } else {
            return redirect()->route('admin.goods.index')->with('error', 'Məlumatların yenilənməsi zamanı xəta');
        }
    }
}

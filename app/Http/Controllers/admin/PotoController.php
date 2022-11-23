<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\Photo;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PotoController extends Controller
{
    public function index() {
        $siteInfo = Settings::all();
        $goods = Goods::all();
        $photos = Photo::all();
        return view('admin.photoparameters.index', compact('siteInfo', 'goods', 'photos'));
    }

    public function create(Request $req) {

        if($req->hasFile('good_img')) {
            $image = $req->file('good_img');
            $path = public_path('/admin/assets/images/goods');
            $image->move($path, $image->getClientOriginalName());
        }

        $created = Photo::create([
            "good_img" => $image->getClientOriginalName(),
            "good_id" => $req->good_id
        ]);

        if($created) {
            return redirect()->route('admin.photos.index')->with('success', 'Şəkil uğurla əlavə edildi');
        } else {
            return redirect()->route('admin.photos.index')->with('error', 'Şəklin əlavə edilməsi zamanı xəta');
        }
    }

    public function delete($id) {
        $item = Photo::find($id);
        $image__path = public_path('/admin/assets/images/goods/'.$item->good_img);
        File::delete($image__path);
        $destroyed = Photo::destroy($id);
        if($destroyed) {
            return redirect()->route('admin.photos.index')->with('success', 'Şəkil uğurla silindi');
        } else {
            return redirect()->route('admin.photos.index')->with('error', 'Şəklin silinməsi zamanı xəta');
        }
    }

    public function update($id) {
        $photo = Photo::find($id);
        $goodsid = $photo->good_id;
        $photosuptade = Photo::where('good_id', $goodsid);
        $photosuptade->update([
            'main' => 0
        ]);
        $uptaded = $photo->update([
            'main' => 1
        ]);
        if($uptaded) {
            return redirect()->route('admin.photos.index')->with('success', 'Şəkil aid olduğu məhsul üçün əsas şəklə çevrildi');
        } else {
            return redirect()->route('admin.photos.index')->with('error', 'Hər hansısa bir xəta baş verdi');
        }
    }
}

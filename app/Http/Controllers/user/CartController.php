<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Goods;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addcart($id) {
        $all = Goods::find($id);
        $user_id = User::where('email', session('user_email'))->get();
        $goods = Cart::where('good_id', $all->id)->where('user_id', $user_id[0]->id)->get();
        if($goods->count() > 0) {
            $quantity = $goods[0]->quantity;
            $updated = $goods[0]->update([
                'quantity' => $quantity+1
            ]);
            if($updated) {
                return redirect()->back();
            }
        } else {
            $created = Cart::create([
                "name" => $all->goods_name,
                'color_id' => $all->colors[0]->id,
                'quantity' => 1,
                'price' => $all->goods_price,
                'total' => $all->goods_price,
                'user_id' => $user_id[0]->id,
                'good_id' => $all->id,
                'cashdiscount' => $all->cashdicount,
                'percent' => $all->percent
            ]);
            if($created) {
                return redirect()->back();
            }
        }

    }

    public function delete($id) {
        $deleted = Cart::destroy($id);
        if($deleted) {
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}

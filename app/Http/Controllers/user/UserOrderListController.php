<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\OrderModel;
use App\Models\phones;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Http\Request;

class UserOrderListController extends Controller
{
    public function index() {
        if(session('user_email')) {
            $siteInfo = Settings::find(1);
            $user = User::where('email', session('user_email'))->get();
            $orders = OrderModel::where('user_id', $user[0] -> id)->get();

            $cart = Cart::where('user_id', $user[0]->id)->get();
            $phones = phones::all();
            return view('front.orderlist.index', compact('siteInfo', 'cart', 'user', 'phones', 'orders'));
        } else {
            return redirect()->route('auth.enter');
        }
    }

    public function cancelorder($id) {
        $orders = OrderModel::where('id', $id)->update(['status' => 3]);
        if($orders) {
            return redirect()->back();
        }
    }
    public function deleteorder($id) {
        $deleted = OrderModel::destroy($id);
        if($deleted) {
            return redirect()->back();
        }
    }
}

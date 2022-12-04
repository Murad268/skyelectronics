<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\OrderModel;
use App\Models\phones;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Http\Request;

class AdminOrdersList extends Controller
{
    public function orderslist(Request $req) {
        if(session('admin_email')) {
            if(isset($req->orderssearch)) {
                $q = $req->orderssearch;
                $orders =  OrderModel::where('order_code', 'like', '%'.$q.'%')->paginate(5);
            } else {
                $orders = OrderModel::paginate(5);
            }
            $siteInfo = Settings::all();
            $allPhones = phones::all();



            return view('admin.orderslist.index', compact('allPhones', 'siteInfo', 'orders'));
        }

    }

    public function orderfinish($id) {
        $orders = OrderModel::where('id', $id)->update(['status' => 1]);
        if($orders) {
            return redirect()->back();
        }
    }
}

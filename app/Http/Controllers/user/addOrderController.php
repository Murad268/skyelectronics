<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\OrderModel;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Mail\SentMessage;
use Illuminate\Support\Facades\Mail;

class addOrderController extends Controller
{
    public function add(Request $req) {
        try{

        if(session('user_email')) {
            $user = User::where('email', session('user_email'))->get();
            $cart = Cart::where('user_id', $user[0]->id)->get();
            if($cart->count() < 1) {
                return redirect()->back()->with('errororder', 'səbətiniz boşdur');
            }
            $name = $req->name;
            $surname = $req->surname;
            $fathername = $req->fathername;
            $phone = $req->phone;
            $desc = $req->desc;
            $date = $req->date;
            $city = $req->city;
            $rayon = $req->rayon;
            $street = $req->street;
            $ordermeth = $req->ordermeth;
            $time = $req->time;
            $mail = $req->email;
            $carts = Cart::where('user_id', $user[0]->id);
            $order_code = rand();
            $prices = 0;
            $ids = '';
            foreach($cart as $key => $item) {
                $prices += ($item->price - $item->cashdiscount) * $item->quantity;
                if($key != count($cart) - 1) {
                    $ids .= $item->good_id." ";
                } else {
                    $ids .= $item->good_id;
                }

            }

            $carts->delete();
            OrderModel::create([
                'order_code' => $order_code,
                'tota_price' => $prices,
                'goodsids' => $ids,
                'user_id' => $user[0]->id,
                'delt_date' => strtotime($date),
                'delt_time' => $time

            ]);

        } else {
            return redirect()->route('auth.enter');
        }





        Mail::send('order', [
            'cart' => $cart,
            'name' => $name,
            'surname' => $surname,
            'fathername' => $fathername,
            'phone' => $phone,
            'desc' => $desc,
            'date' => $date,
            'city' => $city,
            'rayon' => $rayon,
            'street' => $street,
            'ordermeth' => $ordermeth,
            'time' => $time,
            'email' => $mail
        ], function($message) {
            $message->to("agamedov94@mail.ru")->subject("skyelectronics yeni sifariş");
        });
        Mail::send('retorder', [
            'cart' => $cart,
            'name' => $name,
            'surname' => $surname,
            'fathername' => $fathername,
            'phone' => $phone,
            'desc' => $desc,
            'date' => $date,
            'city' => $city,
            'rayon' => $rayon,
            'street' => $street,
            'ordermeth' => $ordermeth,
            'time' => $time,
            'order_code' => $order_code
        ], function($message) use ($mail) {
            $message->to($mail)->subject("sifariş çeki");
        });
            return redirect()->back()->with('successorder', 'sifarişiniz uğurla qeydiyyata alınmışdır.');
       } catch (Exception $e) {
            return redirect()->back()->with('errororder', 'sifariş zamanı xəta. Xahiş edirik yenidən cəhd edəsiniz');
    }


    }
}

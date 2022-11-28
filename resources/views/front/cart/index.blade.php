
   @extends('front.layouts.front')
   @section('content')




    <div class="content">
        <div class="container">
            <div class="good__content__top">
                <a href="">ana səhifə</a> >>> <a href="">səbət</a>
            </div>
            <h2 class="mt-3 about__subtitle">Mənim Səbətim(1 item)</h2>
        </div>
            <div class="cart_section">
                <div class="">
                    <div class="row">
                        <div class="col-lg-10 offset-lg-1">
                            <div class="cart_container">
                                @foreach($cart as $item)
                                    <div class="cart_items">
                                        <ul class="cart_list">
                                            <li class="cart_item clearfix">
                                            <i style="float: left; margin-left: -30px; cursor: pointer;" class="text-danger fa fa-trash"></i>
                                                <div class="cart_item_image">
                                                @if($item->photos->first() != null)
                                                    <img style="height: 130px;"height: 50px" src="{{asset('admin/assets/images/goods/'.$item->photos->first()->good_img)}}" alt="">
                                                @else
                                                    <img style="width: 100%; height: 50px" src="{{asset('admin/assets/images/goods/empty.png')}}" alt="">
                                                @endif
                                                </div>
                                                <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                                    <div class="cart_item_name cart_info_col">
                                                        <div class="cart_item_title">Ad</div>
                                                        <div class="cart_item_text">{{$item->name}}</div>
                                                    </div>
                                                    <div class="cart_item_color cart_info_col">
                                                        <div class="cart_item_title">Rəng</div>
                                                        <div class="cart_item_text"><span style="background-color:{{$item->colors->color}};"></span>{{$item->colors->color_name}}</div>
                                                    </div>
                                                    <div class="cart_item_quantity cart_info_col">
                                                        <div class="cart_item_title">Ədəd</div>
                                                        <div class="cart_item_text"><a href="{{route('user.mincount', ['id' => $item->id])}}">-</a>{{$item->quantity}} <a href="{{route('user.addcount', ['id' => $item->id])}}">+</a></div>
                                                    </div>
                                                    <div class="cart_item_price cart_info_col">
                                                        <div class="cart_item_title">Qiymət</div>
                                                        <div class="cart_item_text">{{$item->price}} ⫙</div>
                                                    </div>
                                                    <div class="cart_item_total cart_info_col">
                                                        <div class="cart_item_title">Tam qiymət</div>
                                                        <div class="cart_item_text">{{$item->price * $item->quantity}} ⫙</div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                @endforeach
                                <div class="order_total">
                                    <div class="order_total_content text-md-right">
                                        <div class="order_total_title">Order Total:</div>
                                        <div class="order_total_amount">₹22000</div>
                                    </div>
                                </div>
                                <div class="cart_buttons"> <button type="button" class="button cart_button_clear">Alış-verişə davam elə</button> <button type="button" class="button cart_button_checkout">Sifarişi rəsmiləşdir</button> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>




   @endsection


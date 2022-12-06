
   @extends('front.layouts.front')
   @section('content')
        <div class="content">
            <div class="container">
                <div class="good__content__top">
                    <a href="">ana səhifə</a> >>> <a href="">səbət</a>
                </div>
                <h2 class="mt-3 about__subtitle">Mənim Səbətim({{$cart->count()}} item)</h2>
            </div>
                @if($cart->count() > 0)
                <div class="cart_section">
                    <div class="">
                        <div class="row">
                            <div class="col-lg-10 offset-lg-1">
                                <div class="cart_container">
                                    @foreach($cart as $item)
                                        <div class="cart_items">
                                            <ul class="cart_list">
                                                <li class="cart_item clearfix">
                                                <a href="{{route('user.delete', ['id' => $item->id])}}"><i style="float: left; margin-left: -30px; cursor: pointer;" class="text-danger fa fa-trash"></i></a>
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
                                                            <input type="hidden" value="{{$item->cashdiscount}}" class="cartcashdicount">
                                                            <div class="cart_item_title">Tam qiymət</div>
                                                            <div class="cart_item_text carttotalprices">{{$item->price * $item->quantity}} ⫙</div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    @endforeach

                                    </div>
                                    <div class="cart_buttons">
                                            <a href="{{route('front.index')}}" class="btn btn-white cart_button_clear">Alış-verişə davam elə</a>
                                            <button type="button" class="btn  text-dark" data-bs-toggle="modal" data-bs-toggle="modal" data-bs-target="#cash">Nəğd al</button>
                                            <button type="button" class="btn  text-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">Hissə - hissə al</button>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="container alert alert-warning" role="alert">
                    Səbətiniz hazırda boşdur
                </div>
                @endif
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form method="post" action="{{Route('user.ordered')}}">
                @csrf
            <div class="modal-dialog modal-dialog-centered">
            <div class="creadit__modal modal-content">
                <div data-bs-dismiss="modal" class="credit__modal__exit">
                <i class="fa fa-window-close" aria-hidden="true"></i>
                </div>
                    @foreach($cart as $el)
                        <div class="mt-3 creadit__modal__top">
                            <div class="creadit__modal__top__left">
                            @if($el->photos->first() != null)
                                <img style="object-fit:fill"  src="{{asset('admin/assets/images/goods/'.$el->photos->first()->good_img)}}" alt="">
                            @else
                                <img style="width: 100%; height: 50px" src="{{asset('admin/assets/images/goods/empty.png')}}" alt="">
                            @endif
                            </div>
                            <div class="creadit__modal__top__right">
                            <div class="creadit__modal__top__right__top">
                                <div class="modal__good_name">{{$el->name}}</div>
                                <div class="creadit__modal__top__right__top__count">
                                    <span class="mq">Miqdar</span>
                                    <input disabled class="cartelcount" value="{{$el->quantity}}" type="text">
                                    <input class="cartelper" value="{{$el->percent}}" type="hidden" name="">
                                </div>
                                <div class="cartelprice creadit__modal__top__right__top__price">{{$el->price}} ⫙</div>
                            </div>
                            </div>
                        </div>
                    @endforeach
                <div class="creadit__modal__center">
                <div class="creadit__modal__center__months">
                    <div class="creadit__modal__center__month creadit__modal__center__month__active"><div>6ay</div></div>
                </div>
                <div class="creadit__modal__center__months">
                    <div class="creadit__modal__center__month"><div>9ay</div></div>
                </div>
                <div class="creadit__modal__center__months">
                    <div class="creadit__modal__center__month"><div>12ay</div></div>
                </div>
                <div class="creadit__modal__center__months">
                    <div class="creadit__modal__center__month"><div>15ay</div></div>
                </div>
                <div class="creadit__modal__center__months">
                    <div class="creadit__modal__center__month"><div>18ay</div></div>
                </div>
                <div class="creadit__modal__center__months">
                    <div class="creadit__modal__center__month"><div>24ay</div></div>
                </div>
                </div>
                <div class="creadit__modal__prices">
                <div class="creadit__modal__dur">
                    <div>Müddət:
                        <span class="cartduration">24 ay</span>
                        <input name="monthdur" value="" type="hidden" class="monthdur">
                    </div>
                </div>
                <div class="creadit__modal__dur">
                    <div>İlkin ödəniş:
                        <span>0 ⫙ </span>
                    </div>
                </div>
                <div class="creadit__modal__dur">
                    <div>Aylıq ödəniş:
                        <span class="monthlypacart">16.8  ⫙</span>
                        <input name="monthprice" value="" type="hidden" class="monthprice">
                    </div>
                </div>
                </div>
                <hr>
                <button class="credit__button">Sifarişi rəsmiləşdir <i class="fa fa-angle-right"></i></button>
            </div>
        </div>
            </form>
        </div>

        <div class="modal fade" id="cash" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="creadit__modal modal-content">
                <div data-bs-dismiss="modal" class="credit__modal__exit">
                <i class="fa fa-window-close" ass="aria-hidden="true"></i>
                </div>
                <div class="cart-overflow" style="height: 320px;">
                @foreach($cart as $el)
                    <div class="mt-3 cart__el">
                        <div class="creadit__modal__top">
                            <div class="me-3 creadit__modal__top__left">
                            @if($el->photos->first() != null)
                                <img style="object-fit:fill"  src="{{asset('admin/assets/images/goods/'.$el->photos->first()->good_img)}}" alt="">
                            @else
                                <img style="width: 100%; height: 50px" src="{{asset('admin/assets/images/goods/empty.png')}}" alt="">
                            @endif
                            </div>
                            <div class="creadit__modal__top__right">
                                <div class="creadit__modal__top__right__top">
                                <div class="modal__good_name">{{$el->name}}</div>
                                <div class="creadit__modal__top__right__top__count">
                                    <span class="mq">Miqdar</span>
                                    <input class="quantitity1" value="{{$el->quantity}}" disabled type="text">
                                    <input type="hidden" value="{{$el->cashdiscount}}" class="cashdiscount1">
                                </div>
                                <div class="creadit__modal__top__right__top__price1 creadit__modal__top__right__top__price">{{$el->price}} ⫙</div>
                                <a href="{{route('user.delete', ['id' => $el->id])}}"><i class="fa fa-trash cart__delete" aria-hidden="true"></i></a>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
                <hr>
                <div class="cash__modal__pieces">
                <div class="cash__modal__pieces__all">
                    <div>Məhsulun qiyməti:</div>
                    <div class="allprice1">3429.96⫙ </div>
                </div>
                <div class="cash__modal__pieces__all">
                    <div>Nağd alış endirimi:</div>
                    <div class="cashall1">-580⫙ </div>
                </div>
                </div>
                <div class="cash__modal__pieces__end">
                <div>Yekun məbləğ</div>
                <div class="lastall">2849.96⫙</div>
                </div>
                <div class="cash__buttons">
                <button class="btn btn-primary" data-bs-dismiss="modal">Alış-verişə davam et</button>
                <button><a style="text-decoration: none; color: white" href="{{route('user.order')}}">Sifarişi rəsmiləşdir</a> <i class="fa fa-angle-right"></i></button>
                </div>
            </div>
        </div>
        </div>
   @endsection


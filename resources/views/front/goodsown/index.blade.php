
   @extends('front.layouts.front')
   @section('content')


   <div style="overflow: hidden;" class="good__content">
      <div class="container">
         <div class="good__content__top">
            Home >>> {{$cat->cat__name}} >>> {{$its[0]->goods_name}}
            <span>
               <i class="fa-solid fa-bars"></i>
               <i style="display: none;" class="fa fa-window-close" aria-hidden="true"></i>
            </span>
         </div>
         <div class="goods__have">
            <div class="have">✔ Məhsul mövcuddur(400 ədəd)</div>
            <div class="none">∅ Məhsul mövcud deyil</div>
            <div class="goods__code"><span>Məhsul kodu:</span>
               {{$its[0]->id}}</div>
            <div class="goods__views"><span>Məhsula baxılıb:</span> <b class="views__bad">{{$its[0]->views}} dəfə</b></div>
         </div>
         <div class="goods__tags">
            @foreach($its[0]->tagsOneIntr($its[0]->tags) as $tags)
                <div  class="{{$tags->color}}"><a href="">{{$tags->tag__name}}</a></div>
            @endforeach

         </div>foreac
         <div class="good__content__wrapper">
            <div style="width: max-content" class="categories__menu">
                @include('front.layouts.sidebar')
            </div>
            </div>
            <div class="good__content__wrapper__slider">
               <div class="good__content__wrapper__slider__mini">
                    @foreach($its[0]->photos as $photo)

                        <div class="good__content__wrapper__slider__mini__img">
                            <img src="{{asset('admin/assets/images/goods/'.$photo->good_img)}}" alt="">
                        </div>

                    @endforeach


               </div>
               <div style="display: flex; justify-content: center; align-items: center;" class="good__content__wrapper__slider__img">
                    @if($its[0]->photos->first() != null)
                        <img style="height: 80%; width: 80%"height: 50px" src="{{asset('admin/assets/images/goods/'.$its[0]->photos->first()->good_img)}}" alt="">
                    @endif
               </div>
            </div>
            <div class="good__content__choose">
               <div class="good__content__choose__name">{{$its[0]->goods_name}} <span class="addFavorite"><i style="color: orange" class="fa-regular fa-heart" aria-hidden="true"></i></span></div>
               <div class="good__content__choose__mthods">
                  <div class="good__content__choose__mthod">
                     <img src="{{asset('front/assets/images/negd.png')}}" alt="">
                     nəğd alışa endirim
                  </div>
                  <div class="good__content__choose__mthod">
                     <img src="{{asset('front/assets/images/creditcart.png')}}" alt="">
                     kartla ödəniş
                  </div>
                  <div class="good__content__choose__mthod">
                     <img src="{{asset('front/assets/images/onlinepay.png')}}" alt="">
                     online ödəniş
                  </div>
                  <div class="good__content__choose__mthod">
                     <img src="{{asset('front/assets/images/door.png')}}" alt="">
                     qapıda ödəniş
                  </div>
                  <div class="good__content__choose__mthod">
                     <img src="{{asset('front/assets/images/taksit.png')}}" alt="">
                     taksitlə ödəniş
                  </div>
               </div>
               <div class="dropdown">
                     <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                       Rəngi
                     </button>
                     <ul class="dropdown-menu">
                        @foreach($colorsId as $id)
                            @foreach($colors as $color)
                                @if($id->color__id == $color->id)
                                    <li><a href="{{route('goodsab', ['slug' => $its[0]->slug, 'color'=>$color->id])}}" class="d-block dropdown-item" >{{$color->color_name}} <span style="margin-top: 8px;  background-color: {{$color->color}}"></span></a></li>
                                @endif
                            @endforeach
                        @endforeach
                     </ul>
               </div>
               <div class="good__content__choose__price">
                  <div class="good__content__choose__price__left"><span style="font-size: 25px; font-weight: 600">Qiymət:</span> {{$its[0]->goods_price}} ⫙ <span>- nağd alışda <span class="goods_price">{{$its[0]->goods_price-$its[0]->cashdicount}}</span> ⫙</span></div>
               </div>
               <label class="calcLabel" for="calculator">Kredit Kalkulyatoru</label>
               <br>
               <input type="range" min="1" max="6" step="1" id="calculator" name="calculator" />
               <input class="goods__percent" type="hidden" name="" value="{{$its[0]->percent}}">
               <div class="calculator__list">
                  <span style="margin-left: 3px">|</span>
                  <span style="margin-left: 3px">|</span>
                  <span style="margin-left: 9px">|</span>
                  <span style="margin-left: 9px">|</span>
                  <span style="margin-left: 9px">|</span>
                  <span style="margin-left: 9px">|</span>
               </div>
               <div class="calculator__list">
                  <span>6</span>
                  <span>9</span>
                  <span>12</span>
                  <span>15</span>
                  <span>18</span>
                  <span>24</span>
               </div>
               <div class="credits">
                  <div class="first__pay">
                     İlkin ödəniş <br>
                     0 ⫙
                  </div>
                  <div class="mountly_pay">
                     Aylıq ödəniş <br>
                     <span class="monthly_pay">16.8</span> ⫙
                  </div>
               </div>
               <div class="paymethods">
                  <button type="button" class="btn text-danger" data-bs-toggle="modal" data-bs-toggle="modal" data-bs-target="#oneclick">Bir kliklə al</button>
                  <button type="button" class="btn  text-dark" data-bs-toggle="modal" data-bs-toggle="modal" data-bs-target="#cash">Nəğd al</button>
                  <button type="button" class="btn  text-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">Hissə - hissə al</button>
               </div>
            </div>
         </div>
         <div class="good__content__footer">
            <div class="good__content__listeners">
               <div class="good__content__listeners__top">
                  <div class="good__content__listeners__top1">Xüsusiyyətlər</div>
                  <div class="active__cont__btn good__content__listeners__top2">İstifadəçi rəyləri</div>
               </div>
               <div class="active__cont__disble  good__content__listeners__content first__cont">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam adipisci fuga tenetur quis fugiat suscipit cupiditate doloremque at explicabo tempora, qui ex iure distinctio autem cumque unde nesciunt earum eaque impedit assumenda laboriosam iste. Fugiat quidem veritatis rerum minus sit sequi culpa nemo perspiciatis, ab, mollitia ipsam harum recusandae sapiente aut dolore vero voluptas ratione.
               </div>
               <div class="good__content__listeners__content second__cont">
                  <div class="good__content__listeners__content__comments">
                     @foreach($comments as $comment)
                        @if($comment->good_id == $its[0]->id)
                            <div class="good__content__listeners__content__comment">
                                <div>
                                <div class="good__content__listeners__content__comment__name">{{$comment->user[0]->name}}</div>
                                <div class="good__content__listeners__content__comment__time">{{$comment->created_at}}</div>
                                </div>
                                <div class="good__content__listeners__content__comment__content">
                                {{$comment->comment}}
                                </div>
                            </div>
                            <hr>
                        @endif
                     @endforeach
                  </div>
                  <div class="good__content__listeners__content__yourComment">
                    @if(session('addcommsuccess'))
                    <div class="alert alert-primary" role="alert">
                        {{session('addcommsuccess')}}
                    </div>
                    @endif
                    @if(session('addcommerror'))
                    <div class="alert alert-primary" role="alert">
                        {{session('addcommerror')}}
                    </div>
                    @endif
                     <form method="post" action="{{Route('user.addcomment')}}">
                        @csrf
                        <label class="d-block" id="commentLabel" for="comment">Sənin rəyin</label>
                        <textarea name="comment" id="comment" class="form-control">
                        </textarea>
                        <input type="hidden" value="{{$its[0]->id}}" name="good_id">
                        <button class="btn btn-primary">Rəyi göndər</button>
                     </form>
                  </div>
               </div>
            </div>
            <div class="related__productes">
               <div class="content__title">
                  <div class="content__title__left">
                     Oxşar məhsullar
                  </div>
                  <div class="content__title__right">
                     <p>
                        <a href="">Bütün məhsulları gör</a>
                        <i class="text-danger fa fa-caret-right"></i>
                     </p>
                  </div>
               </div>
               <div class="related__productes__wrapper">
                    @foreach($smiliar as $goods)
                    <div class="content__goods">
                    @if($goods->photos->first() != null)
                        <img style="height: 130px;"height: 50px" src="{{asset('admin/assets/images/goods/'.$goods->photos->first()->good_img)}}" alt="">
                    @else
                        <img style="width: 100%; height: 50px" src="{{asset('admin/assets/images/goods/empty.png')}}" alt="">
                    @endif
                        <div class="content__goods__title"><a style="text-decoration: none; color: black" href="">{{substr($goods->goods_name, 0, 15)}}</a></div>
                        <div class="content__goods__footer">
                            <div class="content__goods__footer__price">⫙{{$goods->goods_price}}</div>
                            <a href="{{route('user.addcart', ['id' => $goods->id])}}" class="btn btn-danger" style="font-size: 7px">Səbətə Əlavə Et</a>
                        </div>
                    </div>
                    @endforeach
               </div>
            </div>
         </div>
      </div>

   </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <div class="creadit__modal__top__right__footer">
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Zəmanət əlavə et</option>
                                <option value="1">İstifadəçi zəmanəti 0 ⫙</option>
                                <option value="3">Qızıl zəmanət(1 il) - 35 ⫙</option>
                                <option value="3">Qızıl zəmanət(2 il) - 53 ⫙</option>
                                <option value="3">Qızıl zəmanət(3 il) - 70 ⫙</option>
                                <option value="2">Qızıl zəmanət(6 ay) - 88 ⫙</option>
                            </select>
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
                  </div>
               </div>
               <div class="creadit__modal__dur">
                  <div>İlkin ödəniş:
                     <span>0 ⫙ </span>
                  </div>
               </div>
               <div class="creadit__modal__dur">
                  <div>Aylıq ödəniş:
                     <span class="monthlypacart">16.8  ⫙ </span>
                  </div>
               </div>
            </div>
            <hr>
            <button class="credit__button">Sifarişi rəsmiləşdir <i class="fa 	fa-angle-right"></i></button>
          </div>
      </div>
    </div>


    <div class="modal fade" id="cash" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
         <div class="creadit__modal modal-content">
            <div data-bs-dismiss="modal" class="credit__modal__exit">
               <i class="fa fa-window-close" aria-hidden="true"></i>
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
                            <div class="creadit__modal__top__right__footer">
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Zəmanət əlavə et</option>
                                <option value="1">İstifadəçi zəmanəti 0 ⫙</option>
                                <option value="3">Qızıl zəmanət(1 il) - 35 ⫙</option>
                                <option value="3">Qızıl zəmanət(2 il) - 53 ⫙</option>
                                <option value="3">Qızıl zəmanət(3 il) - 70 ⫙</option>
                                <option value="2">Qızıl zəmanət(6 ay) - 88 ⫙</option>
                                </select>
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
               <button>Alış-verişə davam et</button>
               <button>Sifarişi rəsmiləşdir <i class="fa fa-angle-right"></i></button>
            </div>
          </div>
      </div>
    </div>
    <div class="modal fade" id="oneclick" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content oneclick__modal">
            <hr>
            <div data-bs-dismiss="modal" class="credit__modal__exit">
               <i class="fa fa-window-close" aria-hidden="true"></i>
            </div>
            <form action="">
               <label for="phone" class="form-label">Mobil telefon nömrənizi daxil edin</label>
               <input type="tel" name="order" class="form-control" id="phone" aria-describedby="emailHelp">
               <label for="" class="form-label">Sifariş formasını seçin</label> <br>
               <div>
                  <div>
                     <input checked class="d-block" type="radio" value="cash" name="order" id="cashInput">
                     <label class="d-block" for="cashInput" class="form-label">Nağd al</label>
                  </div>
                  <div>
                     <input class="d-block" type="radio" value="cr" name="order" id="crInput">
                     <label class="d-block" for="crInput" class="form-label">Hissə-hissə ödənişlə al</label>
                  </div>
               </div>
               <div class="credit__info">
                  <div>
                     <label for="phone" class="form-label">Fin kodu qeyd edin * </label>
                     <input type="tel" name="order" class="form-control" id="phone" aria-describedby="emailHelp">
                  </div>
                  <div>
                     <label for="phone" class="form-label">Şəhər nömrənizi qeyd edin</label>
                     <input type="tel" name="order" class="form-control" id="phone" aria-describedby="emailHelp">
                  </div>
               </div>
               <button>Sifarişi göndər</button>
            </form>

            <hr>
        </div>
      </div>
    </div>




   @endsection


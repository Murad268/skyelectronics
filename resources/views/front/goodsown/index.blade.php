
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
                @if($bool)
                <div class="good__content__choose__name">{{$its[0]->goods_name}} <a href="{{route('user.delfav', ['id' => $its[0] -> id])}}" class="addFavorite"><i style="color: orange" class="fa fa-heart" aria-hidden="true"></i></a></div>
                @else
                <div class="good__content__choose__name">{{$its[0]->goods_name}} <a href="{{route('user.addfav', ['id' => $its[0] -> id])}}" class="addFavorite"><i style="color: orange" class="fa-regular fa-heart" aria-hidden="true"></i></a></div>
                @endif

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
               <input class="goods__pricering" type="hidden" name="" value="{{$its[0]->goods_price}}">
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
                     <span class="monthly_paying">16.8</span> ⫙
                  </div>
               </div>
               <a href="{{route('user.addcart', ['id' => $its[0]->id])}}" class="float-end btn btn-primary">Səbətə əlavə et</a>
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
  




   @endsection


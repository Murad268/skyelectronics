
   @extends('front.layouts.front')
   @section('title')
    <title>{{"Ana səhifə"}}</title>
   @endsection
   @section('content')
   <div class="content">
      <div class="container">
         <div class="content__wrapper">
            <div class="categories">
               <div class="categories__title">
                  KATEQORİYALAR
               </div>
                @include('front.layouts.sidebar')
            </div>
            </div>
            <div class="slider">
               <div style="height: 380px;" class="swiper mySwiper">
                  <div class="swiper-wrapper">
                     <div class="swiper-slide first-slider">
                           <div class="slider__body">
                              <div class="slide__title">
                                 CLEARANCE <br>
                                 <span>SALE</span>
                              </div>
                              <div class="slide__subtitle">UPTo 20% OFF</div>
                              <div class="slide__desc">Ge to Know More About our Memorable. Services Lorem Ipsum is simply dummy te</div>
                              <a class="slider-btn btn text-white" href="">Shop Now</a>
                           </div>
                     </div>
                     <div class="swiper-slide second-slider">
                     <div class="slider__body">
                        <div class="slide__title">
                           CLEARANCE <br>
                           <span>SALE</span>
                        </div>
                        <div class="slide__subtitle">UPTo 20% OFF</div>
                        <div class="slide__desc">Ge to Know More About our Memorable. Services Lorem Ipsum is simply dummy te</div>
                        <a class="slider-btn btn text-white" href="">Shop Now</a>
                     </div>
                     </div>
                     <div class="swiper-slide third-slider">
                        <div class="slider__body">
                           <div class="slide__title">
                              CLEARANCE <br>
                              <span>SALE</span>
                           </div>
                           <div class="slide__subtitle">UPTo 20% OFF</div>
                           <div class="slide__desc">Ge to Know More About our Memorable. Services Lorem Ipsum is simply dummy te</div>
                           <a class="slider-btn btn text-white" href="">Shop Now</a>
                        </div>
                     </div>
                  </div>
                </div>
            </div>
         </div>
         <div class="mt-3 mb-3 content__title">
            <div class="content__title__left">
               YENİ MƏHSULLAR
            </div>
            <div class="content__title__right">
               <p>
                  <a href="{{route('front.store', ['slug' => 'news'])}}">Bütün məhsulları gör</a>
                  <i class="text-danger fa fa-caret-right"></i>
               </p>
            </div>
         </div>
         <div  class="content__goods__wrapper">
            @foreach($newgoods as $goods)
                <div  style="height: 300px;" class="content__goods">
                @if($goods->photos->first() != null)
                    <img style="height: 200px;" src="{{asset('admin/assets/images/goods/'.$goods->photos->first()->good_img)}}" alt="">
                @else
                    <img style="width: 100%; height: 200px" src="{{asset('admin/assets/images/goods/empty.png')}}" alt="">
                @endif
                <div class="content__goods__title"><a style="color: gray; text-decoration: none" href="{{route('goodsab', ['slug' => $goods->slug, 'color' => $goods->color_id])}}">{{substr($goods->goods_name, 0, 15)}}</a></div>
                <div class="mt-3 content__goods__footer">
                    <div class="content__goods__footer__price">⫙{{$goods->goods_price}}</div>
                    <a href="{{route('user.addcart', ['id' => $goods->id])}}" class="btn btn-danger">Səbətə Əlavə Et</a>
                </div>
                </div>
            @endforeach
         </div>
         <div class="mt-3 mb-3 content__title">
            <div class="content__title__left">
               ƏN POPULYAR MƏHSULLAR
            </div>
            <div class="content__title__right">
               <p>
                  <a href="{{route('front.store', ['slug' => 'popular'])}}">Bütün məhsulları gör</a>
                  <i class="text-danger fa fa-caret-right"></i>
               </p>
            </div>
         </div>
         <div class="content__goods__wrapper">
            @foreach($populargoods as $goods)
                <div  style="height: 300px;" class="content__goods">
                @if($goods->photos->first() != null)
                    <img style="height: 200px;"height: 50px" src="{{asset('admin/assets/images/goods/'.$goods->photos->first()->good_img)}}" alt="">
                @else
                    <img style="width: 100%; height: 50px" src="{{asset('admin/assets/images/goods/empty.png')}}" alt="">
                @endif
                <div class="content__goods__title"><a style="color: gray; text-decoration: none" href="{{route('goodsab', ['slug' => $goods->slug, 'color' => $goods->color_id])}}">{{substr($goods->goods_name, 0, 15)}}</a></div>
                <div class="mt-3 content__goods__footer">
                    <div class="content__goods__footer__price">⫙{{$goods->goods_price}}</div>
                    <a href="{{route('user.addcart', ['id' => $goods->id])}}" class="btn btn-danger">Səbətə Əlavə Et</a>
                </div>
                </div>
            @endforeach
         </div>
      </div>
   </div>
   @endsection


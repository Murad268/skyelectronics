
   @extends('front.layouts.front')
   @section('content')
    

    <div class="container">
        <div class="content__goods__wrapper">
            @foreach($fav as $goods)
                <div  style="height: 300px;" class="content__goods">
                @if($goods->photos->first() != null)
                    <img style="height: 200px;"height: 50px" src="{{asset('admin/assets/images/goods/'.$goods->photos->first()->good_img)}}" alt="">
                @else
                    <img style="width: 100%; height: 50px" src="{{asset('admin/assets/images/goods/empty.png')}}" alt="">
                @endif
                <div class="content__goods__title"><a style="color: gray; text-decoration: none" href="{{route('goodsab', ['slug' => $goods->slug, 'color' => $goods->color_id])}}">{{substr($goods->goods_name, 0, 15)}}</a></div>
                <div class="mt-3 content__goods__footer">
                    <div class="content__goods__footer__price">⫙{{$goods->goods_price}}</div>
                    <button>Səbətə Əlavə Et</button>
                </div>
                </div>
            @endforeach
        </div>
    </div>




   @endsection


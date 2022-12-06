
   @extends('front.layouts.front')
   @section('title')
    <title>{{"Mağaza"}}</title>
   @endsection
   @section('content')

        <div class="store_content">
            <div class="container">
                <div class="mb-3 good__content__top">
                    <a href="">ana səhifə</a> >>> <a href="">mağaza</a>
                </div>
                <div class="store__wrapper">
                    <div>
                        @include('front.layouts.sidebar')
                    </div>

                </div>
                <div>
                    <div class="store__goods__wrapper">
                    @foreach($goodsAll as $goods)
                        <div  style="height: 300px;" class="content__goods">
                        @if($goods->photos->first() != null)
                            <img style="height: 200px;"height: 50px" src="{{asset('admin/assets/images/goods/'.$goods->photos->first()->good_img)}}" alt="">
                        @else
                            <img style="width: 100%; height: 50px" src="{{asset('admin/assets/images/goods/empty.png')}}" alt="">
                        @endif
                        <div class="content__goods__title"><a style="color: gray; text-decoration: none" href="{{route('goodsab', ['slug' => $goods->slug, 'color' => $goods->color_id])}}">{{substr($goods->goods_name, 0, 15)}}</a></div>
                        <div class="mt-3 content__goods__footer">
                            <div class="content__goods__footer__price">⫙{{$goods->goods_price}}</div>
                            <a style="font-size: 12px;" href="{{route('user.addcart', ['id' => $goods->id])}}" class="btn btn-danger">Səbətə Əlavə Et</a>
                        </div>
                        </div>
                    @endforeach

                    </div>
                    {{$goodsAll->appends(['good_name' => request()->good_name])->links("pagination::bootstrap-5")}}
                </div>
            </div>
        </div>

   @endsection


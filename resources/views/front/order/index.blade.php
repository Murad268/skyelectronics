
   @extends('front.layouts.front')
   @section('content')




    <form method="post" action="{{Route('addorder')}}">
        @csrf
    <section class="order-form my-4 mx-4">
    <div class="container pt-4">
            <div class="order__wrapper">
            <div class="order_info">
            <div class="row">
            <div class="col-12">
            <div class="good__content__top">
                <a href="">ana səhifə</a> >>> <a href="">sifariş</a>
            </div>
            <h2 class="mt-3 about__subtitle">Sifariş</h2>
            @if(session('successorder'))
                <div class="mt-3 alert alert-success">
                    {{session('successorder')}}
                </div>
            @endif
            @if(session('errororder'))
                <div class="mt-3 alert alert-danger">
                    {{session('errororder')}}
                </div>
            @endif
            <hr class="mt-1">
            </div>
            <div class="col-12">

            <div class="row mx-4">
                <div class="col-12 mb-2">
                <label class="order-form-label">Ad</label>
                </div>
                <div class="col-12 col-sm-6">
                <input name="name" class="order-form-input" placeholder="Adınız">
                </div>
                <div class="col-12 col-sm-6 mt-2 mt-sm-0">
                <input name="surname" class="order-form-input" placeholder="Soyadınız">
                </div>
            </div>

            <div class="mt-4 row mx-4">
                <div class="col-12 col-sm-6">
                <input name="fathername" class="order-form-input" placeholder="Ata adı">
                </div>
                <div class="col-12 col-sm-6 mt-2 mt-sm-0">
                <input name="phone" class="order-form-input" placeholder="Telefon nömrəniz">
                </div>
            </div>


            <div class="row mt-3 mx-4">
                <div class="col-12">
                <label class="order-form-label">Əlavə qeydiniz varsa</label>
                </div>
                <div class="col-12">
                <input name="desc" style="height: 90px;" class="order-form-input" placeholder=" ">
                </div>
            </div>

            <div class="row mt-3 mx-4">
                <div class="col-12">
                <label class="order-form-label" for="date-picker-example">Çatdırılacaq tarix</label>
                </div>
                <div class="col-12">
                <input name="date" class="order-form-input datepicker" placeholder="Selected date" type="date"
                    id="date-picker-example">
                </div>
            </div>
            <div class="row mt-3 mx-4">
                <div class="col-12">
                <label class="order-form-label" for="date-picker-example">Çatdırılacaq saat</label>
                </div>
                <div class="col-12">
                <input name="time" class="order-form-input datepicker" placeholder="Selected date" type="time"
                    id="date-picker-example">
                </div>
            </div>
            <div class="row mt-3 mx-4">
                <div class="col-12">
                <label class="order-form-label">Çatdırılma</label>
                </div>

                <div class="col-12 col-sm-6 mt-2 pr-sm-2">
                <input name="city" class="order-form-input" placeholder="Şəhər">
                </div>
                <div class="col-12 col-sm-6 mt-2 pl-sm-0">
                <input name="rayon" class="order-form-input" placeholder="Rayon">
                </div>
                <div class="col-12 mt-2">
                <input name="street" class="order-form-input" placeholder="Küç., bina, blok, mənzil, mərtəbə">
                </div>
            </div>

            <div class="row mt-3 mx-4">
                <div class="col-12">
                <label class="order-form-label">Sifarişin tamamlanması</label>
                </div>
                <div class="row">
            <div class='col text-center'>
            <input checked type="radio" name="ordermeth" value="cashpay" id="img1" class="d-none imgbgchk" value="">
            <label for="img1">
                <img style="width: 250px; height: 100px; object-fit: fill" src="{{asset('admin/assets/images/cashpay.png')}}" alt="Image 1">
                <div class="tick_container">
                <div class="tick"><i class="fa fa-check"></i></div>
                </div>
                </label>
            </div>
            <div  class='col text-center'>
            <input type="radio" name="ordermeth" value="creditpay" id="img2" class="d-none imgbgchk" value="">
            <label for="img2">
                <img style="width: 250px; height: 100px; object-fit: fill" src="{{asset('admin/assets/images/creditpay.png')}}" alt="Image 2">
                <div class="tick_container">
                <div class="tick"><i class="fa fa-check"></i></div>
                </div>
            </label>
            </div>
            <div style="font-size: 14px;" class="mt-3 alert alert-info" role="alert">
                Alış-veriş məbləğini TamKart, BolKart, Albalı kart ilə çatdırılma zamanı aylara bölə bilərsiz.
            </div>
        </div>



            </div>



            <div class="row mt-3">
                <div class="col-12">
                <button type="submit" id="btnSubmit" class="btn btn-success      d-block mx-auto btn-submit">Sifarişi tamamla</button>
                </div>
            </div>

            </div>
        </div>
        </div>
        <div class="order__list">
            <h3>Məhsullar</h3>
            @foreach($cart as $item)
                <div class="order__list__el">
                    <div class="order__list__el__name">

                        @if($item->photos->first() != null)
                            <img style="height: 30px; height: 50px" src="{{asset('admin/assets/images/goods/'.$item->photos->first()->good_img)}}" alt="">
                        @else
                            <img style="width: 30px; height: 50px" src="{{asset('admin/assets/images/goods/empty.png')}}" alt="">
                        @endif {{$item->name}}
                    </div>
                    <div class="mt-3 order__list__el__footer">

                        <div class="order__list__el__footer__count">{{$item->quantity}} ədəd</div>
                        <div class="order__list__el__footer__price">{{($item->price-$item->cashdiscount) * $item->quantity}} ₼</div>
                    </div>
                </div>
            @endforeach
            <hr>
            <div style="text-align: right;" class="order__lastPrice">
                <h3></h3>
            </div>
        </div>





        </div>
      </div>
    </div>
  </section>
    </form>



   @endsection


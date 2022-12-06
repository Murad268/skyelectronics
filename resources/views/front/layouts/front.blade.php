
<!DOCTYPE html>
<html lang="az">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://fonts.cdnfonts.com/css/amble" rel="stylesheet">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Bebas+Neue&family=Exo+2:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Mukta:wght@200;300;400;500;600;700;800&family=Open+Sans:wght@300;400;500;600;700;800&family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Raleway:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&family=Rubik+Burned&family=Russo+One&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="{{asset('front/assets/css/reset.css')}}">
   <link rel="stylesheet" href="{{asset('front/assets/css/style.css')}}">
   <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"
    />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
   @yield('title')
</head>
<body>
   <header class="header">
      <div class="container">
         <div class="header__fnavbar">
            <nav class="header__fnavbar__contact">
               <div class="header__fnavbar__contact__span"><strong>Sualın var?</strong></div>
               <div style="color: #9C9C9C" class="header__fnavbar__contact__span">bizə zəng et</div>
               <div class="text-danger header__fnavbar__contact__span"><strong>{{$phones->first()->phone}}</strong></div>
            </nav>
            <ul class="header__fnavbar__links">
                @if(session('user_email'))
                    <li class="header__fnavbar__link"><a href="{{route('auth.exit')}}">Çıxış</a></li>
                    <li class="header__fnavbar__link"><a href="{{route('user.index')}}">Hesabım</a></li>
                    <li class="header__fnavbar__link"><a href="{{route('user.cart')}}">Səbətim</a></li>
                    <li class="header__fnavbar__link"><a href="{{route('user.favorites')}}">Favorilərim</a></li>
                @else
                    <li class="header__fnavbar__link"><a href="{{route('auth.enter')}}">Daxil ol</a></li>
                    <li class="header__fnavbar__link"><a href="{{route('auth.register')}}">Qeyd ol</a></li>
                @endif
               <li class="header__fnavbar__link"><a href="{{route('orderlisting')}}">Sifarişlərim</a></li>
            </ul>
         </div>
         <div class="header__cart__block">
            <div class="header__cart__logo">
               <a href="{{route('front.index')}}"><img src="{{asset('admin/assets/images/'.$siteInfo->siteLogosu)}}" alt=""></a>
            </div>
            <div class="header__cart">
               <div>Onlayn Mağazamıza xoş gəlmisiniz! <span style="font-size: 20px;" class="text-danger">Səbət:</span>{{$cart->count()}} məhsul(lar) - ⫙{{$cart->sum('price') * $cart->sum('quantity')}}</div>
               <div class="odrar">
                  <i class="odrardown fa fa-caret-down"></i>
                  <i style="display: none;" class="odrarup fa fa-caret-up"></i>
               </div>
               <div class="header__cart__footer">
                    @if($cart->count() > 0)
                        @foreach($cart as $item)
                            <div>
                                <a href="{{route('user.delete', ['id' => $item->id])}}"><i class="fa fa-trash text-danger"></i></a>
                                <div class="header__cart__footer__name">
                                    {{$item->name}}
                                </div>
                                <div class="header__cart__footer__count">{{$item->quantity}}</div>
                                <div class="header__cart__footer__price">{{$item->price}} AZN</div>
                            </div>
                            <hr>
                        @endforeach
                    @else
                        Hazırda səbətiniz boşdur
                    @endif
               </div>
            </div>

         </div>
         <nav class="main__nav">
        	<div class="menu">
			    	<div class="menuActiveLink"><a href="{{route('front.index')}}">Ana Səhifə</a></div>
			    	<div><a href="{{route('about')}}">Haqqımızda</a></div>
			    	<div><a href="{{route('front.delivery')}}">Çatdırılma</a></div>
			    	<div><a href="news.html">Yeniliklər</a></div>
			    	<div><a href="{{route('front.contact')}}">Əlaqə</a></div>
	     	</div>
            <div class="main__nav__right">
               <form method="get" action="{{Route('front.seacrh')}}"><input placeholder="search" name="good_name" type="text"></form>
               <i class="input_search fa fa-search" aria-hidden="true"></i>
            </div>
         </nav>
      </div>
   </header>
   @yield('content')
   <div class="container">
      <div class="footer">
         <div class="wrap">
         <div class="section group">
             <div class="col_1_of_4 span_1_of_4">
                   <h4>İnformasiya</h4>
                   <ul>
                   <li><a href="{{route('about')}}">Haqqımızda</a></li>
                   <li><a href="{{route('front.conf')}}">Konfidensiallıq siyasəti</a></li>
                   <li><a href="{{route('front.piece')}}">Hissə-hissə ödəniş şərtləri</a></li>
                   <li><a href="{{route('front.back')}}">Geri qaytarma siyasəti</a></li>
                   <li><a href="{{route('front.monthly')}}">Aylıq ödənişlərin həyata keçməsi</a></li>
                   <li><a href="contact.html">Servis Mərkəzləri</a></li>
                   </ul>
                </div>
             <div class="col_1_of_4 span_1_of_4">
                <h4>Müştərilər</h4>
                   <ul>
                   <li><a href="{{route('front.terms')}}">Saytın istifadə şərtləri</a></li>
                   <li><a href="{{route('front.corporative')}}">Korporativ satışlar</a></li>
                   <li><a href="{{route('front.complaints')}}">Şikayətlərin idarəolunma siyasəti</a></li>
                   <li><a href="{{route('front.bestprice')}}">Ən yaxşı qiymətə zəmanət!</a></li>
                   </ul>
             </div>
             <div class="col_1_of_4 span_1_of_4">
                <h4>Mənim Hesabım</h4>
                   <ul>
                   @if(session('user_email'))
                    <li class=""><a href="{{route('auth.exit')}}">Çıxış</a></li>
                    <li class=""><a href="">Hesabım</a></li>
                    <li><a href="{{route('user.cart')}}">Səbəti Gör</a></li>
                    <li><a href="{{route('user.favorites')}}">Sevimlilər</a></li>
                    <li><a href="{{route('orderlisting')}}">Sifarişlərim</a></li>
                    @else
                      <li><a href="{{route('auth.enter')}}">Daxil ol</a></li>
                      <li class="header__fnavbar__link"><a href="{{route('auth.enter')}}">Daxil ol</a></li>
                      <li class="header__fnavbar__link"><a href="{{route('auth.register')}}">Qeyd ol</a></li>
                    @endif
                      <li><a href="contact.html">Yardım</a></li>
                   </ul>
             </div>
             <div class="col_1_of_4 span_1_of_4">
                <h4>Əlaqə</h4>
                   <ul>
                    @foreach($phones as $phone)
                        <li><span>{{$phone->phone}}</span></li>
                    @endforeach
                        <li><span>{{$siteInfo->siteMailAdresi}}</span></li>
                   </ul>
                   <div class="social-icons">
                      <h4>Bizi İzlə</h4>
                           <ul>
                            <li><a href="{{$siteInfo->SosyalLinkFacebook}}" target="_blank"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                            <li><a href="{{$siteInfo->SosyalLinkTwitter}}" target="_blank"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="{{$siteInfo->SosyalLinkInstagram}}" target="_blank"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                            <li><a href="{{$siteInfo->SosyalLinkLinkedin}}" target="_blank"> <i class="fab fa-linkedin" aria-hidden="true"></i></li>
                            <li><a href="{{$siteInfo->SosyalLinkYoutube}}" target="_blank">  <i class="fab fa-youtube" aria-hidden="true"></i></a></li>
                            <div class="clear"></div>
                        </ul>
                       </div>
             </div>
          </div>
         </div>
         <div class="copy_right">
             <p>Sky Electronics © All rights Reseverd | Design by  <a href="http://itmurad.epizy.com/myportfolio/">Murad Agamedov</a> </p>
          </div>
     </div>
   </div>
   <div class="shadow">

   </div>

   <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
   <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
   <script src="{{asset('front/assets/js/script.js')}}"></script>
</body>
</html>

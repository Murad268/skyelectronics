
   @extends('front.layouts.front')
   @section('content')


    <div class="content">
        <div class="container">
            <div class="good__content__top">
                <a href="">ana səhifə</a> >>> <a href="">bizimlə əlaqə</a>
            </div>
            <div class="section-contact">
                <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-xl-8">
                    <div class="header-section text-center">
                        <h2 class="title">Bizimlə Əlaqə
                            <span class="dot"></span>
                            <span class="big-title">KONTAKT</span>
                        </h2>
                        <p class="description">Öz məktubunuzu aşağıdan bildirə bilərsiniz.</p>

                    </div>
                </div>
                </div>
                <div class="form-contact">
                <form method="post" action="{{Route('sendmail')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="single-input">
                            <i class="fas fa-user"></i>
                            <input type="text" name="ad" placeholder="ADINIZI DAXİL EDİN">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-input">
                            <i class="fas fa-envelope"></i>
                            <input type="text" name="email" placeholder="ELEKTRON POÇTUNUZU DAXİL EDİN">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-input">
                            <i class="fas fa-phone"></i>
                            <input type="text" name="telefon" placeholder="TELEFON NÖMRƏNİZİ DAXİL EDİN">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-input">
                            <i class="fas fa-check"></i>
                            <input type="text" name="subject" placeholder="MƏKTUB BAŞLIĞINIZ">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="single-input">
                            <i class="fas fa-comment-dots"></i>
                            <textarea name="mesaj" placeholder="MƏKTUBUNUZU DAXİL EDİN"></textarea>
                            </div>
                        </div>
                        @if(session('successsendemail'))
                            <div class="alert alert-success" role="alert">
                                {{session('successsendemail')}}
                            </div>
                        @endif
                        <div class="col-12">
                            <div class="submit-input text-center">
                            <input type="submit" name="submit" value="İNDİ GÖNDƏR">
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>


   @endsection


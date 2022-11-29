
   @extends('front.layouts.front')
   @section('content')



   <div class="content">
      <div class="container">
         <div class="good__content__top">
            <a href="">ana səhifə</a> >>> <a href="">çatdırılma</a>
         </div>
         <div class="delivery__wrapper">
            <div class="delivery__item">
               <img src="{{asset('front/assets/images/delivery-img1.jpg')}}" alt="">
               <div class="delivery__title">LOREM IPSUM IS SIMPLY DUMMY TEXT</div>
               <div class="delivery__desc">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
               </div>
            </div>
            <div class="delivery__item">
               <img src="{{asset('front/assets/images/delivery-img2.jpg')}}" alt="">
               <div class="delivery__title">LOREM IPSUM IS SIMPLY DUMMY TEXT</div>
               <div class="delivery__desc">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
               </div>
            </div>
            <div class="delivery__item">
               <img src="{{asset('front/assets/images/delivery-img3.jpg')}}" alt="">
               <div class="delivery__title">LOREM IPSUM IS SIMPLY DUMMY TEXT</div>
               <div class="delivery__desc">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
               </div>
            </div>
         </div>
         <h3 class="delivery__title">Ən Çox Verilən Suallar</h3>
         <div class="accordion" id="accordionExample">
            @foreach($faq as $item)
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#{{$item->title}}" aria-expanded="true" aria-controls="collapseOne">
                  {{$item->title}}
                </button>
              </h2>
              <div id="{{$item->title}}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  {{$item->desc}}
                </div>
              </div>
            </div>
            @endforeach

          </div>
      </div>
   </div>





   @endsection


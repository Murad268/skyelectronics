@extends('front.layouts.front')
@section('content')
   <div class="content">
      <div class="container">

         <div class="good__content__top">
            <a href="">ana səhifə</a> >>> <a href="">hesabım</a>
         </div>
         <h2 class="mt-5 mb-0 about__subtitle">Hesabım</h2>
         <section >
            <div class="container py-5">
              <div class="row">
                <div class="col-lg-4">
                  <div class="card mb-4">
                    <div class="card-body text-center">
                      <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                        class="rounded-circle img-fluid" style="width: 150px;">
                      <h5 class="my-3">John Smith</h5>
                      <p class="text-muted mb-1">Admin</p>

                    </div>
                  </div>
                  <div class="card mb-4 mb-lg-0">
                    <div class="card-body p-0">
                      <ul class="list-group list-group-flush rounded-3">
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                          <i class="fas fa-globe fa-lg text-warning"></i>
                          <p class="mb-0">{{$user[0]->site}}</p>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                          <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                          <p class="mb-0">{{$user[0]->twitter}}</p>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                          <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                          <p class="mb-0">{{$user[0]->instagram}}</p>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                          <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                          <p class="mb-0">{{$user[0]->facebook}}</p>
                        </li>
                      </ul>
                    </div>

                  </div>
                  <form method="post" action="{{Route('user.updatelink')}}">
                    @csrf
                  <div class="card mb-4 mt-2 mb-lg-0">

                        <div class="card-body p-0">
                           <ul class="list-group list-group-flush rounded-3">
                             <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                               <i style="display: inline-block; margin-right: 8px" class="fas fa-globe fa-lg text-warning"></i>
                               <input value="{{$user[0]->site}}" name="site" type="text" class="form-control">
                             </li>
                             <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                               <i style="display: inline-block; margin-right: 8px" class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                               <input value="{{$user[0]->twitter}}" name="twitter" type="text" class="form-control">
                             </li>
                             <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                               <i style="display: inline-block; margin-right: 8px" class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                               <input value="{{$user[0]->instagram}}" name="instagram" type="text" class="form-control">
                             </li>
                             <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                               <i style="display: inline-block; margin-right: 8px" class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                               <input value="{{$user[0]->facebook}}" name="facebook"  type="text" class="form-control">
                             </li>
                           </ul>
                         </div>

                    </div>
                    @if(session('errorlink'))
                        <div class="mt-3 alert alert-danger" role="alert">
                            {{session('errorlink')}}
                        </div>
                    @endif
                    @if(session('successlink'))
                        <div class="mt-3 alert alert-success" role="alert">
                            {{session('successlink')}}
                        </div>
                    @endif
                    <button style="width: 160px; margin: 10px auto 0 auto" type="submit" class="d-block btn btn-success">Məlumatları yenilə</button>

                </form>
                </div>
                <div class="col-lg-8">
                  <div class="card mb-4">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0">Full Name</p>
                        </div>
                        <div class="col-sm-9">
                          <p class="text-muted mb-0">{{$user[0]->name}}</p>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0">Email</p>
                        </div>
                        <div class="col-sm-9">
                          <p class="text-muted mb-0">{{$user[0]->email}}</p>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0">Phone</p>
                        </div>
                        <div class="col-sm-9">
                          <p class="text-muted mb-0">{{$user[0]->phone}}</p>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0">Mobile</p>
                        </div>
                        <div class="col-sm-9">
                          <p class="text-muted mb-0">{{$user[0]->mobile}}</p>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0">Address</p>
                        </div>
                        <div class="col-sm-9">
                          <p class="text-muted mb-0">{{$user[0]->address}}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <form method="post" action="{{Route('user.updatemain')}}">
                    @csrf
                  <div class="card mb-4">
                        <div class="card-body">
                           <div class="row">
                             <div class="col-sm-3">
                               <p class="mb-0">Full Name</p>
                             </div>
                             <div class="col-sm-9">
                               <input name="name" value="{{$user[0]->name}}" type="text" class="form-control">
                             </div>
                           </div>
                           <hr>
                           <div class="row">
                             <div class="col-sm-3">
                               <p class="mb-0">Email</p>
                             </div>
                             <div class="col-sm-9">
                               <input name="email"  type="email" class="form-control">
                             </div>
                           </div>
                           <hr>
                           <div class="row">
                             <div class="col-sm-3">
                               <p class="mb-0">Phone</p>
                             </div>
                             <div class="col-sm-9">
                               <input name="phone" value="{{$user[0]->phone}}" type="tel" class="form-control">
                             </div>
                           </div>
                           <hr>
                           <div class="row">
                             <div class="col-sm-3">
                               <p class="mb-0">Mobile</p>
                             </div>
                             <div class="col-sm-9">
                               <input name="mobile" value="{{$user[0]->mobile}}" type="tel" class="form-control">
                             </div>
                           </div>
                           <hr>
                           <div class="row">
                             <div class="col-sm-3">
                               <p class="mb-0">Address</p>
                             </div>
                             <div class="col-sm-9">
                               <input name="address" value="{{$user[0]->address}}" type="text" class="form-control">
                             </div>
                           </div>
                         </div>
                   </div>
                   @if(session('error'))
                   <div class="alert alert-danger" role="alert">
                        {{session('error')}}
                    </div>
                   @endif
                   @if(session('success'))
                   <div class="alert alert-success" role="alert">
                        {{session('success')}}
                    </div>
                   @endif
                   <button type="submit" class="btn btn-success">Məlumatları yenilə</button>
                  </form>
                </div>
              </div>
            </div>
          </section>
      </div>
   </div>
@endsection



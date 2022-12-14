<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <title>Document</title>
</head>
<body>
  <section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Qeydiyyat</p>

                  <form method="post" action="{{Route('auth.create')}}" class="mx-1 mx-md-4">
                    @csrf

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        @if(session('errorpassword'))
                            <div class="alert alert-danger">
                                {{session('errorpassword')}}
                            </div>
                        @endif
                        @if(session('errorremail'))
                            <div class="alert alert-danger">
                                {{session('errorremail')}}
                            </div>
                        @endif
                        @if(session('errorok'))
                            <div class="alert alert-danger">
                                {{session('errorok')}}
                            </div>
                        @endif

                        <input name="name" type="text" id="form3Example1c" class="form-control" />
                        <label class="form-label" for="form3Example1c">Ad??n??z</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input name="email" type="email" id="form3Example3c" class="form-control" />
                        <label  class="form-label" for="form3Example3c">Elektron po??tunuz</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input name="password" type="password" id="form3Example4c" class="form-control" />
                        <label  class="form-label" for="form3Example4c">??ifr??</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input name="password_confirmed"  type="password" id="form3Example4cd" class="form-control" />
                        <label class="form-label" for="form3Example4cd">??ifr??ni t??krar edin</label>
                      </div>
                    </div>
                    <div class="mb-3 ms-3" style="font-size: 14px">hesab??n??z art??q var? O zaman <a href="{{route('auth.enter')}}">daxil</a> olun</div>
                    <div class="form-check d-flex justify-content-center mb-5">
                      <input name="ok" class="form-check-input me-2" type="checkbox" id="form2Example3c" />
                      <label class="form-check-label" for="form2Example3">
                        ??stifad????i qaydalar?? il?? raz??yam <a href="{{route('front.terms')}}">??stifad????i qaydalar??</a>
                      </label>
                    </div>
                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <button type="submit" class="btn btn-primary btn-lg">Qeydiyyatdan ke??</button>
                    </div>
                  </form>
                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                  <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                    class="img-fluid" alt="Sample image">

                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
</html>


@extends('admin.layouts.admin')
@section('content')
<div class="panel">
    <div class="search">
        <i class="fa fa-search"></i>
        <input type="text" class="form-control" placeholder="axtar">
        <button class="btn btn-success">Search</button>
    </div>
    <div class="panel__cordinate">
        <a href=""><i class="me-2 fa fa-home" aria-hidden="true"></i></a>
        <i class="me-2 fas fa-angle-right"></i>
        <span><a href="">Ümumi parametrlər</a></span>
    </div>
    <form method="post" action="{{Route('admin.phonesparametersupdate', ['id' => $phone->id])}}" enctype="multipart/form-data">
        @csrf
        <div class="panel__info">
            <label for="disabledTextInput" class="mt-3 form-label"></label>
            <input value="{{$phone->phone}}" type="text" id="disabledTextInput" name="phone" class="form-control">
        <button style="margin: 0 auto" class="d-block mt-4 btn btn-success">Nömrəni yenilə</button>
        </div>
    </form>
</div>
@endsection

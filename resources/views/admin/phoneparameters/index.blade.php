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
        @csrf
        <div class="panel__info">
            @foreach($allPhones as $key => $phone)
                <div class="label__block">
                    <label for="disabledTextInput" class="mt-3 form-label">Telefon {{$key+1}}</label>
                    <a href="{{route('admin.phonesparametersedit', ['id' => $phone->id])}}"><i class="ml-3 text-primary fa fa-pencil" aria-hidden="true"></i></a>
                    <a onclick="return confirm('Telefonu silmək istədiyinizdən əminsiniz?')" href="{{route('admin.phonesparameterdelete', ['id' => $phone->id])}}"><i class="ml-4 text-danger fa fa-trash" aria-hidden="true"></i></a>
                </div>
                <input disabled value="{{$phone->phone}}" type="text" id="disabledTextInput" name="{{$phone->id}}" class="form-control">
            @endforeach
            @if(session('success'))
                <div class="mt-3 alert alert-success">
                    {{session('success')}}
                </div>
            @endif
            @if(session('error'))
                <div class="mt-3 alert alert-danger">
                    {{session('error')}}
                </div>
            @endif
            <hr>
            <form method="post" action="{{Route('admin.phonesparametersadd')}}">
                @csrf
                <div class="label__block">
                    <label for="disabledTextInput" class="mt-3 form-label">Yeni telefon əlavə et</label>
                    <input value="" type="text" id="disabledTextInput" name="phone" class="form-control">
                </div>
                <button class="mt-3 btn btn-primary">
                    Əlavə et
                </button>
            </form>
            @if(session('addsuccess'))
                <div class="mt-3 alert alert-success">
                    {{session('addsuccess')}}
                </div>
            @endif
            @if(session('adderror'))
                <div class="mt-3 alert alert-danger">
                    {{session('adderror')}}
                </div>
            @endif
            @if(session('deletesuccess'))
                <div class="mt-3 alert alert-success">
                    {{session('deletesuccess')}}
                </div>
            @endif
            @if(session('deleterror'))
                <div class="mt-3 alert alert-danger">
                    {{session('deleterror')}}
                </div>
            @endif
        </div>
</div>
@endsection

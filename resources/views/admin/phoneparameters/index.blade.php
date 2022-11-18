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
                </div>
                <input value="{{$phone->phone}}" type="text" id="disabledTextInput" name="{{$phone->id}}" class="form-control">
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
        </div>
</div>
@endsection

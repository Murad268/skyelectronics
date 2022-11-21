@extends('admin.layouts.admin')
@include('_admin.layouts.child_category')
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
        <div style="width: 100%" class="panel__info">
            <form action="{{Route('admin.categories.update', ['id' => $el->id])}}" method="post">
                @csrf
                <label for="disabledTextInput" class="mt-4 form-label">Aid olduğu kateqoriya</label>
                <select class="form-select category__select" name="upid" id="">
                    <option value="0">Yeni bir kateqoriya</option>
                    @foreach($categories as $category)
                        <option {{$category->id == $el->upid?'selected':null}} value="{{$category->id}}">{{$category->cat__name}}</option>
                    @endforeach
                </select>
                <label for="disabledTextInput" class="mt-4 form-label">Kateqoriya adı</label>
                <input value="{{$category->cat__name}}" type="text" name="cat__name" id="disabledTextInput" class="form-control">
                <button class="mt-3 btn btn-success">Yeni kateqoriya əlavə elə</button>
            </form>
        </div>
</div>
@endsection

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
    <form method="post" action="{{Route('admin.faq.update', ['id' => $question->id])}}" enctype="multipart/form-data">
        @csrf
        <div class="panel__info">
            <label for="disabledTextInput" class="mt-3 form-label">Başlığı dəyiş</label>
            <input value="{{$question->title}}" type="text" id="disabledTextInput" name="title" class="form-control">
            <label for="disabledTextInput" class="mt-3 form-label">Sualı dəyiş</label>
            <input value="{{$question->desc}}" type="text" id="disabledTextInput" name="desc" class="form-control">
            <button class="mt-3 btn btn-success">Sualı dəyiş</button>
        </div>
    </form>
</div>
@endsection

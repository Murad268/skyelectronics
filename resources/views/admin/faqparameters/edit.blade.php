@extends('admin.layouts.admin')
@section('content')
<div class="panel">

    <div class="panel__cordinate">
        <a href=""><i class="me-2 fa fa-home" aria-hidden="true"></i></a>
        <i class="me-2 fas fa-angle-right"></i>
        <span><a href="">Sualı yeniləmək</a></span>
    </div>
    <form method="post" action="{{Route('admin.faq.update', ['id' => $question->id])}}" enctype="multipart/form-data">
        @csrf
        <div class="panel__info">
            <label for="disabledTextInput" class="mt-3 form-label">Başlığı dəyiş</label>
            <input value="{{$question->title}}" type="text" id="disabledTextInput" name="title" class="form-control @error('title') is-invalid @enderror">
                @error('title')
                    <div class="mt-3 alert alert-danger">{{ $message }}</div>
                @enderror
            <label for="disabledTextInput" class="mt-3 form-label">Sualı dəyiş</label>
            <input value="{{$question->desc}}" type="text" id="disabledTextInput" name="desc" class="form-control @error('desc') is-invalid @enderror">
                @error('desc')
                    <div class="mt-3 alert alert-danger">{{ $message }}</div>
                @enderror
            <button class="mt-3 btn btn-success">Sualı dəyiş</button>
        </div>
    </form>
</div>
@endsection

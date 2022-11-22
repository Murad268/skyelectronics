@extends('admin.layouts.admin')
@section('content')
<div class="panel">
    <div class="panel__cordinate">
        <a href=""><i class="me-2 fa fa-home" aria-hidden="true"></i></a>
        <i class="me-2 fas fa-angle-right"></i>
        <span><a href="">Firmanı yeniləmək</a></span>
    </div>
        <div class="panel__info">
        <form id="newcat" action="{{Route('admin.firms.update', ['id' => $firm->id])}}" enctype="multipart/form-data" method="post">
            @csrf
            <label for="disabledTextInput" class="mt-4 form-label">Firma şəkli</label>
            <input type="file" name="firm__logo" id="disabledTextInput" class="form-control">
            <label for="disabledTextInput" class="mt-4 form-label">Firma adı</label>
            <input value="{{$firm->firm__name}}" type="text" name="firm__name" id="disabledTextInput" class="form-control">
            <button class="mt-3 btn btn-success">Firmanı yenilə</button>
        </form>

</div>
@endsection

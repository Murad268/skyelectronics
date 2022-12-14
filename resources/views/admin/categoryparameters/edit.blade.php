@extends('admin.layouts.admin')

@section('content')
<div class="panel">
    <div class="panel__cordinate">
        <a href=""><i class="me-2 fa fa-home" aria-hidden="true"></i></a>
        <i class="me-2 fas fa-angle-right"></i>
        <span><a href="">kateqoriya yeniləmək</a></span>
    </div>
        <div style="width: 100%" class="panel__info">
            <form action="{{Route('admin.categories.update', ['id' => $el->id])}}" method="post">
                @csrf
                <label for="disabledTextInput" class="mt-4 form-label">Aid olduğu kateqoriya</label>
                <select class="form-select category__select @error('upid') is-invalid @enderror" name="upid" id="">
                    <option  value="0">Yeni bir kateqoriya</option>
                    @foreach($categories as $category)

                    @if($category->upid == 0)
                        <option {{$category->id == $el->upid?'selected':null}} value="{{$category->id}}">{{$category->cat__name}}</option>
                        @foreach($categories as $category1)
                        @if($category1->upid == $category->id)
                            <option disabled value="{{$category->id}}">{{$category1->cat__name}}</option>
                        @endif
                    @endforeach
                    @endif
                    @endforeach
                </select>
                @error('upid')
                    <div class="mt-3 alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="disabledTextInput" class="mt-4 form-label">Kateqoriya adı</label>
                <input value="{{$el->cat__name}}" type="text" name="cat__name" id="disabledTextInput" class="form-control @error('cat__name') is-invalid @enderror">
                @error('cat__name')
                    <div class="mt-3 alert alert-danger">{{ $message }}</div>
                @enderror
                <button class="mt-3 btn btn-success">Yeni kateqoriya əlavə elə</button>
            </form>
        </div>
</div>
@endsection

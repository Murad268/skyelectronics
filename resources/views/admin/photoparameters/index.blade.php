@extends('admin.layouts.admin')
@section('content')
<div class="panel">
    <div class="search">
        <form method="post" action="">
            @csrf
            <i class="fa fa-search"></i>
            <input name="catsearch" type="text" class="form-control" placeholder="axtar">
            <button class="btn btn-success">Search</button>
        </form>
    </div>
    <div class="panel__cordinate">
        <a href=""><i class="me-2 fa fa-home" aria-hidden="true"></i></a>
        <i class="me-2 fas fa-angle-right"></i>
        <span><a href="">Şəkil parametrləri</a></span>
    </div>
        <div style="width: 100%" class="panel__info">
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


        <div style="margin-bottom: 60px" class="photos__wrapper">

            @foreach($photos as $photo)
                <div class="photo__item">
                    <a href="{{route('admin.photos.delete', ['id' => $photo->id])}}"><i class="photo-delete fa fa-trash"></i></a>
                    @if($photo->main == 0)
                        <a title="Şəkli əsas şəkil elan elə" class="text-danger photo-main"  href="{{route('admin.photos.update', ['id' => $photo->id])}}"><i class="photo-main fa fa-bookmark"></i></a>
                    @else()
                        <a title="Şəkli əsas şəkil elan elə" class="text-success photo-main"  href="{{route('admin.photos.update', ['id' => $photo->id])}}"><i class="photo-main fa fa-bookmark"></i></a>
                    @endif()
                    <div class="photo__item__img">
                        <img src="{{asset('admin/assets/images/goods/'.$photo->good_img)}}" alt="">
                    </div>
                    <div class="photo__item__name">{{$photo->goods->goods_name}}</div>
                </div>
            @endforeach
        </div>

            <form action="{{Route('admin.photos.create')}}" method="post" enctype="multipart/form-data">
                @csrf
                <label for="disabledTextInput" class="form-label">Şəkli seç</label>
                <input type="file" name="good_img" class="form-control">
                <label for="disabledTextInput" class="mt-4 form-label">Məhsulu seç</label>
                <select name="good_id" data-live-search="true" data-live-search-style="startsWith" class="form-control selectpicker" aria-label="Default select example" >
                    @foreach($goods as $item)
                        <option value="{{$item->id}}">{{$item->goods_name}}</option>
                    @endforeach
                </select>
                <button class="mt-3 btn btn-success">Yeni şəkil əlavə et</button>
            </form>
        </div>
</div>


@endsection

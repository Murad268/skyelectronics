@extends('admin.layouts.admin')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
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
        <span><a href="">Məhsul parametrləri</a></span>
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
        <div class="col-12">
                <form id="newgoods" action="{{Route('admin.goods.update', ['id' => $el->id])}}" enctype="multipart/form-data" method="post">
                @csrf
                <label for="disabledTextInput" class="mt-4 form-label">Məhsul adı</label>
                <input value="{{$el->goods_name}}" type="text" name="goods_name" id="disabledTextInput" class="form-control @error('goods_name') is-invalid @enderror">
                    @error('goods_name')
                        <div class="mt-3 alert alert-danger">{{ $message }}</div>
                    @enderror
                <label for="disabledTextInput" class="mt-4 form-label">Məhsul sayı</label>
                <input type="number" value="{{$el->goods__count}}" name="goods__count" id="disabledTextInput" class="form-control @error('goods__count') is-invalid @enderror">
                    @error('goods__count')
                        <div class="mt-3 alert alert-danger">{{ $message }}</div>
                    @enderror
                <label for="disabledTextInput" class="mt-4 form-label">Məhsulun qiyməti</label>
                <input type="text" value="{{$el->goods_price}}" name="goods_price" id="disabledTextInput" class="form-control @error('goods_price') is-invalid @enderror">
                    @error('goods_price')
                        <div class="mt-3 alert alert-danger">{{ $message }}</div>
                    @enderror
                <label for="disabledTextInput" class="mt-4 form-label">Məhsul kateqoriyası</label>
                <select name="goods__category" class="form-select" aria-label="Default select example">
                @foreach($categories as $category)
                    @if($category->upid == 0)
                        <option disabled value="{{$category->id}}">{{$category->cat__name}}</option>
                        @foreach($categories as $category1)
                            @if($category1->upid == $category->id)
                                <option {{$category1->id == $el->goods__category?'selected':null}} value="{{$category1->id}}">{{$category1->cat__name}}</option>
                            @endif
                        @endforeach
                    @endif
                    @endforeach
                </select>
                <label for="disabledTextInput" class="mt-4 form-label">Məhsul firması</label>
                <select name="goods__firm" class="form-select" aria-label="Default select example">
                    @foreach($firms as $firm)
                        <option {{$firm->id == $el->goods__firm?'selected':null}} value="{{$firm->id}}">{{$firm->firm__name}}</option>
                    @endforeach
                </select>
                <label for="disabledTextInput" class="mt-4 form-label">Tagları seç</label>
                <select style="width: 100%;" class="js-example-basic-single" multiple="multiple" name="tags[]">
                    @foreach($tags as $tag)
                        <option {{ str_contains($el->tags, $tag->id)  ? "selected" : "" }} value="{{$tag->id}}">{{$tag->tag__name}}</option>
                    @endforeach
                </select>
                <label for="disabledTextInput" class="mt-4 form-label">Aylıq faiz</label>
                <input type="number" value="{{$el->percent}}" name="percent" id="disabledTextInput" class="form-control  @error('percent') is-invalid @enderror">
                    @error('percent')
                        <div class="mt-3 alert alert-danger">{{ $message }}</div>
                    @enderror
                <label for="disabledTextInput" class="mt-4 form-label">Rəngi seç</label>
                <select name="color_id" class="form-select" aria-label="Default select example">
                    @foreach($colors as $color)
                        <option value="{{$color->id}}">{{$color->color_name}}</option>
                    @endforeach
                </select>

                <label for="disabledTextInput" class="mt-4 form-label">Nəğd ödəniş endirimi</label>
                <input value="{{$el->cashdicount}}" name="cashdicount" type="number" name="firm__name" id="disabledTextInput" class="form-control @error('cashdicount') is-invalid @enderror">
                    @error('cashdicount')
                        <div class="mt-3 alert alert-danger">{{ $message }}</div>
                    @enderror
                <button class="mt-3 btn btn-success">Məhsulu yenilə</button>
            </form>
        </div>
               </div>
        </div>
</div>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
@endsection

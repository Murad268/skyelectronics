@extends('admin.layouts.admin')
@section('content')
<div class="panel">
    <div class="search">
        <form method="post" action="{{route('admin.goods.search')}}">
            @csrf
            <i class="fa fa-search"></i>
            <input name="catsearch" type="text" class="form-control" placeholder="axtar">
            <button class="btn btn-success">Search</button>
        </form>
    </div>
    <div class="panel__cordinate">
        <a href=""><i class="me-2 fa fa-home" aria-hidden="true"></i></a>
        <i class="me-2 fas fa-angle-right"></i>
        <span><a href="">Firma parametrləri</a></span>
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
            <a href="#newgoods" class="btn btn-primary">Yeni məhsul əlavə elə</a>
                   <div class="card goods__section">
                           <div class="mt-5 table-responsive">
                               <table class="table mb-5">
                                   <thead class="thead-light">
                                       <tr>
                                           <th>
                                               <label class="customcheckbox m-b-20">
                                                   <input type="checkbox" id="mainCheckbox">
                                                   <span class="checkmark"></span>
                                               </label>
                                           </th>
                                           <th scope="col">Məhsul şəkli</th>
                                           <th scope="col">Məhsul adı</th>
                                           <th scope="col">Məhsul qiyməti</th>
                                           <th scope="col">Məhsul sayı</th>
                                           <th scope="col">Məhsul Kateqoriyası</th>
                                           <th scope="col">Məhsul firması</th>
                                           <th scope="col">Baxış sayı</th>
                                           <th scope="col">Taglar</th>
                                           <th scope="col">Nəğd ödəniş endirimi</th>
                                           <th scope="col"></th>
                                           <th scope="col"></th>
                                       </tr>
                                   </thead>
                                   <tbody class="customtable">
                                        @foreach($goods as $item)
                                            <tr style="color: blue;">
                                                <th>
                                                    <label class="customcheckbox">
                                                        <input type="checkbox" class="listCheckbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </th>
                                                <th></th>
                                                <td>{{$item->goods_name}}</td>
                                                <td>{{$item->goods_price}}</td>
                                                <td>{{$item->goods__count}}</td>
                                                <td>{{$item->categories->cat__name}}</td>
                                                <td>{{$item->firms->firm__name}}</td>
                                                <td>{{$item->views}}</td>
                                                <td>{{$item->tags}}</td>
                                                <td>{{$item->cashdicount}}</td>
                                                <td><a class="text-primary" href="{{route('admin.goods.edit', ['id' => $item->id])}}"><i class="fa fa-pencil"></i></a></td>
                                                <td><a onclick="return confirm('Kateqoriyanı silmək istədiyinizdən əminsiiniz?')" class="text-danger" href=""><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                        @endforeach
                                   </tbody>
                               </table>
                               {{$goods->appends(['_token' => request()->_token, 'catsearch' => request()->catsearch])->links("pagination::bootstrap-5")}}
                           </div>
                           <hr>
                           <form id="newgoods" action="{{Route('admin.goods.store')}}" enctype="multipart/form-data" method="post">
                            @csrf
                            <label for="disabledTextInput" class="mt-4 form-label">Məhsul adı</label>
                            <input type="text" name="goods_name" id="disabledTextInput" class="form-control">
                            <label for="disabledTextInput" class="mt-4 form-label">Məhsul sayı</label>
                            <input type="number" name="goods__count" id="disabledTextInput" class="form-control">
                            <label for="disabledTextInput" class="mt-4 form-label">Məhsulun qiyməti</label>
                            <input type="number" name="goods_price" id="disabledTextInput" class="form-control">
                            <label for="disabledTextInput" class="mt-4 form-label">Məhsul kateqoriyası</label>
                            <select name="goods__category" class="form-select" aria-label="Default select example">
                            @foreach($categories as $category)
                                @if($category->upid == 0)
                                    <option disabled value="{{$category->id}}">{{$category->cat__name}}</option>
                                    @foreach($categories as $category1)
                                        @if($category1->upid == $category->id)
                                            <option value="{{$category->id}}">{{$category1->cat__name}}</option>
                                        @endif
                                    @endforeach
                                @endif
                             @endforeach
                            </select>
                            <label for="disabledTextInput" class="mt-4 form-label">Məhsul firması</label>
                            <select name="goods__firm" class="form-select" aria-label="Default select example">
                                @foreach($firms as $firm)
                                    <option value="{{$firm->id}}">{{$firm->firm__name}}</option>
                                @endforeach
                            </select>
                            <label for="disabledTextInput" class="mt-4 form-label">Nəğd ödəniş endirimi</label>
                            <input name="cashdicount" type="number" name="firm__name" id="disabledTextInput" class="form-control">
                            <button class="mt-3 btn btn-success">Yeni məhsul əlavə elə</button>
                        </form>
                   </div>


               </div>
        </div>

</div>
@endsection

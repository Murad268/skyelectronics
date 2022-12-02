@extends('admin.layouts.admin')
@section('content')
<div class="panel">
    <div class="search">
        <form method="post" action="{{route('admin.categories.search')}}">
            @csrf
            <i class="fa fa-search"></i>
            <input name="catsearch" type="text" class="form-control" placeholder="axtar">
            <button class="btn btn-success">Axtar</button>
        </form>
    </div>
    <div class="panel__cordinate">
        <a href=""><i class="me-2 fa fa-home" aria-hidden="true"></i></a>
        <i class="me-2 fas fa-angle-right"></i>
        <span><a href="">Kateqoriya parametrləri</a></span>
    </div>
        <div style="width: 100%" class="panel__info">
        <a class="btn btn-primary" href="#newcat">Yeni kateqoriya əlavə elə</a>
        <div class="row">
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
               <div class="col-12">
                   <div class="card">
                           <div class="mt-5 table-responsive">
                               <table class="table">
                                   <thead class="thead-light">
                                       <tr>
                                           <th>
                                               <label class="customcheckbox m-b-20">
                                                   <input type="checkbox" id="mainCheckbox">
                                                   <span class="checkmark"></span>
                                               </label>
                                           </th>
                                           <th scope="col">Kateqoriya Kodu</th>
                                           <th scope="col">Kateqoriya Adı</th>
                                           <th scope="col"></th>
                                           <th scope="col"></th>
                                       </tr>
                                   </thead>
                                   <tbody class="customtable">
                                   @foreach($categories as $category)
                                    @if($category->upid == 0)
                                        <tr style="color: blue;">
                                            <th>
                                                <label class="customcheckbox">
                                                    <input type="checkbox" class="listCheckbox">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </th>
                                            <td>{{$category->id}}</td>
                                            <td>{{$category->cat__name}}</td>
                                            <td><a class="text-primary" href="{{route('admin.categories.edit', ['id' => $category->id])}}"><i class="fa fa-pencil"></i></a></td>
                                            <td><a onclick="return confirm('Kateqoriyanı silmək istədiyinizdən əminsinizmi?')" class="text-danger" href="{{route('admin.categories.delete', ['id' => $category->id])}}"><i class="fa fa-trash"></i></a></td>
                                        </tr>
                                        @foreach($categories as $category1)
                                            @if($category1->upid == $category->id)
                                            <tr>
                                                <th>
                                                    <label class="customcheckbox">
                                                        <input type="checkbox" class="listCheckbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </th>
                                                <td>{{$category1->id}}</td>
                                                <td>{{$category1->cat__name}}</td>
                                                <td><a class="text-primary" href="{{route('admin.categories.edit', ['id' => $category->id])}}"><i class="fa fa-pencil"></i></a></td>
                                                <td><a onclick="return confirm('Kateqoriyanı silmək istədiyinizdən əminsiiniz?')" class="text-danger" href="{{route('admin.categories.delete', ['id' => $category->id])}}"><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                            @endif
                                        @endforeach
                                    @endif
                                    @endforeach
                                   </tbody>
                               </table>
                           </div>
                   </div>
               </div>
        </div>
        <hr>
        <form id="newcat" action="{{Route('admin.categories.create')}}" method="post">
            @csrf
            <label for="disabledTextInput" class="mt-4 form-label">Aid olduğu kateqoriya</label>
            <select class="form-select" name="upid" id="">
                <option value="0">Yeni bir kateqoriya</option>
                @foreach($catlist as $category)
                @if($category->upid == 0)
                    <option value="{{$category->id}}">{{$category->cat__name}}</option>
                    @foreach($catlist as $category1)
                    @if($category1->upid == $category->id)
                        <option disabled value="{{$category->id}}">{{$category1->cat__name}}</option>
                    @endif
                @endforeach
                @endif
                @endforeach
            </select>
            <label for="disabledTextInput" class="mt-4 form-label">Kateqoriya adı</label>
            <input type="text" name="cat__name" id="disabledTextInput" class="form-control">
            <button class="mt-3 btn btn-success">Yeni kateqoriya əlavə elə</button>
        </form>
        </div>
</div>
@endsection

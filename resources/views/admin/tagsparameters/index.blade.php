@extends('admin.layouts.admin')
@section('content')
<div class="panel">
    <div class="search">
        <form method="post" action="{{Route('admin.tags.search')}}">
            @csrf
            <i class="fa fa-search"></i>
            <input name="catsearch" type="text" class="form-control" placeholder="axtar">
            <button class="btn btn-success">Search</button>
        </form>
    </div>
    <div class="panel__cordinate">
        <a href=""><i class="me-2 fa fa-home" aria-hidden="true"></i></a>
        <i class="me-2 fas fa-angle-right"></i>
        <span><a href="">Tag parametrləri</a></span>
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
            <a href="#newgoods" class="btn btn-primary">Yeni Tag əlavə elə</a>
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
                                           <th scope="col">Tag Adı</th>
                                           <th scope="col"></th>
                                       </tr>
                                   </thead>
                                   <tbody class="customtable">
                                        @foreach($tags as $item)
                                            <tr style="color: blue;">
                                                <th>
                                                    <label class="customcheckbox">
                                                        <input type="checkbox" class="listCheckbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </th>
                                                <td>{{$item->tag__name}}</td>
                                                <td><a onclick="return confirm('Tagı silmək istədiyinizdən əminsiiniz?')" class="text-danger" href="{{route('admin.tags.delete', ['id' => $item->id])}}"><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                        @endforeach
                                   </tbody>
                               </table>
                               {{$tags->appends(['_token' => request()->_token, 'catsearch' => request()->catsearch])->links("pagination::bootstrap-5")}}
                           </div>
                           <hr>
                           <form id="newgoods" action="{{Route('admin.tags.store')}}" enctype="multipart/form-data" method="post">
                            @csrf
                            <label for="disabledTextInput" class="mt-4 form-label">Tag adı</label>
                            <input type="text" name="tag__name" id="disabledTextInput" class="form-control">

                            <button class="mt-3 btn btn-success">Yeni Tag əlavə elə</button>
                        </form>
                   </div>


               </div>
        </div>

</div>
@endsection

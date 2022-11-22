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

        <div class="panel__info">

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
                                           <th scope="col">Firma Şəkli</th>
                                           <th scope="col">Firma Adı</th>
                                           <th scope="col"></th>
                                           <th scope="col"></th>
                                       </tr>
                                   </thead>
                                   <tbody class="customtable">
                                        @foreach($firms as $firm)
                                            <tr style="color: blue;">
                                                <th>
                                                    <label class="customcheckbox">
                                                        <input type="checkbox" class="listCheckbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </th>
                                                <td class="img_class"><img src="{{asset(asset($firm->img($firm->firm__logo).$firm->firm__logo))}}" alt=""></td>
                                                <th>{{$firm->firm__name}}</th>
                                                <td><a class="text-primary" href="{{route('admin.firms.edit', ['id' => $firm->id])}}"><i class="fa fa-pencil"></i></a></td>
                                                <td><a onclick="return confirm('Kateqoriyanı silmək istədiyinizdən əminsiiniz?')" class="text-danger" href="{{route('admin.firms.delete', ['id' => $firm->id])}}"><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                        @endforeach

                                   </tbody>
                               </table>
                           </div>
                           <hr>
                           <form id="newcat" action="{{Route('admin.firms.store')}}" enctype="multipart/form-data" method="post">
                            @csrf

                            <label for="disabledTextInput" class="mt-4 form-label">Firma şəkli</label>
                            <input type="file" name="firm__logo" id="disabledTextInput" class="form-control">
                            <label for="disabledTextInput" class="mt-4 form-label">Firma adı</label>
                            <input type="text" name="firm__name" id="disabledTextInput" class="form-control">
                            <button class="mt-3 btn btn-success">Yeni firma əlavə elə</button>
                        </form>
                   </div>


               </div>
        </div>

</div>
@endsection

@extends('admin.layouts.admin')
@section('content')
<div class="panel">
    <div class="search">
        <form method="post" action="{{route('admin.firms.search')}}">
            @csrf
            <i class="fa fa-search"></i>
            <input name="catsearch" type="text" class="form-control" placeholder="axtar">
            <button class="btn btn-success">Axtar</button>
        </form>
    </div>
    <div class="panel__cordinate">
        <a href=""><i class="me-2 fa fa-home" aria-hidden="true"></i></a>
        <i class="me-2 fas fa-angle-right"></i>
        <span><a href="">Firma parametrləri</a></span>
    </div>

        <div class="panel__info">
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
            <a href="#newfirm" class="btn btn-primary">Yeni firma əlavə elə</a>
                   <div class="card">
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
                                                <td><a onclick="return confirm('Firmanı silmək istədiyinizdən əminsiiniz?')" class="text-danger" href="{{route('admin.firms.delete', ['id' => $firm->id])}}"><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                        @endforeach

                                   </tbody>
                               </table>
                               {{$firms->appends(['_token' => request()->_token, 'catsearch' => request()->catsearch])->links("pagination::bootstrap-5")}}
                           </div>
                           <hr>
                           <form id="newfirm" action="{{Route('admin.firms.store')}}" enctype="multipart/form-data" method="post">
                            @csrf

                            <label for="disabledTextInput" class="mt-4 form-label">Firma şəkli</label>
                            <input type="file" name="firm__logo" id="disabledTextInput" class="form-control @error('firm__logo') is-invalid @enderror">
                            @error('firm__logo')
                                <div class="mt-3 alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label for="disabledTextInput" class="mt-4 form-label">Firma adı</label>
                            <input type="text" name="firm__name" id="disabledTextInput" class="form-control @error('firm__name') is-invalid @enderror">
                            @error('firm__name')
                                <div class="mt-3 alert alert-danger">{{ $message }}</div>
                            @enderror
                            <button class="mt-3 btn btn-success">Yeni firma əlavə elə</button>
                        </form>
                   </div>


               </div>
        </div>

</div>
@endsection

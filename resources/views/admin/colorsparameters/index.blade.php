@extends('admin.layouts.admin')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
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
        <span><a href="">Rəng parametrləri</a></span>
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
            <a href="#newgoods" class="btn btn-primary">Yeni rəng əlavə elə</a>
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
                                           <th scope="col">Rəng</th>

                                           <th scope="col"></th>
                                       </tr>
                                   </thead>
                                   <tbody class="customtable">





                                    @foreach($colors as $color)

                                    <tr style="color: blue;">
                                        <th>
                                            <label class="customcheckbox">
                                                <input type="checkbox" class="listCheckbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </th>

                                        <td style="background-color: {{$color->color}}; font-weight: 800; color: white">{{$color->color_name}}</td>


                                        <td><a onclick="return confirm('Rəngi silmək istədiyinizdən əminsiiniz?')" class="text-danger" href="{{route('admin.colors.delete', ['id' => $color->id])}}"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                                    @endforeach

                                   </tbody>
                               </table>
                           </div>
                           <hr>
                           <form id="newgoods" action="{{Route('admin.colors.store')}}" enctype="multipart/form-data" method="post">
                            @csrf
                            <label for="disabledTextInput" class="mt-4 form-label">Rəng adı</label>
                            <input type="text" name="color_name" id="disabledTextInput" class="form-control">
                            <label for="disabledTextInput" class="mt-4 form-label">Rəng</label>
                            <input type="text" name="color" id="disabledTextInput" class="form-control">
                            <button class="mt-3 btn btn-success">Yeni rəng əlavə elə</button>
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

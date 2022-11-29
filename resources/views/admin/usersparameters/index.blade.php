@extends('admin.layouts.admin')
@section('content')
<div class="panel">
    <div class="search">
        <form method="get" action="{{Route('admin.users.search')}}">
            <i class="fa fa-search"></i>
            <input name="userssearch" type="text" class="form-control" placeholder="axtar">
            <button class="btn btn-success">Axtar</button>
        </form>
    </div>
    <div class="panel__cordinate">
        <a href=""><i class="me-2 fa fa-home" aria-hidden="true"></i></a>
        <i class="me-2 fas fa-angle-right"></i>
        <span><a href="">İstifadəçi parametrləri</a></span>
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
                                           <th scope="col">İstifadəçi Adı</th>
                                           <th scope="col">İstifadəçi Emaili</th>
                                           <th scope="col">İstifadəçi statusu</th>
                                           <th scope="col">Qeydiyyat tarixi</th>
                                           <th scope="col">Blokla</th>
                                       </tr>
                                   </thead>
                                   <tbody class="customtable">
                                           @foreach($users as $user)
                                            <tr style="color: blue;">
                                                    <th>
                                                        <label class="customcheckbox">
                                                            <input type="checkbox" class="listCheckbox">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </th>
                                                    <td>{{$user->name}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <td style="padding: 20px">
                                                        @if($user->admin==1)
                                                            <span class="badge bg-primary">Admin</span>
                                                        @else
                                                            <a onclick="return confirm('istifadəçini admin elan etmək istədiyinizdən əminsiiniz?')" href="{{route('admin.users.addadmin', ['id' => $user->id])}}"><span class="badge bg-success">Adi istifadəçi(admin elan elə)</span></a>
                                                        @endif
                                                    </td>
                                                    <td>{{$user->created_at}}</td>
                                                    <td>
                                                        @if($user->admin !== 1)
                                                            @if($user->block == 0)
                                                                <a class="btn btn-danger" href="{{route('admin.users.block', ['id' => $user->id])}}">Blokla</a>
                                                            @else
                                                                <a class="btn btn-primary" href="{{route('admin.users.removeblock', ['id' => $user->id])}}">Blokdan çıxart</a>
                                                            @endif
                                                        @else
                                                            <div class="btn btn-danger" href="">Bu admindir</div>
                                                        @endif
                                                    </td>
                                                </tr>
                                           @endforeach
                                   </tbody>
                               </table>
                               {{$users->appends(['userssearch' => request()->userssearch])->links("pagination::bootstrap-5")}}
                           </div>
                   </div>
               </div>
        </div>
</div>
@endsection

@extends('admin.layouts.admin')

@section('content')
       <div class="panel">
       <div class="search">
            <form action="{{route('admin.orderssearch')}}" method="post">
                @csrf
                <i class="fa fa-search"></i>
                <input name="orderssearch" type="text" class="form-control" placeholder="axtar">
                <button class="btn btn-success">Axtar</button>
            </form>
        </div>
        <div class="content">
        <div class="container">
        <div class="panel__cordinate">
            <a href=""><i class="me-2 fa fa-home" aria-hidden="true"></i></a>
            <i class="me-2 fas fa-angle-right"></i>
            <span><a href="">sifarişlər</a></span>
        </div>
      </div>

        @if($orders->count() > 0)
        <div class="mt-5 d-flex justify-content-center row">
            <div class="col-md-12">
                <div class="rounded">
                    <div class="table-responsive table-borderless">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Sifariş kodu</th>
                                    <th>Məbləğ</th>
                                    <th>Status</th>
                                    <th>Sifariş tarixi</th>
                                    <th>Çatdırılma taxixi</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="table-body">
                                @foreach($orders as $order)

                                <tr class="cell-1">
                                    <td>{{$order->order_code}}</td>
                                    <td>{{$order->tota_price}} AZN</td>
                                    <td>
                                        @if($order->status == 0)
                                            <span class="badge bg-primary">Gözləmədə</span>
                                        @elseif($order->status == 1)
                                            <span class="badge bg-success">Tamamlanıb</span>
                                        @else
                                            <span class="badge bg-danger">Ləğv edilib</span>
                                        @endif
                                    </td>
                                    <td>{{$order->created_at}}</td>
                                    <td>{{date('Y-m-d', $order->delt_date)}} {{$order->delt_time}}</td>

                                    <td>
                                        @if($order->status != 0)
                                            <button disabled class="btn btn-danger">Bu sifarişi tamamlamaq olmaz</button>
                                        @else
                                            <a onclick="return confirm('sifariş artıq çatdırılıb?')" href="{{route('user.orderfinish', ['id' => $order->id])}}" class="btn btn-primary">Tamamla</a>
                                        @endif
                                    </td>
                                    <th>
                                        @if($order->status == 1)
                                            <a onclick="return confirm('Sifarişi silmək istədiyinizdən əminsinizmi?')" href="{{route('user.deleteorder', ['id' => $order->id])}}" class="btn btn-warning">Sil</a>
                                        @elseif($order->status == 2)
                                            <a onclick="return confirm('Sifarişi silmək istədiyinizdən əminsinizmi?')" href="{{route('user.deleteorder', ['id' => $order->id])}}" class="btn btn-warning">Sil</a>
                                        @else
                                            <button disabled class="btn btn-warning">Bu sifarişi silmək olmur</button>
                                        @endif
                                    </th>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
                {{$orders->appends(['orderssearch' => request()->orderssearch])->links("pagination::bootstrap-5")}}
            </div>
        </div>
        @else
        <div class="mt-5  alert alert-warning" role="alert">
            Hazırda sifarişlər yoxdur
        </div>
        @endif

   </div>
       </div>

@endsection


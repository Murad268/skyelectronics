
   @extends('front.layouts.front')
   @section('content')


   <div class="content">
      <div class="container">
         <div class="good__content__top">
            <a href="">ana səhifə</a> >>> <a href="">sifarişlərim</a>
         </div>
         <h2 class="mt-2 about__subtitle">Sifarişlərim</h2>
      </div>

         <div class="d-flex justify-content-center row">
            <div class="col-md-10">
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
                                    <th style="text-align: center"">Detallar</th>
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
                                    <td style="font-size: 24px; text-align: center"><a style="text-decoration: none; color: green" href="">⮚</a></td>
                                    <td>
                                        @if($order->status != 0)
                                            <button disabled class="btn btn-danger">Bu sifarişi ləğv etmək olmaz</button>
                                        @else
                                            <a onclick="return confirm('Sifarişi ləğv etmək istədiyinizdən əminsinizmi?')" href="{{route('user.cancelorder', ['id' => $order->id])}}" class="btn btn-danger">Ləğv et</a>
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
            </div>
        </div>

   </div>

   @endsection


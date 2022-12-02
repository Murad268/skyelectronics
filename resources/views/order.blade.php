ad: {{$name}} <br> <br>
soyad: {{$surname}} <br> <br>
ada adı: {{$fathername}} <br> <br>
telefon: {{$phone}} <br> <br>
qeyd: {{$desc}} <br> <br>
çatdırılacaq tarix: {{$date}} <br> <br>
çatdırılacaq saat: {{$time}} <br> <br>
şəhər: {{$city}} <br> <br>
rayon: {{$rayon}} <br> <br>
küçə: {{$street}} <br> <br>
şifariş metodu: @if($ordermeth == "cashpay") nəğd ödəniş @else kredit kartı ilə ödəniş @endif <br> <br>


@foreach($cart as $item)
    Məhsulun adı: {{$item->name}}; Məshulun sayı: {{$item->quantity}} ədəd; Məhsulun qiyməti: {{$item->price}} AZN; Nəğd alış endirimi: {{$item->cashdiscount}}; Yekun məbləğ {{($item->price-$item->cashdiscount) * $item->quantity}}<br> <br>
@endforeach

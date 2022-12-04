Sifarişiniz üçün təşəkkür edirik. Sifariş kodu: {{$order_code}} <br> <br>
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
@if(strlen($monthdur > 1))
    alış: kredit <br> <br>
    ay: {{$monthdur}} <br> <br>
    aylıq ödəniş: {{$monthprice}} AZN <br> <br>
    ümumi məbləğ: {{$monthdur * $monthprice}} AZN <br> <br>
@else
    alış: nəğd
@endif

@foreach($cart as $item)
    Məhsulun adı: {{$item->name}}; Məshulun sayı: {{$item->quantity}} ədəd; Məhsulun qiyməti: {{$item->price}} AZN; Nəğd alış endirimi: {{$item->cashdiscount}}; Yekun məbləğ {{($item->price-$item->cashdiscount) * $item->quantity}}<br> <br>
@endforeach

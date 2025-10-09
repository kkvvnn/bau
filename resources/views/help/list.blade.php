
@php
    $i = 1;
@endphp

<table style="border: 1px solid black;border-collapse: collapse;">
    <tr>
        <th style="border: 1px solid black;border-collapse: collapse;">№</th>
        <th style="border: 1px solid black;border-collapse: collapse;">Бренд</th>
        <th style="border: 1px solid black;border-collapse: collapse;">Название</th>
        <th style="border: 1px solid black;border-collapse: collapse;">РРЦ</th>
        <th style="border: 1px solid black;border-collapse: collapse;">На складе</th>
        <th style="border: 1px solid black;border-collapse: collapse;">Ед.изм.</th>
        <th style="border: 1px solid black;border-collapse: collapse;">Формат</th>
        <th style="border: 1px solid black;border-collapse: collapse;">Толщина</th>
        <th style="border: 1px solid black;border-collapse: collapse;">Поверхность</th>
        <th style="border: 1px solid black;border-collapse: collapse;">Цвет</th>
        <th style="border: 1px solid black;border-collapse: collapse;">Дизайн</th>
        <th style="border: 1px solid black;border-collapse: collapse;">Распродажа</th>
    </tr>
@foreach ($products as $product)



    <tr>
        <td style="border: 1px solid black;border-collapse: collapse; padding-left: 5px; padding-right: 5px">{{$i++}}</td>
        <td style="border: 1px solid black;border-collapse: collapse; padding-left: 5px; padding-right: 5px">{{$product->Producer_Brand}}</td>
{{--        <td>{{$product->Element_Code}}</td>--}}
        <td style="border: 1px solid black;border-collapse: collapse; padding-left: 5px; padding-right: 5px">{{$product->Name}}</td>
        <td style="border: 1px solid black;border-collapse: collapse; padding-left: 5px; padding-right: 5px">{{$product->RMPrice}}</td>
        <td style="border: 1px solid black;border-collapse: collapse; padding-left: 5px; padding-right: 5px">{{$product->balanceCount}}</td>
        <td style="border: 1px solid black;border-collapse: collapse; padding-left: 5px; padding-right: 5px">{{$product->MainUnit}}</td>
        <td style="border: 1px solid black;border-collapse: collapse; padding-left: 5px; padding-right: 5px">{{$product->Height}}x{{$product->Lenght}}</td>
        <td style="border: 1px solid black;border-collapse: collapse; padding-left: 5px; padding-right: 5px">{{$product->Thickness}}</td>
        <td style="border: 1px solid black;border-collapse: collapse; padding-left: 5px; padding-right: 5px">{{$product->Surface}}</td>
        <td style="border: 1px solid black;border-collapse: collapse; padding-left: 5px; padding-right: 5px">{{$product->Color}}</td>
        <td style="border: 1px solid black;border-collapse: collapse; padding-left: 5px; padding-right: 5px">{{$product->DesignValue}}</td>

        @if(($product->RMPriceOld && $product->RMPriceOld != $product->RMPrice))
            <td style="border: 1px solid black;border-collapse: collapse; padding-left: 5px; padding-right: 5px">Распродажа</td>
        @else
            <td style="border: 1px solid black;border-collapse: collapse; padding-left: 5px; padding-right: 5px"></td>
        @endif
    </tr>


@endforeach
</table>

<table>
    <thead>
    <tr>
        <th>Название</th>
        <th>Размер</th>
        <th>Цена РРЦ</th>
        <th>Цена на Авито</th>
        <th>Скидка на Авито</th>
        <th>Примечание</th>
        <th>Остаток в Казани</th>
        <th>Ед.изм.</th>
        <th>скидка до 10 тыс</th>
        <th>скидка 10-40 тыс</th>
        <th>скидка 40-100 тыс</th>
        <th>скидка от 100 тыс</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)

        @php
            $price_rrc = $product->RMPrice;
            $price_old = $product->RMPriceOld ?? 0;
            $brand = $product->Producer_Brand;
            $price = avito_price($price_rrc, $brand, $discounts, $price_old);

            $disc = avito_show_discount_2($product->Vivod, $price_rrc, $brand, $discounts, $price_old);

            if ($disc == 'Распродажа' || $disc == 'Вывод из ОА') {
                $prim = $disc;
                $skidka = '';
            } else {
                $prim = '';
                $skidka = $disc;
            }
        @endphp

        @php
            $Width = avito_bauservice_size($product->Height, 5, 200, $product->Name, 'W');
            $Length = avito_bauservice_size($product->Lenght, 5, 400, $product->Name, 'L');
        @endphp

        @php
            if ($disc != 'Распродажа' && $disc != 'Вывод из ОА' && $product->Producer_Brand == 'Laparet') {
                $sale_10 = '-';
                $sale_10_40 = '5';
                $sale_40_100 = '10';
                $sale_100 = '15';
            } else {
                $sale_10 = '';
                $sale_10_40 = '';
                $sale_40_100 = '';
                $sale_100 = '';
            }

            if (isset($product->kzn)) {
                $stock = round($product->kzn->balanceCount, 2);
            } else {
                $stock = 0;
            }

            $unit = $product->MainUnit;

        @endphp


        <tr>
            <td>{{ $product->Name }}</td>                            {{-- Id--}}
            <td>{{ $Width }}x{{ $Length }}</td>                            {{-- ManagerName--}}
            <td>{{ $product->RMPrice }}</td>                           {{-- ContactPhone--}}
            <td>{{ $price }}</td>                         {{-- Address--}}
            <td>{{ $skidka }}</td>                           {{-- Title--}}
            <td>{{ $prim }}</td>                           {{-- Title--}}
            <td>{{ $stock }}</td>                           {{-- Title--}}
            <td>{{ $unit }}</td>                           {{-- Title--}}
            <td>{{ $sale_10 }}</td>                           {{-- Title--}}
            <td>{{ $sale_10_40 }}</td>                     {{-- Description--}}
            <td>{{ $sale_40_100 }}</td>                           {{-- Price--}}
            <td>{{ $sale_100 }}</td>                                       {{-- VideoURL--}}
        </tr>
    @endforeach

{{-----------------------------------END-BAUSERVICE--------------------------}}

    </tbody>
</table>

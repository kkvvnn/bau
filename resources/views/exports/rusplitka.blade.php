<table>
    <thead>
    <tr>
        <th>id</th>
        <th>Артикул</th>
        <th>Название</th>
        <th>Цена ОПТ</th>
        <th>Цена РРЦ</th>
        <th>Остаток</th>
        <th>Бренд</th>
        <th>Свойство</th>
        <th>Поверхность</th>
        <th>Карвинг</th>
        <th>Страна</th>
        <th>Длина</th>
        <th>Ширина</th>
        <th>Толщина</th>
        <th>Ед.измерения</th>
        <th>currency</th>
        <th>Вес</th>
        <th>В упаковке штук</th>
        <th>В упаковке м2</th>
        <th>Склад Люберцы</th>
        <th>Склад Люберцы резерв</th>
        <th>Склад Бронницы</th>
        <th>Склад Бронницы резерв</th>
        <th>code</th>
        <th>collection_id</th>
        <th>picture</th>
        <th>url</th>
        <th>external_id</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)

        @php
            $carving = '';
            if (str_contains($product->name, 'arving') || str_contains($product->name, 'арвинг')) {
                $carving = '1';
            }
        @endphp

        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->articul }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->price_rozn }}</td>
            <td>{{ $product->rest_real_free }}</td>
            <td>{{ $product->brand_name }}</td>
            <td>{{ $product->svoystvo }}</td>
            <td>{{ $product->surface }}</td>
            <td>{{ $carving }}</td>
            <td>{{ $product->country_of_origin }}</td>
            <td>{{ $product->size_a }}</td>
            <td>{{ $product->size_b }}</td>
            <td>{{ $product->thickness }}</td>
            <td>{{ $product->unit }}</td>
            <td>{{ $product->currency }}</td>
            <td>{{ $product->weight }}</td>
            <td>{{ $product->in_pack_sht }}</td>
            <td>{{ $product->in_pack_m2 }}</td>
            <td>{{ $product->rest_skald_ljubercy }}</td>
            <td>{{ $product->rest_skald_ljubercy_rezerv }}</td>
            <td>{{ $product->rest_skald_bronnicy }}</td>
            <td>{{ $product->rest_skald_bronnicy_rezerv }}</td>
            <td>{{ $product->code }}</td>
            <td>{{ $product->collection_id }}</td>
            <td>{{ $product->picture }}</td>
            <td>{{ $product->url }}</td>
            <td>{{ $product->external_id }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

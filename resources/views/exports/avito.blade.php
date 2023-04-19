<table>
    <thead>
        <tr>
            <th>AvitoId</th>
            <th>Id</th>
            <th>ContactMethod</th>
            <th>EMail</th>
            <th>AvitoStatus</th>
            <th>ManagerName</th>
            <th>Price</th>
            <th>CompanyName</th>
            <th>Title</th>
            <th>ImageUrls</th>
            <th>GoodsSubType</th>
            <th>GoodsType</th>
            <th>Category</th>
            <th>ListingFee</th>
            <th>FinishingType</th>
            <th>ContactPhone</th>
            <th>Description</th>
            <th>Address</th>
            <th>AdType</th>
            <th>AvitoDateEnd</th>
            <th>FinishingSubType</th>
            <th>Condition</th>
            <th>VideoUrl</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)

        <!-- ----------------------------------------------- -->
        @php
        if(stripos($product->Name, 'Декор') !== false)
        $FinishingSubType = 'Другое';
        elseif(stripos($product->Name, 'Мозаика') !== false)
        $FinishingSubType = 'Мозаика';
        elseif(stripos($product->Name, 'Плитка') !== false)
        $FinishingSubType = 'Керамическая плитка';
        elseif(stripos($product->Name, 'Керамогранит') !== false)
        $FinishingSubType = 'Керамогранит';
        else
        $FinishingSubType = 'Другое';
        @endphp

        <!-- --------------------------------------------------------- -->

        @php
        $date_next_month = date('Y-m-d', mktime(0, 0, 0, date("m")+1, date("d"), date("Y")));
        $date_next_month .= 'T9:00:00+03:00';
        @endphp

        <!-- ------------------------------------------------------- -->

        @php
        $description = '<p>' . $product->Name . '. '
            . $product->Producer_Brand . ' ('
            . $product->Country_of_manufacture . ')</p>';
        $description .= '<p>Коллекция: ';
            $collections = $product->collections;
            foreach ($collections as $collection) {
            $description .= $collection->Collection_Name;
            $description .= '. ';
            }
            $description .= '</p>
        <ul>';
            $description .= '<li>Размер: ' . $product->Height .'x' . $product->Lenght . '</li>';

            if($product->Thickness != null && $product->Thickness != 0) {
            $description .= '<li>Толщина: ' . $product->Thickness . '</li>';
            }
            if($product->Place_in_the_Collection != null) {
            $description .= '<li>Место в коллекции: ' . $product->Place_in_the_Collection . '</li>';
            }
            if($product->DesignValue != null) {
            $description .= '<li>Рисунок: ' . $product->DesignValue . '</li>';
            }
            if($product->Color != null) {
            $description .= '<li>Цвет: ' . $product->Color . '</li>';
            }
            if($product->Cover != null) {
            $description .= '<li>Покрытие: ' . $product->Cover . '</li>';
            }
            if($product->Surface != null) {
            $description .= '<li>Поверхность: ' . $product->Surface . '</li>';
            }
            if($product->MainUnit != null) {
            $description .= '<li>Единица измерения товара: ' . $product->MainUnit . '</li>';
            }
            if($product->PCS_in_Package != null) {
            $description .= '<li>Штук в упаковке: ' . $product->PCS_in_Package . '</li>';
            }
            if($product->Package_Value != null && $product->Package_Value != $product->PCS_in_Package) {
            $description .= '<li>Кв. метров в упаковке: ' . $product->Package_Value . '</li>';
            }
            if($product->Producer_Brand != null) {
            $description .= '<li>Производитель: ' . $product->Producer_Brand . '</li>';
            }
            if($product->Country_of_manufacture != null) {
            $description .= '<li>Страна производства: ' . $product->Country_of_manufacture . '</li>';
            }

            $description .= '</ul>';


            @endphp
            <tr>
                <td></td>
                <td>{{ $product->Element_Code }}</td>
                <td>По телефону и в сообщениях</td>
                <td>kkvvnn89@gmail.com</td>
                <td>Активно</td>
                <td>Владимир</td>
                <td>{{ round($product->RMPrice * 0.9, -1) }}</td>
                <td>Напольные решения</td>
                <td>Laparet {{ $product->Name }}</td>
                <td>Картинка</td> <!-- -->
                <td>Отделка</td>
                <td>Стройматериалы</td>
                <td>Ремонт и строительство</td>
                <td>Package</td>
                <td>Плитка, керамогранит и мозаика</td>
                <td>+79373209953</td> <!-- -->
                <td>{{$description}}</td> <!-- -->
                <td>Москва</td>
                <td>Товар от производителя</td>
                <td>{{$date_next_month}}</td>
                <td>{{$FinishingSubType}}</td>
                <td>Новое</td>
                <td></td>
            </tr>
            @endforeach
    </tbody>
</table>
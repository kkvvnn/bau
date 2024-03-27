<table>
    <thead>
    <tr>
        {{--id--}}<th>ID товара</th>
        {{--name--}}<th>Название товара или услуги</th>
        {{--name in url--}}<th>Название товара в URL</th>
        {{--url--}}<th>URL</th>
        {{--short descrip--}}<th>Краткое описание</th>
        {{--description--}}<th>Полное описание</th>
        {{--visibly on vitrin--}}<th>Видимость на витрине</th>
        {{--sale use--}}<th>Применять скидки</th>
        {{--tag title--}}<th>Тег title</th>
        {{--meta-tag keywords--}}<th>Мета-тег keywords</th>
        {{--meta-tag descrip--}}<th>Мета-тег description</th>
        {{--place to site--}}<th>Размещение на сайте</th>
        {{--весов коэфф--}}<th>Весовой коэффициент</th>
        {{--валюта--}}<th>Валюта склада</th>
        {{--ндс--}}<th>НДС</th>
        {{--union--}}<th>Единица измерения</th>
        {{--габариты--}}<th>Габариты</th>
        {{--imgs--}}<th>Изображения</th>
        {{--videos--}}<th>Ссылка на видео</th>
        {{--Свойчтво: 1 уп--}}<th>Свойство: 1 уп.</th>
        {{--id варианта--}}<th>ID варианта</th>
        {{--артикул--}}<th>Артикул</th>
        {{--штрих-код--}}<th>Штрих-код</th>
        {{--id внешний--}}<th>Внешний ID</th>
        {{--габариты варианта--}}<th>Габариты варианта</th>
        {{--цена продажи--}}<th>Цена продажи</th>
        {{--old price--}}<th>Старая цена</th>
        {{--закупка--}}<th>Себестоимость</th>
        {{--остаток--}}<th>Остаток</th>
        {{--вес--}}<th>Вес</th>
        {{--imgs варианта--}}<th>Изображения варианта</th>
        {{--Тип цен--}}<th>Тип цен: При оплате картой</th>
        {{--Бренд--}}<th>Параметр: Бренд</th>
        {{--страна произв--}}<th>Параметр: Страна производства</th>
        {{--вес без упак--}}<th>Параметр: Вес без упаковки</th>
        {{--поверхность--}}<th>Параметр: Поверхность</th>
        {{--коллекция--}}<th>Параметр: Коллекция</th>
        {{--fat--}}<th>Параметр: Толщина</th>
        {{--размер--}}<th>Параметр: Размер</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)

        @php
            $img1 = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', config('app.url').'/storage/images/bauservice/products/', $product->Picture);

            if (isset($product->Picture2) && $product->Picture2 != null) {
            $img2 = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', config('app.url').'/storage/images/bauservice/products/', $product->Picture2);
            } else {$img2 = null;}
            if (isset($product->Picture3) && $product->Picture3 != null) {
            $img3 = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', config('app.url').'/storage/images/bauservice/products/', $product->Picture3);
            } else {$img3 = null;}
            if (isset($product->Picture4) && $product->Picture4 != null) {
            $img4 = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', config('app.url').'/storage/images/bauservice/products/', $product->Picture4);
            } else {$img4 = null;}
            if (isset($product->Picture5) && $product->Picture5 != null) {
            $img5 = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', config('app.url').'/storage/images/bauservice/products/', $product->Picture5);
            } else {$img5 = null;}
            if (isset($product->Picture6) && $product->Picture6 != null) {
            $img6 = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', config('app.url').'/storage/images/bauservice/products/', $product->Picture6);
            } else {$img6 = null;}

            if (isset($product->collections[0])) {
            $img_coll_all = $product->collections[0]->Interior_Pic;
            $img_coll_all = explode(', ', $img_coll_all);
            $img_coll = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', config('app.url').'/storage/images/bauservice/collections/', $img_coll_all[0]);
            } else {
            $img_coll = null;
            }


//            if (isset($img_coll_all[1])) {
//            $img_coll_2 = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', config('app.url').'/storage/images/bauservice/collections/', $img_coll_all[1]);
//            } else {
//            $img_coll_2 = null;
//            }


            if ($img_coll != null) {
                $img_full = $img_coll . ' ' . $img1;
            } else {
                $img_full = $img1;
            }


//            if ($img_coll != null) {
//            $img_full .= ' | ' . $img1;
//            }
//            if ($img_coll_2 != null) {
//            $img_full .= ' | ' . $img_coll_2;
//            }

            if ($img2 != null) {
            $img_full .= ' ' . $img2;
            }
            if ($img3 != null) {
            $img_full .= ' ' . $img3;
            }
            if ($img4 != null) {
            $img_full .= ' ' . $img4;
            }
            if ($img5 != null) {
            $img_full .= ' ' . $img5;
            }
            if ($img6 != null) {
            $img_full .= ' ' . $img6;
            }

        @endphp

        @php
            $fat = ($product->Thickness)?$product->Thickness:'';

            $square_in_one = explode(', ', $product->Package_Value)[0] / explode(', ', $product->PCS_in_Package)[0];
            $balance = floor($product->balanceCount / $square_in_one);

            $old_price = ($product->RMPriceOld)?$product->RMPriceOld:'';

            if ($product->Owner_Article) {
                $vendor_code = $product->Owner_Article;
            } else {
                $vendor_code = Str::replace('х', '', $product->Element_Code);
            }
        @endphp

        <tr>
            {{--id--}}<td>{{ Str::replace('х', '', $product->Element_Code) }}</td>
            {{--name--}}<td>{{ $product->Name }}</td>
            {{--name in url--}}<td>{{ Str::slug($product->Name) }}</td>
            {{--url--}}<td></td>
            {{--short descrip--}}<td>Краткое описание {{ $product->Name }}</td>
            {{--description--}}<td>Полное описание {{ $product->Name }}</td>
            {{--visibly on vitrin--}}<td>выставлен</td>
            {{--sale use--}}<td>да</td>
            {{--tag title--}}<td></td>
            {{--meta-tag keywords--}}<td></td>
            {{--meta-tag descrip--}}<td></td>
            {{--place to site--}}<td>{{ $catalog }}</td>
            {{--весов коэфф--}}<td></td>
            {{--валюта--}}<td>RUR</td>
            {{--ндс--}}<td>Без НДС</td>
            {{--union--}}<td>шт</td>
            {{--габариты--}}<td></td>
            {{--imgs--}}<td>{{ $img_full }}</td>
            {{--videos--}}<td></td>
            {{--Свойчтво: 1 уп--}}<td>{{ $product->Package_Value }} м2</td>
            {{--id варианта--}}<td></td>
            {{--артикул--}}<td>{{ $vendor_code }}</td>
            {{--штрих-код--}}<td></td>
            {{--id внешний--}}<td>{{ Str::replace('х', '', $product->Element_Code) }}</td>
            {{--габариты варианта--}}<td>{{$product->Lenght}}x{{$product->Height}}x{{$product->Thickness}}</td>
            {{--цена продажи--}}<td>{{ $product->RMPrice }}</td>
            {{--old price--}}<td>{{ $old_price }}</td>
            {{--закупка--}}<td>{{ $product->Price }}</td>
            {{--остаток--}}<td>{{ $balance }}</td>
            {{--вес--}}<td></td>
            {{--imgs варианта--}}<td></td>
            {{--Тип цен--}}<td></td>
            {{--Бренд--}}<td>{{ $product->Producer_Brand }}</td>
            {{--страна произв--}}<td>{{ $product->Country_of_manufacture }}</td>
            {{--вес без упак--}}<td></td>
            {{--поверхность--}}<td>{{ $product->Surface }}</td>
            {{--коллекция--}}<td>{{ $product->collections[0]->Collection_Name }}</td>
            {{--fat--}}<td>{{ $fat }}</td>
            {{--размер--}}<td>{{$product->Lenght}}x{{$product->Height}}</td>
        </tr>
    @endforeach
    </tbody>
</table>

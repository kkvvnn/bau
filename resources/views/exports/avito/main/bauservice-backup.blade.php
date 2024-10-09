{{-----BAUSERVICE-----}}
@foreach($products as $product)

    @php
        $title_name = $product->Name;
        if(stripos($title_name, 'литка') !== false
            || stripos($title_name, 'озаика') !== false
            || stripos($title_name, 'анно') !== false
            || stripos($title_name, 'ставка') !== false
            || stripos($title_name, 'ордюр') !== false
            || stripos($title_name, 'голок') !== false
            || stripos($title_name, 'линтус') !== false
        ) {
            $GoodsSubType = 'Отделка';
            $FinishingMaterialsType = 'Керамическая плитка и керамогранит';
            $CeramicPorcelainTilesSubType = 'Керамическая плитка';
            $Brand = $product->Producer_Brand;
            $TileType = avito_tile_type($title_name);
            $SpaceType = 'Балкон | Ванная | Крыльцо | Кухня | Общественное помещение | Ступени | Терасса | Туалет | Улица | Фартук | Фасад';
            $InstallationType = 'На пол | На стену';
            $Width = 'Ширина';
            $Length = 'Длина';
            $Height = '';
            $Pattern = $product->DesignValue;
            $Color = $product->Color;
        }
        elseif(stripos($title_name, 'ерамогранит') !== false) {
            $GoodsSubType = 'Отделка';
            $FinishingMaterialsType = 'Керамическая плитка и керамогранит';
            $CeramicPorcelainTilesSubType = 'Керамогранит';
            $Brand = '';
            $TileType = '';
            $SpaceType = '';
            $InstallationType = 'На пол | На стену';
            $Width = 'Ширина';
            $Length = 'Длина';
            $Height = 'Толщина';
            $Pattern = $product->DesignValue;
            $Color = $product->Color;
        } else {
            $GoodsSubType = 'Другое';
            $FinishingMaterialsType = '';
            $CeramicPorcelainTilesSubType = '';
            $Brand = '';
            $TileType = '';
            $SpaceType = '';
            $InstallationType = '';
            $Width = '';
            $Length = '';
            $Height = '';
            $Pattern = '';
            $Color = '';
        }



        $FlooringMaterialsSubType = '';
        $ExteriorFinishingDecorativeStoneSubType = '';
        $WallPanelsSlatsDecorativeElementsSubType = '';
        $MixesType = '';
        $Material = '';
        $OutsideUsage = '';
    @endphp

    @php
        $description = '';

        if($add_description_first != '') {
        $description .= '<p>'.nl2br($add_description_first).'</p>';
        }

        if ($product->Producer_Brand == 'Laparet') {
            $description .= '<p>Керамическая плитка и керамогранит Laparet , Лапарет. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены при покупке большого объема. Доставка по Москве, cамовывоз на западе Москвы.</p>';
        } elseif ($product->Producer_Brand == 'Cersanit') {
            $description .= '<p>Керамическая плитка и керамогранит Cersanit , Церсанит. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены при покупке большого объема. Доставка по Москве, cамовывоз на западе Москвы.</p>';
        } elseif ($product->Producer_Brand == 'Kerama Marazzi') {
            $description .= '<p>Керамическая плитка и керамогранит Kerama Marazzi , Керама Марацци. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены при покупке большого объема. Доставка по Москве, cамовывоз на западе Москвы.</p>';
        } elseif ($product->Producer_Brand == 'Vitra') {
            $description .= '<p>Керамическая плитка и керамогранит Vitra , Витра. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены при покупке большого объема. Доставка по Москве, cамовывоз на западе Москвы.</p>';
        } elseif ($product->Producer_Brand == 'Ceradim') {
            $description .= '<p>Керамическая плитка и керамогранит Ceradim , Керадим. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены при покупке большого объема. Доставка по Москве, cамовывоз на западе Москвы.</p>';
        } else {
            $description .= '<p>Керамическая плитка и керамогранит. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены при покупке большого объема. Доставка по Москве, cамовывоз на западе Москвы.</p>';
        }

        if ($product->Novinka == 1) {
            $description .= '<p>&#9889;Новинка&#9889; <strong>' . $product->Producer_Brand . ' ' . $product->Name .  ' ('
                . $product->Country_of_manufacture . ')</strong></p>';
        } else {
            $description .= '<p><strong>' . $product->Producer_Brand . ' ' . $product->Name .  ' ('
                . $product->Country_of_manufacture . ')</strong></p>';
        }

        if ($product->Element_Code == 'х9999293160') {
            $description .= '<p>--------------------</p>';
            $date = date('d.m.Y');
            $description .= '<p>&#9989; На утро '.$date.' есть в наличии </p>';
            $description .= '<p>--------------------</p>';
        } else {
            $description .= '<p>--------------------</p>';
            $date = date('d.m.Y');
            if ($product->balanceCount > 0) {
                $description .= '<p>&#9989; На утро '.$date.' остаток '.round($product->balanceCount, 2).' '.$product->MainUnit.' <em>(информация приблизительная, точную информацию о наличии спрашивайте у менеджера)</em></p>';
            }
            $description .= '<p>--------------------</p>';
        }

        $description .= '<p><em>Цена указана за 1 ' . $product->MainUnit . '</em></p>';

        $description .= '<p><strong>Коллекция: </strong>';
        $collections = $product->collections;
        foreach ($collections as $collection) {
              $description .= $collection->Collection_Name;
              $description .= '. ';
          }
        $description .= '</p><ul>';


        if ($product->Height != 0 && $product->Lenght != 0) {
           $description .= '<li><strong>Размер: </strong>' . $product->Height .'x' . $product->Lenght . '</li>';
        }
        if ($product->Thickness != null && $product->Thickness != 0) {
           $description .= '<li><strong>Толщина: </strong>' . $product->Thickness . '</li>';
        }
        if ($product->Place_in_the_Collection != null) {
           $description .= '<li><strong>Место в коллекции: </strong>' . $product->Place_in_the_Collection . '</li>';
        }
        if ($product->DesignValue != null) {
           $description .= '<li><strong>Рисунок: </strong>' . $product->DesignValue . '</li>';
        }
        if ($product->Color != null) {
           $description .= '<li><strong>Цвет: </strong>' . $product->Color . '</li>';
        }
        if ($product->Cover != null) {
           $description .= '<li><strong>Покрытие: </strong>' . $product->Cover . '</li>';
        }
        if ($product->Surface != null) {
           $description .= '<li><strong>Поверхность: </strong>' . $product->Surface . '</li>';
        }
        if ($product->MainUnit != null) {
           $description .= '<li><strong>Единица измерения товара: </strong>' . $product->MainUnit . '</li>';
        }
        if ($product->PCS_in_Package != null) {
           $description .= '<li><strong>Штук в упаковке: </strong>' . $product->PCS_in_Package . '</li>';
        }
        if ($product->Package_Value != null && $product->Package_Value != $product->PCS_in_Package) {
           $description .= '<li><strong>Кв. метров в упаковке: </strong>' . $product->Package_Value . '</li>';
        }
        if ($product->Producer_Brand != null) {
           $description .= '<li><strong>Производитель: </strong>' . $product->Producer_Brand . '</li>';
        }
        if ($product->Country_of_manufacture != null) {
           $description .= '<li><strong>Страна производства: </strong>' . $product->Country_of_manufacture . '</li>';
        }

        $description .= '</ul><br>';

        $description .= '<p>Наличие а также актуальные цены уточняйте у менеджера.</p>';
        $description .= '<p>В нашем шоуруме представлены коллекции многих других известных производителей керамогранита, керамической плитки, мозаики и других напольных покрытий (ламинат, паркет, кварцвинил, инженерная доска и др.)</p>';
        $description .= '<p>Работаем с розничными и оптовыми покупателями. А так же предлагаем сотрудничество дизайнерам и строительным компаниям.</p>';

        if ($add_description != '') {
            $description .= '<p>'.nl2br($add_description).'</p>';
        }

    @endphp

    @php
        $keywords = '';

        if (stripos($product->Name, 'екор') !== false) {
            $type = 'декор';
        } elseif (stripos($product->Name, 'озаика') !== false) {
            $type = 'мозаика';
        } elseif (stripos($product->Name, 'литка') !== false) {
            $type = 'керамическая плитка';
        } elseif (stripos($product->Name, 'ерамогранит') !== false) {
            $type = 'керамогранит';
        } else {
            $type = '';
        }

        if ((stripos($product->Field_of_Application, 'пол') !== false) && (stripos($product->Field_of_Application, 'ван') !== false)) {
            $naznachenie = $type . ' для пола ' . $type . ' для ванной комнаты';
        } elseif (stripos($product->Field_of_Application, 'пол') !== false) {
            $naznachenie = $type . ' для пола';
        } elseif (stripos($product->Field_of_Application, 'ван') !== false) {
            $naznachenie = $type . ' для ванной комнаты';
        } else {
            $naznachenie = '';
        }

        $keywords .= $naznachenie . ' ';

        if (stripos($product->DesignValue, 'Дерев') !== false) {
            $pod = $type . ' под дерево';
        } elseif (stripos($product->DesignValue, 'рамор') !== false) {
            $pod = $type . ' под мрамор';
        } elseif (stripos($product->DesignValue, 'амен') !== false) {
            $pod = $type . ' под камень';
        } elseif (stripos($product->DesignValue, 'етон') !== false) {
            $pod = $type . ' под бетон';
        } elseif (stripos($product->DesignValue, 'никс') !== false) {
            $pod = $type . ' под оникс';
        } else {
            $pod = '';
        }

        $keywords .= $pod . ' ';

        $lenght = round((float)str_replace(',', '.', $product->Lenght), 0, PHP_ROUND_HALF_EVEN);
        $height = round((float)str_replace(',', '.', $product->Height), 0, PHP_ROUND_HALF_EVEN);

        $size = '';
        $size .= $type . ' ' . $lenght . 'х' . $height . ' ';
        if ($lenght != $height) {
            $size .= $type . ' ' . $height . 'х' . $lenght . ' ';
        }
        $size .= $type . ' ' . $lenght . '*' . $height . ' ';
        if ($lenght != $height) {
            $size .= $type . ' ' . $height . '*' . $lenght . ' ';
        }

        if ($product->Height != 0 && $product->Lenght != 0) {
            $keywords .= $size;
        }

        if ($product->Producer_Brand == 'Laparet') {
            $keywords .= $type . ' лапарет ';
        } elseif ($product->Producer_Brand == 'Cersanit') {
            $keywords .= $type . ' церсанит ';
        } elseif ($product->Producer_Brand == 'Vitra') {
            $keywords .= $type . ' витра ';
        } elseif ($product->Producer_Brand == 'Ceradim') {
            $keywords .= $type . ' керадим ';
        } elseif ($product->Producer_Brand == 'Kerama Marazzi') {
            $keywords .= $type . ' керама марацци ';
        }


        $surface = $product->Surface;
        $surf = '';

        if ($surface != null) {
            if ($type == 'мозаика' || $type == 'керамическая плитка') {
                $surf = $surface;
            }
            if ($type == 'керамогранит') {
                $surf = str_replace('ая', 'ый', $surface);
            }
        }

        $keywords .= $type . ' ' .mb_strtolower($surf) . ' ';


        if (stripos($product->Architectural_surface, 'Стена') !== false) {
            $keywords .= $type . ' для стен' . ' ';
        }
        if (stripos($product->Architectural_surface, 'Пол') !== false) {
            $keywords .= $type . ' для пола' . ' ';
        }

        $keywords .= ' плитка керамическая плитка ';

        $color_baza = $product->Color;
        $color = '';

        if ($color_baza != null) {
            if ($type == 'мозаика' || $type == 'керамическая плитка') {
                $color = str_replace('ый', 'ая', $color_baza);
                $color = str_replace('ой', 'ая', $color);
                $color = str_replace('ий', 'яя', $color);
            }
            if ($type == 'керамогранит') {
                $color = $color_baza;
            }
        }
        $keywords .= $type . ' ' .mb_strtolower($color) . ' ';

        $keywords .= $product->Producer_Brand . ' ' . $type . ' ';

        $owner_code = $product->Owner_Article;
        if ($owner_code != null) {
            $keywords .= $type . ' ' . $owner_code . ' ';
        }

        $country = $product->Country_of_manufacture;

        if ($country != null) {
            $keywords .= $type . ' ' . $country . ' ';
        }

        if ($product->Color == 'Белый' && $product->DesignValue == 'Мрамор') {
            $keywords .= $type . ' белый мрамор ';
            $keywords .= $type . ' под мрамор белый ';
        }

        if ($product->Color == 'Черный' && $product->DesignValue == 'Мрамор') {
            $keywords .= $type . ' черный мрамор ';
            $keywords .= $type . ' под мрамор черный ';
        }

        if (stripos($product->Name, 'alacatta') || stripos($product->Name, 'alacata')) {
            $keywords .= ' керамогранит калаката плитка калаката керамогранит калакатта плитка калакатта';
        }

        if ($type != 'декор') {
            $description .= '<p>_____________________</p>';
            $description .= '<p><em>' . $keywords . '</em></p>';
        }
    @endphp

    @php
        $img1 = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', config('app.url').'/storage/images/bauservice/products/', $product->Picture);

        if (isset($product->Picture2) && $product->Picture2 != null) {
            $img2 = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', config('app.url').'/storage/images/bauservice/products/', $product->Picture2);
        } else {
            $img2 = null;
        }

        if (isset($product->Picture3) && $product->Picture3 != null) {
            $img3 = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', config('app.url').'/storage/images/bauservice/products/', $product->Picture3);
        } else {
            $img3 = null;
        }

        if (isset($product->Picture4) && $product->Picture4 != null) {
            $img4 = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', config('app.url').'/storage/images/bauservice/products/', $product->Picture4);
        } else {
            $img4 = null;
        }

        if (isset($product->Picture5) && $product->Picture5 != null) {
            $img5 = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', config('app.url').'/storage/images/bauservice/products/', $product->Picture5);
        } else {
            $img5 = null;
        }

        if (isset($product->Picture6) && $product->Picture6 != null) {
            $img6 = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', config('app.url').'/storage/images/bauservice/products/', $product->Picture6);
        } else {
            $img6 = null;
        }

        if (isset($product->collections[0])) {
            $img_coll_all = $product->collections[0]->Interior_Pic;
            $img_coll_all = explode(', ', $img_coll_all);
            $img_coll = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', config('app.url').'/storage/images/bauservice/collections/', $img_coll_all[0]);
        } else {
            $img_coll = null;
        }

        if (isset($img_coll_all[1])) {
            $img_coll_2 = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', config('app.url').'/storage/images/bauservice/collections/', $img_coll_all[1]);
        } else {
            $img_coll_2 = null;
        }

        $img_arr = [];
        if ($img_coll != null) {
            $img_arr[] = $img_coll;
        }
        $img_arr[] = $img1;
        if ($img_coll_2 != null) {
            $img_arr[] = $img_coll_2;
        }
        if ($img2 != null) {
            $img_arr[] = $img2;
        }
        if ($img3 != null) {
            $img_arr[] = $img3;
        }
        if ($img4 != null) {
            $img_arr[] = $img4;
        }
        if ($img5 != null) {
            $img_arr[] = $img5;
        }
        if ($img6 != null) {
            $img_arr[] = $img6;
        }

        $image_urls = avito_images_urls($img_arr);

    @endphp

    @php
        $title = $product->Name;
        if (mb_strlen($title) > 50) {
            $title = str_replace('Полированный', 'полир.', $title);
            $title = str_replace('полированный', 'полир.', $title);
            $title = str_replace('ректифицированный', 'ректиф.', $title);
            $title = preg_replace('/\d+-\d+-\d+-\d+/', '', $title);
            $title = preg_replace('/\d\d\d\d-\d\d\d\d/', '', $title);
            $title = preg_replace('/SG\d+R/', '', $title);
            $title = preg_replace('/K\w+P/', '', $title);
            $title = preg_replace('/MM\d+/', '', $title);
        }

        $title = preg_replace('/\d+-\d+-\d+-\d+/', '', $title);
        $title = preg_replace('/\d\d\d\d-\d\d\d\d/', '', $title);
        if (mb_strlen($title) < 42) {
            $title = $product->Producer_Brand . ' ' . $title;
        }
    @endphp

    @php
        $price_rrc = $product->RMPrice;
        $price_old = $product->RMPriceOld;
        $brand = $product->Producer_Brand;
        $price = avito_price($price_rrc, $brand, $discounts, $price_old);

        $description .= avito_show_discount($price_rrc, $brand, $discounts, $price_old);
    @endphp

    @php

        $code = $product->Element_Code;
        $video = '';

    @endphp



    <tr>
        <td></td>                                                   {{-- AvitoID --}}
        <td>{{ $code }}</td>                                        {{-- Id --}}
        <td>{{ $name }}</td>                                        {{-- ManagerName --}}
        <td>{{ $phone }}</td>                                       {{-- ContactPhone --}}
        <td>{{ $address }}</td>                                     {{-- Address --}}
        <td>{{ $title }}</td>                                       {{-- Title --}}
        <td>{{ $description }}</td>                                 {{-- Description --}}
        <td>{{ $price }}</td>                                       {{-- Price --}}
        <td>{{ $video }}</td>                                       {{-- VideoURL --}}
        <td>{{ $image_urls }}</td>                                  {{-- ImageUrls --}}
        <td>{{ $contact_method }}</td>                              {{-- ContactMethod --}}
        <td>Ремонт и строительство</td>                             {{-- Category --}}
        <td>Стройматериалы</td>                                     {{-- GoodsType --}}
        <td>Товар от производителя</td>                             {{-- AdType --}}
        <td>Новое</td>                                              {{-- Condition --}}
        <td>{{ $GoodsSubType }}</td>                                {{-- GoodsSubType --}}
        <td>{{ $FinishingMaterialsType }}</td>                      {{-- FinishingMaterialsType --}}
        <td>{{ $CeramicPorcelainTilesSubType }}</td>                {{-- CeramicPorcelainTilesSubType --}}
        <td>{{ $FlooringMaterialsSubType }}</td>                    {{-- FlooringMaterialsSubType --}}
        <td>{{ $ExteriorFinishingDecorativeStoneSubType }}</td>     {{-- ExteriorFinishingDecorativeStoneSubType --}}
        <td>{{ $WallPanelsSlatsDecorativeElementsSubType }}</td>    {{-- WallPanelsSlatsDecorativeElementsSubType --}}
        <td>{{ $MixesType }}</td>                                   {{-- MixesType --}}
        <td>{{ $Brand }}</td>                                       {{-- Brand --}}
        <td>{{ $TileType }}</td>                                    {{-- TileType --}}
        <td>{{ $SpaceType }}</td>                                   {{-- SpaceType --}}
        <td>{{ $InstallationType }}</td>                            {{-- InstallationType --}}
        <td>{{ $Width }}</td>                                       {{-- Width --}}
        <td>{{ $Length }}</td>                                      {{-- Length --}}
        <td>{{ $Height }}</td>                                      {{-- Height --}}
        <td>{{ $Pattern }}</td>                                     {{-- Pattern --}}
        <td>{{ $Color }}</td>                                       {{-- Color --}}
        <td>{{ $Material }}</td>                                    {{-- Material --}}
        <td>{{ $OutsideUsage }}</td>                                {{-- OutsideUsage --}}
    </tr>

    // duplicate in Golitsyno
    @if (in_array($product->Element_Code, $golitsyno_duplicate))
        @php
            $address_golitsyno = 'Московская область, Одинцовский городской округ, Голицыно';
            $code = $product->Element_Code . '_golitsyno';
            $video = '';
        @endphp

        <tr>
            <td></td>                                                   {{-- AvitoID --}}
            <td>{{ $code }}</td>                                        {{-- Id --}}
            <td>{{ $name }}</td>                                        {{-- ManagerName --}}
            <td>{{ $phone }}</td>                                       {{-- ContactPhone --}}
            <td>{{ $address_golitsyno }}</td>                           {{-- Address --}}
            <td>{{ $title }}</td>                                       {{-- Title --}}
            <td>{{ $description }}</td>                                 {{-- Description --}}
            <td>{{ $price }}</td>                                       {{-- Price --}}
            <td>{{ $video }}</td>                                       {{-- VideoURL --}}
            <td>{{ $image_urls }}</td>                                  {{-- ImageUrls --}}
            <td>{{ $contact_method }}</td>                              {{-- ContactMethod --}}
            <td>Ремонт и строительство</td>                             {{-- Category --}}
            <td>Стройматериалы</td>                                     {{-- GoodsType --}}
            <td>Товар от производителя</td>                             {{-- AdType --}}
            <td>Новое</td>                                              {{-- Condition --}}
            <td>{{ $GoodsSubType }}</td>                                {{-- GoodsSubType --}}
            <td>{{ $FinishingMaterialsType }}</td>                      {{-- FinishingMaterialsType --}}
            <td>{{ $CeramicPorcelainTilesSubType }}</td>                {{-- CeramicPorcelainTilesSubType --}}
            <td>{{ $FlooringMaterialsSubType }}</td>                    {{-- FlooringMaterialsSubType --}}
            <td>{{ $ExteriorFinishingDecorativeStoneSubType }}</td>     {{-- ExteriorFinishingDecorativeStoneSubType --}}
            <td>{{ $WallPanelsSlatsDecorativeElementsSubType }}</td>    {{-- WallPanelsSlatsDecorativeElementsSubType --}}
            <td>{{ $MixesType }}</td>                                   {{-- MixesType --}}
            <td>{{ $Brand }}</td>                                       {{-- Brand --}}
            <td>{{ $TileType }}</td>                                    {{-- TileType --}}
            <td>{{ $SpaceType }}</td>                                   {{-- SpaceType --}}
            <td>{{ $InstallationType }}</td>                            {{-- InstallationType --}}
            <td>{{ $Width }}</td>                                       {{-- Width --}}
            <td>{{ $Length }}</td>                                      {{-- Length --}}
            <td>{{ $Height }}</td>                                      {{-- Height --}}
            <td>{{ $Pattern }}</td>                                     {{-- Pattern --}}
            <td>{{ $Color }}</td>                                       {{-- Color --}}
            <td>{{ $Material }}</td>                                    {{-- Material --}}
            <td>{{ $OutsideUsage }}</td>                                {{-- OutsideUsage --}}
        </tr>
    @endif
@endforeach
{{-----BAUSERVICE-END----}}

<table>
    <thead>
    <tr>
        <th>AvitoId</th>
        <th>Id</th>
        <th>ManagerName</th>
        <th>ContactPhone</th>
        <th>Address</th>
        <th>Title</th>
        <th>Description</th>
        <th>Price</th>
        <th>VideoUrl</th>
        <th>ImageUrls</th>
        <th>ContactMethod</th>
        <th>Category</th>
        <th>GoodsType</th>
        <th>AdType</th>
        <th>Condition</th>
        <th>GoodsSubType</th>
        <th>FinishingMaterialsType</th>
        <th>CeramicPorcelainTilesSubType</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)

        @php
            if(stripos($product->Name, 'литка') !== false) {
                $GoodsSubType = 'Отделка';
                $FinishingMaterialsType = 'Керамическая плитка и керамогранит';
                $CeramicPorcelainTilesSubType = 'Керамическая плитка';
            }
            elseif(stripos($product->Name, 'озаика') !== false) {
                $GoodsSubType = 'Другое';
                $FinishingMaterialsType = '';
                $CeramicPorcelainTilesSubType = '';
            }
            elseif(stripos($product->Name, 'ерамогранит') !== false) {
                $GoodsSubType = 'Отделка';
                $FinishingMaterialsType = 'Керамическая плитка и керамогранит';
                $CeramicPorcelainTilesSubType = 'Керамогранит';
            } else {
                $GoodsSubType = 'Другое';
                $FinishingMaterialsType = '';
                $CeramicPorcelainTilesSubType = '';
            }
        @endphp

        @php

            $description = '';

            if($add_description_first != '') {
            $description .= '<p>'.nl2br($add_description_first).'</p>';
            }

            $description .= '<p>Добрый день. Мы являемся официальным Авито магазином бренда '.$product->Producer_Brand.' в Казани. У нас Вы всегда можете увидеть актуальные коллекции керамогранита и керамической плитки Laparet и узнать актуальные остатки.</p>';

            if ($product->Novinka == 1) {
                $description .= '<p>&#9889;Новинка&#9889; <strong>'. $product->Producer_Brand .' '. $product->Name .'</strong></p>';
            } else {
                $description .= '<p><strong>'. $product->Producer_Brand .' '. $product->Name .'</strong></p>';
            }


            $description .= '<p>------------------</p>';
            $date = date('d.m.Y');

            if (isset($product->kzn)) {
                $description .= '<p>&#9193;  '.$date.' свободный остаток в Казани '.round($product->kzn->balanceCount, 2).' '.$product->MainUnit.' </p>';
            } else {
                $description .= '<p>&#9193;  '.$date.' свободный остаток в Казани 0 '.$product->MainUnit.' </p>';
            }
            $description .= '<p>&#9193;  Свободный остаток в Москве '.round($product->balanceCount, 2).' '.$product->MainUnit.' </p>';
            $description .= '<p><em>(актуальную информацию уточняйте у менеджера)</em></p>';
            $description .= '<p>------------------</p>';

            $description .= '<p><em>Цена в объявлении указана за 1 ' . $product->MainUnit . '</em></p>';
            $description .= '<p><em>* Цена в объявлении актуальна при отгрузке со склада в Казани. При отгрузке со складов в других городах цена может отличаться от указанной.</em></p>';

            $description .= '<p><strong>Название коллекции: </strong>';
                $collections = $product->collections;
                foreach ($collections as $collection) {
                $description .= $collection->Collection_Name;
                $description .= '. ';
                }

                $description .= '</p><ul>';

                if($product->Height != 0 && $product->Lenght != 0) {
                $description .= '<li><strong>Pазмеp: </strong>' . $product->Height .'x' . $product->Lenght . '</li>';
                }
                if($product->Thickness != null && $product->Thickness != 0) {
                $description .= '<li><strong>Тoлщина: </strong>' . $product->Thickness . '</li>';
                }

                if($product->DesignValue != null) {
                $description .= '<li><strong>Рисунoк: </strong>' . $product->DesignValue . '</li>';
                }
                if($product->Color != null) {
                $description .= '<li><strong>Цвeт: </strong>' . $product->Color . '</li>';
                }
                if($product->Cover != null) {
                $description .= '<li><strong>Пoкрытие: </strong>' . $product->Cover . '</li>';
                }
                if($product->Surface != null) {
                $description .= '<li><strong>Пoвeрхноcть: </strong>' . $product->Surface . '</li>';
                }
                if($product->MainUnit != null) {
                $description .= '<li><strong>Единицa измepeния: </strong>' . $product->MainUnit . '</li>';
                }
                if($product->Package_Value != null && $product->Package_Value != $product->PCS_in_Package) {
                $description .= '<li><strong>B упaковке м2: </strong>' . $product->Package_Value . '</li>';
                }
                if($product->PCS_in_Package != null) {
                $description .= '<li><strong>В упакoвкe штук: </strong>' . $product->PCS_in_Package . '</li>';
                }
                if($product->Country_of_manufacture != null) {
                $description .= '<li><strong>Страна производства: </strong>' . $product->Country_of_manufacture . '</li>';
                }

                $description .= '</ul><br>';

            $description .= '<p>Приглашаем Вас в наш шоурум</p>';

            if($add_description != '') {
            $description .= '<p>'.nl2br($add_description).'</p>';
            }


            $keywords = '';

            if(stripos($product->Name, 'екор') !== false) {
            $type = 'декор';
            }
            elseif(stripos($product->Name, 'озаика') !== false) {
            $type = 'мозаика';
            }
            elseif(stripos($product->Name, 'литка') !== false) {
            $type = 'керамическая плитка';
            }
            elseif(stripos($product->Name, 'ерамогранит') !== false) {
            $type = 'керамогранит';
            }
            else {
                $type = '';
            }

            if(stripos($product->DesignValue, 'Дерев') !== false) {
                $pod = $type . ' под дерево';
            }
            elseif(stripos($product->DesignValue, 'рамор') !== false) {
                $pod = $type . ' под мрамор';
            }
            elseif(stripos($product->DesignValue, 'амен') !== false) {
                $pod = $type . ' под камень';
            }
            elseif(stripos($product->DesignValue, 'етон') !== false) {
                $pod = $type . ' под бетон';
            }
            elseif(stripos($product->DesignValue, 'никс') !== false) {
                $pod = $type . ' под оникс';
            } else {
                $pod = '';
            }

            $keywords .= $pod . ' ';


            $lenght = round((float)str_replace(',', '.', $product->Lenght), 0, PHP_ROUND_HALF_EVEN);
            $height = round((float)str_replace(',', '.', $product->Height), 0, PHP_ROUND_HALF_EVEN);

            $size = '';

            $size .= $type . ' ' . $lenght . '*' . $height . ' ';
            if ($lenght != $height) {
                $size .= $type . ' ' . $height . '*' . $lenght . ' ';
            }

            if($product->Height != 0 && $product->Lenght != 0) {
            $keywords .= $size;
            }

            if ($product->Producer_Brand == 'Laparet') {
                $keywords .= $type . ' лапарет ';
            } elseif ($product->Producer_Brand == 'Ceradim') {
                $keywords .= $type . ' керадим ';
            }

             if((stripos($product->Field_of_Application, 'пол') !== false) && (stripos($product->Field_of_Application, 'ван') !== false)) {
                $naznachenie = $type . ' для пола ' . $type . ' для ванной';
            }
            elseif(stripos($product->Field_of_Application, 'пол') !== false) {
                $naznachenie = $type . ' для пола';
            }
            elseif(stripos($product->Field_of_Application, 'ван') !== false) {
                $naznachenie = $type . ' для ванной';
            } else {
                $naznachenie = '';
            }

            $keywords .= $naznachenie . ' ';

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

            $keywords .= $type . ' ' .mb_strtolower($surf) . ', ';

            if(stripos($product->Architectural_surface, 'Стена') !== false) {
                $keywords .= $type . ' для стен' . ' ';
            }
            if(stripos($product->Architectural_surface, 'Пол') !== false) {
                $keywords .= $type . ' для пола' . ' ';
            }

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

            $keywords .= ' керамическая плитка Казань керамогранит Казань Лапарет Казань ';

            if ($type != 'декор') {
                $description .= '<p>_____________</p>';
                $description .= '<p><em>' . $keywords . '</em></p>';
            }

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


            if (isset($img_coll_all[1])) {
            $img_coll_2 = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', config('app.url').'/storage/images/bauservice/collections/', $img_coll_all[1]);
            } else {
            $img_coll_2 = null;
            }

//    ------------------------------------------FOTO-------------------------------------

//            if ($img_coll != null) {
//                $img_full = $img_coll . ' | ' . $img1;
//            } else {
//                $img_full = $img1;
//            }

            $img_full = $img1;
            if ($img_coll != null) {
            $img_full .= ' | ' . $img_coll;
            }

            if ($img4 != null) {
            $img_full .= ' | ' . $img4;
            }
            if ($img2 != null) {
            $img_full .= ' | ' . $img2;
            }
            if ($img5 != null) {
            $img_full .= ' | ' . $img5;
            }
            if ($img3 != null) {
            $img_full .= ' | ' . $img3;
            }
            if ($img6 != null) {
            $img_full .= ' | ' . $img6;
            }

            if ($img_coll_2 != null) {
            $img_full .= ' | ' . $img_coll_2;
            }

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
            if (mb_strlen($title) > 50) {
                $title = str_replace('Керамогранит ', '', $title);
            }
            $title = preg_replace('/\d+-\d+-\d+-\d+/', '', $title);
            $title = preg_replace('/\d\d\d\d-\d\d\d\d/', '', $title);
            if (mb_strlen($title) < 42) { $title = $product->Producer_Brand . ' ' . $title; }

//--------------------------------------------------------------------------

            $price_rrc = $product->RMPrice;
            $price_old = $product->RMPriceOld ?? 0;
            $brand = $product->Producer_Brand;
            $price = avito_price($price_rrc, $brand, $discounts, $price_old);

            if ($show_discount = avito_show_discount($brand, $discounts)) {
                $description .= $show_discount;
            }

//----------------------------------------------------------------------------
            $code = $product->Element_Code . '_kzn';
        @endphp

        <tr>
            <td></td>                                       {{-- AvitoID--}}
            <td>{{ $code }}</td>                            {{-- Id--}}
            <td>{{ $name }}</td>                            {{-- ManagerName--}}
            <td>{{ $phone }}</td>                           {{-- ContactPhone--}}
            <td>{{ $address }}</td>                         {{-- Address--}}
            <td>{{ $title }}</td>                           {{-- Title--}}
            <td>{{ $description }}</td>                     {{-- Description--}}
            <td>{{ $price }}</td>                           {{-- Price--}}
            <td></td>                                       {{-- VideoURL--}}
            <td>{{ $img_full }}</td>                        {{-- ImageUrls--}}
            <td>{{ $contact_method }}</td>                  {{-- ContactMethod--}}
            <td>Ремонт и строительство</td>                 {{-- Category--}}
            <td>Стройматериалы</td>                         {{-- GoodsType--}}
            <td>Товар от производителя</td>                 {{-- AdType--}}
            <td>Новое</td>                                  {{-- Condition--}}
            <td>{{ $GoodsSubType }}</td>                    {{-- GoodsSubType--}}
            <td>{{ $FinishingMaterialsType }}</td>          {{-- FinishingMaterialsType--}}
            <td>{{ $CeramicPorcelainTilesSubType }}</td>    {{-- CeramicPorcelainTilesSubType--}}
        </tr>
    @endforeach

{{-----------------------------------END-BAUSERVICE--------------------------}}

    </tbody>
</table>

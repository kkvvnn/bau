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
        <!-- <th>AvitoDateEnd</th> -->
        <th>FinishingSubType</th>
        <th>Condition</th>
        <th>VideoUrl</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)

        <!-- ----------------------------------------------- -->
        @php

            if(stripos($product->Name, 'литка') !== false) {
            $FinishingType = 'Плитка, керамогранит и мозаика';
            $FinishingSubType = 'Керамическая плитка';
            }
            elseif(stripos($product->Name, 'озаика') !== false) {
            $FinishingSubType = 'Мозаика';
            $FinishingType = 'Плитка, керамогранит и мозаика';
            }
            elseif(stripos($product->Name, 'ерамогранит') !== false) {
            $FinishingType = 'Плитка, керамогранит и мозаика';
            $FinishingSubType = 'Керамогранит';
            } else {
            $FinishingType = 'Другое';
            $FinishingSubType = '';
            }

        @endphp

            <!-- --------------------------------------------------------- -->

        @php
            $date_next_month = date('Y-m-d', mktime(0, 0, 0, date("m")+1, date("d"), date("Y")));
            $date_next_month .= 'T9:00:00+03:00';
        @endphp

            <!-- ------------------------------------------------------- -->

        @php
            if ($product->Producer_Brand == 'Laparet') {
                $description = '<p>Керамическая плитка и керамогранит Laparet , Лапарет. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены. Доставка по Москве, cамовывоз на западе Москвы.</p>';
            } elseif ($product->Producer_Brand == 'Cersanit') {
                $description = '<p>Керамическая плитка и керамогранит Cersanit , Церсанит. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены. Доставка по Москве, cамовывоз на западе Москвы.</p>';
            } else {
                $description = '<p>Керамическая плитка и керамогранит. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены. Доставка по Москве, cамовывоз на западе Москвы.</p>';
            }

            if ($product->Novinka == 1) {
                $description .= '<p>&#9889;Новинка&#9889; <strong>' . $product->Name . '. '
                    . $product->Producer_Brand . ' ('
                    . $product->Country_of_manufacture . ')</strong></p>';
            } else {
                $description .= '<p><strong>' . $product->Name . '. '
                    . $product->Producer_Brand . ' ('
                    . $product->Country_of_manufacture . ')</strong></p>';
            }


        if ($product->Name != 'Tiaki Green Керамогранит 60x120 Полированный' && $product->Name != 'Dalim Mint Керамогранит 60x60 Полированный') {


            $description .= '<p>--------------------</p>';
            $date = date('d.m.Y');
            if ($product->balanceCount > 0) {
            $description .= '<p>&#9989; На утро '.$date.' доступно &asymp; '.round($product->balanceCount, 2).' '.$product->MainUnit.' <em>(информация приблизительная, точную информацию о наличии спрашивайте у менеджера)</em></p>';
            }
            $description .= '<p>--------------------</p>';


            $description .= '<p><em>Цена указана за 1 ' . $product->MainUnit . '</em></p>';
        } else {
            $description .= '<p>--------------------</p>';
            $date = date('d.m.Y');
            $description .= '<p>&#9989; На утро '.$date. ' - <strong>В НАЛИЧИИ !</strong></p>';
            $description .= '<p>--------------------</p>';
        }

            $description .= '<p><strong>Коллекция: </strong>';
                $collections = $product->collections;
                foreach ($collections as $collection) {
                $description .= $collection->Collection_Name;
                $description .= '. ';
                }

                $description .= '</p><ul>';


                if($product->Height != 0 && $product->Lenght != 0) {
                $description .= '<li><strong>Размер: </strong>' . $product->Height .'x' . $product->Lenght . '</li>';
                }
                if($product->Thickness != null && $product->Thickness != 0) {
                $description .= '<li><strong>Толщина: </strong>' . $product->Thickness . '</li>';
                }
                if($product->Place_in_the_Collection != null) {
                $description .= '<li><strong>Место в коллекции: </strong>' . $product->Place_in_the_Collection . '</li>';
                }
                if($product->DesignValue != null) {
                $description .= '<li><strong>Рисунок: </strong>' . $product->DesignValue . '</li>';
                }
                if($product->Color != null) {
                $description .= '<li><strong>Цвет: </strong>' . $product->Color . '</li>';
                }
                if($product->Cover != null) {
                $description .= '<li><strong>Покрытие: </strong>' . $product->Cover . '</li>';
                }
                if($product->Surface != null) {
                $description .= '<li><strong>Поверхность: </strong>' . $product->Surface . '</li>';
                }
                if($product->MainUnit != null) {
                $description .= '<li><strong>Единица измерения товара: </strong>' . $product->MainUnit . '</li>';
                }
                if($product->PCS_in_Package != null) {
                $description .= '<li><strong>Штук в упаковке: </strong>' . $product->PCS_in_Package . '</li>';
                }
                if($product->Package_Value != null && $product->Package_Value != $product->PCS_in_Package) {
                $description .= '<li><strong>Кв. метров в упаковке: </strong>' . $product->Package_Value . '</li>';
                }
                if($product->Producer_Brand != null) {
                $description .= '<li><strong>Производитель: </strong>' . $product->Producer_Brand . '</li>';
                }
                if($product->Country_of_manufacture != null) {
                $description .= '<li><strong>Страна производства: </strong>' . $product->Country_of_manufacture . '</li>';
                }

                $description .= '</ul><br>';


            $description .= '<p>Наличие а также актуальные цены уточняйте у менеджера.</p>';
            $description .= '<p>В нашем шоуруме представлены коллекции многих других известных производителей керамогранита, керамической плитки, мозаики и других напольных покрытий (ламинат, паркет, инженерная доска и др.)</p>';
            $description .= '<p>Работаем с розничными и оптовыми покупателями. А так же предлагаем сотрудничество дизайнерам и строительным компаниям.</p>';


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

            if((stripos($product->Field_of_Application, 'пол') !== false) && (stripos($product->Field_of_Application, 'ван') !== false)) {
                $naznachenie = $type . ' для пола, ' . $type . ' для ванной комнаты';
            }
            elseif(stripos($product->Field_of_Application, 'пол') !== false) {
                $naznachenie = $type . ' для пола';
            }
            elseif(stripos($product->Field_of_Application, 'ван') !== false) {
                $naznachenie = $type . ' для ванной комнаты';
            } else {
                $naznachenie = '';
            }

            $keywords .= $naznachenie . ', ';

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

            $keywords .= $pod . ', ';

            $lenght = round((float)str_replace(',', '.', $product->Lenght), 0, PHP_ROUND_HALF_EVEN);
            $height = round((float)str_replace(',', '.', $product->Height), 0, PHP_ROUND_HALF_EVEN);

            $size = '';
            $size .= $type . ' ' . $lenght . 'х' . $height . ', ';
            if ($lenght != $height) {
                $size .= $type . ' ' . $height . 'х' . $lenght . ', ';
            }
            $size .= $type . ' ' . $lenght . '*' . $height . ', ';
            if ($lenght != $height) {
                $size .= $type . ' ' . $height . '*' . $lenght . ', ';
            }

            if($product->Height != 0 && $product->Lenght != 0) {
            $keywords .= $size;
            }

            if ($product->Producer_Brand == 'Laparet') {
                $keywords .= $type . ' лапарет, ';
            } elseif ($product->Producer_Brand == 'Cersanit') {
                $keywords .= $type . ' церсанит, ';
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

            $keywords .= $type . ' ' .mb_strtolower($surf) . ', ';


            if(stripos($product->Architectural_surface, 'Стена') !== false) {
                $keywords .= $type . ' для стен' . ', ';
            }
            if(stripos($product->Architectural_surface, 'Пол') !== false) {
                $keywords .= $type . ' для пола' . ', ';
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

            $keywords .= $type . ' ' .mb_strtolower($color) . ', ';

            $keywords .= $product->Producer_Brand . ' ' . $type . ', ';


            $owner_code = $product->Owner_Article;

            if ($owner_code != null) {
                $keywords .= $type . ' ' . $owner_code . ', ';
            }

            $country = $product->Country_of_manufacture;

            if ($country != null) {
                $keywords .= $type . ' ' . $country . ', ';
            }





            if ($type != 'декор') {
                $description .= '<p>_____________________</p>';
                $description .= '<p><em>' . $keywords . '</em></p>';
            }


        @endphp

        @php
            $img1 = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', config('app.url').'/storage/Picture/', $product->Picture);

            if (isset($product->Picture2) && $product->Picture2 != null) {
            $img2 = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', config('app.url').'/storage/Picture2/', $product->Picture2);
            } else {$img2 = null;}
            if (isset($product->Picture3) && $product->Picture3 != null) {
            $img3 = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', config('app.url').'/storage/Picture3/', $product->Picture3);
            } else {$img3 = null;}
            if (isset($product->Picture4) && $product->Picture4 != null) {
            $img4 = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', config('app.url').'/storage/Picture4/', $product->Picture4);
            } else {$img4 = null;}
            if (isset($product->Picture5) && $product->Picture5 != null) {
            $img5 = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', config('app.url').'/storage/Picture5/', $product->Picture5);
            } else {$img5 = null;}
            if (isset($product->Picture6) && $product->Picture6 != null) {
            $img6 = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', config('app.url').'/storage/Picture6/', $product->Picture6);
            } else {$img6 = null;}

            if (isset($product->collections[0])) {
            $img_coll_all = $product->collections[0]->Interior_Pic;
            $img_coll_all = explode(', ', $img_coll_all);
            $img_coll = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', config('app.url').'/storage/Collections/', $img_coll_all[0]);
            } else {
            $img_coll = null;
            }


            if (isset($img_coll_all[1])) {
            $img_coll_2 = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', config('app.url').'/storage/Collections/', $img_coll_all[1]);
            } else {
            $img_coll_2 = null;
            }

    //          ------------------------------------------FOTO-------------------------------------

    //          -----------------------------------------------------------------------------------

            $img_full = $img1;
            if ($img_coll != null) {
            $img_full .= ' | ' . $img_coll;
            }
            if ($img_coll_2 != null) {
            $img_full .= ' | ' . $img_coll_2;
            }

            if ($img2 != null) {
            $img_full .= ' | ' . $img2;
            }
            if ($img3 != null) {
            $img_full .= ' | ' . $img3;
            }
            if ($img4 != null) {
            $img_full .= ' | ' . $img4;
            }

        @endphp

        @php
            $title = $product->Name;
            if (mb_strlen($title) > 50) {
            $title = str_replace('Полированный', 'полир.', $title);
            $title = str_replace('полированный', 'полир.', $title);
            $title = str_replace('ректифицированный', 'полир.', $title);
            $title = preg_replace('/\d+-\d+-\d+-\d+/', '', $title);
            $title = preg_replace('/\d\d\d\d-\d\d\d\d/', '', $title);
            $title = preg_replace('/SG\d+R/', '', $title);
            $title = preg_replace('/K\w+P/', '', $title);
            $title = preg_replace('/MM\d+/', '', $title);
            }
            $title = preg_replace('/\d+-\d+-\d+-\d+/', '', $title);
            $title = preg_replace('/\d\d\d\d-\d\d\d\d/', '', $title);
            if (mb_strlen($title) < 42) { $title = $product->Producer_Brand . ' ' . $title; }
        @endphp

        @php
            if ($product->Producer_Brand == 'Laparet') {
                if ($product->RMPriceOld == 0) {
                    $price = round($product->RMPrice * 0.91, -1);
                } else {
                    $price = $product->RMPrice;
                }
            }
            if ($product->Producer_Brand == 'Cersanit') {
                $price = round($product->RMPrice * 1.05, -1);
            }

            if ($product->Name == 'Tiaki Green Керамогранит 60x120 Полированный' || $product->Name == 'Dalim Mint Керамогранит 60x60 Полированный') {
                $price = '';
            }


        @endphp

        <tr>
            <td></td>
            <td>{{ $product->Element_Code }}</td>
            <td>В сообщениях</td>
            <td>kkvvnn89@gmail.com</td>
            <td>Активно</td>
            <td>Владимир</td>
            <td>{{$price}}</td>
            <td>Напольные решения</td>
            <td>{{$title}}</td>
            <td>{{$img_full}}</td> <!-- -->
            <td>Отделка</td>
            <td>Стройматериалы</td>
            <td>Ремонт и строительство</td>
            <td>Package</td>
            <td>{{$FinishingType}}</td>
            <td>79039890822</td> <!-- -->
            <td>{{$description}}</td> <!-- -->
            <td>Москва, парк Победы</td>
            <td>Товар от производителя</td>
            <!-- <td>{{$date_next_month}}</td> -->
            <td>{{$FinishingSubType}}</td>
            <td>Новое</td>
            <td></td>
        </tr>
    @endforeach


    {{--    ---------------------PRIMAVERA------------------------------}}
    @foreach($primavera as $product)
        @php
            $price = $product->price;
            $price = round($price * 0.93, -1);
//                --------------------------
            $title = $product->title_avito;
//                -----------------------------
//              ------------------------------------------FOTO-------------------------------------

            $img = $product->img1;
            $imgs_2 = $product->img2;
            $imgs_2 = explode("\n", $imgs_2);
            foreach ($imgs_2 as $i) {
                $img .= ' | '.$i;
            }

            $img_full_arr = explode(' | ', $img);

            if (count($img_full_arr) <= 10) {
                $img_ready = $img;
            } else {
                $img_full_arr = array_slice($img_full_arr, 0, 10);
                $img_ready = implode(' | ', $img_full_arr);
            }
//                ---------------------
            if(stripos($product->title, 'литка') !== false) {
            $FinishingType = 'Плитка, керамогранит и мозаика';
            $FinishingSubType = 'Керамическая плитка';
            }
            elseif(stripos($product->title, 'озаика') !== false) {
            $FinishingSubType = 'Мозаика';
            $FinishingType = 'Плитка, керамогранит и мозаика';
            }
            elseif(stripos($product->title, 'ерамогранит') !== false) {
            $FinishingType = 'Плитка, керамогранит и мозаика';
            $FinishingSubType = 'Керамогранит';
            } else {
            $FinishingType = 'Другое';
            $FinishingSubType = '';
            }
//                ---------------------
            $description = '<p>Керамическая плитка и керамогранит Primavera , Примавера. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены. Доставка по Москве, cамовывоз на западе Москвы.</p>';
            $description .= '<p><strong>' . $product->title . '. '
                    . $product->brand . ' ('
                    . $product->country . ')</strong></p>';
            $description .= '<p><em>Цена указана за 1 м.кв.</em></p><ul>';


                if($product->width != 0 && $product->length != 0) {
                $description .= '<li><strong>Размер: </strong>' . $product->length .'x' . $product->width . '</li>';
                }
                if($product->fat != null && $product->fat != 0) {
                $description .= '<li><strong>Толщина: </strong>' . $product->fat . '</li>';
                }
                if($product->format != null) {
                $description .= '<li><strong>Формат: </strong>' . $product->format . '</li>';
                }
                if($product->decor != null) {
                $description .= '<li><strong>Рисунок: </strong>' . $product->decor . '</li>';
                }
                if($product->color_name != null) {
                $description .= '<li><strong>Цвет: </strong>' . $product->color_name . '</li>';
                }
                if($product->poverhnost != null) {
                $description .= '<li><strong>Поверхность: </strong>' . $product->poverhnost . '</li>';
                }
                if($product->count_in_pack != null) {
                $description .= '<li><strong>Штук в упаковке: </strong>' . $product->count_in_pack . '</li>';
                }
                if($product->meters_in_pack != null) {
                $description .= '<li><strong>Кв. метров в упаковке: </strong>' . str_replace(',', '.', $product->meters_in_pack) . '</li>';
                }
                if($product->country != null) {
                $description .= '<li><strong>Страна производства: </strong>' . $product->country . '</li>';
                }
                if($product->for != null) {
                $description .= '<li><strong>Назначение: </strong>' . $product->for . '</li>';
                }
                if($product->vendor_code != null) {
                $description .= '<li><strong>Артикул: </strong>' . $product->vendor_code . '</li>';
                }

                $description .= '</ul><br>';


            $description .= '<p>Наличие а также актуальные цены уточняйте у менеджера.</p>';
            $description .= '<p>В нашем шоуруме представлены коллекции многих других известных производителей керамогранита, керамической плитки, мозаики и других напольных покрытий (ламинат, паркет, инженерная доска и др.)</p>';
            $description .= '<p>Работаем с розничными и оптовыми покупателями. А так же предлагаем сотрудничество дизайнерам и строительным компаниям.</p>';


            $keywords = '';


            $type = 'керамогранит';
            $pod = $type . ' ' . mb_strtolower($product->decor);


            $keywords .= $pod . ', ';

            $lenght = round((float)str_replace(',', '.', $product->length), 0, PHP_ROUND_HALF_EVEN);
            $height = round((float)str_replace(',', '.', $product->width), 0, PHP_ROUND_HALF_EVEN);

            $size = '';
            $size .= $type . ' ' . $lenght . 'х' . $height . ', ';
            if ($lenght != $height) {
                $size .= $type . ' ' . $height . 'х' . $lenght . ', ';
            }
            $size .= $type . ' ' . $lenght . '*' . $height . ', ';
            if ($lenght != $height) {
                $size .= $type . ' ' . $height . '*' . $lenght . ', ';
            }

            if($product->width != 0 && $product->length != 0) {
            $keywords .= $size;
            }


            $keywords .= $type . ' примавера, ';


            $surface = $product->poverhnost;
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


            $color_baza = $product->color;
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

            $keywords .= $type . ' ' .mb_strtolower($color) . ', ';

            $keywords .= $product->brand . ' ' . $type . ', ';


            $owner_code = $product->vendor_code;

            if ($owner_code != null) {
                $keywords .= $type . ' ' . $owner_code . ', ';
            }

            $country = $product->country;

            if ($country != null) {
                $keywords .= $type . ' ' . $country;
            }
//---
            if ($type != 'декор') {
                $description .= '<p>_____________________</p>';
                $description .= '<p><em>' . $keywords . '</em></p>';
            }

        @endphp
        <tr>
            <td></td>
            <td>{{ $product->vendor_code }}</td>
            <td>В сообщениях</td>
            <td>kkvvnn89@gmail.com</td>
            <td>Активно</td>
            <td>Владимир</td>
            <td>{{$price}}</td>
            <td>Напольные решения</td>
            <td>{{$title}}</td>
            <td>{{$img_ready}}</td> <!-- -->
            <td>Отделка</td>
            <td>Стройматериалы</td>
            <td>Ремонт и строительство</td>
            <td>Package</td>
            <td>{{$FinishingType}}</td>
            <td>79039890822</td> <!-- -->
            <td>{{$description}}</td> <!-- -->
            <td>Москва, парк Победы</td>
            <td>Товар от производителя</td>
            <td>{{$FinishingSubType}}</td>
            <td>Новое</td>
            <td></td>
        </tr>
    @endforeach

    {{--    -----------------------PRIMAVERA_END----------------------------}}



    {{--    ---------------------ABSOLUT_GRES------------------------------}}
    @foreach($absolut_gres as $product)
        @php
            if ($product->price_old == null) {
                $price = round($product->price_from_xml * 0.93, -1);
            } else {
                $price = $product->price_from_xml;
            }
//                --------------------------
            $code_avito = str_replace(' ', '', $product->vendor_code);
//                --------------------------
            $title = $product->title_avito;
//                -----------------------------
//              ------------------------------------------FOTO-------------------------------------

            $img_ready = $product->picture;

//                ---------------------
            if(stripos($product->title, 'литка') !== false) {
            $FinishingType = 'Плитка, керамогранит и мозаика';
            $FinishingSubType = 'Керамическая плитка';
            }
            elseif(stripos($product->title, 'озаика') !== false) {
            $FinishingSubType = 'Мозаика';
            $FinishingType = 'Плитка, керамогранит и мозаика';
            }
            elseif(stripos($product->title, 'ерамогранит') !== false) {
            $FinishingType = 'Плитка, керамогранит и мозаика';
            $FinishingSubType = 'Керамогранит';
            } else {
            $FinishingType = 'Другое';
            $FinishingSubType = '';
            }
//                ---------------------
            $description = '<p>Керамическая плитка и керамогранит Absolut Gres , Абсолют Грес. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены. Доставка по Москве, cамовывоз на западе Москвы.</p>';
            $description .= '<p><strong>' . $product->title . '. '
                    . $product->brand . ' ('
                    . $product->country . ')</strong></p>';
            $description .= '<p><strong>Коллекция: </strong>' .$product->collection. '</p>';
            $description .= '<p><em>Цена указана за 1 '.$product->unit.'.</em></p><ul>';


                if($product->width != 0 && $product->length != 0) {
                $description .= '<li><strong>Размер: </strong>' . $product->length .'x' . $product->width . '</li>';
                }
                if($product->size != null) {
                $description .= '<li><strong>Формат: </strong>' . $product->size . '</li>';
                }
                if($product->style != null) {
                $description .= '<li><strong>Стиль: </strong>' . $product->style . '</li>';
                }
                if($product->surface != null) {
                $description .= '<li><strong>Поверхность: </strong>' . $product->surface . '</li>';
                }
                if($product->count_in_pack != null) {
                $description .= '<li><strong>Штук в упаковке: </strong>' . $product->count_in_pack . '</li>';
                }
                if($product->meters_in_pack != null) {
                $description .= '<li><strong>Кв. метров в упаковке: </strong>' . str_replace(',', '.', $product->meters_in_pack) . '</li>';
                }
                if($product->country != null) {
                $description .= '<li><strong>Страна производства: </strong>' . $product->country . '</li>';
                }
                if($product->vendor_code != null) {
                $description .= '<li><strong>Артикул: </strong>' . $product->vendor_code . '</li>';
                }

                $description .= '</ul><br>';


            $description .= '<p>Наличие а также актуальные цены уточняйте у менеджера.</p>';
            $description .= '<p>В нашем шоуруме представлены коллекции многих других известных производителей керамогранита, керамической плитки, мозаики и других напольных покрытий (ламинат, паркет, инженерная доска и др.)</p>';
            $description .= '<p>Работаем с розничными и оптовыми покупателями. А так же предлагаем сотрудничество дизайнерам и строительным компаниям.</p>';


            $keywords = '';


            $type = 'керамогранит';

            $lenght = round((float)str_replace(',', '.', $product->length), 0, PHP_ROUND_HALF_EVEN);
            $height = round((float)str_replace(',', '.', $product->width), 0, PHP_ROUND_HALF_EVEN);

            $size = '';
            $size .= $type . ' ' . $lenght . 'х' . $height . ', ';
            if ($lenght != $height) {
                $size .= $type . ' ' . $height . 'х' . $lenght . ', ';
            }
            $size .= $type . ' ' . $lenght . '*' . $height . ', ';
            if ($lenght != $height) {
                $size .= $type . ' ' . $height . '*' . $lenght . ', ';
            }

            if($product->width != 0 && $product->length != 0) {
            $keywords .= $size;
            }


            $keywords .= $type . ' абсолют грес, ';


            $surface = $product->surface;
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

            $keywords .= $product->brand . ' ' . $type . ', ';


            $owner_code = $product->vendor_code;

            if ($owner_code != null) {
                $keywords .= $type . ' ' . $owner_code . ', ';
            }

            $country = $product->country;

            if ($country != null) {
                $keywords .= $type . ' ' . $country;
            }
//---
            if ($type != 'декор') {
                $description .= '<p>_____________________</p>';
                $description .= '<p><em>' . $keywords . '</em></p>';
            }

        @endphp
        <tr>
            <td></td>
            <td>{{ $code_avito }}</td>
            <td>В сообщениях</td>
            <td>kkvvnn89@gmail.com</td>
            <td>Активно</td>
            <td>Владимир</td>
            <td>{{$price}}</td>
            <td>Напольные решения</td>
            <td>{{$title}}</td>
            <td>{{$img_ready}}</td> <!-- -->
            <td>Отделка</td>
            <td>Стройматериалы</td>
            <td>Ремонт и строительство</td>
            <td>Package</td>
            <td>{{$FinishingType}}</td>
            <td>79039890822</td> <!-- -->
            <td>{{$description}}</td> <!-- -->
            <td>Москва, парк Победы</td>
            <td>Товар от производителя</td>
            <td>{{$FinishingSubType}}</td>
            <td>Новое</td>
            <td></td>
        </tr>
    @endforeach

    {{--    -----------------------ABSOLUT_GRES_END----------------------------}}

    {{--    ---------------------LEEDO------------------------------}}
    @foreach($leedo as $product)
        @php
            $price = $product->Price_rozn;
            $price = round($price * 0.90, -1);
//                --------------------------
            $title = '';
            if (stripos($product->Category, 'Декор') != false) {
                $title = 'Декор ';
            } elseif (stripos($product->Category, 'Бордюр') != false) {
                $title = 'Бордюр ';
            } elseif (stripos($product->Category, 'Керамическая_плитка') != false) {
                $title = 'Керамическая плитка ';
            } elseif (stripos($product->Category, 'Керамический_гранит') != false) {
                $title = 'Керамогранит ';
            } elseif (stripos($product->Category, 'заика') != false) {
                $title = 'Мозаика ';
            }

            $title .= $product->Item_name;
            $title = str_replace('(распродажа остатков)', '', $title);
            $title = str_replace('40 шт в упак.', '', $title);
            $title = str_replace('20 шт в упак.', '', $title);
            $title = str_replace('(14 шт в коробке)', '', $title);
//                -----------------------------
//              ------------------------------------------FOTO-------------------------------------

            $img = $product->Basic_pic;
            if ($product->Picture1 != null) {
                $img .= ' | ' . $product->Picture1;
            }
            if ($product->Picture2 != null) {
                $img .= ' | ' . $product->Picture2;
            }
            if ($product->Picture3 != null) {
                $img .= ' | ' . $product->Picture3;
            }
            if ($product->Picture4 != null) {
                $img .= ' | ' . $product->Picture4;
            }
            if ($product->Picture5 != null) {
                $img .= ' | ' . $product->Picture5;
            }
            if ($product->Picture6 != null) {
                $img .= ' | ' . $product->Picture6;
            }
            if ($product->Picture7 != null) {
                $img .= ' | ' . $product->Picture7;
            }

            $img_full_arr = explode(' | ', $img);

            foreach ($img_full_arr as &$i) {
                if (!str_starts_with($i, 'http')) {
                    $i = str_replace('www.leedo.ru', 'https://www.leedo.ru', $i);
                }
            }

            if (count($img_full_arr) <= 10) {
                $img_ready = implode(' | ', $img_full_arr);
            } else {
                $img_full_arr = array_slice($img_full_arr, 0, 10);
                $img_ready = implode(' | ', $img_full_arr);
            }
//                ---------------------
            if(stripos($product->Category, 'литка') !== false) {
            $FinishingType = 'Плитка, керамогранит и мозаика';
            $FinishingSubType = 'Керамическая плитка';
            }
            elseif(stripos($product->Category, 'ерамогранит') !== false) {
            $FinishingType = 'Плитка, керамогранит и мозаика';
            $FinishingSubType = 'Керамогранит';
            }
            elseif(stripos($product->Category, 'озаика') !== false) {
            $FinishingSubType = 'Мозаика';
            $FinishingType = 'Плитка, керамогранит и мозаика';
            } else {
            $FinishingType = 'Другое';
            $FinishingSubType = '';
            }
//                ---------------------
            $description = '<p>Мозаика и керамогранит Caramelle & LeeDo. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены. Доставка по Москве, cамовывоз на западе Москвы.</p>';
            $description .= '<p><strong>' . $product->Item_chip . '. '
                    . $product->Brand_name . '</strong></p>';

            $description .= '<p>--------------------</p>';
            $date = date('d.m.Y');
            if (($product->Sklad_Msk_LeeDo > 0 && $product->Sklad_Msk_LeeDo != null) || ($product->Sklad_SPb_LeeDo > 0 && $product->Sklad_SPb_LeeDo != null)) {
            $description .= '<p>&#9989; На утро '.$date.' доступно &asymp; '.round($product->Sklad_Msk_LeeDo)+round($product->Sklad_SPb_LeeDo).' '.$product->unit.' <em>(информация приблизительная, точную информацию о наличии спрашивайте у менеджера)</em></p>';
            }
            $description .= '<p>--------------------</p>';

            $description .= '<p><em>Цена указана за 1 '.$product->unit.'</em></p><ul>';


                if($product->Tile_size_cm != null) {
                $description .= '<li><strong>Размер листа, см: </strong>' . $product->Tile_size_cm . '</li>';
                }
                if($product->Chip_size_mm != null) {
                $description .= '<li><strong>Размер чипа, мм: </strong>' . $product->Chip_size_mm . '</li>';
                }
                if($product->Thickness_mm != null) {
                $description .= '<li><strong>Толщина, мм: </strong>' . $product->Thickness_mm . '</li>';
                }
                if($product->Tile_sheet_square != null) {
                $description .= '<li><strong>Площадь листа: </strong>' . $product->Tile_sheet_square . '</li>';
                }
                if($product->Form != null) {
                $description .= '<li><strong>Форма: </strong>' . $product->Form . '</li>';
                }
                if($product->Color_text != null) {
                $description .= '<li><strong>Цвет: </strong>' . $product->Color_text . '</li>';
                }
                if($product->Surface != null) {
                $description .= '<li><strong>Поверхность: </strong>' . $product->Surface . '</li>';
                }
                if($product->Material != null) {
                $description .= '<li><strong>Материал: </strong>' . $product->Material . '</li>';
                }
                if($product->Usage != null) {
                $description .= '<li><strong>Применение: </strong>' . $product->Usage . '</li>';
                }
                if($product->Category != null) {
                $description .= '<li><strong>Категория: </strong>' . str_replace('_', ' ', $product->Category) . '</li>';
                }

                $description .= '</ul><p><em>';

                $description .= ucfirst(trim($product->Description, '"')) . '</em></p>';
                $description .= '<p>-------------------</p>';


            $description .= '<p>Наличие а также актуальные цены уточняйте у менеджера.</p>';
            $description .= '<p>В нашем шоуруме представлены коллекции многих других известных производителей керамогранита, керамической плитки, мозаики и других напольных покрытий (ламинат, паркет, инженерная доска и др.)</p>';
            $description .= '<p>Работаем с розничными и оптовыми покупателями. А так же предлагаем сотрудничество дизайнерам и строительным компаниям.</p>';

        @endphp
        <tr>
            <td></td>
            <td>{{ $product->System_ID }}</td>
            <td>В сообщениях</td>
            <td>kkvvnn89@gmail.com</td>
            <td>Активно</td>
            <td>Владимир</td>
            <td>{{$price}}</td>
            <td>Напольные решения</td>
            <td>{{$title}}</td>
            <td>{{$img_ready}}</td> <!-- -->
            <td>Отделка</td>
            <td>Стройматериалы</td>
            <td>Ремонт и строительство</td>
            <td>Package</td>
            <td>{{$FinishingType}}</td>
            <td>79039890822</td> <!-- -->
            <td>{{$description}}</td> <!-- -->
            <td>Москва, парк Победы</td>
            <td>Товар от производителя</td>
            <td>{{$FinishingSubType}}</td>
            <td>Новое</td>
            <td></td>
        </tr>
    @endforeach

    {{--    -----------------------LEEDO_END----------------------------}}



    {{--    ---------------------ALTACERA------------------------------}}
    @foreach($altacera as $product)
        @php
            //        -----------------------------------UNIT--------------------------
                                    $units = $product->units;
                                    $unit_id = $product->balance->unit_id;
            //                        dd($units);
                                    $unit = '';
                                    foreach ($units as $u) {
                                        if ($u['unit_id'] == $unit_id) {
                                            $unit = $u['unit'];
                                            break;
                                        }
                                    }

                                    $pack_ratio = '';
                                    foreach ($units as $u2) {
                                        if ($u2['unit'] == 'Упак') {
                                            $pack_ratio = $u2['unit_ratio'];
                                            break;
                                        }
                                    }

                                    $one_count_ratio = '';
                                    foreach ($units as $u3) {
                                        if ($u3['unit'] == 'шт') {
                                            $one_count_ratio = $u3['unit_ratio'];
                                            break;
                                        }
                                    }
            //        --------------------------------------------------------------
                        if($product->price !== null) {
                            if ($product->sale == 0) {
                                $price = round($product->price->price * 0.93, -1);
                            } else {
                                $price = $product->price->price;
                            }
                        } else {
                            $price = '';
                        }
            //                --------------------------
                        $code_avito = $product->artikul;
            //                --------------------------
                        $title = $product->category_rel->parent.' '.$product->collection_item.' '.$product->name_for_site.' '.$product->artikul;
                        $title = str_replace('Архив', '', $title);
            //                -----------------------------
            //              ------------------------------------------FOTO-------------------------------------

                        $imgs = config('app.url').Storage::disk('altacera')->url($product->tovar_id . '.JPEG');

                        $img_full_arr = explode(' | ', $imgs);

                        if (count($img_full_arr) <= 10) {
                            $img_ready = $imgs;
                        } else {
                            $img_full_arr = array_slice($img_full_arr, 0, 10);
                            $img_ready = implode(' | ', $img_full_arr);
                        }

            //                ---------------------
                        if(stripos($product->collection_item, 'литка') !== false) {
                        $FinishingType = 'Плитка, керамогранит и мозаика';
                        $FinishingSubType = 'Керамическая плитка';
                        }
                        elseif(stripos($product->collection_item, 'озаика') !== false) {
                        $FinishingSubType = 'Мозаика';
                        $FinishingType = 'Плитка, керамогранит и мозаика';
                        }
                        elseif(stripos($product->collection_item, 'ерамогранит') !== false) {
                        $FinishingType = 'Плитка, керамогранит и мозаика';
                        $FinishingSubType = 'Керамогранит';
                        } else {
                        $FinishingType = 'Другое';
                        $FinishingSubType = '';
                        }
            //                ---------------------
                        $description = '<p>Керамическая плитка и керамогранит '.$product->category_rel->parent.'. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены. Доставка по Москве, cамовывоз на западе Москвы.</p>';
                        $description .= '<p><strong>' . $product->tovar . '. '
                                . $product->category_rel->parent . ' ('
                                . $product->country . ')</strong></p>';
                        $description .= '<p><strong>Коллекция: </strong>'.$product->category_rel->parent.' / '.$product->category. '</p>';


                        $date = date('d.m.Y');
                        if ($product->balance->free_balance > 0) {
                            if(str_contains($product->balance->free_balance, '.')){
                                $description .= '<p>--------------------</p>';
                                $description .= '<p>&#9989; На утро '.$date.' доступно &asymp; '.rtrim(rtrim($product->balance->free_balance, '0'), '.').' '.$unit.' <em>(информация приблизительная, точную информацию о наличии спрашивайте у менеджера)</em></p>';
                                $description .= '<p>--------------------</p>';
                            } else {
                                $description .= '<p>--------------------</p>';
                                $description .= '<p>&#9989; На утро '.$date.' доступно &asymp; '.$product->balance->free_balance.' '.$unit.' <em>(информация приблизительная, точную информацию о наличии спрашивайте у менеджера)</em></p>';
                                $description .= '<p>--------------------</p>';
                            }
                        }


                        $description .= '<p><em>Цена указана за 1 '.$unit.'.</em></p><ul>';


                            if($product->width != 0 && $product->height != 0) {
                            $description .= '<li><strong>Размер, см: </strong>' . $product->height/10 .'x' . $product->width/10 . '</li>';
                            }
                            if($product->thickness != null) {
                            $description .= '<li><strong>Толщина, мм: </strong>' . $product->thickness . '</li>';
                            }
                            if($product->surface_type != null) {
                            $description .= '<li><strong>Поверхность: </strong>' . $product->surface_type . '</li>';
                            }
                            if($product->Рельеф != null) {
                            $description .= '<li><strong>Рельеф: </strong>' . $product->Рельеф . '</li>';
                            }
                            if($unit == 'м2') {
                            $description .= '<li><strong>Штук в упаковке: </strong>' . $pack_ratio/$one_count_ratio . '</li>';
                            }
                            if($unit == 'м2') {
                            $description .= '<li><strong>Кв. метров в упаковке: </strong>' . $pack_ratio . '</li>';
                            }
                            if($product->country != null) {
                            $description .= '<li><strong>Страна производства: </strong>' . $product->country . '</li>';
                            }
                            if($product->artikul != null) {
                            $description .= '<li><strong>Артикул: </strong>' . $product->artikul . '</li>';
                            }

                            $description .= '</ul><br>';


                        $description .= '<p>Наличие а также актуальные цены уточняйте у менеджера.</p>';
                        $description .= '<p>В нашем шоуруме представлены коллекции многих других известных производителей керамогранита, керамической плитки, мозаики и других напольных покрытий (ламинат, паркет, инженерная доска и др.)</p>';
                        $description .= '<p>Работаем с розничными и оптовыми покупателями. А так же предлагаем сотрудничество дизайнерам и строительным компаниям.</p>';


                        $keywords = '';


                        if(stripos($product->collection_item, 'екор') !== false) {
                            $type = 'декор';
                            }
                            elseif(stripos($product->collection_item, 'анно') !== false) {
                            $type = 'панно';
                            }
                            elseif(stripos($product->collection_item, 'ордюр') !== false) {
                            $type = 'бордюр';
                            }
                            elseif(stripos($product->collection_item, 'озаика') !== false) {
                            $type = 'мозаика';
                            }
                            elseif(stripos($product->collection_item, 'литка') !== false) {
                            $type = 'керамическая плитка';
                            }
                            elseif(stripos($product->collection_item, 'ерамогранит') !== false) {
                            $type = 'керамогранит';
                            }
                            else {
                                $type = '';
                        }

                        $lenght = $product->height;
                        $height = $product->width;

                        $size = '';
                        $size .= $type . ' ' . $lenght . 'х' . $height . ', ';
                        if ($lenght != $height) {
                            $size .= $type . ' ' . $height . 'х' . $lenght . ', ';
                        }
                        $size .= $type . ' ' . $lenght . '*' . $height . ', ';
                        if ($lenght != $height) {
                            $size .= $type . ' ' . $height . '*' . $lenght . ', ';
                        }

                        if($product->width != 0 && $product->height != 0) {
                        $keywords .= $size;
                        }

                        $surface = $product->surface_type;
                        $surf = '';

                        if ($surface != null) {

                            if ($type == 'мозаика' || $type == 'керамическая плитка') {
                                $surf = $surface;
                            }

                            if ($type == 'керамогранит' || $type == 'декор' || $type == 'бордюр') {
                                $surf = str_replace('ая', 'ый', $surface);
                            }

                            if ($type == 'панно') {
                                $surf = str_replace('ая', 'ое', $surface);
                            }
                        }

                        $keywords .= $type . ' ' .mb_strtolower($surf) . ', ';

                        $keywords .= $product->category_rel->parent . ' ' . $type . ', ';


                        $owner_code = $product->artikul;

                        if ($owner_code != null) {
                            $keywords .= $type . ' ' . $owner_code . ', ';
                        }

                        $country = $product->country;

                        if ($country != null) {
                            $keywords .= $type . ' ' . $country;
                        }
            //---
                        if ($type != 'декор') {
                            $description .= '<p>_____________________</p>';
                            $description .= '<p><em>' . $keywords . '</em></p>';
                        }

                        $description = str_replace('Архив', '', $description);

        @endphp
        <tr>
            <td></td>
            <td>{{ $code_avito }}</td>
            <td>В сообщениях</td>
            <td>kkvvnn89@gmail.com</td>
            <td>Активно</td>
            <td>Владимир</td>
            <td>{{$price}}</td>
            <td>Напольные решения</td>
            <td>{{$title}}</td>
            <td>{{$img_ready}}</td> <!-- -->
            <td>Отделка</td>
            <td>Стройматериалы</td>
            <td>Ремонт и строительство</td>
            <td>Package</td>
            <td>{{$FinishingType}}</td>
            <td>79039890822</td> <!-- -->
            <td>{{$description}}</td> <!-- -->
            <td>Москва, парк Победы</td>
            <td>Товар от производителя</td>
            <td>{{$FinishingSubType}}</td>
            <td>Новое</td>
            <td></td>
        </tr>
    @endforeach

    {{--    -----------------------ALTACERA_END----------------------------}}


    {{--    ---------------------NTCERAMIC------------------------------}}
    @foreach($ntceramic as $product)
        @php
            $price = $product->price;
            $price = round($price * 0.93, -1);
//                --------------------------
            $title = $product->referer->title;
//                -----------------------------
//              ------------------------------------------FOTO-------------------------------------

            $img = $product->referer->img1;



        if ($product->referer->img2 != null) {
            $img .= ' | '.$product->referer->img2;
        }
        if ($product->referer->img3 != null) {
            $img .= ' | '.$product->referer->img3;
        }
        if ($product->referer->img4 != null) {
            $img .= ' | '.$product->referer->img4;
        }
        if ($product->referer->img5 != null) {
            $img .= ' | '.$product->referer->img5;
        }
        if ($product->referer->img6 != null) {
            $img .= ' | '.$product->referer->img6;
        }
        if ($product->referer->img7 != null) {
            $img .= ' | '.$product->referer->img7;
        }
        if ($product->referer->img8 != null) {
            $img .= ' | '.$product->referer->img8;
        }
        if ($product->referer->img9 != null) {
            $img .= ' | '.$product->referer->img9;
        }
        if ($product->referer->img10 != null) {
            $img .= ' | '.$product->referer->img10;
        }
        if ($product->referer->img11 != null) {
            $img .= ' | '.$product->referer->img11;
        }
        if ($product->referer->img12 != null) {
            $img .= ' | '.$product->referer->img12;
        }
        if ($product->referer->img13 != null) {
            $img .= ' | '.$product->referer->img13;
        }
        if ($product->referer->img14 != null) {
            $img .= ' | '.$product->referer->img14;
        }
        if ($product->referer->img15 != null) {
            $img .= ' | '.$product->referer->img15;
        }
        if ($product->referer->img16 != null) {
            $img .= ' | '.$product->referer->img16;
        }
        if ($product->referer->img17 != null) {
            $img .= ' | '.$product->referer->img17;
        }
        if ($product->referer->img18 != null) {
            $img .= ' | '.$product->referer->img18;
        }
        if ($product->referer->img19 != null) {
            $img .= ' | '.$product->referer->img19;
        }
        if ($product->referer->img20 != null) {
            $img .= ' | '.$product->referer->img20;
        }

            $img_full_arr = explode(' | ', $img);

            if (count($img_full_arr) <= 10) {
                $img_ready = $img;
            } else {
                $img_full_arr = array_slice($img_full_arr, 0, 10);
                $img_ready = implode(' | ', $img_full_arr);
            }
//                ---------------------
            $FinishingType = 'Плитка, керамогранит и мозаика';
            $FinishingSubType = 'Керамогранит';
//                ---------------------
            $description = '<p>Керамогранит NT Ceramic. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены. Доставка по Москве, cамовывоз на западе Москвы.</p>';
            $description .= '<p><strong>Керамогранит ' . $product->brand . ' '
                    . $product->vendor_code . ' ('
                    . $product->country . ')</strong></p>';
            $description .= '<p>Коллекция: '.strtolower($product->collection).'</p>';
            $description .= '<p><em>Цена указана за 1 м.кв.</em></p><ul>';


                $description .= '<li><strong>Размер, см: </strong>' . $product->size_cm . '</li>';
                if($product->fat != null && $product->fat != 0) {
                $description .= '<li><strong>Толщина: </strong>' . $product->fat . '</li>';
                }
                if($product->referer->color != null) {
                $description .= '<li><strong>Цвет: </strong>' . $product->referer->color . '</li>';
                }
                if($product->surface != null) {
                $description .= '<li><strong>Поверхность: </strong>' . $product->surface . '</li>';
                }
                if($product->count_in_pack != null) {
                $description .= '<li><strong>Штук в упаковке: </strong>' . $product->count_in_pack . '</li>';
                }
                if($product->square_in_pack != null) {
                $description .= '<li><strong>Кв. метров в упаковке: </strong>' . str_replace(',', '.', $product->square_in_pack) . '</li>';
                }
                if($product->country != null) {
                $description .= '<li><strong>Страна производства: </strong>' . $product->country . '</li>';
                }
                if($product->vendor_code != null) {
                $description .= '<li><strong>Артикул: </strong>' . $product->vendor_code . '</li>';
                }

                $description .= '</ul><br>';


            $description .= '<p>Наличие а также актуальные цены уточняйте у менеджера.</p>';
            $description .= '<p>В нашем шоуруме представлены коллекции многих других известных производителей керамогранита, керамической плитки, мозаики и других напольных покрытий (ламинат, паркет, инженерная доска и др.)</p>';
            $description .= '<p>Работаем с розничными и оптовыми покупателями. А так же предлагаем сотрудничество дизайнерам и строительным компаниям.</p>';




        @endphp
        <tr>
            <td></td>
            <td>{{ $product->vendor_code }}</td>
            <td>В сообщениях</td>
            <td>kkvvnn89@gmail.com</td>
            <td>Активно</td>
            <td>Владимир</td>
            <td>{{$price}}</td>
            <td>Напольные решения</td>
            <td>{{$title}}</td>
            <td>{{$img_ready}}</td> <!-- -->
            <td>Отделка</td>
            <td>Стройматериалы</td>
            <td>Ремонт и строительство</td>
            <td>Package</td>
            <td>{{$FinishingType}}</td>
            <td>79039890822</td> <!-- -->
            <td>{{$description}}</td> <!-- -->
            <td>Москва, парк Победы</td>
            <td>Товар от производителя</td>
            <td>{{$FinishingSubType}}</td>
            <td>Новое</td>
            <td></td>
        </tr>
    @endforeach

    {{--    -----------------------NTCERAMIC_END----------------------------}}


    </tbody>
</table>

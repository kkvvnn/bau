{{--AVITO-LAPARET--}}

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
        <th>FinishingSubType</th>
        <th>Condition</th>
        <th>VideoUrl</th>
    </tr>
    </thead>
    <tbody>

    {{---------------------BAUSERVICE--------------------------}}
    @foreach($laparets as $product)

        @php
            if(stripos($product->Name, 'литка') !== false) {
                $FinishingType = 'Плитка, керамогранит и мозаика';
                $FinishingSubType = 'Керамическая плитка';
            }
            elseif(stripos($product->Name, 'озаика') !== false) {
                $FinishingType = 'Плитка, керамогранит и мозаика';
                $FinishingSubType = 'Мозаика';
            }
            elseif(stripos($product->Name, 'ерамогранит') !== false) {
                $FinishingType = 'Плитка, керамогранит и мозаика';
                $FinishingSubType = 'Керамогранит';
            } else {
                $FinishingType = 'Другое';
                $FinishingSubType = '';
            }
        @endphp

        @php
            $description = '';

            if($add_description_first != '') {
            $description .= '<p>'.nl2br($add_description_first).'</p>';
            }

            $description .= '<p>Официальный шоурум Laparet на западе Москвы <br>
                            Информацию о размере персональной скидки и актуальные цены уточняйте в чате у менеджера</p>';

            if ($product->Novinka == 1) {
                $description .= '<p>&#9889;Новинка&#9889; <strong>'.$product->Producer_Brand.' '.$product->Name. '  Лапарет </strong></p>';
            } else {
                $description .= '<p><strong>'.$product->Producer_Brand.' '.$product->Name. '  Лапарет </strong></p>';
            }

//            $description .= '<p>--------------------</p>';
            $date = date('d.m.Y');
//            if ($product->balanceCount > 0) {
                $description .= '<p>&#9989;<strong> Свободный остаток на '.$date.': </strong></p><ul>';
                $description .= '<li>Москва - '.round($product->balanceCount, 2).' '.$product->MainUnit.'</li>';
                if (isset($product->spb)) {
                    $description .= '<li>СПб - '.round($product->spb->balanceCount, 2).' '.$product->MainUnit.'</li>';
                }
                if (isset($product->kzn)) {
                    $description .= '<li>Казань - '.round($product->kzn->balanceCount, 2).' '.$product->MainUnit.'</li>';
                }
                $description .= '<li>Нижний Новгород - по запросу</li>';
                $description .= '</ul>';
//            }
//            $description .= '<p>--------------------</p>';




//            $description .= '<p><em>Цена указана за 1 ' . $product->MainUnit . '</em></p>';

            $description .= '<p><strong>Коллекция: </strong>Laparet ';
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
                }/*
                if($product->Place_in_the_Collection != null) {
                $description .= '<li><strong>Место в коллекции: </strong>' . $product->Place_in_the_Collection . '</li>';
                }*/
                if($product->DesignValue != null) {
                $description .= '<li><strong>Дизайн: </strong>' . $product->DesignValue . '</li>';
                }
                if($product->Color != null) {
                $description .= '<li><strong>Цвет: </strong>' . $product->Color . '</li>';
                }
                if($product->Surface != null) {
                $description .= '<li><strong>Поверхность: </strong>' . $product->Surface . '</li>';
                }
                if($product->MainUnit != null) {
                $description .= '<li><strong>Ед. измерения: </strong>' . $product->MainUnit . '</li>';
                }
                if($product->PCS_in_Package != null) {
                $description .= '<li><strong>В упаковке: </strong>' . $product->PCS_in_Package . ' шт.</li>';
                }
                if($product->Package_Value != null && $product->Package_Value != $product->PCS_in_Package) {
                $description .= '<li><strong>В упаковке: </strong>' . $product->Package_Value . ' м2</li>';
                }/*
                if($product->Producer_Brand != null) {
                $description .= '<li><strong>Бренд: </strong>' . $product->Producer_Brand . '</li>';
                }*/
                if($product->Country_of_manufacture != null) {
                $description .= '<li><strong>Производство: </strong>' . $product->Country_of_manufacture . '</li>';
                }

                $description .= '</ul><br>';


            $description .= '<p>&#128142; <strong>Наши преимущества:</strong></p><ul>';
            $description .= '<li>надежная компания с опытом более 15 лет</li>';
            $description .= '<li>просторный шоурум с образцами товаров</li>';
            $description .= '<li>увеличеный срок возврата товаров - до 25 дней</li>';
            $description .= '<li>бесплатная замена в случае повреждения товара в процессе транспортировки</li>';
            $description .= '<li>есть пункт самовывоза - поможем с погрузкой</li>';
            $description .= '<li>доставка по Москве и близлежайшим районам собственным транспортом (так же есть услуги разгрузки и подъема)</li>';
            $description .= '<li>возможность доставки керамогранита из других городов при отсутствии товара в Москве (условия уточняйте у менеджера)</li>';
            $description .= '<li>специальные условия и бонусы для постоянных клиентов</li>';
            $description .= '</ul>';

            $description .= '<p>&#127972; <strong>Адрес шоурума: ТД"Можайский двор" ул.Западная, стр 100</strong></p>';
            $description .= '<p>&#128345; <strong>Часы работы шоурума: с 10 до 19 (в выходные дни с 10 до 18)</strong></p>';
            $description .= '<p><strong>Онлайн отдел отвечает на Ваши вопросы в рабочее время с 10 до 18 (в выходные дни с 10 до 15)</strong></p>';
//            $description .= '<p>&#127873; Приезжайте в наш шоурум, сообщите менеджеру промокод <strong>"Laparet Avito Запад"</strong>, и Вам предложат специальные условия по цене и дополнительные бонусы</p>';

            $description .= '<p>Доставка возможна на следующий день после заказа, если он был оформлен до 14:00</p>';

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

            if((stripos($product->Field_of_Application, 'пол') !== false) && (stripos($product->Field_of_Application, 'ван') !== false)) {
                $naznachenie = $type . ' для пола ' . $type . ' для ванной комнаты';
            }
            elseif(stripos($product->Field_of_Application, 'пол') !== false) {
                $naznachenie = $type . ' для пола';
            }
            elseif(stripos($product->Field_of_Application, 'ван') !== false) {
                $naznachenie = $type . ' для ванной комнаты';
            } else {
                $naznachenie = '';
            }

            $keywords .= $naznachenie . ' ';



            $lenght = round((float)str_replace(',', '.', $product->Lenght), -1, PHP_ROUND_HALF_EVEN);
            $height = round((float)str_replace(',', '.', $product->Height), -1, PHP_ROUND_HALF_EVEN);

            $size = '';
            $size .= $type . ' ' . $lenght . 'х' . $height . ' ';
            if ($lenght != $height) {
                $size .= $type . ' ' . $height . 'х' . $lenght . ' ';
            }
            $size .= $type . ' ' . $lenght . '*' . $height . ' ';
            if ($lenght != $height) {
                $size .= $type . ' ' . $height . '*' . $lenght . ' ';
            }

            if($product->Height != 0 && $product->Lenght != 0) {
            $keywords .= $size;
            }

            $keywords .= $type . ' лапарет ';



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


            if(stripos($product->Architectural_surface, 'Стена') !== false) {
                $keywords .= $type . ' для стен' . ' ';
            }
            if(stripos($product->Architectural_surface, 'Пол') !== false) {
                $keywords .= $type . ' для пола' . ' ';
            }


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

            $keywords .= $type . ' Москва '.$type.' запад '. $type;

            $keywords .= ' плитка лапарет плитка laparet фирменный магазин плитки плитка дешево laparet все коллекции лапарет весь ассортимент';

            if (isset($product->collections[0])) {
                $keywords .= ' керамогранит '. $product->collections[0]->Collection_Name;
            }

            if ($type != 'декор') {
                $description .= '<p>________________</p>';
                $description .= '<p><em>' . $keywords . '</em></p>';
            }
        @endphp

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
            if (isset($product->Picture7) && $product->Picture7 != null) {
            $img7 = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', config('app.url').'/storage/images/bauservice/products/', $product->Picture7);
            } else {$img7 = null;}
            if (isset($product->Picture8) && $product->Picture8 != null) {
            $img8 = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', config('app.url').'/storage/images/bauservice/products/', $product->Picture8);
            } else {$img8 = null;}

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


            if ($img_coll_2 != null) {
                $img_full = $img_coll_2 . ' | ' . $img1;
            } else {
                $img_full = $img1;
            }

            if ($img_coll != null) {
            $img_full .= ' | ' . $img_coll;
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
            if ($img5 != null) {
            $img_full .= ' | ' . $img5;
            }
            if ($img6 != null) {
            $img_full .= ' | ' . $img6;
            }
            if ($img7 != null) {
            $img_full .= ' | ' . $img7;
            }
            if ($img8 != null) {
            $img_full .= ' | ' . $img8;
            }

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
            if (mb_strlen($title) < 42) { $title = $product->Producer_Brand . ' ' . $title; }
        @endphp

        @php
            if ($product->RMPriceOld == 0 || $product->RMPriceOld == $product->RMPrice) {
                $price = round($product->RMPrice * 0.9, -1);
//                $price = $product->RMPrice;
//                $price = '';
            } else {
                $price = $product->RMPrice;
//                $price = '';
            }

            $price = $product->RMPrice; //power RRC

        @endphp

        @php
            $code = str_replace('х', '', $product->Element_Code) . '_lz';
        @endphp

        <tr>
            <td></td>
            <td>{{ $code }}</td>
            <td>{{ $contact_method }}</td>
            <td>rodioncom@yandex.ru</td>
            <td>Активно</td>
            <td>{{ $name }}</td>
            <td>{{ $price }}</td>
            <td>Laparet-Запад</td>
            <td>{{ $title }}</td>
            <td>{{ $img_full }}</td>
            <td>Отделка</td>
            <td>Стройматериалы</td>
            <td>Ремонт и строительство</td>
            <td>Package</td>
            <td>{{ $FinishingType }}</td>
            <td>{{ $phone }}</td> <!-- -->
            <td>{{ $description }}</td> <!-- -->
            <td>{{ $address }}</td>
            <td>Товар от производителя</td>
            <td>{{ $FinishingSubType }}</td>
            <td>Новое</td>
            <td></td>
        </tr>
    @endforeach
    {{------------------END-BAUSERVICE--------------------}}

    {{-----------------OLDS--------------------}}
    @foreach($olds as $old)
        @php
            $price = '';
            $title = $old->Title;

            $img_ready = $old->ImageUrls;

            $description = '';

             if($add_description_first != '') {
                $description .= '<p>'.nl2br($add_description_first).'</p>';
            }

            $description .= $old->Description;

            $FinishingType = $old->FinishingType;
            $FinishingSubType = $old->FinishingSubType;



            if($add_description != '') {
                $description .= '<p>'.nl2br($add_description).'</p>';
            }
        @endphp
        <tr>
            <td>{{ $old->AvitoId }}</td>
            <td>{{ $old->Id_av }}</td>
            <td>{{ $contact_method }}</td>
            <td>rodioncom@yandex.ru</td>
            <td>Активно</td>
            <td>{{ $name }}</td>
            <td>{{$price}}</td>
            <td>Laparet-Запад</td>
            <td>{{$title}}</td>
            <td>{{$img_ready}}</td>
            <td>Отделка</td>
            <td>Стройматериалы</td>
            <td>Ремонт и строительство</td>
            <td>Package</td>
            <td>{{$FinishingType}}</td>
            <td>{{ $phone }}</td> <!-- -->
            <td>{{$description}}</td> <!-- -->
            <td>{{ $address }}</td>
            <td>Товар от производителя</td>
            <td>{{$FinishingSubType}}</td>
            <td>Новое</td>
            <td>{{$old->VideoUrl}}</td>
        </tr>
    @endforeach
    {{-----------------OLDS-END-------------------}}

    </tbody>
</table>

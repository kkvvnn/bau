<table>
    <thead>
    <tr>
        <th>AvitoId</th>
        <th>Id</th>
        <th>ContactMethod</th>
{{--        <th>InternetCalls</th>--}}
{{--        <th>CallsDevices</th>--}}
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
        <th>MixesType</th>
    </tr>
    </thead>
    <tbody>

    {{-----BAUSERVICE-----}}
    @foreach($products as $product)
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

            $description = '';

            if($add_description_first != '') {
            $description .= '<p>'.nl2br($add_description_first).'</p>';
            }

            if ($product->Producer_Brand == 'Laparet') {
//                if ($product->RMPriceOld == 0 || $product->RMPriceOld == $product->RMPrice) {
//                    $description .= '<p>Весь декабрь у нас действует <strong>ЧЕСТНАЯ 15% СКИДКА</strong> на всю линейку керамической плитки от Laparet. Успей оформить заказ!</p>';
//                }
                $description .= '<p>Керамическая плитка и керамогранит Laparet , Лапарет. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены при покупке большого объема. Доставка по Москве, cамовывоз на западе Москвы.</p>';
            } elseif ($product->Producer_Brand == 'Cersanit') {
                $description .= '<p>Керамическая плитка и керамогранит Cersanit , Церсанит. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены при покупке большого объема. Доставка по Москве, cамовывоз на западе Москвы.</p>';
            } elseif ($product->Producer_Brand == 'Vitra') {
//                if ($product->RMPriceOld == 0 || $product->RMPriceOld == $product->RMPrice) {
//                    $description .= '<p>Весь декабрь у нас действует <strong>ЧЕСТНАЯ 10% СКИДКА</strong> на всю линейку керамической плитки от Vitra. Успей оформить заказ!</p>';
//                }
                $description .= '<p>Керамическая плитка и керамогранит Vitra , Витра. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены при покупке большого объема. Доставка по Москве, cамовывоз на западе Москвы.</p>';
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
            $description .= '<p>В нашем шоуруме представлены коллекции многих других известных производителей керамогранита, керамической плитки, мозаики и других напольных покрытий (ламинат, паркет, кварцвинил, инженерная доска и др.)</p>';
            $description .= '<p>Работаем с розничными и оптовыми покупателями. А так же предлагаем сотрудничество дизайнерам и строительным компаниям.</p>';

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

            if ($product->Producer_Brand == 'Laparet') {
                $keywords .= $type . ' лапарет ';
            } elseif ($product->Producer_Brand == 'Cersanit') {
                $keywords .= $type . ' церсанит ';
            } elseif ($product->Producer_Brand == 'Vitra') {
                $keywords .= $type . ' витра ';
            } elseif ($product->Producer_Brand == 'Ceradim') {
                $keywords .= $type . ' керадим ';
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


            if(stripos($product->Architectural_surface, 'Стена') !== false) {
                $keywords .= $type . ' для стен' . ' ';
            }
            if(stripos($product->Architectural_surface, 'Пол') !== false) {
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

    //          -----------------------------------------------------------------------------------

            if ($img_coll != null) {
                $img_full = $img_coll . ' | ' . $img1;
            } else {
                $img_full = $img1;
            }


//            if ($img_coll != null) {
//            $img_full .= ' | ' . $img1;
//            }
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
            if ($img5 != null) {
            $img_full .= ' | ' . $img5;
            }
            if ($img6 != null) {
            $img_full .= ' | ' . $img6;
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
            //            if ($product->Producer_Brand == 'Laparet') {
            //                if ($product->RMPriceOld == 0) {
            //                    $price = round($product->RMPrice * 0.91, -1);
            //                } else {
            //                    $price = $product->RMPrice;
            //                }
            //            } elseif ($product->Producer_Brand == 'Cersanit') {
            //                if ($product->RMPriceOld == 0) {
            //                    $price = round($product->RMPrice * 0.93, -1);
            //                } else {
            //                    $price = $product->RMPrice;
            //                }
            //            } elseif ($product->Producer_Brand == 'Vitra') {
            //                if ($product->RMPriceOld == 0) {
            //                    $price = round($product->RMPrice * 0.93, -1);
            //                } else {
            //                    $price = $product->RMPrice;
            //                }
            //            }

            //--------------------------------------------------------------------------
            //            $price = $product->RMPrice;
                        if ($product->Producer_Brand == 'Laparet') {
                            if ($product->RMPriceOld == 0 || $product->RMPriceOld == $product->RMPrice) {
                                $price = round($product->RMPrice * 0.9, -1);
                            } else {
                                $price = $product->RMPrice;
                            }
                        } elseif ($product->Producer_Brand == 'Vitra') {
                            if ($product->RMPriceOld == 0 || $product->RMPriceOld == $product->RMPrice) {
                                $price = round($product->RMPrice * 0.95, -1);
                            } else {
                                $price = $product->RMPrice;
                            }
                        } else {
                            $price = $product->RMPrice;
                        }


                        $price = $product->RMPrice;

            //            if ($product->Name == 'Tiaki Green Керамогранит 60x120 Полированный' || $product->Name == 'Dalim Mint Керамогранит 60x60 Полированный') {
            //                $price = '';
            //            }
            //----------------------------------------------------------------------------

        @endphp

        <tr>
            <td></td>
            <td>{{ $product->Element_Code }}</td>
            <td>{{ $contact_method }}</td>
{{--            <td>Да</td>--}}
{{--            <td>466694981</td>--}}
            <td>kkvvnn89@gmail.com</td>
            <td>Активно</td>
            <td>{{ $name }}</td>
            <td>{{$price}}</td>
            <td>Напольные решения</td>
            <td>{{$title}}</td>
            <td>{{$img_full}}</td> <!-- -->
            <td>Отделка</td>
            <td>Стройматериалы</td>
            <td>Ремонт и строительство</td>
            <td>Package</td>
            <td>{{$FinishingType}}</td>
            <td>{{ $phone }}</td> <!-- -->
            <td>{{$description}}</td> <!-- -->
            <td>{{ $address }}</td>
            <td>Товар от производителя</td>
            <!-- <td>{{$date_next_month}}</td> -->
            <td>{{$FinishingSubType}}</td>
            <td>Новое</td>
            <td></td>
            <td></td> {{--MixesType--}}
        </tr>
    @endforeach
    {{-----BAUSERVICE-END----}}

    {{-----GLOBAL-TILE-----}}
    @foreach($globaltile as $product)
        @php
            if(stripos($product->type, 'литка') !== false) {
            $FinishingType = 'Плитка, керамогранит и мозаика';
            $FinishingSubType = 'Керамическая плитка';
            }
            elseif(stripos($product->type, 'озаика') !== false) {
            $FinishingSubType = 'Мозаика';
            $FinishingType = 'Плитка, керамогранит и мозаика';
            }
            elseif(stripos($product->type, 'ерамогранит') !== false) {
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

            $description = '';

            if($add_description_first != '') {
            $description .= '<p>'.nl2br($add_description_first).'</p>';
            }

            if ($product->brand == 'GlobalTile') {
                $description .= '<p>Керамическая плитка и керамогранит Global Tile , Глобалтайл. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены при покупке большого объема. Доставка по Москве, cамовывоз на западе Москвы.</p>';
            } else {
                $description .= '<p>Керамическая плитка и керамогранит. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены при покупке большого объема. Доставка по Москве, cамовывоз на западе Москвы.</p>';
            }


            if ($product->status == 'New') {
                $description .= '<p>&#9889;Новинка&#9889; <strong>' . $product->brand . ' ' . $product->title .  ' ('
                    . $product->country . ')</strong></p>';
            } else {
                $description .= '<p><strong>' . $product->brand . ' ' . $product->title .  ' ('
                    . $product->country . ')</strong></p>';
            }

            $description .= '<p>--------------------</p>';
            $date = date('d.m.Y');
            if ($product->balance > 0) {
                $description .= '<p>&#9989; На утро '.$date.' остаток '.round($product->balance, 2).' '.$product->unit.' <em>(информация приблизительная, точную информацию о наличии спрашивайте у менеджера)</em></p>';
            }
            $description .= '<p>--------------------</p>';




            $description .= '<p><em>Цена указана за 1 ' . $product->unit . '</em></p>';

            $description .= '<p><strong>Коллекция: </strong>';
            $description .= str_replace('_GT', '', $product->collection) . '</p><ul>';


                if($product->length != 0 && $product->width != 0) {
                $description .= '<li><strong>Размер: </strong>' . $product->length*100 .'x' . $product->width*100 . 'см </li>';
                }
                if($product->fat != null && $product->fat != 0) {
                $description .= '<li><strong>Толщина: </strong>' . $product->fat*100 . 'см </li>';
                }
                if($product->type != null) {
                $description .= '<li><strong>Место в коллекции: </strong>' . $product->type . '</li>';
                }
                if($product->design != null) {
                $description .= '<li><strong>Рисунок: </strong>' . $product->design . '</li>';
                }
                if($product->color != null) {
                $description .= '<li><strong>Цвет: </strong>' . $product->color . '</li>';
                }
//                if($product->Cover != null) {
//                $description .= '<li><strong>Покрытие: </strong>' . $product->Cover . '</li>';
//                }
                if($product->surface != null) {
                $description .= '<li><strong>Поверхность: </strong>' . $product->surface . '</li>';
                }
                if($product->unit != null) {
                $description .= '<li><strong>Единица измерения товара: </strong>' . $product->unit . '</li>';
                }
                if($product->count_in_pack != null) {
                $description .= '<li><strong>Штук в упаковке: </strong>' . $product->count_in_pack . '</li>';
                }
                if($product->meters_in_pack != null && $product->meters_in_pack != $product->count_in_pack) {
                $description .= '<li><strong>Кв. метров в упаковке: </strong>' . $product->meters_in_pack . '</li>';
                }
                if($product->brand != null) {
                $description .= '<li><strong>Производитель: </strong>' . $product->brand . '</li>';
                }
                if($product->country != null) {
                $description .= '<li><strong>Страна производства: </strong>' . $product->country . '</li>';
                }

                $description .= '</ul><br>';


            $description .= '<p>Наличие а также актуальные цены уточняйте у менеджера.</p>';
            $description .= '<p>В нашем шоуруме представлены коллекции многих других известных производителей керамогранита, керамической плитки, мозаики и других напольных покрытий (ламинат, паркет, кварцвинил, инженерная доска и др.)</p>';
            $description .= '<p>Работаем с розничными и оптовыми покупателями. А так же предлагаем сотрудничество дизайнерам и строительным компаниям.</p>';

            if($add_description != '') {
            $description .= '<p>'.nl2br($add_description).'</p>';
            }


            $keywords = '';


            if(stripos($product->type, 'екор') !== false) {
            $type = 'декор';
            }
            elseif(stripos($product->type, 'озаика') !== false) {
            $type = 'мозаика';
            }
            elseif(stripos($product->type, 'литка') !== false) {
            $type = 'керамическая плитка';
            }
            elseif(stripos($product->type, 'ерамогранит') !== false) {
            $type = 'керамогранит';
            }
            else {
                $type = '';
            }

            if((stripos($product->for, 'астенна') !== false)) {
                $naznachenie = $type . ' для стен';
            }
            elseif(stripos($product->for, 'пол') !== false) {
                $naznachenie = $type . ' для пола';
            }
            elseif(stripos($product->for, 'иверсальна') !== false) {
                if ($type == 'керамическая плитка' || $type == 'мозаика') {
                    $naznachenie = $type . ' универсальная';
                } elseif ($type == 'керамогранит') {
                    $naznachenie = $type . ' универсальный';
                } else {
                    $naznachenie = $type . ' универсальный';
                }

            } else {
                $naznachenie = '';
            }

            $keywords .= $naznachenie . ' ';

            if(stripos($product->design, 'Дерев') !== false) {
                $pod = $type . ' под дерево';
            }
            elseif(stripos($product->design, 'рамор') !== false) {
                $pod = $type . ' под мрамор';
            }
            elseif(stripos($product->design, 'амен') !== false) {
                $pod = $type . ' под камень';
            }
            elseif(stripos($product->design, 'етон') !== false) {
                $pod = $type . ' под бетон';
            }
            elseif(stripos($product->design, 'никс') !== false) {
                $pod = $type . ' под оникс';
            } else {
                $pod = '';
            }

            $keywords .= $pod . ' ';

//            $lenght = round((float)str_replace(',', '.', $product->Lenght), 0, PHP_ROUND_HALF_EVEN);
//            $height = round((float)str_replace(',', '.', $product->Height), 0, PHP_ROUND_HALF_EVEN);

            $lenght = $product->length * 100;
            $height = $product->width * 100;

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

            if ($product->brand == 'GlobalTile') {
                $keywords .= $type . ' globaltile глобал тайл ';
            } elseif ($product->brand == 'Cersanit') {
                $keywords .= $type . ' церсанит ';
            } elseif ($product->brand == 'Vitra') {
                $keywords .= $type . ' витра ';
            } elseif ($product->brand == 'Ceradim') {
                $keywords .= $type . ' керадим ';
            }



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

            $keywords .= $type . ' ' .mb_strtolower($surf) . ' ';


            $keywords .= ' плитка керамическая плитка ';


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

            $keywords .= $type . ' ' .mb_strtolower($color) . ' ';

            $keywords .= $product->brand . ' ' . $type . ' ';


            $owner_code = $product->vendor_code;

            if ($owner_code != null) {
                $keywords .= $type . ' ' . $owner_code . ' ';
            }

            $country = $product->country;

            if ($country != null) {
                $keywords .= $type . ' ' . $country . ' ';
            }

            if ($product->color == 'Белый' && $product->design == 'Мрамор') {
                $keywords .= $type . ' белый мрамор ';
                $keywords .= $type . ' под мрамор белый ';
            }

            if ($product->color == 'Черный' && $product->design == 'Мрамор') {
                $keywords .= $type . ' черный мрамор ';
                $keywords .= $type . ' под мрамор черный ';
            }

            if (stripos($product->title, 'alacatta') || stripos($product->title, 'alacata')) {
                $keywords .= ' керамогранит калаката плитка калаката керамогранит калакатта плитка калакатта';
            }



            if ($type != 'декор') {
                $description .= '<p>_____________________</p>';
                $description .= '<p><em>' . $keywords . '</em></p>';
            }


        @endphp

        @php
            $img1 = str_replace('https://gallery.vogtrade.ru/wp-content/uploads/images/', config('app.url').'/storage/images/global-tile/', $product->Picture);

            if (isset($product->Picture2) && $product->Picture2 != null) {
            $img2 = str_replace('https://gallery.vogtrade.ru/wp-content/uploads/images/', config('app.url').'/storage/images/global-tile/', $product->Picture2);
            } else {$img2 = null;}
            if (isset($product->Picture3) && $product->Picture3 != null) {
            $img3 = str_replace('https://gallery.vogtrade.ru/wp-content/uploads/images/', config('app.url').'/storage/images/global-tile/', $product->Picture3);
            } else {$img3 = null;}
            if (isset($product->Picture4) && $product->Picture4 != null) {
            $img4 = str_replace('https://gallery.vogtrade.ru/wp-content/uploads/images/', config('app.url').'/storage/images/global-tile/', $product->Picture4);
            } else {$img4 = null;}
            if (isset($product->Picture5) && $product->Picture5 != null) {
            $img5 = str_replace('https://gallery.vogtrade.ru/wp-content/uploads/images/', config('app.url').'/storage/images/global-tile/', $product->Picture5);
            } else {$img5 = null;}
            if (isset($product->Picture6) && $product->Picture6 != null) {
            $img6 = str_replace('https://gallery.vogtrade.ru/wp-content/uploads/images/', config('app.url').'/storage/images/global-tile/', $product->Picture6);
            } else {$img6 = null;}
            if (isset($product->Picture7) && $product->Picture7 != null) {
            $img7 = str_replace('https://gallery.vogtrade.ru/wp-content/uploads/images/', config('app.url').'/storage/images/global-tile/', $product->Picture7);
            } else {$img7 = null;}
            if (isset($product->Picture8) && $product->Picture8 != null) {
            $img8 = str_replace('https://gallery.vogtrade.ru/wp-content/uploads/images/', config('app.url').'/storage/images/global-tile/', $product->Picture8);
            } else {$img8 = null;}
            if (isset($product->Picture9) && $product->Picture9 != null) {
            $img9 = str_replace('https://gallery.vogtrade.ru/wp-content/uploads/images/', config('app.url').'/storage/images/global-tile/', $product->Picture9);
            } else {$img9 = null;}

            if (isset($product->image_collection) && $product->image_collection != null) {
            $img_coll = str_replace('https://gallery.vogtrade.ru/wp-content/uploads/images/', config('app.url').'/storage/images/global-tile/', $product->image_collection);
            } else {$img_coll = null;}

//    ------------------------------------------FOTO-------------------------------------

    //          -----------------------------------------------------------------------------------

           $img_full = $img1;
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
            if ($img9 != null) {
            $img_full .= ' | ' . $img9;
            }

        @endphp

        @php
            $title = $product->vendor_code . ' ' . $product->type . ' ' . $product->brand . ' ' . str_replace('_GT', ' GT', $product->collection);

            if (mb_strlen($title) > 50) {
                $title = str_replace(' Керамическая плитка', '', $title);
            }
            if (mb_strlen($title) > 50) {
                $title = str_replace(' Керамогранит', '', $title);
            }
            if (mb_strlen($title) > 50) {
                $title = str_replace(' Керамогранит', '', $title);
            }
            if (mb_strlen($title) > 50) {
                $title = str_replace(' GT', '', $title);
            }


//            $title = preg_replace('/\d+-\d+-\d+-\d+/', '', $title);
//            if (mb_strlen($title) < 42) { $title = $product->Producer_Brand . ' ' . $title; }
        @endphp

        @php

                        $price = round($product->price * 0.9, -1);

            //----------------------------------------------------------------------------

        @endphp

        <tr>
            <td></td>
            <td>{{ $product->vendor_code }}</td>
            <td>{{ $contact_method }}</td>
            {{--            <td>Да</td>--}}
            {{--            <td>466694981</td>--}}
            <td>kkvvnn89@gmail.com</td>
            <td>Активно</td>
            <td>{{ $name }}</td>
            <td>{{$price}}</td>
            <td>Напольные решения</td>
            <td>{{$title}}</td>
            <td>{{$img_full}}</td> <!-- -->
            <td>Отделка</td>
            <td>Стройматериалы</td>
            <td>Ремонт и строительство</td>
            <td>Package</td>
            <td>{{$FinishingType}}</td>
            <td>{{ $phone }}</td> <!-- -->
            <td>{{$description}}</td> <!-- -->
            <td>{{ $address }}</td>
            <td>Товар от производителя</td>
            <!-- <td>{{$date_next_month}}</td> -->
            <td>{{$FinishingSubType}}</td>
            <td>Новое</td>
            <td></td>
            <td></td> {{--MixesType--}}
        </tr>
    @endforeach
    {{-----GLOBAL-TILE-END----}}

    {{-----PRIMAVERA-----}}
    @foreach($primavera as $product)
        @php
            $price = $product->price;
            $price = round($price * 0.95, -1);
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

            $description = '';

            if($add_description_first != '') {
            $description .= '<p>'.nl2br($add_description_first).'</p>';
            }

            $description .= '<p>Керамическая плитка и керамогранит Primavera , Примавера. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены. Доставка по Москве, cамовывоз на западе Москвы.</p>';
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
            $description .= '<p>В нашем шоуруме представлены коллекции многих других известных производителей керамогранита, керамической плитки, мозаики и других напольных покрытий (ламинат, паркет, кварцвинил, инженерная доска и др.)</p>';
            $description .= '<p>Работаем с розничными и оптовыми покупателями. А так же предлагаем сотрудничество дизайнерам и строительным компаниям.</p>';

            if($add_description != '') {
            $description .= '<p>'.nl2br($add_description).'</p>';
            }


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
            <td>{{ $contact_method }}</td>
{{--            <td>Да</td>--}}
{{--            <td>466694981</td>--}}
            <td>kkvvnn89@gmail.com</td>
            <td>Активно</td>
            <td>{{ $name }}</td>
            <td>{{$price}}</td>
            <td>Напольные решения</td>
            <td>{{$title}}</td>
            <td>{{$img_ready}}</td> <!-- -->
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
            <td></td>
            <td></td> {{--MixesType--}}
        </tr>
    @endforeach
    {{-----PRIMAVERA-END----}}

    {{-----ABSOLUT_GRES-----}}
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
            $description = '';

            if($add_description_first != '') {
            $description .= '<p>'.nl2br($add_description_first).'</p>';
            }

            $description .= '<p>Керамическая плитка и керамогранит Absolut Gres , Абсолют Грес. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены. Доставка по Москве, cамовывоз на западе Москвы.</p>';
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
            $description .= '<p>В нашем шоуруме представлены коллекции многих других известных производителей керамогранита, керамической плитки, мозаики и других напольных покрытий (ламинат, паркет, кварцвинил, инженерная доска и др.)</p>';
            $description .= '<p>Работаем с розничными и оптовыми покупателями. А так же предлагаем сотрудничество дизайнерам и строительным компаниям.</p>';

            if($add_description != '') {
            $description .= '<p>'.nl2br($add_description).'</p>';
            }


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
            <td>{{ $contact_method }}</td>
{{--            <td>Да</td>--}}
{{--            <td>466694981</td>--}}
            <td>kkvvnn89@gmail.com</td>
            <td>Активно</td>
            <td>{{ $name }}</td>
            <td>{{$price}}</td>
            <td>Напольные решения</td>
            <td>{{$title}}</td>
            <td>{{$img_ready}}</td> <!-- -->
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
            <td></td>
            <td></td> {{--MixesType--}}
        </tr>
    @endforeach
    {{-----ABSOLUT_GRES-END----}}

    {{-----LEEDO-----}}
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
            $description = '';

            if($add_description_first != '') {
            $description .= '<p>'.nl2br($add_description_first).'</p>';
            }

            $description .= '<p>Мозаика и керамогранит Caramelle & LeeDo. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены. Доставка по Москве, cамовывоз на западе Москвы.</p>';
            $description .= '<p><strong>' . $product->Item_chip . '. '
                    . $product->Brand_name . '</strong></p>';

            $description .= '<p>--------------------</p>';
            $date = date('d.m.Y');
            if (($product->Sklad_Msk_LeeDo > 0 && $product->Sklad_Msk_LeeDo != null) || ($product->Sklad_SPb_LeeDo > 0 && $product->Sklad_SPb_LeeDo != null)) {
            $description .= '<p>&#9989; На утро '.$date.' остаток '.round($product->Sklad_Msk_LeeDo)+round($product->Sklad_SPb_LeeDo).' '.$product->unit.' <em>(информация приблизительная, точную информацию о наличии спрашивайте у менеджера)</em></p>';
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
            $description .= '<p>В нашем шоуруме представлены коллекции многих других известных производителей керамогранита, керамической плитки, мозаики и других напольных покрытий (ламинат, паркет, кварцвинил, инженерная доска и др.)</p>';
            $description .= '<p>Работаем с розничными и оптовыми покупателями. А так же предлагаем сотрудничество дизайнерам и строительным компаниям.</p>';

            if($add_description != '') {
            $description .= '<p>'.nl2br($add_description).'</p>';
            }

        @endphp
        <tr>
            <td></td>
            <td>{{ $product->System_ID }}</td>
            <td>{{ $contact_method }}</td>
{{--            <td>Да</td>--}}
{{--            <td>466694981</td>--}}
            <td>kkvvnn89@gmail.com</td>
            <td>Активно</td>
            <td>{{ $name }}</td>
            <td>{{$price}}</td>
            <td>Напольные решения</td>
            <td>{{$title}}</td>
            <td>{{$img_ready}}</td> <!-- -->
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
            <td></td>
            <td></td> {{--MixesType--}}
        </tr>
    @endforeach
    {{-----LEEDO-END----}}

    {{-----ALTACERA-----}}
    @foreach($altacera as $product)
        @php
            //        -----------------------------------UNIT--------------------------
                                    $units = $product->units;
                                    $unit_id = $product->balance[0]->unit_id;
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

                                    $count_in_pack = (float)$pack_ratio / (float)$one_count_ratio;
            //        --------------------------------------------------------------
                        if($product->price !== null) {
                            if ($product->sale == 0) {
                                $price = round($product->price->price * 0.95, -1);
//                                $price = $product->price->price;
                            } else {
                                $price = $product->price->price;
                            }
//                            $price = $product->price->price;
                        } else {
                            $price = '';
                        }

                        $price = 1;
                        $contact_method = 'В сообщениях';
            //                --------------------------
                        $code_avito = $product->artikul;
            //                --------------------------
                        $title = $product->category_rel->parent.' '.$product->collection_item.' '.$product->name_for_site.' '.$product->artikul;
                        $title = str_replace('Архив', '', $title);
            //                -----------------------------
            //              ------------------------------------------FOTO-------------------------------------

                        if (isset($product->picture->images)) {
                            $imgs = $product->picture->images;
                            $imgs = implode(' | ', $imgs);
                        } else {
                            $imgs = config('app.url').Storage::disk('altacera')->url($product->tovar_id . '.JPEG');
                        }

//                        $imgs = config('app.url').Storage::disk('altacera')->url($product->tovar_id . '.JPEG');


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
            $description = '';

            if($add_description_first != '') {
            $description .= '<p>'.nl2br($add_description_first).'</p>';
            }
                        $description .= '<p>Керамическая плитка и керамогранит '.$product->category_rel->parent.'. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены. Доставка по Москве, cамовывоз на западе Москвы.</p>';
                        $description .= '<p><strong>' . $product->tovar . '. '
                                . $product->category_rel->parent . ' ('
                                . $product->country . ')</strong></p>';
                        $description .= '<p><strong>Коллекция: </strong>'.$product->category_rel->parent.' / '.$product->category. '</p>';



                        $date = date('d.m.Y');
                        $description .= '<p>--------------------</p>';
                        $description .= '<p>&#9989; На утро '.$date.' остаток: </p><ul>';


                        $balances = $product->balance;

                        $balance_moscow = 0;
                        $balance_krasnodar = 0;
                        $balance_kazan = 0;
                        $balance_spb = 0;

                        foreach ($balances as $balance) {
                            if ($balance['depot_id'] == '8c279853-d2c9-11e8-80c3-0cc47afc14e9') {
                                $balance_moscow = (float)$balance['free_balance'];
                            }
                            if ($balance['depot_id'] == '64c17eef-42d6-11e8-812c-10feed0262c6') {
                                $balance_krasnodar = (float)$balance['free_balance'];
                            }
                            if ($balance['depot_id'] == 'd1666584-d536-11ec-80f8-00155d5d5700') {
                                $balance_kazan = (float)$balance['free_balance'];
                            }
                            if ($balance['depot_id'] == '2170fa9f-bcdc-11ed-8167-00155d5d5700') {
                                $balance_spb = (float)$balance['free_balance'];
                            }
                        }

                        if($balance_moscow) {
                            $description .= '<li>Москва: ' . $balance_moscow . ' ' . $unit . '</li>';
                        }
                        if($balance_krasnodar) {
                            $description .= '<li>Краснодар: ' . $balance_krasnodar . ' ' . $unit . '</li>';
                        }
                        if($balance_kazan) {
                            $description .= '<li>Казань: ' . $balance_kazan . ' ' . $unit . '</li>';
                        }
                        if($balance_spb) {
                            $description .= '<li>СПб: ' . $balance_spb . ' ' . $unit . '</li>';
                        }



                        $description .= '</ul><p><em>(информация приблизительная, точную информацию о наличии спрашивайте у менеджера)</em></p>';
                        $description .= '<p>--------------------</p>';

//                        $description .= '<p><em>Цена указана за 1 '.$unit.'.</em></p><ul>';
                        $description .= '<p><em>Цена зависит от количества, формы оплаты, даты доставки (срочности), адреса доставки и подъема. Более детально по вашему заказу можем ответить после получения всех вводных данных.</em></p><ul>';


                            if($product->width != 0 && $product->height != 0) {
                            $description .= '<li><strong>Размер: </strong>' . $product->height .'x' . $product->width . ' мм</li>';
                            }
                            if($product->thickness != null) {
                            $description .= '<li><strong>Толщина: </strong>' . $product->thickness . ' мм</li>';
                            }
                            if($product->surface_type != null) {
                            $description .= '<li><strong>Поверхность: </strong>' . $product->surface_type . '</li>';
                            }
                            if($product->Рельеф != null) {
                            $description .= '<li><strong>Рельеф: </strong>' . $product->Рельеф . '</li>';
                            }
                            if($unit == 'м2' && $one_count_ratio != 1) {
                            $description .= '<li><strong>Штук в упаковке: </strong>' . round($count_in_pack) . '</li>';
                            }
                            if($unit == 'м2' && $one_count_ratio != 1) {
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
                        $description .= '<p>В нашем шоуруме представлены коллекции многих других известных производителей керамогранита, керамической плитки, мозаики и других напольных покрытий (ламинат, паркет, кварцвинил, инженерная доска и др.)</p>';
                        $description .= '<p>Работаем с розничными и оптовыми покупателями. А так же предлагаем сотрудничество дизайнерам и строительным компаниям.</p>';

                        if($add_description != '') {
                        $description .= '<p>'.nl2br($add_description).'</p>';
                        }


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
            <td>{{ $contact_method }}</td>
{{--            <td>Да</td>--}}
{{--            <td>466694981</td>--}}
            <td>kkvvnn89@gmail.com</td>
            <td>Активно</td>
            <td>{{ $name }}</td>
            <td>{{$price}}</td>
            <td>Напольные решения</td>
            <td>{{$title}}</td>
            <td>{{$img_ready}}</td> <!-- -->
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
            <td></td>
            <td></td> {{--MixesType--}}
        </tr>
    @endforeach
    {{-----ALTACERA-END----}}

    {{-----NTCERAMIC-----}}
    @foreach($ntceramic as $product)
        @php
            if (!isset($product->referer)) {
                continue;
            }
        @endphp
        @php
            $price = $product->price;
            $price = round($price * 0.93, -1);
            $price = '';
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
            $description = '';

            if($add_description_first != '') {
            $description .= '<p>'.nl2br($add_description_first).'</p>';
            }

            $description .= '<p>Керамогранит NT Ceramic. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены. Доставка по Москве, cамовывоз на западе Москвы.</p>';
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
            $description .= '<p>В нашем шоуруме представлены коллекции многих других известных производителей керамогранита, керамической плитки, мозаики и других напольных покрытий (ламинат, паркет, кварцвинил, инженерная доска и др.)</p>';
            $description .= '<p>Работаем с розничными и оптовыми покупателями. А так же предлагаем сотрудничество дизайнерам и строительным компаниям.</p>';

            if($add_description != '') {
            $description .= '<p>'.nl2br($add_description).'</p>';
            }




        @endphp
        <tr>
            <td></td>
            <td>{{ $product->vendor_code }}</td>
            <td>{{ $contact_method }}</td>
{{--            <td>Да</td>--}}
{{--            <td>466694981</td>--}}
            <td>kkvvnn89@gmail.com</td>
            <td>Активно</td>
            <td>{{ $name }}</td>
            <td>{{$price}}</td>
            <td>Напольные решения</td>
            <td>{{$title}}</td>
            <td>{{$img_ready}}</td> <!-- -->
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
            <td></td>
            <td></td> {{--MixesType--}}
        </tr>
    @endforeach
    {{-----NTCERAMIC-END----}}

    {{-----KEVIS-----}}
    @foreach($kevis as $product)
        @php
            $price = $product->price;
//            $price = round($price * 0.93, -1);
//                --------------------------
            $title = $product->category.' '.$product->brand.' '.$product->title;
//                -----------------------------
//              ------------------------------------------FOTO-------------------------------------

            $img = $product->images;

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
            $description = '';

            if($add_description_first != '') {
            $description .= '<p>'.nl2br($add_description_first).'</p>';
            }

            $description .= '<p>Керамогранит Kevis. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены. Доставка по Москве, cамовывоз на западе Москвы.</p>';
            $description .= '<p><strong>Керамогранит ' . $product->brand . ' '
                    . $product->title . ' ('
                    . $product->country . ')</strong></p>';

            $description .= '<p>----------</p>';
            $description .= '<p>&#9989; <strong>В наличии!</strong></p>';
            $description .= '<p>----------</p>';

            $description .= '<p>Коллекция: '.$product->collection.'</p>';
            $description .= '<p><em>Цена указана за 1 '.$product->unit.'</em></p><ul>';


                $description .= '<li><strong>Размер, см: </strong>' . $product->width.'х'.$product->length. '</li>';

                if($product->surface != null) {
                $description .= '<li><strong>Поверхность: </strong>' . $product->surface . '</li>';
                }
                if($product->count_in_pack != null) {
                $description .= '<li><strong>Штук в упаковке: </strong>' . $product->count_in_pack . '</li>';
                }
                if($product->meters_in_pack != null) {
                $description .= '<li><strong>Кв. метров в упаковке: </strong>' . $product->meters_in_pack . '</li>';
                }
                if($product->country != null) {
                $description .= '<li><strong>Страна производства: </strong>' . $product->country . '</li>';
                }
                if($product->code != null) {
                $description .= '<li><strong>Артикул: </strong>' . $product->code . '</li>';
                }

                $description .= '</ul><br>';


            $description .= '<p>Наличие а также актуальные цены уточняйте у менеджера.</p>';
            $description .= '<p>В нашем шоуруме представлены коллекции многих других известных производителей керамогранита, керамической плитки, мозаики и других напольных покрытий (ламинат, паркет, кварцвинил, инженерная доска и др.)</p>';
            $description .= '<p>Работаем с розничными и оптовыми покупателями. А так же предлагаем сотрудничество дизайнерам и строительным компаниям.</p>';

            if($add_description != '') {
            $description .= '<p>'.nl2br($add_description).'</p>';
            }




        @endphp
        <tr>
            <td></td>
            <td>{{ $product->code }}</td>
            <td>{{ $contact_method }}</td>
{{--            <td>Да</td>--}}
{{--            <td>466694981</td>--}}
            <td>kkvvnn89@gmail.com</td>
            <td>Активно</td>
            <td>{{ $name }}</td>
            <td>{{$price}}</td>
            <td>Напольные решения</td>
            <td>{{$title}}</td>
            <td>{{$img_ready}}</td> <!-- -->
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
            <td></td>
            <td></td> {{--MixesType--}}
        </tr>
    @endforeach
    {{-----KEVIS-END----}}

    {{-----RUSPLITKA-----}}
    @foreach($rusplitka as $product)
        @php
            $price = $product->price_rozn;
            $price = round($price * 0.90, -1);

            if ($price == 0) {
                $price = '';
            }
//                --------------------------
            $title = $product->svoystvo.' '.$product->brand_name.' '.$product->name;
//                -----------------------------
//              ------------------------------------------FOTO-------------------------------------

            $img = $product->picture;
            $img_collection = $product->collection->picture;

            $img = $img . ' | ' . $img_collection;

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
            $description = '';

            if($add_description_first != '') {
            $description .= '<p>'.nl2br($add_description_first).'</p>';
            }

            $description .= '<p>Керамогранит '.$product->brand_name.'. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены. Доставка по Москве, cамовывоз на западе Москвы.</p>';
            $description .= '<p><strong>'.$product->svoystvo.' '.$product->brand_name.' '
                    .$product->name.' ['.$product->size_b.'x'.$product->size_a.'] ('
                    .$product->collection->country.')</strong></p>';

            $bronnicy_stock = (float)$product->rest_skald_bronnicy - (float)$product->rest_skald_bronnicy_rezerv;
            $ljubercy_stock = (float)$product->rest_skald_ljubercy - (float)$product->rest_skald_ljubercy_rezerv;
            $sklad_20t_stock = (float)$product->rest_skald_20t - (float)$product->rest_skald_20t_rezerv;
            $krasnodar_stock = (float)$product->rest_skald_krasnodar - (float)$product->rest_skald_krasnodar_rezerv;

            $moscow_stock = $bronnicy_stock + $ljubercy_stock + $sklad_20t_stock;

            $description .= '<p>--------------------</p>';
            $date = date('d.m.Y');
            if ($product->rest_real_free > 0) {
            $description .= '<p>&#9989; На утро '.$date.' остаток '.$moscow_stock.' '.$product->unit.' (Москва); '.$krasnodar_stock.' '.$product->unit.' (Краснодар)  <em>(информация приблизительная, точную информацию о наличии спрашивайте у менеджера)</em></p>';
            }
            $description .= '<p>--------------------</p>';

            $description .= '<p>Коллекция: '.$product->collection->name.'</p>';
            $description .= '<p><em>Цена указана за 1 '.$product->unit.'</em></p><ul>';


                $description .= '<li><strong>Размер, см: </strong>' . $product->size_b.'х'.$product->size_a. '</li>';
                if($product->thickness != null) {
                $description .= '<li><strong>Толщина: </strong>' . $product->thickness . '</li>';
                }
                if($product->surface != null) {
                $description .= '<li><strong>Поверхность: </strong>' . $product->surface . '</li>';
                }
                if($product->in_pack_sht != null) {
                $description .= '<li><strong>Штук в упаковке: </strong>' . $product->in_pack_sht . '</li>';
                }
                if($product->in_pack_m2 != null) {
                $description .= '<li><strong>Кв. метров в упаковке: </strong>' . $product->in_pack_m2 . '</li>';
                }
                if($product->collection->country != null) {
                $description .= '<li><strong>Страна производства: </strong>' . $product->collection->country . '</li>';
                }
                if($product->articul != null) {
                $description .= '<li><strong>Артикул: </strong>' . $product->articul . '</li>';
                }

                $description .= '</ul><br>';


            $description .= '<p>Наличие а также актуальные цены уточняйте у менеджера.</p>';
            $description .= '<p>В нашем шоуруме представлены коллекции многих других известных производителей керамогранита, керамической плитки, мозаики и других напольных покрытий (ламинат, паркет, кварцвинил, инженерная доска и др.)</p>';
            $description .= '<p>Работаем с розничными и оптовыми покупателями. А так же предлагаем сотрудничество дизайнерам и строительным компаниям.</p>';

            if($add_description != '') {
            $description .= '<p>'.nl2br($add_description).'</p>';
            }


            $code = $product->external_id . 'RusPL';

        @endphp
        <tr>
            <td></td>
            <td>{{ $code }}</td>
            <td>{{ $contact_method }}</td>
{{--            <td>Да</td>--}}
{{--            <td>466694981</td>--}}
            <td>kkvvnn89@gmail.com</td>
            <td>Активно</td>
            <td>{{ $name }}</td>
            <td>{{$price}}</td>
            <td>Напольные решения</td>
            <td>{{$title}}</td>
            <td>{{$img_ready}}</td> <!-- -->
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
            <td></td>
            <td></td> {{--MixesType--}}
        </tr>
    @endforeach
    {{-----RUSPLITKA-END----}}

    {{-----TECHNOTILE-----}}
    @foreach($technotile as $product)
        @php
            //            $price = $product->price;
                        $price = '';
            //            $price = round($price * 0.93, -1);
            //                --------------------------
                        $title = str_replace('Плитка керамогранит ', '', $product->name).' '.($product->width/10).'x'.($product->length/10);
                        $title = str_replace('полированный', 'полир.', $title);

                        if (mb_strlen($title) > 50) {
                            $title = str_replace('лаппатирование', 'лаппатир.', $title);
                        }
                        if (mb_strlen($title) > 50) {
                            $title = str_replace('структурный', 'структ.', $title);
                        }
                        if (mb_strlen($title) > 50) {
                            $title = str_replace('легкое', '', $title);
                        }
                        if (mb_strlen($title) > 50) {
                            $title = str_replace('мягкое', '', $title);
                        }
                        if (mb_strlen($title) > 50) {
                            $title = str_replace('бежевый', 'беж', $title);
                        }
                        if (mb_strlen($title) > 50) {
                            $title = str_replace('антискользящий', 'антиск.', $title);
                        }
                        if (mb_strlen($title) > 50) {
                            $title = str_replace('оранжевый', 'оранж.', $title);
                        }
                        if (mb_strlen($title) > 50) {
                            $title = str_replace('коричневый', 'корич.', $title);
                        }
                        if (mb_strlen($title) > 50) {
                            $title = str_replace('Тёмный', 'Тём', $title);
                        }
                        if (mb_strlen($title) > 50) {
                            $title = str_replace('Светлый', 'Свет', $title);
                        }
                        if (mb_strlen($title) > 50) {
                            $title = str_replace('Светло', 'Св', $title);
                        }
                        if (mb_strlen($title) > 50) {
                            $title = str_replace('Натуральный', 'Натур.', $title);
                        }
                        if (mb_strlen($title) > 50) {
                            $title = str_replace('Рифленый', 'Рифл.', $title);
                        }

                        if (mb_strlen($title) < 37) {
                            $title = 'Керамогранит ' . $title;
                        }

            //                -----------------------------
            //              ------------------------------------------FOTO-------------------------------------

                        $img = $product->picture;

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
                        $description = '';

                        if($add_description_first != '') {
                        $description .= '<p>'.nl2br($add_description_first).'</p>';
                        }

                        $description .= '<p>Керамогранит '.$product->description.'. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены. Доставка по Москве, cамовывоз на западе Москвы.</p>';
                        $description .= '<p><strong>'.$product->name.' '.$product->width.'x'
                                .$product->length.' '.$product->description.' ('
                                .$product->country.')</strong></p>';

                        $description .= '<p>Коллекция: '.$product->collection.'</p>';
            //            $description .= '<p><em>Цена указана за 1 '.$product->unit.'</em></p><ul>';

                            $description .= '<ul>';
                            $description .= '<li><strong>Размер: </strong>' . $product->width.'х'.$product->length. ' мм</li>';
                            if($product->fat != null) {
                            $description .= '<li><strong>Толщина: </strong>' . $product->fat . ' мм</li>';
                            }
                            if($product->surface_type != null) {
                            $description .= '<li><strong>Поверхность: </strong>' . $product->surface_type . '</li>';
                            }
                            if($product->surface_faktura != null) {
                            $description .= '<li><strong>Фактура поверхности: </strong>' . $product->surface_faktura . '</li>';
                            }
                            if($product->count_in_box != null) {
                            $description .= '<li><strong>Штук в упаковке: </strong>' . $product->count_in_box . '</li>';
                            }
                            if($product->in_box_m2 != null) {
                            $description .= '<li><strong>Кв. метров в упаковке: </strong>' . $product->in_box_m2 . '</li>';
                            }
                            if($product->country != null) {
                            $description .= '<li><strong>Страна производства: </strong>' . $product->country . '</li>';
                            }

                            $description .= '</ul><br>';


                        $description .= '<p>Наличие а также актуальные цены уточняйте у менеджера.</p>';
                        $description .= '<p>В нашем шоуруме представлены коллекции многих других известных производителей керамогранита, керамической плитки, мозаики и других напольных покрытий (ламинат, паркет, кварцвинил, инженерная доска и др.)</p>';
                        $description .= '<p>Работаем с розничными и оптовыми покупателями. А так же предлагаем сотрудничество дизайнерам и строительным компаниям.</p>';

                        if($add_description != '') {
                        $description .= '<p>'.nl2br($add_description).'</p>';
                        }

            //            $description .= '<p>-------------------------</p>';
            //            $description .= '<p>'.$product->code.'</p>';

                        $description .= '<p>-------------------------</p>';
                        $description .= '<p><em>'.$product->surface_type.' '.$product->surface_faktura.'<br>';
                        $description .= $product->surface_faktura.' '.$product->surface_type.'<br>';
                        $description .= $product->code.'</em></p>';


                        $code = $product->code . 't_tile';

        @endphp
        <tr>
            <td></td>
            <td>{{ $code }}</td>
            <td>{{ $contact_method }}</td>
{{--            <td>Да</td>--}}
{{--            <td>466694981</td>--}}
            <td>kkvvnn89@gmail.com</td>
            <td>Активно</td>
            <td>{{ $name }}</td>
            <td>{{$price}}</td>
            <td>Напольные решения</td>
            <td>{{$title}}</td>
            <td>{{$img_ready}}</td> <!-- -->
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
            <td></td>
            <td></td> {{--MixesType--}}
        </tr>
    @endforeach
    {{-----TECHNOTILE-END----}}

    {{-----AQUAFLOOR-----}}
    @foreach($aquafloor as $product)
        @php
            //            $price = $product->price;
                        $price = '';
            //            $price = round($price * 0.93, -1);
            //                --------------------------
                        $title = $product->title;

                        if (mb_strlen($title) > 50) {
                            $title = str_replace('Кварцвиниловый ламинат', 'Кварцвинил', $title);
                        }
                        if (mb_strlen($title) > 50) {
                            $title = str_replace('Кварцвиниловая плитка', 'Кварцвинил', $title);
                        }
                        if (mb_strlen($title) > 50) {
                            $title = str_replace('Кварцвиниловая SPC плитка', 'Кварцвинил SPC', $title);
                        }
                        if (mb_strlen($title) > 50) {
                            $title = str_replace('Aquafloor ', '', $title);
                        }
//
//                        if (mb_strlen($title) < 37) {
//                            $title = 'Керамогранит ' . $title;
//                        }

            //              ------------------------------------------FOTO-------------------------------------

                        $img = $product->picture;

                        $img_full_arr = explode(' | ', $img);

                        if (count($img_full_arr) <= 10) {
                            $img_ready = $img;
                        } else {
                            $img_full_arr = array_slice($img_full_arr, 0, 10);
                            $img_ready = implode(' | ', $img_full_arr);
                        }
            //                ---------------------
                        if (str_contains($product->title, 'теновые пане')) {
                            $FinishingType = 'Стеновые панели';
                            $FinishingSubType = 'Панели ПВХ';
                        } elseif (str_contains($product->title, 'варцвинил')) {
                            $FinishingType = 'Напольные покрытия';
                            $FinishingSubType = 'Ламинат';
                        } else {
                            $FinishingType = 'Напольные покрытия';
                            $FinishingSubType = 'Ламинат';
                        }
            //                ---------------------
                        $description = '';

                        if($add_description_first != '') {
                        $description .= '<p>'.nl2br($add_description_first).'</p>';
                        }

                        $description .= '<p>Кварцвиниловый ламинат и стеновые панели SPC. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены. Доставка по Москве, cамовывоз на западе Москвы.</p>';
                        $description .= '<p><strong>'.$product->title.' ('
                                .$product->country.')</strong></p>';

                        $description .= '<p>Коллекция: '.$product->collection.'</p>';

                            $description .= '<ul>';
                            if($product->dlina != null) {
                            $description .= '<li><strong>Длина: </strong>' . $product->dlina. '</li>';
                            }
                            if($product->shirina != null) {
                            $description .= '<li><strong>Ширина: </strong>' . $product->shirina. '</li>';
                            }
                            if($product->fat != null) {
                            $description .= '<li><strong>Толщина: </strong>' . $product->fat . '</li>';
                            }
                            if($product->vendor_code != null) {
                            $description .= '<li><strong>Артикул: </strong>' . $product->vendor_code . '</li>';
                            }
                            if($product->tip_risunka != null) {
                            $description .= '<li><strong>Тип рисунка: </strong>' . $product->tip_risunka . '</li>';
                            }
                            if($product->tip_soedineniya != null) {
                            $description .= '<li><strong>Тип соединения: </strong>' . $product->tip_soedineniya . '</li>';
                            }
                            if($product->vlagostojkost != null) {
                            $description .= '<li><strong>Влагостойкость: </strong>' . $product->vlagostojkost . '</li>';
                            }
                            if($product->vstroennaya_podlozhka != null) {
                            $description .= '<li><strong>Встроенная подложка: </strong>' . $product->vstroennaya_podlozhka . '</li>';
                            }
                            if($product->material != null) {
                            $description .= '<li><strong>Материал: </strong>' . $product->material . '</li>';
                            }
                            if($product->shumoizolyacziya != null) {
                            $description .= '<li><strong>Шумоизоляция: </strong>' . $product->shumoizolyacziya . '</li>';
                            }
                            if($product->faska != null) {
                            $description .= '<li><strong>Фаска: </strong>' . $product->faska . '</li>';
                            }
                            if($product->massa_box != null) {
                            $description .= '<li><strong>Масса упаковки: </strong>' . $product->massa_box . '</li>';
                            }
                            if($product->count_in_box != null) {
                            $description .= '<li><strong>Количество в упаковке: </strong>' . $product->count_in_box . '</li>';
                            }
                            if($product->country != null) {
                            $description .= '<li><strong>Страна: </strong>' . $product->country . '</li>';
                            }

                            $description .= '</ul><br>';


                        $description .= '<p>Наличие а также актуальные цены уточняйте у менеджера.</p>';
                        $description .= '<p>В нашем шоуруме представлены коллекции многих других известных производителей напольных покрытий (керамогранит, мозаика, ламинат, паркет, инженерная доска и др.)</p>';
                        $description .= '<p>Работаем с розничными и оптовыми покупателями. А так же предлагаем сотрудничество дизайнерам и строительным компаниям.</p>';

                        if($add_description != '') {
                        $description .= '<p>'.nl2br($add_description).'</p>';
                        }

                        $description .= '<p>--------------------------</p>';
                        $description .= '<p><em>кварцвинил кварцвиниловая плитка виниловый ламинат spc ламинат аквафлор ламинат аквафлур</em></p>';

                        $code = str_replace(' ', '_',$product->vendor_code) . '_af';

        @endphp
        <tr>
            <td></td>
            <td>{{ $code }}</td>
            <td>{{ $contact_method }}</td>
{{--            <td>Да</td>--}}
{{--            <td>466694981</td>--}}
            <td>kkvvnn89@gmail.com</td>
            <td>Активно</td>
            <td>{{ $name }}</td>
            <td>{{$price}}</td>
            <td>Напольные решения</td>
            <td>{{$title}}</td>
            <td>{{$img_ready}}</td> <!-- -->
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
            <td></td>
            <td></td> {{--MixesType--}}
        </tr>
    @endforeach
    {{-----AQUAFLOOR-END----}}

    {{-----PIXMOSAIC-----}}
    @foreach($pixmosaics as $product)
        @php

            //            ---PRICE---
            $price = round($product->price * 0.90, -1);
            //            ---PRICE-END--

            //            ---TITLE-AVITO--
            $title = explode(',', $product->title2)[0];
            if (stripos($title, 'PIX') === false) {
                $title = $title . ' ' . $product->vendor_code;
            }
            if (mb_strlen($title) > 50) {
                $title = str_replace(' прокрашенного в массе', '', $title);
            }
            if (stripos($title, 'озаика') === false) {
                $title .= ' мозаика';
            }
            //            ---TITLE-AVITO-END--

            //            ---IMAGES---
            $img = [];
            $img[] = Storage::disk('pixmosaic')->url(str_replace(' ', '', $product->vendor_code) . '.jpg');

            $img_full_arr = $img;
            if (count($img_full_arr) <= 10) {
                $img_ready = implode(' | ', $img_full_arr);
            } else {
                $img_full_arr = array_slice($img_full_arr, 0, 10);
                $img_ready = implode(' | ', $img_full_arr);
            }
            //            ---IMAGES-END--

            //            ---DESCRIPTION---
            $description = '';

             if($add_description_first != '') {
                $description .= '<p>'.nl2br($add_description_first).'</p>';
            }

            $description .= '<p>Мозаика Pixel mosaic. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены. Доставка по Москве, cамовывоз на западе Москвы.</p>';

            $FinishingType = 'Плитка, керамогранит и мозаика';
            $FinishingSubType = 'Мозаика';

            $description .= '<p><strong>' . $product->title . '</strong></p>';

            if ($product->stock != null) {
                $description .= '<p>--------------------</p>';
                $date = $product->updated_at->format('d.m.Y');
                $description .= '<p>&#9989; На утро '.$date.' остаток '.$product->stock.' м2 <em>(информация приблизительная, точную информацию о наличии спрашивайте у менеджера)</em></p>';
                $description .= '<p>--------------------</p>';
            }

            $description .= '<p><em>Цена указана за 1 м.кв.</em></p>';

            $description .='<ul>';
            if($product->surface != null) {
                $description .= '<li>Поверхность: <em>' . $product->surface . '</em></li>';
            }
            if($product->material != null) {
                $description .= '<li>Материал: <em>' . $product->material . '</em></li>';
            }
            if($product->osnova != null) {
                $description .= '<li>Основа: <em>' . $product->osnova . '</em></li>';
            }
            if($product->size_tile != null) {
                $description .= '<li>Размер листа: <em>' . $product->size_tile . ' мм</em></li>';
            }
            if($product->size_chip != null) {
                $description .= '<li>Размер чипа: <em>' . $product->size_chip . ' мм</em></li>';
            }
            if($product->fat != null) {
                $description .= '<li>Толщина: <em>' . $product->fat . ' мм</em></li>';
            }
            if($product->square_list != null) {
                $description .= '<li>Площадь листа: <em>' . $product->square_list . ' м2</em></li>';
            }

            $description .= '</ul>';
            //          ------------------
                        $key_words = '';
                        if ($product->material == 'Стекло') {
                            $key_words .= ' мозаика из стекла мозаика стеклянная мозаика стекло мозаика';
                        }
                        if ($product->material == 'Керамогранит') {
                            $key_words .= ' мозаика из керамогранита мозаика керамогранитная мозаика керамогранит мозаика';
                        }
                        if ($product->material == 'Перламутр') {
                            $key_words .= ' мозаика перламутр мозаика из перламутра мозаика';
                        }
                        if ($product->material == 'Зеркало') {
                            $key_words .= ' мозаика из зеркала мозаика зеркальная мозаика зеркало мозаика';
                        }
                        if ($product->material == 'Камень и стекло') {
                            $key_words .= ' мозаика из зеркала мозаика зеркальная мозаика из камня мозаика каменная мозаика камень мозаика стекло мозаика';
                        }
                        if ($product->material == 'Стекло и металл') {
                            $key_words .= ' мозаика из стекла мозаика стеклянная мозаика металлическая мозаика из металла мозаика стекло мозаика камень мозаика';
                        }
                        if ($product->material == 'Металл') {
                            $key_words .= ' мозаика из металла мозаика металлическая мозаика металл мозаика';
                        }
                        if ($product->material == 'Мрамор') {
                            $key_words .= ' мозаика из мрамора мозаика мраморная мозаика мрамор мозаика';
                        }
                        if ($product->material == 'Травертин') {
                            $key_words .= ' мозаика травертин мозаика из травертина мозаика';
                        }
                        if ($product->material == 'Сланец') {
                            $key_words .= ' мозаика сланец мозаика из сланца мозаика';
                        }
                        if ($product->material == 'Оникс') {
                            $key_words .= ' мозаика оникс мозаика из оникса мозаика';
                        }
                        if ($product->material == 'Оникс и мрамор') {
                            $key_words .= ' мозаика из мрамора мозаика из оникса мозаика оникс мозаика мрамор мозаика';
                        }
                        if ($product->material == 'Галька') {
                            $key_words .= ' мозаика галька мозаика из гальки мозаика';
                        }

                        $number_pix = str_replace('PIX', '', $product->vendor_code);
                        $key_words .= ' pix '. $number_pix . ' мозаика';
            //          ------------------

                        $description .= '<p>Под крупный проект сделаем скидку.</p>';
                        $description .= '<p>Наличие а также актуальные цены уточняйте у менеджера.</p>';
                        $description .= '<p>В нашем шоуруме представлены коллекции многих других известных производителей керамогранита, керамической плитки, мозаики и других напольных покрытий (ламинат, паркет, кварцвинил, инженерная доска и др.)</p>';
                        $description .= '<p>Работаем с розничными и оптовыми покупателями. А так же предлагаем сотрудничество дизайнерам и строительным компаниям.</p>';

                        $description .= '<p>_____________</p>';
                        $description .= '<p><em>pixmosaic pixelmosaic pixel mosaic мозаика для ванной мозайка для пола ';
                        $description .= 'мозаика со скидкой купить мозаику купить мозайку красивая мозаика красивая мозайка недорогая ';
                        $description .= $key_words;
                        $description .= '</em></p>';
                        if($add_description != '') {
                            $description .= '<p>'.nl2br($add_description).'</p>';
                        }
                        $element_code = $product->vendor_code.'_pixmosaic';
        @endphp
        @php
            if (isset($product->props->video_url)) {
                $video_url = $product->props->video_url;
            } else {
                $video_url = '';
            }
        @endphp
        <tr>
            <td></td>
            <td>{{ $element_code }}</td>
            <td>{{ $contact_method }}</td>
{{--            <td>Да</td>--}}
{{--            <td>466694981</td>--}}
            <td>kkvvnn89@gmail.com</td>
            <td>Активно</td>
            <td>{{ $name }}</td>
            <td>{{$price}}</td>
            <td>Напольные решения</td>
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
            <td>{{$video_url}}</td>
            <td></td> {{--MixesType--}}
        </tr>
    @endforeach
    {{-----PIXMOSAIC-END----}}

    {{-----ARTCENTER-----}}
    @foreach($artcenter as $product)
        @php
            $FinishingType = 'Плитка, керамогранит и мозаика';
            $FinishingSubType = 'Керамогранит';
        @endphp

            <!-- --------------------------------------------------------- -->

        @php
            $description = '';

            if($add_description_first != '') {
            $description .= '<p>'.nl2br($add_description_first).'</p>';
            }

            if ($product->brand == 'Art Ceramic') {
                $description .= '<p>Керамическая плитка и керамогранит Art Ceramic , Арткерамик. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены при покупке большого объема. Доставка по Москве, cамовывоз на западе Москвы.</p>';
            } else {
                $description .= '<p>Керамическая плитка и керамогранит. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены при покупке большого объема. Доставка по Москве, cамовывоз на западе Москвы.</p>';
            }

            $title = str_replace('Плитка ', 'Керамогранит ', $product->title);
            $title = str_replace(' (1,44 кв.м.)', '', $title);

            $description .= '<p><strong>' . $product->brand . ' ' . $title .  ' (Индия)</strong></p>';

            $title2 = str_replace('Плитка Artceramic', 'Керамогранит Арткерамик', $product->title);
            $title2 = str_replace(' (1,44 кв.м.)', '', $title2);
            $title2 = str_replace('High Glossy', 'полированный', $title2);
            $title2 = str_replace('High Gloss', 'полированный', $title2);
            $title2 = str_replace('Glossy', 'полированный', $title2);
            $title2 = str_replace('Matt', 'матовый', $title2);
            $description .= '<p>' . $title2 .  '</p>';

            $description .= '<p>--------------------</p>';
            $date = date('d.m.Y');
            if ($product->moscow_stock > 0) {
                $description .= '<p>&#9989; На утро '.$date.' остаток '.round($product->moscow_stock, 2).' '.$product->unit.' <em>(информация приблизительная, точную информацию о наличии спрашивайте у менеджера)</em></p>';
            }
            $description .= '<p>--------------------</p>';


            $description .= '<p><em>Цена указана за 1 ' . $product->unit . '</em></p>';

            $description .= '<p><strong>Коллекция: </strong>'.$product->collection.'</p>';


                $description .= '<ul>';


                if($product->size != null) {
                $description .= '<li><strong>Размер: </strong>' . $product->size . ' см </li>';
                }
                if($product->fat != null && $product->fat != 0) {
                $description .= '<li><strong>Толщина: </strong>' . $product->fat . '</li>';
                }
                if($product->material != null) {
                $description .= '<li><strong>Место в коллекции: </strong>' . $product->material . '</li>';
                }
                if($product->color != null) {
                $description .= '<li><strong>Цвет: </strong>' . $product->color . '</li>';
                }
                if($product->surface != null) {
                $description .= '<li><strong>Поверхность: </strong>' . $product->surface . '</li>';
                }
                if($product->unit != null) {
                $description .= '<li><strong>Единица измерения товара: </strong>' . $product->unit . '</li>';
                }
                if($product->meters_in_pack != null) {
                $description .= '<li><strong>Кв. метров в упаковке: </strong>' . $product->meters_in_pack . '</li>';
                }
                if($product->brand != null) {
                $description .= '<li><strong>Производитель: </strong>' . $product->brand . '</li>';
                }

                $description .= '</ul><br>';


            $description .= '<p>Наличие а также актуальные цены уточняйте у менеджера.</p>';
            $description .= '<p>В нашем шоуруме представлены коллекции многих других известных производителей керамогранита, керамической плитки, мозаики и других напольных покрытий (ламинат, паркет, кварцвинил, инженерная доска и др.)</p>';
            $description .= '<p>Работаем с розничными и оптовыми покупателями. А так же предлагаем сотрудничество дизайнерам и строительным компаниям.</p>';

            if($add_description != '') {
            $description .= '<p>'.nl2br($add_description).'</p>';
            }


            $keywords = '';

            $type = 'керамогранит';

            $naznachenie = $type . ' для пола ' . $type . ' для ванной комнаты';

            $keywords .= $naznachenie . ' ';

            $size = '';
            $size .= $type . ' ' . $product->size . ' ';

            $keywords .= $size;

            if ($product->brand == 'Art Ceramic') {
                $keywords .= $type . ' арт керамик ';
                $keywords .= $type . ' арткерамик ';
            } elseif ($product->brand == 'Cersanit') {
                $keywords .= $type . ' церсанит ';
            } elseif ($product->brand == 'Vitra') {
                $keywords .= $type . ' витра ';
            } elseif ($product->brand == 'Ceradim') {
                $keywords .= $type . ' керадим ';
            }



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

            $keywords .= $type . ' ' .mb_strtolower($surf) . ' ';

            $keywords .= ' плитка керамическая плитка ';

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

            $keywords .= $type . ' ' .mb_strtolower($color) . ' ';

            $keywords .= $product->brand . ' ' . $type . ' ';


            $owner_code = $product->vendor_code;

            if ($owner_code != null) {
                $keywords .= $type . ' ' . $owner_code . ' ';
            }

            $country = 'Индия';

            if ($country != null) {
                $keywords .= $type . ' ' . $country . ' ';
            }

            if (stripos($product->title, 'alacatta') || stripos($product->title, 'alacata')) {
                $keywords .= ' керамогранит калаката плитка калаката керамогранит калакатта плитка калакатта';
            }

            if ($type != 'декор') {
                $description .= '<p>_____________________</p>';
                $description .= '<p><em>' . $keywords . '</em></p>';
            }
        @endphp

        @php
            $string_for_delete = 'https://media.artcentre.club/';

            if ($product->image1 != '') {
                $artcenter_img1 = Storage::disk('artcenter')->url(Str::remove($string_for_delete, $product->image1));
            } else {
                $artcenter_img1 = null;
            }

            if ($product->image2 != '') {
                $artcenter_img2 = Storage::disk('artcenter')->url(Str::remove($string_for_delete, $product->image2));
            } else {
                $artcenter_img2 = null;
            }

            if ($product->image3 != '') {
                $artcenter_img3 = Storage::disk('artcenter')->url(Str::remove($string_for_delete, $product->image3));
            } else {
                $artcenter_img3 = null;
            }

            if ($product->image4 != '') {
                $artcenter_img4 = Storage::disk('artcenter')->url(Str::remove($string_for_delete, $product->image4));
            } else {
                $artcenter_img4 = null;
            }
//    ------------------------------------------FOTO-------------------------------------

    //          -----------------------------------------------------------------------------------

            $img_full = '';
            $img_full = $artcenter_img1;

            if (isset($artcenter_img2) && $artcenter_img2 != null) {
            $img_full .= ' | ' . $artcenter_img2;
            }
            if (isset($artcenter_img3) && $artcenter_img3 != null) {
            $img_full .= ' | ' . $artcenter_img3;
            }
            if (isset($artcenter_img4) && $artcenter_img4 != null) {
            $img_full .= ' | ' . $artcenter_img4;
            }

        @endphp

        @php
            $title = str_replace('Плитка ', 'Керамогранит ', $product->title);
            $title = str_replace(' (1,44 кв.м.)', '', $title);
            $title = str_replace('High Glossy', 'полированный', $title);
            $title = str_replace('High Gloss', 'полированный', $title);
            $title = str_replace('Glossy', 'полированный', $title);
            $title = str_replace('Matt', 'матовый', $title);

            if (mb_strlen($title) > 50) {
                $title = str_replace('Artceramic ', '', $title);
            }
            if (mb_strlen($title) > 50) {
                $title = str_replace('Полированный', 'полиров', $title);
            }
            if (mb_strlen($title) > 50) {
                $title = str_replace('полированный', 'полиров', $title);
            }
        @endphp

        @php
            //--------------------------------------------------------------------------
                        $price = round($product->price * 0.85, -1);
            //----------------------------------------------------------------------------

        @endphp

        <tr>
            <td></td>
            <td>{{ str_replace('ЦБ-', '', $product->code).'_artcenter' }}</td>
            <td>{{ $contact_method }}</td>
{{--            <td>Да</td>--}}
{{--            <td>466694981</td>--}}
            <td>kkvvnn89@gmail.com</td>
            <td>Активно</td>
            <td>{{ $name }}</td>
            <td>{{$price}}</td>
            <td>Напольные решения</td>
            <td>{{$title}}</td>
            <td>{{$img_full}}</td> <!-- -->
            <td>Отделка</td>
            <td>Стройматериалы</td>
            <td>Ремонт и строительство</td>
            <td>Package</td>
            <td>{{$FinishingType}}</td>
            <td>{{ $phone }}</td> <!-- -->
            <td>{{$description}}</td> <!-- -->
            <td>{{ $address }}</td>
            <td>Товар от производителя</td>
            <!-- <td>{{$date_next_month}}</td> -->
            <td>{{$FinishingSubType}}</td>
            <td>Новое</td>
            <td></td>
            <td></td> {{--MixesType--}}
        </tr>
    @endforeach
    {{-----ARTCENTER-END----}}

    {{-----KERABELLEZZA-----}}
    @foreach($kerabellezza as $product)
        @php
            $FinishingType = '';
            $FinishingSubType = '';

            $description = '';

            if($add_description_first != '') {
            $description .= '<p>'.nl2br($add_description_first).'</p>';
            }

            $description .= '<p>Затирка эпоксидная для плитки, керамогранита, мозаики KeraBellezza. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены. Доставка по Москве, cамовывоз на западе Москвы.</p>';


//            $title = str_replace('Плитка ', 'Керамогранит ', $product->title);
//            $title = $product->title;
            $title = str_replace('кг.', 'кг', $product->title);
            $title .= ' ' . $product->color;

            $description .= '<p><strong> ' . $title .  ' </strong></p>';


//            $description .= '<p>--------------------</p>';
//            $date = date('d.m.Y');
//            if ($product->moscow_stock > 0) {
//                $description .= '<p>&#9989; На утро '.$date.' остаток '.round($product->moscow_stock, 2).' '.$product->unit.' <em>(информация приблизительная, точную информацию о наличии спрашивайте у менеджера)</em></p>';
//            }
//            $description .= '<p>--------------------</p>';


            $description .= '<p><em>Цена указана за 1 шт</em></p>';

                $description .= '<ul>';

                if($product->color != null) {
                $description .= '<li><strong>Цвет: </strong>' . $product->color . ' </li>';
                }
                if($product->parent->massa != null) {
                $description .= '<li><strong>Вес: </strong>' . $product->parent->massa . ' </li>';
                }
                if($product->parent->shov != null) {
                $description .= '<li><strong>Ширина шва: </strong>' . $product->parent->shov . ' </li>';
                }
                if($product->parent->froze_resistant != null) {
                $description .= '<li><strong>Морозостойкость: </strong>' . $product->parent->froze_resistant . ' </li>';
                }
                if($product->parent->vid_rabot != null) {
                $description .= '<li><strong>Вид работ: </strong>' . $product->parent->vid_rabot . ' </li>';
                }
                if($product->parent->country_proizv != null) {
                $description .= '<li><strong>Страна производства: </strong>' . $product->parent->country_proizv . ' </li>';
                }
                if($product->parent->brand != null) {
                $description .= '<li><strong>Производитель: </strong>' . $product->parent->brand . '</li>';
                }

                $description .= '</ul><br>';

            $description .= '<p>'. nl2br($product->parent->description) .'</p>';

            $description .= '<p>Наличие а также актуальные цены уточняйте у менеджера.</p>';
            $description .= '<p>В нашем шоуруме представлены коллекции многих других известных производителей керамогранита, керамической плитки, мозаики и других напольных покрытий (ламинат, паркет, кварцвинил, инженерная доска и др.)</p>';
            $description .= '<p>Работаем с розничными и оптовыми покупателями. А так же предлагаем сотрудничество дизайнерам и строительным компаниям.</p>';

            if($add_description != '') {
            $description .= '<p>'.nl2br($add_description).'</p>';
            }


            $keywords = 'эпоксидная затирка для плитки затирка эпоксидная для керамогранита эпоксидная затирка для мозаики эпоксидка затирка эпоксидная недорогая для плитки эпоксидная затирка';

            $description .= '<p>_____________________</p>';
            $description .= '<p><em>' . $keywords . '</em></p>';
        @endphp

        @php
            //    ------------------------------------------FOTO-------------------------------------

                        $img_full = '';
                        $img_full .= $product->image;

        @endphp

        @php
            $title = str_replace('кг.', 'кг', $product->title);
            $title .= ' ' . $product->color;

            if (mb_strlen($title) > 50) {
                $title = str_replace('Design ', '', $title);
            }
            if (mb_strlen($title) > 50) {
                $title = str_replace('Color Neutral ', '', $title);
            }
            if (mb_strlen($title) > 50) {
                $title = str_replace(' Нейтральный', '', $title);
            }
            if (mb_strlen($title) > 50) {
                $title = str_replace('цветная ', '', $title);
            }
        @endphp

        @php
            //--------------------------------------------------------------------------
//                        $price = round($product->price * 0.90, -1);
                        $price = $product->price;
            //----------------------------------------------------------------------------

        $code = $product->parent_code . '_' . $product->color;
        @endphp

        <tr>
            <td></td>
            <td>{{$code}}</td>
            <td>{{ $contact_method }}</td>
{{--            <td>Да</td>--}}
{{--            <td>466694981</td>--}}
            <td>kkvvnn89@gmail.com</td>
            <td>Активно</td>
            <td>{{ $name }}</td>
            <td>{{$price}}</td>
            <td>Напольные решения</td>
            <td>{{$title}}</td>
            <td>{{$img_full}}</td> <!-- -->
            <td>Строительные смеси</td>
            <td>Стройматериалы</td>
            <td>Ремонт и строительство</td>
            <td>Package</td>
            <td>{{$FinishingType}}</td>
            <td>{{ $phone }}</td> <!-- -->
            <td>{{$description}}</td> <!-- -->
            <td>{{ $address }}</td>
            <td>Товар от производителя</td>
            <!-- <td>{{$date_next_month}}</td> -->
            <td>{{$FinishingSubType}}</td>
            <td>Новое</td>
            <td></td>
            <td>Затирки</td> {{--MixesType--}}
        </tr>
    @endforeach
    {{-----KERABELLEZZA-END----}}

    </tbody>
</table>

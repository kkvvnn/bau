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


        $description .= '<p>--------------------</p>';
        $date = date('d.m.Y');
        if ($product->balanceCount > 0) {
        $description .= '<p>&#9989; На утро '.$date.' доступно &asymp; '.round($product->balanceCount, 2).' '.$product->MainUnit.' <em>(информация приблизительная, точную информацию о наличии спрашивайте у менеджера)</em></p>';
        }
        $description .= '<p>--------------------</p>';


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
        $vendor_code = str_replace('х', '', $product->Element_Code);
        $files = Storage::disk('foto')->files('/'.$vendor_code);
//        dd($files);
        $img_foto = '';
        foreach ($files as $file) {
            $img_foto .= config('app.url').'/storage/foto/'.$file . ' | ';
        }
//          -----------------------------------------------------------------------------------

        $img_full = $img_foto . $img1;
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
    </tbody>
</table>
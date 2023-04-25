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
        $description = '<p>Керамическая плитка, керамогранит Laparet (Лапарет), Скидка до 20 % от розничной цены при самовывозе. Доставка по Москве, cамовывоз на западе Москвы. Размеры 20х120 60х60 60х120 80х80 80х160 и др.</p>';
        $description .= '<p><strong>' . $product->Name . '. '
            . $product->Producer_Brand . ' ('
            . $product->Country_of_manufacture . ')</strong></p>';
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
            $description .= '<p>Цена указана за 1 ' . $product->MainUnit . '</p>';

            $description .= '<p>Полный список коллекции и наличие уточняйте у менеджера</p>';


            @endphp

            <!-- ----------------------------------------------------------------- -->
            <!-- http://193.124.113.217/storage/Picture1/1026a170-a32c-4db9-b281-4896c7448acd___v8_1E66_63c30.jpeg -->
            <!-- $string_for_delete = 'ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/'; -->
            @php
                $img1 = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', 'http://193.124.113.217/storage/Picture/', $product->Picture);

                if (isset($product->Picture2) && $product->Picture2 != null) {
                    $img2 = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', 'http://193.124.113.217/storage/Picture2/', $product->Picture2);
                } else {$img2 = null;}
                if (isset($product->Picture3) && $product->Picture3 != null) {
                    $img3 = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', 'http://193.124.113.217/storage/Picture3/', $product->Picture3);
                } else {$img3 = null;}
                if (isset($product->Picture4) && $product->Picture4 != null) {
                    $img4 = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', 'http://193.124.113.217/storage/Picture4/', $product->Picture4);
                } else {$img4 = null;}
                if (isset($product->Picture5) && $product->Picture5 != null) {
                    $img5 = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', 'http://193.124.113.217/storage/Picture5/', $product->Picture5);
                } else {$img5 = null;}
                if (isset($product->Picture6) && $product->Picture6 != null) {
                    $img6 = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', 'http://193.124.113.217/storage/Picture6/', $product->Picture6);
                } else {$img6 = null;}

                $img_coll_all = $product->collections[0]->Interior_Pic;
                $img_coll_all = explode(', ', $img_coll_all);
                $img_coll = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', 'http://193.124.113.217/storage/Collections/', $img_coll_all[0]);

                if (isset($img_coll_all[1])) {
                    $img_coll_2 = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', 'http://193.124.113.217/storage/Collections/', $img_coll_all[1]);
                } else {
                    $img_coll_2 = null;
                }
                
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
                if (mb_strlen($title) < 42) {
                    $title = 'Laparet ' . $title;
                }
            @endphp
            

            <tr>
                <td></td>
                <td>{{ $product->Element_Code }}</td>
                <td>В сообщениях</td>
                <td>kkvvnn89@gmail.com</td>
                <td>Активно</td>
                <td>Владимир</td>
                <td>{{ round($product->RMPrice * 0.9, -1) }}</td>
                <td>Напольные решения</td>
                <td>{{ $title }}</td>
                <td>{{$img_full}}</td> <!-- -->
                <td>Отделка</td>
                <td>Стройматериалы</td>
                <td>Ремонт и строительство</td>
                <td>Package</td>
                <td>Плитка, керамогранит и мозаика</td>
                <td>79039890822</td> <!-- -->
                <td>{{$description}}</td> <!-- -->
                <td>Москва</td>
                <td>Товар от производителя</td>
                <!-- <td>{{$date_next_month}}</td> -->
                <td>{{$FinishingSubType}}</td>
                <td>Новое</td>
                <td></td>
            </tr>
            @endforeach
    </tbody>
</table>
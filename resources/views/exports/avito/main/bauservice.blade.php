{{-----BAUSERVICE-----}}
@foreach($products as $product)

    @php
        $product_type = avito_type($product->Name);

        switch ($product_type) {
            case 'Керамогранит':
                $GoodsSubType = 'Отделка';
                $FinishingMaterialsType = 'Керамическая плитка и керамогранит';
                $CeramicPorcelainTilesSubType = 'Керамогранит';
                $Brand = $product->Producer_Brand;
                $TileType = '';
                $SpaceType = '';
                $InstallationType = avito_bauservice_for($product->Architectural_surface);
                $Width = avito_bauservice_size($product->Height, 5, 200, $product->Name, 'W');
                $Length = avito_bauservice_size($product->Lenght, 5, 400, $product->Name, 'L');
                $Thickness = avito_bauservice_height($product->Thickness, 2, 30);
                $Pattern = avito_bauservice_pattern($product->Name, $product->DesignValue);
                $Color = avito_bauservice_color($product->Color);
                break;
            case 'Керамическая плитка':
                $GoodsSubType = 'Отделка';
                $FinishingMaterialsType = 'Керамическая плитка и керамогранит';
                $CeramicPorcelainTilesSubType = 'Керамическая плитка';
                $Brand = $product->Producer_Brand;
                $TileType = avito_tile_type($product->Name);
                $SpaceType = avito_bauservice_space_type($product->Field_of_Application);
                $InstallationType = avito_bauservice_for($product->Architectural_surface);
                $Width = avito_bauservice_size($product->Height, 0, 150, $product->Name, 'W');
                $Length = avito_bauservice_size($product->Lenght, 1, 400, $product->Name, 'L');
                $Thickness = '';
                $Pattern = avito_bauservice_pattern($product->Name, $product->DesignValue);
                $Color = avito_bauservice_color($product->Color);
                break;
            case 'Другое':
                $GoodsSubType = 'Другое';
                $FinishingMaterialsType = '';
                $CeramicPorcelainTilesSubType = '';
                $Brand = '';
                $TileType = '';
                $SpaceType = '';
                $InstallationType = '';
                $Width = '';
                $Length = '';
                $Thickness = '';
                $Pattern = '';
                $Color = '';
                break;
        }

        $FlooringMaterialsSubType = '';
        $ExteriorFinishingDecorativeStoneSubType = '';
        $WallPanelsSlatsDecorativeElementsSubType = '';
        $MixesType = '';
        $Material = '';
        $OutsideUsage = '';
    @endphp

    @php
        $price_rrc = $product->RMPrice;
        $price_old = $product->RMPriceOld;
        $brand = $product->Producer_Brand;
        $price = avito_price($price_rrc, $brand, $discounts, $price_old);

        $show_discount = avito_show_discount($price_rrc, $brand, $discounts, $price_old);
    @endphp

    @php
        if ($CeramicPorcelainTilesSubType == 'Керамогранит' || $CeramicPorcelainTilesSubType == 'Керамическая плитка') {

            $PackagingType = avito_packaging_type($product->MainUnit);

            if ($PackagingType == 'Упаковка') {
                $PackageQuantity = '1';
            } else {
                $square_in_pack = $product->Package_Value;
                if ($product->Package_Value == $product->PCS_in_Package) {
                    $square_in_pack = ((float)$Length / 100) * ((float)$Width / 100) * (int)$product->PCS_in_Package;
                }
                $PackageQuantity = avito_package_quantity(round((float)$square_in_pack, 2));
            }

//            if ($PackagingType == 'Упаковка') {
//                $price = round($price * (float)$PackageQuantity, -1);
//            }

        } else {
            $PackagingType = '';
            $PackageQuantity = '';
        }
    @endphp

    @php
        $description = '';

        if($add_description_first != '') {
        $description .= '<p>'.nl2br($add_description_first).'</p>';
        }



        if ($product->Novinka == 1) {
            $description .= '<p>&#9889;Новинка&#9889; <strong>' . $product->Producer_Brand . ' ' . $product->Name .  ' ('
                . $product->Country_of_manufacture . ')</strong></p>';
        } else {
            $description .= '<p><strong>' . $product->Producer_Brand . ' ' . $product->Name .  ' ('
                . $product->Country_of_manufacture . ')</strong></p>';
        }

        $description .= '<p>--------------------</p>';
        $date = date('d.m.Y');
        if ($product->balanceCount > 0) {
            $description .= '<p>&#9989; На утро '.$date.' склад Москва '.round($product->balanceCount, 2).' '.$product->MainUnit.' <em>(информация приблизительная, точную информацию о наличии спрашивайте у менеджера)</em></p>';
        }


//        if ($PackagingType == 'Упаковка') {
//
//            $description .= '<p>--------------------</p>';
//            $description .= '<p><strong>Отгрузка с нашего склада осуществляется кратно упаковкам. Минимальный заказ - от 10 тысяч рублей.</strong></p>';
//            $description .= '<p>--------------------</p>';
//
//            $description .= '<p><em>Цена указана за 1 упаковку ('.$PackageQuantity.' м2)</em></p>';
//        } else {
//            $description .= '<p><em>Цена указана за 1 '.$product->MainUnit.'</em></p>';
//        }

        $description .= '<p>--------------------</p>';
        $description .= '<p><strong>Отгрузка с нашего склада осуществляется кратно упаковкам. Минимальный заказ - от 10 тысяч рублей.</strong></p>';
        $description .= '<p>--------------------</p>';
        $description .= '<p><em>Цена указана за 1 '.$product->MainUnit.'</em></p>';


        $description .= '<p><strong>Коллекция: </strong>';
        $collections = $product->collections;
        foreach ($collections as $collection) {
              $description .= $collection->Collection_Name;
              $description .= '. ';
          }
        $description .= '</p><ul>';


        if ($product->Height != 0 && $product->Lenght != 0) {
           $description .= '<li><strong>Размер: </strong>' . $product->Height .'x' . $product->Lenght . ' см</li>';
        }
        if ($product->Thickness != null && $product->Thickness != 0) {
           $description .= '<li><strong>Толщина: </strong>' . $product->Thickness . ' см</li>';
        }
//        if ($product->Place_in_the_Collection != null) {
//           $description .= '<li><strong>Место в коллекции: </strong>' . $product->Place_in_the_Collection . '</li>';
//        }
        if ($product->DesignValue != null) {
           $description .= '<li><strong>Рисунок: </strong>' . $product->DesignValue . '</li>';
        }
        if ($product->Color != null) {
           $description .= '<li><strong>Цвет: </strong>' . $product->Color . '</li>';
        }
//        if ($product->Cover != null) {
//           $description .= '<li><strong>Покрытие: </strong>' . $product->Cover . '</li>';
//        }
        if ($product->Surface != null) {
           $description .= '<li><strong>Поверхность: </strong>' . $product->Surface . '</li>';
        }
//        if ($product->MainUnit != null) {
//           $description .= '<li><strong>Единица измерения товара: </strong>' . $product->MainUnit . '</li>';
//        }
        if ($product->PCS_in_Package != null) {
           $description .= '<li><strong>В упаковке: </strong>' . $product->PCS_in_Package . ' шт</li>';
        }
        if ($product->Package_Value != null && $product->Package_Value != $product->PCS_in_Package) {
           $description .= '<li><strong>В упаковке: </strong>' . $product->Package_Value . ' м2</li>';
        }
        if ($product->Producer_Brand != null) {
           $description .= '<li><strong>Производитель: </strong>' . $product->Producer_Brand .' ('. $product->Country_of_manufacture .') </li>';
        }
//        if ($product->Country_of_manufacture != null) {
//           $description .= '<li><strong>Страна производства: </strong>' . $product->Country_of_manufacture . '</li>';
//        }

        $description .= '</ul><br>';

        $description .= '<p><strong>Наличие и актуальные цены на ваш объем уточняйте у менеджера.</strong></p>';

        if ($product->Producer_Brand == 'Laparet') {
            $description .= '<p>Laparet , Лапарет . Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены при покупке большого объема. Доставка по Москве, cамовывоз на западе Москвы, есть отправка в регионы через ТК.</p>';
        } elseif ($product->Producer_Brand == 'Cersanit') {
            $description .= '<p>Cersanit , Церсанит . Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены при покупке большого объема. Доставка по Москве, cамовывоз на западе Москвы, есть отправка в регионы через ТК.</p>';
        } elseif ($product->Producer_Brand == 'Kerama Marazzi') {
            $description .= '<p>Kerama Marazzi , Керама Марацци . Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены при покупке большого объема. Доставка по Москве, cамовывоз на западе Москвы, есть отправка в регионы через ТК.</p>';
        } elseif ($product->Producer_Brand == 'Vitra') {
            $description .= '<p>Vitra , Витра . Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены при покупке большого объема. Доставка по Москве, cамовывоз на западе Москвы, есть отправка в регионы через ТК.</p>';
        } elseif ($product->Producer_Brand == 'Ceradim') {
            $description .= '<p>Ceradim , Керадим . Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены при покупке большого объема. Доставка по Москве, cамовывоз на западе Москвы, есть отправка в регионы через ТК.</p>';
        } else {
            $description .= '<p>Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены при покупке большого объема. Доставка по Москве, cамовывоз на западе Москвы, есть отправка в регионы через ТК.</p>';
        }

        $description .= '<p>В наших шоурумах представлены коллекции многих других известных производителей керамогранита, керамической плитки, мозаики и других напольных покрытий (ламинат, паркет, кварцвинил, инженерная доска и др.)</p>';
        $description .= '<p>Можно приехать и вживую посмотреть - выбор огромный! Отгрузка или доставка в максимально короткие сроки, есть услуги разгрузки и подъема.</p>';
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
            $dop_description = ' керамогранит для ванной керамогранит на фартук плитка в санузел керамогранит купить керамагранит керамическая плитка под дерево керамогранит под бетон глянцевый керамогранит глянцевый матовый керамогранит керамогранит карвинг carving плитка в ванну плитка в ванную комнату ';
            $description .= '<p><em>' . $keywords . $dop_description . '</em></p>';
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

        $image_urls = avito_images_urls($img_arr, true);

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

        $code = $product->Element_Code;
        $video = '';

    @endphp



    @php
        $AdStatus = 'Free';
        $Delivery = 'Выключена';

        $WeightForDelivery = round((float)$product->Package_Weight, 2);
        $LengthForDelivery = round((float)$Length + 2);
        $HeightForDelivery = 5;
        $WidthForDelivery = round((float)$Width + 2);
    @endphp

    @php
        $Surface = avito_surface_leedo($product->Surface);
        $Texture = avito_texture_leedo($product->Surface);
        $EdgeType = '';
        $Shape = '';
        $ResistanceClass = '';
    @endphp

    @php
        $description .= $show_discount;
    @endphp


    <tr>
        <td>{{ $code }}</td>                                    {{-- Id --}}
        <td>{{ $AdStatus }}</td>                                {{-- AdStatus --}}
        <td></td>                                               {{-- AvitoId --}}
        <td>{{ $name }}</td>                                    {{-- ManagerName --}}
        <td>{{ $phone }}</td>                                   {{-- ContactPhone --}}
        <td>{{ $address }}</td>                                 {{-- Address --}}
        <td>{{ $title }}</td>                                   {{-- Title --}}
        <td>{{ $description }}</td>                             {{-- Description --}}
        <td>{{ $price }}</td>                                   {{-- Price --}}
        <td>{{ $image_urls }}</td>                              {{-- ImageUrls --}}
        <td>{{ $video }}</td>                                   {{-- VideoURL --}}
        <td>{{ $contact_method }}</td>                          {{-- ContactMethod --}}
        <td></td>                                               {{-- Addresses --}}
        <td></td>                                               {{-- DeliveryAddresses --}}
        <td>Ремонт и строительство</td>                         {{-- Category --}}
        <td>{{ $PackagingType }}</td>                           {{-- PackagingType --}}
        <td>{{ $PackageQuantity }}</td>                         {{-- PackageQuantity --}}
        <td>{{ $Delivery }}</td>                                {{-- Delivery --}}
        <td>{{ $WeightForDelivery }}</td>                       {{-- WeightForDelivery --}}
        <td>{{ $LengthForDelivery }}</td>                       {{-- LengthForDelivery --}}
        <td>{{ $HeightForDelivery }}</td>                       {{-- HeightForDelivery --}}
        <td>{{ $WidthForDelivery }}</td>                        {{-- WidthForDelivery --}}
        <td>Стройматериалы</td>                                 {{-- GoodsType --}}
        <td>Товар от производителя</td>                         {{-- AdType --}}
        <td>Новое</td>                                          {{-- Condition --}}
        <td>В наличии</td>                                      {{-- Availability --}}
        <td>{{ $GoodsSubType }}</td>                            {{-- GoodsSubType --}}
        <td>{{ $FinishingMaterialsType }}</td>                  {{-- FinishingMaterialsType --}}
        <td>{{ $CeramicPorcelainTilesSubType }}</td>            {{-- CeramicPorcelainTilesSubType --}}
        <td>{{ $FlooringMaterialsSubType }}</td>                {{-- FlooringMaterialsSubType --}}
        <td>{{ $Brand }}</td>                                   {{-- Brand --}}
        <td>{{ $TileType }}</td>                                {{-- TileType --}}
        <td>{{ $Width }}</td>                                   {{-- Width --}}
        <td>{{ $Length }}</td>                                  {{-- Length --}}
        <td>{{ $Thickness }}</td>                               {{-- Thickness --}}
        <td>{{ $SpaceType }}</td>                               {{-- SpaceType --}}
        <td>{{ $InstallationType }}</td>                        {{-- InstallationType --}}
        <td>{{ $Color }}</td>                                   {{-- Color --}}
        <td>{{ $Pattern }}</td>                                 {{-- Pattern --}}
        <td>{{ $Surface }}</td>                                 {{-- Surface --}}
        <td>{{ $Texture }}</td>                                 {{-- Texture --}}
        <td>{{ $EdgeType }}</td>                                {{-- EdgeType --}}
        <td>{{ $Shape }}</td>                                   {{-- Shape --}}
        <td>{{ $ResistanceClass }}</td>                         {{-- ResistanceClass --}}
    </tr>

@endforeach
{{-----BAUSERVICE-END----}}

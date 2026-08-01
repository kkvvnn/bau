{{---------------------BAUSERVICE--------------------------}}
@foreach($laparets as $product)

    @php
        if (isset($product->originals->Name)) {
            $use_name = $product->originals->Name;
        } else {
            $use_name = $product->Name;
        }
        $product_type = avito_type($use_name);

        switch ($product_type) {
            case 'Керамогранит':
                $GoodsSubType = 'Отделка';
                $FinishingMaterialsType = 'Керамическая плитка и керамогранит';
                $CeramicPorcelainTilesSubType = 'Керамогранит';
                $Brand = $product->Producer_Brand;
                $TileType = '';
                $SpaceType = '';
                $InstallationType = avito_bauservice_for($product->Architectural_surface);
                $Width = avito_bauservice_size($product->Height, 5, 200, $use_name, 'W');
                $Length = avito_bauservice_size($product->Lenght, 5, 400, $use_name, 'L');
                $Thickness = avito_bauservice_height($product->Thickness, 2, 30);
                $Pattern = avito_bauservice_pattern($use_name, $product->DesignValue);
                $Color = avito_bauservice_color($product->Color);
                $ColorName = $Color;
                break;
            case 'Керамическая плитка':
                $GoodsSubType = 'Отделка';
                $FinishingMaterialsType = 'Керамическая плитка и керамогранит';
                $CeramicPorcelainTilesSubType = 'Керамическая плитка';
                $Brand = $product->Producer_Brand;
                $TileType = avito_tile_type($use_name);
                $SpaceType = avito_bauservice_space_type($product->Field_of_Application);
                $InstallationType = avito_bauservice_for($product->Architectural_surface);
                $Width = avito_bauservice_size($product->Height, 0, 150, $use_name, 'W');
                $Length = avito_bauservice_size($product->Lenght, 1, 400, $use_name, 'L');
                $Thickness = '';
                $Pattern = avito_bauservice_pattern($use_name, $product->DesignValue);
                $Color = avito_bauservice_color($product->Color);
                $ColorName = $Color;
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
                $ColorName = '';
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
//                $PackagingType = 'Штучно';

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

//                    if (avito_packaging_type($product->MainUnit) == 'Упаковка') {
//                        $square_one_tile = ((float)$Length / 100) * ((float)$Width / 100);
//                        $price = round($price * $square_one_tile, -1);
//                    }

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
            $novinka = '&#9889;Новинка&#9889; ';
        } else {
            $novinka = '';
        }

        if($product->Name != $use_name) {
            $brand_name = $product->Producer_Brand;
            if ($brand_name == 'Laparet') {
                $brand_name = 'Лапарет';
            } elseif ($brand_name == 'Ceradim') {
                $brand_name = 'Керадим';
            }
        }

        $description .= '<p>'.$novinka.'<strong>' . $brand_name . ' ' . $product->Name .  ' ('
                . $product->Country_of_manufacture . ')</strong></p>';

        if($product->Name != $use_name) {
            $description .= '<p>' . $product->Producer_Brand . ' ' .$use_name. '</p>';
        }


        $description .= '<p><strong>Персональная скидка</strong> — пишите объем, рассчитаем цену.</p>';

        $description .= '<p>--------------------</p>';
        $date = date('d.m.Y');
//            if ($product->balanceCount > 0) {
//                $description .= '<p>&#9989; На утро '.$date.' в Москве '.round($product->balanceCount).' '.$product->MainUnit.' <em>(уточняйте)</em></p>';
//            }

        if ($product->balanceCount > 0) {
//                $description .= '<p>&#9989; На утро '.$date.' в Москве '.round($product->balanceCount).' '.$product->MainUnit.' <em>(уточняйте)</em></p>';
            $description .= '<p><strong>&#9989; Склад Москва: '.round($product->balanceCount).' '.$product->MainUnit.'</strong> (актуально на '.$date.' — уточняйте).</p>';
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

//        $description .= '<p>--------------------</p>';
//        $description .= '<p><strong>Отгрузка с нашего склада осуществляется кратно упаковкам. Минимальный заказ - от 10 тысяч рублей. Скидка рассчитывается индивидуально.</strong></p>';
//        $description .= '<p>--------------------</p>';
//        $description .= '<p><em>Цена указана за 1 '.$product->MainUnit.'</em></p>';

        $description .= '<p>--------------------</p>';
        $description .= '<p><em>Цена указана за 1 '.$product->MainUnit.' (без учета доп скидки)</em></p>';
        $description .= '<p><strong>&#128165; Скидки от объема &#128165;</strong></p>';
        $description .= '<p><strong>Под каждый проект действуют индивидуальные условия</strong></p>';
        $description .= '<p>Кратно упаковкам. Минимальный заказ - от 1 упаковки.</p>';
        $description .= '<p><strong>Оплата при получении.</strong></p>';
        $description .= '<p>--------------------</p>';


//        $description .= '<p><strong>Коллекция: </strong>';
//        $collections = $product->collections;
//        foreach ($collections as $collection) {
//              $description .= $collection->Collection_Name;
//              $description .= '. ';
//          }
//        $description .= '</p><ul>';

        $description .= '<p><strong>&#128203; ОСНОВНЫЕ ХАРАКТЕРИСТИКИ:</strong></p>';

        $description .= '<ul>';


        if ($product->Height != 0 && $product->Lenght != 0) {
           $description .= '<li><strong>Размер: </strong>' . $product->Height .'x' . $product->Lenght . ' см</li>';
        }
//        if ($product->Thickness != null && $product->Thickness != 0) {
//           $description .= '<li><strong>Толщина: </strong>' . $product->Thickness . ' см</li>';
//        }
//        if ($product->Place_in_the_Collection != null) {
//           $description .= '<li><strong>Место в коллекции: </strong>' . $product->Place_in_the_Collection . '</li>';
//        }
        if ($product->DesignValue != null) {
           $description .= '<li><strong>Рисунок: </strong>' . $product->DesignValue . '</li>';
        }
//        if ($product->Color != null) {
//           $description .= '<li><strong>Цвет: </strong>' . $product->Color . '</li>';
//        }
//        if ($product->Cover != null) {
//           $description .= '<li><strong>Покрытие: </strong>' . $product->Cover . '</li>';
//        }
        if ($product->Surface != null) {
           $description .= '<li><strong>Поверхность: </strong>' . $product->Surface . '</li>';
        }
//        if ($product->MainUnit != null) {
//           $description .= '<li><strong>Единица измерения товара: </strong>' . $product->MainUnit . '</li>';
//        }
//        if ($product->PCS_in_Package != null) {
//           $description .= '<li><strong>В упаковке: </strong>' . $product->PCS_in_Package . ' шт</li>';
//        }
//        if ($product->Package_Value != null && $product->Package_Value != $product->PCS_in_Package) {
//           $description .= '<li><strong>В упаковке: </strong>' . $product->Package_Value . ' м2</li>';
//        }
        if ($product->PCS_in_Package != null && ($product->Package_Value != null && $product->Package_Value != $product->PCS_in_Package)) {
           $description .= '<li><strong>В упаковке: </strong>' . $product->PCS_in_Package . ' шт ( ' .$product->Package_Value. ' м2 )</li>';
        }

//        if ($product->Producer_Brand != null) {
//           $description .= '<li><strong>Производитель: </strong>' . $product->Producer_Brand .' ('. $product->Country_of_manufacture .') </li>';
//        }
//        if ($product->Country_of_manufacture != null) {
//           $description .= '<li><strong>Страна производства: </strong>' . $product->Country_of_manufacture . '</li>';
//        }

        $description .= '</ul>';

        $description .= '<p>&#128142; <strong>Наши преимущества:</strong></p><ul>';
        $description .= '<li>Надежная компания, опыт работы более 15 лет</li>';
        $description .= '<li>Выгодные скидки: больше объем - больше скидка!</li>';
        $description .= '<li>Быстрая доставка</li>';
        $description .= '<li>Несколько шоурумов: керамогранит, ламинат, кварцвинил, паркет.</li>';
        $description .= '<li>Есть пункт самовывоза - поможем с погрузкой. Или доставим до адреса</li>';
//        $description .= '<li>Специальные условия и бонусы для постоянных клиентов, дизайнеров, строителей</li>';
        $description .= '</ul>';

        $description .= '<p><em>Так же в наличии другие бренды: Kerama Marazzi Керама Марацци , Vitra Витра , Primavera Примавера , GlobalTile ГлобалТайл , NT CERAMIC НТ КЕРАМИК , Delacora Делакора, LCM ЛЦМ, EMPERO ЭМПЕРО, и многие другие</em></p>';
        $description .= '<p><em>А ещё у нас можно приобрести кварцвинил, ламинат, инженерную доску, SPC по очень выгодным ценам</em></p>';

//            $description .= '<p>&#127972; <strong>Адрес шоурума: ТД"Можайский двор" ул.Западная, стр 100</strong></p>';
        $description .= '<p>&#128345; <strong>Часы работы шоурума: пн-пт 10:00-19:00, сб-вс 10:00-18:00</strong></p>';
//            $description .= '<p><strong>Онлайн отдел отвечает на Ваши вопросы в рабочее время с 10 до 18 (в выходные дни с 10 до 15)</strong></p>';
//            $description .= '<p>&#127873; Приезжайте в наш шоурум, сообщите менеджеру промокод <strong>"Laparet Avito Запад"</strong>, и Вам предложат специальные условия по цене и дополнительные бонусы</p>';

//            $description .= '<p>Доставка возможна на следующий день после заказа, если он был оформлен до 14:00</p>';

    $description .= '<p>&#128073; НАПИШИТЕ СЕЙЧАС! Укажите нужную площадь — рассчитаем количество и стоимость</p>';

        if ($add_description != '') {
            $description .= '<p>'.nl2br($add_description).'</p>';
        }

    @endphp

    @php
        $keywords = '';
        $keywords_arr = [];

        if (stripos($use_name, 'екор') !== false) {
            $type = 'декор';
        } elseif (stripos($use_name, 'озаика') !== false) {
            $type = 'мозаика';
        } elseif (stripos($use_name, 'литка') !== false) {
            $type = 'керамическая плитка';
        } elseif (stripos($use_name, 'ерамогранит') !== false) {
            $type = 'керамогранит';
        } else {
            $type = '';
        }

        if ((stripos($product->Field_of_Application, 'пол') !== false) && (stripos($product->Field_of_Application, 'ван') !== false)) {
            $keywords_arr[] = $type . ' для пола ' . $type . ' для ванной комнаты';
        } elseif (stripos($product->Field_of_Application, 'пол') !== false) {
            $keywords_arr[] = $type . ' для пола';
        } elseif (stripos($product->Field_of_Application, 'ван') !== false) {
            $keywords_arr[] = $type . ' для ванной комнаты';
        } else {
            $keywords_arr[] = '';
        }


        if (stripos($product->DesignValue, 'Дерев') !== false) {
            $keywords_arr[] = $type . ' под дерево';
        } elseif (stripos($product->DesignValue, 'рамор') !== false) {
            $keywords_arr[] = $type . ' под мрамор';
        } elseif (stripos($product->DesignValue, 'амен') !== false) {
            $keywords_arr[] = $type . ' под камень';
        } elseif (stripos($product->DesignValue, 'етон') !== false) {
            $keywords_arr[] = $type . ' под бетон';
        } elseif (stripos($product->DesignValue, 'никс') !== false) {
            $keywords_arr[] = $type . ' под оникс';
        }


//        $lenght = round((float)str_replace(',', '.', $product->Lenght), 0, PHP_ROUND_HALF_EVEN);
//        $height = round((float)str_replace(',', '.', $product->Height), 0, PHP_ROUND_HALF_EVEN);
//
//        $size = '';
//        $size .= $type . ' ' . $lenght . 'х' . $height . ' ';
//        if ($lenght != $height) {
//            $size .= $type . ' ' . $height . 'х' . $lenght . ' ';
//        }
//        $size .= $type . ' ' . $lenght . '*' . $height . ' ';
//        if ($lenght != $height) {
//            $size .= $type . ' ' . $height . '*' . $lenght . ' ';
//        }
//
//        if ($product->Height != 0 && $product->Lenght != 0) {
//            $keywords .= $size;
//        }

        //-----------SIZE----------
                    $length = round((float)str_replace(',', '.', $product->Lenght), 0, PHP_ROUND_HALF_EVEN);
                    $height = round((float)str_replace(',', '.', $product->Height), 0, PHP_ROUND_HALF_EVEN);

                    if($product->Height != 0 && $product->Lenght != 0) {
                        $keywords_arr[] = $type . ' ' . $length . 'х' . $height;
                        $keywords_arr[] = $type . ' ' . $length . '*' . $height;
                    }
                    //-----------SIZE-END----------

        if ($product->Producer_Brand == 'Laparet') {
            $keywords_arr[] = $type . ' лапарет';
        } elseif ($product->Producer_Brand == 'Cersanit') {
            $keywords_arr[] = $type . ' церсанит';
        } elseif ($product->Producer_Brand == 'Vitra') {
            $keywords_arr[] = $type . ' витра';
        } elseif ($product->Producer_Brand == 'Ceradim') {
            $keywords_arr[] = $type . ' керадим';
        } elseif ($product->Producer_Brand == 'Kerama Marazzi') {
            $keywords_arr[] = $type . ' керама марацци';
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

        $keywords_arr[] = $type . ' ' .mb_strtolower($surf);


//        if (stripos($product->Architectural_surface, 'Стена') !== false) {
//            $keywords .= $type . ' для стен' . ' ';
//        }
//        if (stripos($product->Architectural_surface, 'Пол') !== false) {
//            $keywords .= $type . ' для пола' . ' ';
//        }

        $keywords_arr[] = 'плитка керамическая плитка';

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
        $keywords_arr[] = $type . ' ' .mb_strtolower($color);

        $keywords_arr[] = $product->Producer_Brand . ' ' . $type;

        $owner_code = $product->Owner_Article;
        if ($owner_code != null) {
            $keywords_arr[] = $type . ' ' . $owner_code;
        }

//        $country = $product->Country_of_manufacture;
//
//        if ($country != null) {
//            $keywords .= $type . ' ' . $country . ' ';
//        }

        if (/*$product->Color == 'Белый' && */$product->DesignValue == 'Мрамор') {
            $keywords_arr[] = 'под мрамор';
        }

//        if ($product->Color == 'Черный' && $product->DesignValue == 'Мрамор') {
//            $keywords .= $type . ' черный мрамор ';
//            $keywords .= $type . ' под мрамор черный ';
//        }

        if (stripos($use_name, 'alacatta') || stripos($use_name, 'alacata')) {
            $keywords_arr[] = 'калаката керамогранит калакатта';
        }

        $keywords_arr[] = 'кафельная плитка лапарет керамогранит';

        shuffle($keywords_arr);
        $keywords = implode(' ', $keywords_arr);

        if ($type != 'декор') {
            $description .= '<p>-----------------</p>';
//            $dop_description = ' керамогранит для ванной керамогранит на фартук плитка в санузел керамогранит купить керамагранит керамическая плитка под дерево керамогранит под бетон глянцевый керамогранит глянцевый матовый керамогранит керамогранит карвинг керамагранит лапарет керамагранит laparet керамагранит carving плитка в ванну плитка в ванную комнату керамогранит лапарет плитка лапарет кафель керамогранит laparet керамогранит кафельная плитка лапарет плитка керамогранит лапарет керамогранит';

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

        $image_urls = avito_images_urls($img_arr, true);

    @endphp

    @php
        $title = $use_name;
        if (mb_strlen($title) > 100) {
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
        if (mb_strlen($title) < 92) {
            $title = $product->Producer_Brand . ' ' . $title;
        }


//        if($product->Name != $use_name) {
//                $title .= ' (' . ($product->collections[0]->Collection_Name??' ') . ')';
//            }


    @endphp



    @php

        $code = str_replace('х', '', $product->Element_Code) . '_lz';
        $video = '';

    @endphp



    @php
        $AdStatus = 'Free';
        $Delivery = 'Самовывоз с онлайн-оплатой';

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

    @php
        $MultiItem = 'Нет';
        $MultiName = '';
    @endphp

    @php
        $Promo = 'Manual';
        $PromoManualOptions = '|7|500';

//        $Promo = '';
//        $PromoManualOptions = '';
    @endphp

    @php
        $WholesaleType = '';
        $WholesaleMinOrderType = '';
        $WholesaleMinOrderCount = '';
        $WholesalePacking = '';
        $WholesalePackingCount = '';
        $WholesaleMeasureUnit = '';
        $WholesaleDiscountLadderType = '';
        $DiscountLadderList = '';
    @endphp

{{--    @php--}}
{{--        if ($product->Element_Code == 'х9999275882') {--}}
{{--            $WholesaleType = 'Да';--}}
{{--            $WholesaleMinOrderType = 'От суммы';--}}
{{--            $WholesaleMinOrderCount = '1000';--}}
{{--            $WholesalePacking = '';--}}
{{--            $WholesalePackingCount = '';--}}
{{--            $WholesaleMeasureUnit = 'Метр квадратный';--}}
{{--            $WholesaleDiscountLadderType = 'Зависит от суммы';--}}
{{--            $DiscountLadderList = '1000|10<br>5000|15';--}}
{{--        }--}}
{{--    @endphp--}}

    @php
        if ($price_old == 0 || $price_old == $price) {
            $WholesaleType = 'Да';
            $WholesaleMinOrderType = 'От количества';
            $WholesaleMinOrderCount = '1';
            $WholesalePacking = '';
            $WholesalePackingCount = '';
            $WholesaleMeasureUnit = 'Метр квадратный';
            $WholesaleDiscountLadderType = 'Зависит от суммы';
            $DiscountLadderList = '10000|10<br>50000|15<br>100000|20';
        }
    @endphp

{{--    @php--}}
{{--        if ($product->Element_Code == 'х9999316107') {--}}
{{--            $WholesaleType = 'Да';--}}
{{--            $WholesaleMinOrderType = 'От количества';--}}
{{--            $WholesaleMinOrderCount = '2';--}}
{{--            $WholesalePacking = '';--}}
{{--            $WholesalePackingCount = '';--}}
{{--            $WholesaleMeasureUnit = 'Метр квадратный';--}}
{{--            $WholesaleDiscountLadderType = 'Зависит от количества';--}}
{{--            $DiscountLadderList = '3|10<br>10|15';--}}
{{--        }--}}
{{--    @endphp--}}

    <tr>
        <td>{{ $code }}</td>                                    {{-- Id --}}
        <td>{{ $AdStatus }}</td>                                {{-- AdStatus --}}
        <td></td>                                               {{-- AvitoId --}}
        <td>{{ $name }}</td>                                    {{-- ManagerName --}}
        <td></td>                                               {{-- Email --}}
        <td>{{ $phone }}</td>                                   {{-- ContactPhone --}}
{{--        <td>{{ $address }}</td>                                 --}}{{-- Address --}}
        <td>{{ $address_id }}</td>                              {{-- SellerAddressID --}}
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
        <td></td>                                               {{-- ProductType --}}
        <td></td>                                               {{-- ProductSubType --}}
        <td>{{ $ColorName }}</td>                               {{-- ColorName --}}
        <td>{{ $TargetAudience }}</td>                          {{-- TargetAudience --}}
        <td>{{ $MultiItem }}</td>                               {{-- MultiItem --}}
        <td>{{ $MultiName }}</td>                               {{-- MultiName --}}
        <td>{{ $Promo }}</td>                                   {{-- Promo --}}
        <td>{{ $PromoManualOptions }}</td>                      {{-- PromoManualOptions --}}
        <td>{{ $WholesaleType }}</td>                           {{-- WholesaleType --}}
        <td>{{ $WholesaleMinOrderType }}</td>                   {{-- WholesaleMinOrderType --}}
        <td>{{ $WholesaleMinOrderCount }}</td>                  {{-- WholesaleMinOrderCount --}}
        <td>{{ $WholesalePacking }}</td>                        {{-- WholesalePacking --}}
        <td>{{ $WholesalePackingCount }}</td>                   {{-- WholesalePackingCount --}}
        <td>{{ $WholesaleMeasureUnit }}</td>                    {{-- WholesaleMeasureUnit --}}
        <td>{{ $WholesaleDiscountLadderType }}</td>             {{-- WholesaleDiscountLadderType --}}
        <td>{!! nl2br($DiscountLadderList) !!}</td>             {{-- DiscountLadderList --}}
    </tr>
@endforeach
{{------------------END-BAUSERVICE--------------------}}

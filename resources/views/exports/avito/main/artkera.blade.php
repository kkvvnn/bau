{{-----ARTKERA-----}}
@foreach($altacera as $product)

    @php
        $product_type = avito_type($product->collection_item);

        $wid_artkera_temp = $product->width/10;
        $len_artkera_temp = $product->height/10;
        if ($wid_artkera_temp > $len_artkera_temp) {
            $wid_artkera = $len_artkera_temp;
            $len_artkera = $wid_artkera_temp;
        } else {
            $wid_artkera = $wid_artkera_temp;
            $len_artkera = $len_artkera_temp;
        }

        switch ($product_type) {
            case 'Керамогранит':
                $GoodsSubType = 'Отделка';
                $FinishingMaterialsType = 'Керамическая плитка и керамогранит';
                $CeramicPorcelainTilesSubType = 'Керамогранит';
                $Brand = $product->category_r->parent;
                if ($Brand == 'Artkera Group') {
                    $Brand = 'Altacera';
                }
                $TileType = '';
                $SpaceType = '';
                $InstallationType = avito_bauservice_for('На пол | На стену');
                $Width = avito_bauservice_size($wid_artkera, 5, 200, $product->tovar??'', 'W');
                $Length = avito_bauservice_size($len_artkera, 5, 400, $product->tovar??'', 'L');
                $Thickness = avito_bauservice_height($product->thickness, 2, 30);
                $Pattern = avito_bauservice_pattern($product->tovar, '');
                $Color = avito_bauservice_color('');
                break;
            case 'Керамическая плитка':
                $GoodsSubType = 'Отделка';
                $FinishingMaterialsType = 'Керамическая плитка и керамогранит';
                $CeramicPorcelainTilesSubType = 'Керамическая плитка';
                $Brand = $product->category_r->parent;
                if ($Brand == 'Artkera Group') {
                    $Brand = 'Altacera';
                }
                $TileType = avito_tile_type($product->collection_item);
                $SpaceType = avito_bauservice_space_type('default');
                $InstallationType = avito_bauservice_for($product->collection_item??'');
                $Width = avito_bauservice_size($wid_artkera, 0, 150, $product->title??'', 'W');
                $Length = avito_bauservice_size($len_artkera, 1, 400, $product->title??'', 'L');
                $Thickness = '';
                $Pattern = avito_bauservice_pattern($product->tovar, '');
                $Color = avito_bauservice_color('');
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
        $price_rrc = $product->price->price;
        $price_old = intval($product->sale || $product->is_action);
        $brand = 'Artkera';
        $price = avito_price($price_rrc, $brand, $discounts, $price_old);

        $show_discount = avito_show_discount($price_rrc, $brand, $discounts, $price_old);
    @endphp

    @php
        if ($CeramicPorcelainTilesSubType == 'Керамогранит' || $CeramicPorcelainTilesSubType == 'Керамическая плитка') {

            $PackagingType = avito_packaging_type($product->unit);

            $is_big_format = false;

            if ($Width >=59 && $Length >= 59) {
                $PackagingType = 'Штучно';
                $is_big_format = true;
            }




            if ($PackagingType == 'Упаковка') {
                $PackageQuantity = '1';
            } else {
                $PackageQuantity = avito_package_quantity(round($product->square_in_pack, 2));
            }

            if ($is_big_format && (avito_packaging_type($product->unit) == 'Упаковка')) {
                    $square_one_tile = ((float)$Length / 100) * ((float)$Width / 100);
                    $price = round($price * $square_one_tile, -1);
            }

        } else {
            $PackagingType = '';
            $PackageQuantity = '';
        }
    @endphp

    @php

                    $title = $product->category_r->parent.' '.$product->collection_item.' '.$product->name_for_site.' '.$product->artikul;
                    $title = str_replace('Архив', '', $title);

        //              ------------------------------------------FOTO-------------------------------------
                    $images = [];
                    if (isset($product->images->images)) {
                        foreach ($product->images->images as $img) {
                            $images[] = Storage::disk('artkera')->url($img);
                        }
                    }

                    $images_collection = [];
                    if (isset($product->images_collection->images)) {
                        foreach ($product->images_collection->images as $img) {
                            $images_collection[] = Storage::disk('artkera')->url($img);
                        }
                    }

                    if (count($images_collection)) {
                        $images = array_merge(array_slice( $images, 0, 1 ),
                            [ $images_collection[0] ],
                            array_slice( $images, 1 )
                        );
                        $images = array_merge($images, $images_collection);
                    }


                    $image_urls = avito_images_urls($images, true);

        $description = '';

        if($add_description_first != '') {
        $description .= '<p>'.nl2br($add_description_first).'</p>';
        }

                    $description .= '<p><strong>' . $product->tovar . '. '
                            . $product->category_r->parent . ' ('
                            . $product->country . ')</strong></p>';
                    $description .= '<p><strong>Коллекция: </strong>'.$product->category_r->parent.' / '.$product->category. '</p>';



//                    $date = date('d.m.Y');
//                    $description .= '<p>--------------------</p>';
//                    $description .= '<p>&#9989; На утро '.$date.' остаток: </p><ul>';
//
//                    $description .= '<li>Москва: ' . ($product->moscow + $product->moscow_sale + $product->moscow_depot_reserve) . ' ' . $product->unit . '</li>';

//                    if($product->moscow_way) {
//                        $description .= '<li>Москва (в пути): ' . $product->moscow_way . ' ' . $product->unit . '</li>';
//                    }
//
//                    $description .= '<li>Казань: ' . $product->kazan + $product->kazan_sale . ' ' . $product->unit . '</li>';
//                    if($product->kazan_way) {
//                        $description .= '<li>Казань (в пути): ' . $product->kazan_way . ' ' . $product->unit . '</li>';
//                    }
//
//                    $description .= '<li>СПб: ' . $product->spb + $product->spb_sale . ' ' . $product->unit . '</li>';
//                    if($product->spb_way) {
//                        $description .= '<li>СПб (в пути): ' . $product->spb_way . ' ' . $product->unit . '</li>';
//                    }



//                    $description .= '</ul><p><em>(информация приблизительная, точную информацию о наличии спрашивайте у менеджера)</em></p>';

                    $description .= '<p>--------------------</p>';
                    $date = date('d.m.Y');

                        $description .= '<p>&#9989; На утро '.$date.' в Москве '.round($product->moscow + $product->moscow_sale + $product->moscow_depot_reserve).' '.$product->unit.' <em>(уточняйте у менеджера)</em></p>';

//                    $description .= '<p>--------------------</p>';
//                    $description .= '<p><strong>Отгрузка с нашего склада осуществляется кратно упаковкам. Минимальный заказ - от 10 тысяч рублей.</strong></p>';
//                    $description .= '<p>--------------------</p>';
//
//                    $description .= '<p><em>Цена указана за 1 '.$product->unit.'.</em></p>';
//                    $description .= '<p><em>Цена зависит от количества, формы оплаты, даты доставки (срочности), адреса доставки и подъема. Более детально по вашему заказу можем ответить после получения всех вводных данных.</em></p><ul>';


                    $description .= '<p>--------------------</p>';

                    if ($is_big_format) {
                        $description .= '<p><strong>&#9889; Цена в объявлении указана за 1 шт &#9889;</strong></p>';
                    } else {
                        $description .= '<p><strong>&#9889; Цена в объявлении указана за 1 '.$product->unit.' &#9889;</strong></p>';
                    }

                    $description .= '<p><strong>&#128165; Скидки от объема &#128165;</strong></p>';
                    $description .= '<p><strong>Под каждый проект действуют индивидуальные условия предоставления скидки, обращайтесь в чат к менеджеру для рассчета.</strong></p>';
                    $description .= '<p><strong>Отгрузка с нашего склада осуществляется кратно упаковкам. Минимальный заказ - от 8000 р. Скидка рассчитывается индивидуально.</strong></p>';
                    $description .= '<p>--------------------</p>';

                    $description .= '<ul>';

                        if($product->width != 0 && $product->height != 0) {
                        $description .= '<li><strong>Размер: </strong>' . $product->height/10 .'x' . $product->width/10 . ' см</li>';
                        }
                        if($product->thickness != null) {
                        $description .= '<li><strong>Толщина: </strong>' . $product->thickness . ' мм</li>';
                        }
                        if($product->surface_type != null) {
                        $description .= '<li><strong>Поверхность: </strong>' . $product->surface_type . '</li>';
                        }
//                        if($product->Рельеф != null) {
//                        $description .= '<li><strong>Рельеф: </strong>' . $product->Рельеф . '</li>';
//                        }
                        if($product->packing) {
                        $description .= '<li><strong>Штук в упаковке: </strong>' . $product->packing . '</li>';
                        }
                        if($product->square_in_pack) {
                        $description .= '<li><strong>Кв. метров в упаковке: </strong>' . $product->square_in_pack . '</li>';
                        }
//                        if($product->massa_pack) {
//                        $description .= '<li><strong>Вес упаковки: </strong>' . $product->massa_pack . '</li>';
//                        }
                        if($product->country != null) {
                        $description .= '<li><strong>Страна производства: </strong>' . $product->country . '</li>';
                        }
                        if($product->artikul != null) {
                        $description .= '<li><strong>Артикул: </strong>' . $product->artikul . '</li>';
                        }

                        $description .= '</ul><br>';


                    $description .= '<p>Наличие а также актуальные цены уточняйте у менеджера.</p>';
                    $description .= '<p>Керамическая плитка и керамогранит '.$product->category_r->parent.'. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены. Доставка по Москве, cамовывоз на западе Москвы.</p>';

                    $description .= '<p>В наших шоурумах представлены коллекции многих других известных производителей керамогранита, керамической плитки, мозаики и других напольных покрытий (ламинат, паркет, кварцвинил, инженерная доска и др.)</p>';
                    $description .= '<p>Можно приехать и вживую посмотреть - выбор огромный (4 шоурума в одном месте)! Керамогранит, керамическая плитка, мозаика, ламинат, кварцвинил, инженерная доска и др.</p>';
                    $description .= '<p>Работаем с розничными и оптовыми покупателями. А так же предлагаем сотрудничество дизайнерам и строительным компаниям.</p>';
                    $description .= '<p>Отправляем через ТК по всей России.</p>';

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

                    $keywords .= $product->category_r->parent . ' ' . $type . ', ';


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

                    $code = $product->artikul;
                    $video = '';
    @endphp



    @php
        $AdStatus = 'Free';
        $Delivery = 'Самовывоз с онлайн-оплатой';

        $WeightForDelivery = round((float)$product->massa_pack, 2);
        $LengthForDelivery = round((float)$Length + 2);
        $HeightForDelivery = 5;
        $WidthForDelivery = round((float)$Width + 2);
    @endphp

    @php
        $Surface = avito_surface_leedo($product->surface_type);
        $Texture = avito_texture_leedo($product->Рельеф);
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
        <td></td>                                               {{-- ProductType --}}
        <td></td>                                               {{-- ProductSubType --}}
    </tr>
@endforeach
{{-----ARTKERA-END----}}

{{-----ARTKERA-----}}
@foreach($artkera as $product)

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
                $TileType = '';
                $SpaceType = '';
                $InstallationType = avito_bauservice_for('На пол | На стену');
                $Width = avito_bauservice_size($wid_artkera, 5, 200, $product->tovar??'', 'W');
                $Length = avito_bauservice_size($len_artkera, 5, 400, $product->tovar??'', 'L');
                $Height = avito_bauservice_height($product->thickness, 2, 30);
                $Pattern = avito_bauservice_pattern($product->tovar, '');
                $Color = avito_bauservice_color('');
                break;
            case 'Керамическая плитка':
                $GoodsSubType = 'Отделка';
                $FinishingMaterialsType = 'Керамическая плитка и керамогранит';
                $CeramicPorcelainTilesSubType = 'Керамическая плитка';
                $Brand = $product->category_r->parent;
                $TileType = avito_tile_type($product->collection_item);
                $SpaceType = avito_bauservice_space_type('default');
                $InstallationType = avito_bauservice_for($product->collection_item??'');
                $Width = avito_bauservice_size($wid_artkera, 0, 150, $product->title??'', 'W');
                $Length = avito_bauservice_size($len_artkera, 1, 400, $product->title??'', 'L');
                $Height = '';
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
                $Height = '';
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


                    $image_urls = avito_images_urls($images);

        $description = '';

        if($add_description_first != '') {
        $description .= '<p>'.nl2br($add_description_first).'</p>';
        }
//                    $description .= '<p>Керамическая плитка и керамогранит '.$product->category_r->parent.'. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены. Доставка по Москве, cамовывоз на западе Москвы.</p>';
                    $description .= '<p><strong>' . $product->title . '</strong></p>';
                    $description .= '<p><strong>Коллекция: </strong>'.$product->category_r->parent.' - '.$product->category. '</p>';



                    $date = date('d.m.Y');
//                    $description .= '<p>--------------------</p>';
//                    $description .= '<p>&#9989; На утро '.$date.' остаток: </p><ul>';
                    $description .= '<p>На '.$date.' доступно: </p><ul>';


                    $description .= '<li>Склад Казань: ' . $product->kazan + $product->kazan_sale . ' ' . $product->unit . '</li>';
                    $description .= '<li>Склад Москва: ' . ($product->moscow + $product->moscow_sale + $product->moscow_depot_reserve + $product->moscow_way) . ' ' . $product->unit . '</li>';

                    if($product->kazan_way) {
                        $description .= '<li>Казань (в пути): ' . $product->kazan_way . ' ' . $product->unit . '</li>';
                    }



                    $description .= '</ul><p><em>(актуальную информацию о наличии уточняйте у менеджера)</em></p>';
//                    $description .= '<p>--------------------</p>';
//                    $description .= '<p><strong>Отгрузка с нашего склада осуществляется кратно упаковкам. Минимальный заказ - от одной упаковки.<br>На заказ до 10000 рублей при самовывозе установлена фиксированная доплата 300 рублей. Это сделано для того, чтобы не увеличивать минимальную сумму заказа, и мы могли отгрузить Вам даже 1 упаковку. <br>Для нас важен каждый клиент и каждый заказ! Спасибо за понимание.</strong></p>';
//                    $description .= '<p>--------------------</p>';

                    $description .= '<p><em>Цена в объявлении указана за 1 '.$product->unit.'.</em></p>';
//                    $description .= '<p><em>Цена зависит от количества, формы оплаты, даты доставки (срочности), адреса доставки и подъема. Более детально по вашему заказу можем ответить после получения всех вводных данных.</em></p><ul>';



                        if($product->artikul != null) {
                        $description .= '<li><strong>Артикул: </strong>' . $product->artikul . '</li>';
                        }
                        if($product->width != 0 && $product->height != 0) {
                        $description .= '<li><strong>Размер: </strong>' . $product->height/10 .'x' . $product->width/10 . ' см</li>';
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
                        if($product->packing) {
                        $description .= '<li><strong>Штук в упаковке: </strong>' . $product->packing . '</li>';
                        }
                        if($product->square_in_pack) {
                        $description .= '<li><strong>Кв.м. в упаковке : </strong>' . $product->square_in_pack . '</li>';
                        }
                        if($product->massa_pack) {
                        $description .= '<li><strong>Вес упаковки: </strong>' . $product->massa_pack . ' кг</li>';
                        }
                        if($product->country != null) {
                        $description .= '<li><strong>Страна производства: </strong>' . $product->country . '</li>';
                        }

                        $description .= '</ul>';


                    $description .= '<p>Под крупный проект действуют специальные условия и скидки.</p>';
//                    $description .= '<p>В нашем шоуруме представлены коллекции многих других известных производителей керамогранита, керамической плитки, мозаики и других напольных покрытий (ламинат, паркет, кварцвинил, инженерная доска и др.)</p>';
//                    $description .= '<p>Работаем с розничными и оптовыми покупателями. А так же предлагаем сотрудничество дизайнерам и строительным компаниям.</p>';

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
                        $description .= '<p>---------------------</p>';
                        $description .= '<p><em>' . $keywords . '</em></p>';
                    }

                    $description = str_replace('Архив', '', $description);

                    $code = $product->artikul . '_millennium';
                    $video = '';
    @endphp

    @php
        $price_rrc = $product->price->price;
        $price_old = (int) $product->sale;
        $brand = 'Artkera';
        $price = avito_price($price_rrc, $brand, $discounts, $price_old);

        $description .= avito_show_discount($price_rrc, $brand, $discounts, $price_old);
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
@endforeach
{{-----ARTKERA-END----}}

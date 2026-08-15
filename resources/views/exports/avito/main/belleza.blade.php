{{-----BELLEZA-----}}
@foreach($bellezas as $product)
    @php
        $GoodsSubType = 'Отделка';
        $FinishingMaterialsType = 'Керамическая плитка и керамогранит';
        $CeramicPorcelainTilesSubType = 'Керамогранит';
        $Brand = 'Belleza';
        $TileType = '';
        $SpaceType = '';
        $InstallationType = avito_bauservice_for('На пол | На стену');
        $Width = avito_bauservice_size($product->width, 5, 200, $product->tovar??'', 'W');
        $Length = avito_bauservice_size($product->length, 5, 400, $product->tovar??'', 'L');
        $Thickness = avito_artkera_height($product->thickness, 2, 30);
        $Pattern = avito_bauservice_pattern($product->title_rus, '');
        $Color = avito_bauservice_color(my_mb_ucfirst($product->color));
        $ColorName = $Color;
        $FlooringMaterialsSubType = '';
        $ExteriorFinishingDecorativeStoneSubType = '';
        $WallPanelsSlatsDecorativeElementsSubType = '';
        $MixesType = '';
        $Material = '';
        $OutsideUsage = '';
    @endphp

    @php
        $price_rrc = $product->price;
        $price_old = intval($product->sale);


        $price = avito_price($price_rrc, $Brand, $discounts, $price_old);

        $show_discount = avito_show_discount($price_rrc, $Brand, $discounts, $price_old);
    @endphp

    @php
        if ($CeramicPorcelainTilesSubType == 'Керамогранит' || $CeramicPorcelainTilesSubType == 'Керамическая плитка') {

            $PackagingType = avito_packaging_type($product->unit);

//            $is_big_format = false;
//
//            if ($Width >=59 && $Length >= 59) {
//                $PackagingType = 'Штучно';
//                $is_big_format = true;
//            }




            if ($PackagingType == 'Упаковка') {
                $PackageQuantity = '1';
            } else {
                $PackageQuantity = avito_package_quantity(round($product->units_pack, 2));
            }


//            if ($is_big_format && (avito_packaging_type($product->unit) == 'Упаковка')) {
//                    $square_one_tile = ((float)$Length / 100) * ((float)$Width / 100);
//                    $price = round($price * $square_one_tile, -1);
//            }

        } else {
            $PackagingType = '';
            $PackageQuantity = '';
        }
    @endphp

    @php

                    $title = 'Керамогранит ' . $product->title;

        //              ------------------------------------------FOTO-------------------------------------
                    $images = [];
                    if ($product->images === []) {
                        $images[] = $product->image_1;
                    } else {
                        $images = $product->images;
                    }

                    $images_collection = [];
                    $images_collection[] = $product->image_collection;

//                    if (count($images_collection)) {
//                        $images = array_merge(array_slice( $images, 0, 1 ),
//                            [ $images_collection[0] ],
//                            array_slice( $images, 1 )
//                        );
//                        $images = array_merge($images, $images_collection);
//                    }

                    $images = array_merge($images, $images_collection);
                    $image_urls = avito_images_urls($images, true);

        $description = '';

        if($add_description_first != '') {
            $description .= '<p>'.nl2br($add_description_first).'</p>';
        }

                    $description .= '<p><strong>Belleza Керамогранит ' . $product->title . '</strong></p>';
                    $description .= '<p><em>Керамогранит ' . $product->title_rus . '</em></p>';
//                    $description .= '<p><strong>Коллекция: </strong>'.$product->category_r->parent.' / '.$product->category. '</p>';



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

                    $description .= '<p><strong>Индивидуальная скидка</strong> — укажите объем, рассчитаем цену.</p>';

                    $description .= '<p>--------------</p>';
                    $date = date('d.m.Y');

                        $description .= '<p>&#9989; '.$date.' в Москве '.$product->stock.' '.$product->unit.' <em>(уточняйте)</em></p>';

//                    $description .= '<p>--------------------</p>';
//                    $description .= '<p><strong>Отгрузка с нашего склада осуществляется кратно упаковкам. Минимальный заказ - от 10 тысяч рублей.</strong></p>';
//                    $description .= '<p>--------------------</p>';
//
//                    $description .= '<p><em>Цена указана за 1 '.$product->unit.'.</em></p>';
//                    $description .= '<p><em>Цена зависит от количества, формы оплаты, даты доставки (срочности), адреса доставки и подъема. Более детально по вашему заказу можем ответить после получения всех вводных данных.</em></p><ul>';


                    $description .= '<p>--------------</p>';

//                    if ($is_big_format) {
//                        $description .= '<p><strong>&#9889; Цена в объявлении указана за 1 шт &#9889;</strong></p>';
//                    } else {
                        $description .= '<p><strong> Цена указана за 1 '.$product->unit.' (есть доп скидки)</strong></p>';
//                    }

                    $description .= '<p><strong>&#128165; Скидки от объема &#128165;</strong></p>';
//                    $description .= '<p>Сделаем индивидуальную скидку, обращайтесь в чат</p>';
                    $description .= '<p>Отгружаем кратно упаковкам. Минимальный заказ - от 1 упаковки</p>';
                    $description .= '<p>Доставка или Самовывоз</p>';
                    $description .= '<p>Оплата при получении</p>';
                    $description .= '<p>--------------</p>';

                    $description .= '<ul>';

                        if($product->width != 0 && $product->length != 0) {
                        $description .= '<li><strong>Размер: </strong>' . $product->length .' * ' . $product->width . ' см</li>';
                        }
//                        if($product->thickness != null) {
//                        $description .= '<li><strong>Толщина: </strong>' . $product->thickness . ' мм</li>';
//                        }
                        if($product->surface != null) {
                        $description .= '<li><strong>Поверхность: </strong>' . $product->surface . '</li>';
                        }
//                        if($product->Рельеф != null) {
//                        $description .= '<li><strong>Рельеф: </strong>' . $product->Рельеф . '</li>';
//                        }
                        if($product->count_in_pack && $product->units_pack) {
                        $description .= '<li><strong>Упаковка: </strong>' . $product->count_in_pack . ' шт = ' .$product->units_pack. ' м2</li>';
                        }
//                        if($product->units_pack) {
//                        $description .= '<li><strong>В упаковке: </strong>' . $product->units_pack . ' м2</li>';
//                        }
//                        if($product->massa_pack) {
//                        $description .= '<li><strong>Вес упаковки: </strong>' . $product->massa_pack . '</li>';
//                        }
//                        if($product->country != null) {
//                        $description .= '<li><strong>Страна: </strong>' . $product->country . '</li>';
//                        }
                        if($product->code != null) {
                        $description .= '<li><strong>Артикул: </strong>' . $product->code . '</li>';
                        }

                        $description .= '</ul><br>';


                    $description .= '<p>Наличие и цены на ваш объем спрашивайте у менеджера.</p>';
//                    $description .= '<p>Скидки от розничной цены. Доставка по Москве, cамовывоз на западе Москвы.</p>';

//                    $description .= '<p>В наших шоурумах представлены коллекции многих других известных производителей керамогранита, керамической плитки, мозаики и других напольных покрытий (ламинат, паркет, кварцвинил, инженерная доска и др.)</p>';

//                    $description .= '<p><em>Так же в наличии другие бренды: Kerama Marazzi Керама Марацци , Italon Италон , Primavera Примавера , ENNFACE энфэйс , NT CERAMIC НТ КЕРАМИК , Gravita Гравита, Realistik Реалистик и многие другие</em></p>';
                    $description .= '<br>А ещё у нас можно приобрести кварцвинил, ламинат, инженерную доску, SPC по очень выгодным ценам</em></p>';

                    $description .= '<p>Можно приехать и вживую посмотреть - выбор огромный (4 шоурума в одном месте)! Керамогранит, керамическая плитка, мозаика, ламинат, кварцвинил, инженерная доска и др.</p>';
//                    $description .= '<p>Работаем с розничными и оптовыми покупателями. Предлагаем сотрудничество дизайнерам и строительным компаниям.</p>';
                    $description .= '<p>Отправляем через ТК по всей России.</p>';

                    if($add_description != '') {
                    $description .= '<p>'.nl2br($add_description).'</p>';
                    }


//                    $keywords = '';
//                    $keywords_arr = [];
//
//
//                    if(stripos($product->collection_item, 'екор') !== false) {
//                        $type = 'декор';
//                        }
//                        elseif(stripos($product->collection_item, 'анно') !== false) {
//                        $type = 'панно';
//                        }
//                        elseif(stripos($product->collection_item, 'ордюр') !== false) {
//                        $type = 'бордюр';
//                        }
//                        elseif(stripos($product->collection_item, 'озаика') !== false) {
//                        $type = 'мозаика';
//                        }
//                        elseif(stripos($product->collection_item, 'литка') !== false) {
//                        $type = 'керамическая плитка';
//                        }
//                        elseif(stripos($product->collection_item, 'ерамогранит') !== false) {
//                        $type = 'керамогранит';
//                        }
//                        else {
//                            $type = '';
//                    }
//
//                    //-----------SIZE----------
//                    $length = $product->height;
//                    $height = $product->width;
//
//                    if($product->width != 0 && $product->height != 0) {
//                        $keywords_arr[] = $type . ' ' . $length . 'х' . $height;
//                        $keywords_arr[] = $type . ' ' . $length . '*' . $height;
//                    }
//                    //-----------SIZE-END----------
//
//                    //-----------SURFACE----------
//                    $surface = $product->surface_type;
//                    $surf = '';
//
//                    if ($surface != null) {
//
//                        if ($type == 'мозаика' || $type == 'керамическая плитка') {
//                            $surf = $surface;
//                        }
//
//                        if ($type == 'керамогранит' || $type == 'декор' || $type == 'бордюр') {
//                            $surf = str_replace('ая', 'ый', $surface);
//                        }
//
//                        if ($type == 'панно') {
//                            $surf = str_replace('ая', 'ое', $surface);
//                        }
//                    }
//
//                    $keywords_arr[] = $type . ' ' .mb_strtolower($surf);
//
//                    $keywords_arr[] = $product->category_r->parent . ' ' . $type;
//
//
//                    $owner_code = $product->artikul;
//
//                    if ($owner_code != null) {
//                        $keywords_arr[] = $type . ' ' . $owner_code;
//                    }
//
//                    $country = $product->country;
//
//                    if ($country != null) {
//                        $keywords_arr[] = $type . ' ' . $country;
//                    }
//
//                    shuffle($keywords_arr);
//                    $keywords = implode(' ', $keywords_arr);

        //---
//                    if ($type != 'декор') {
//                        $description .= '<p>--------------</p>';
//                        $description .= '<p><em>' . $keywords . '</em></p>';
//                    }


                    $code = $product->code;
                    $video = $custom_video;
    @endphp



    @php
        $AdStatus = 'Free';
        $Delivery = 'Самовывоз с онлайн-оплатой';

        $WeightForDelivery = round((float)$product->weight, 2);
        $LengthForDelivery = round((float)$Length + 2);
        $HeightForDelivery = 5;
        $WidthForDelivery = round((float)$Width + 2);
    @endphp

    @php
        $Surface = avito_surface_leedo($product->surface);
        $Texture = avito_texture_leedo('');
        $EdgeType = '';
        $Shape = '';
        $ResistanceClass = '';
    @endphp

    @php
        $description .= $show_discount;
    @endphp

    @php
        $VideoFileURL = '';
    @endphp

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
        <td>{{ $VideoFileURL }}</td>                            {{-- VideoFileURL --}}
    </tr>
@endforeach
{{-----BELLEZA-END----}}

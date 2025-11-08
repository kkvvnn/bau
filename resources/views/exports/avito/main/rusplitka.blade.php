{{-----RUSPLITKA-----}}
@foreach($rusplitka as $product)
    @php
        $GoodsSubType = 'Отделка';
        $FinishingMaterialsType = 'Керамическая плитка и керамогранит';
        $CeramicPorcelainTilesSubType = 'Керамогранит';

        $rusplitka_brand_name = $product->brand_name;
        if ($rusplitka_brand_name == 'Ragno Marazzi') {
            $rusplitka_brand_name = 'Ragno';
        }
        if ($rusplitka_brand_name == 'Duna') {
            $rusplitka_brand_name = 'Dune';
        }

        $Brand = $rusplitka_brand_name;
        $TileType = '';
        $SpaceType = '';
        $InstallationType = avito_bauservice_for('На пол | На стену');

        $size_a = $product->size_a;
        $size_b = $product->size_b;

        if($size_a > $size_b) {
            $wid_ruspl = $size_b;
            $len_ruspl = $size_a;
        } else {
            $wid_ruspl = $size_a;
            $len_ruspl = $size_b;
        }

        $Width = avito_bauservice_size($wid_ruspl, 5, 200, $product->name, 'W');
        $Length = avito_bauservice_size($len_ruspl, 5, 400, $product->name, 'L');
        $Thickness = avito_bauservice_height($product->thickness, 2, 30);
        $Pattern = avito_bauservice_pattern($product->name, '');
        $Color = avito_bauservice_color('');
        $ColorName = $Color;

        $FlooringMaterialsSubType = '';
        $ExteriorFinishingDecorativeStoneSubType = '';
        $WallPanelsSlatsDecorativeElementsSubType = '';
        $MixesType = '';
        $Material = '';
        $OutsideUsage = '';
    @endphp
    @php

        //                --------------------------
                    $title = $product->svoystvo.' '.$product->brand_name.' '.$product->name;
        //                -----------------------------
        //              ------------------------------------------FOTO-------------------------------------

                    $images = [];
                    if (isset($product->picture)) {
                        foreach ($product->picture as $img) {
                            $images[] = Storage::disk('rusplitka')->url(Str::remove('https://www.rusplitka.ru/upload/iblock/', $img));
                        }
                    }

                    $images_collection = [];
                    if (isset($product->collection->picture)) {
                        foreach ($product->collection->picture as $img) {
                            $images_collection[] = Storage::disk('rusplitka')->url(Str::remove('https://www.rusplitka.ru/upload/iblock/', $img));
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
                    $description .= '<p>&#9989; На утро '.$date.' склад Москва '.$moscow_stock.' '.$product->unit.' (Москва); '.$krasnodar_stock.' '.$product->unit.' (Краснодар)  <em>(информация приблизительная, точную информацию о наличии спрашивайте у менеджера)</em></p>';
                    }

                    $description .= '<p>--------------------</p>';
                    $description .= '<p><strong>&#9889; Цена в объявлении указана за 1 '. $product->unit .' (есть доп скидки) &#9889;</strong></p>';
                    $description .= '<p><strong>&#128165; Скидки от объема &#128165;</strong></p>';
                    $description .= '<p><strong>Сделаем индивидуальную скидку, обращайтесь в чат.</strong></p>';
                    $description .= '<p><strong>Отгружаем кратно упаковкам. Минимальный заказ - от 1 упаковки</strong></p>';
                    $description .= '<p><strong>Доставка / Самовывоз. Оплата при получении. Замена боя</strong></p>';
                    $description .= '<p>--------------------</p>';

                    $description .= '<p>Коллекция: '.$product->collection->name.'</p>';
//                    $description .= '<p><em>Цена указана за 1 '.$product->unit.'</em></p>';

                    $description .= '<ul>';

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


                    $description .= '<p>Наличие и цены на ваш объем спрашивайте у менеджера.</p>';
                    $description .= '<p>Скидки от розничной цены. Доставка по Москве, cамовывоз на западе Москвы.</p>';

//                    $description .= '<p>В наших шоурумах представлены коллекции многих других известных производителей керамогранита, керамической плитки, мозаики и других напольных покрытий (ламинат, паркет, кварцвинил, инженерная доска и др.)</p>';

                    $description .= '<p><em>Так же в наличии другие бренды: Kerama Marazzi Керама Марацци , Italon Италон , Primavera Примавера , ENNFACE энфэйс , NT CERAMIC НТ КЕРАМИК , Gravita Гравита, Realistik Реалистик и многие другие</em></p>';
                    $description .= '<br>А ещё у нас можно приобрести кварцвинил, ламинат, инженерную доску, SPC по очень выгодным ценам</em></p>';

                    $description .= '<p>Можно приехать и вживую посмотреть - выбор огромный (4 шоурума в одном месте)! Керамогранит, керамическая плитка, мозаика, ламинат, кварцвинил, инженерная доска и др.</p>';
//                    $description .= '<p>Работаем с розничными и оптовыми покупателями. Предлагаем сотрудничество дизайнерам и строительным компаниям.</p>';
                    $description .= '<p>Отправляем через ТК по всей России.</p>';

                    if($add_description != '') {
                    $description .= '<p>'.nl2br($add_description).'</p>';
                    }


                    $code = $product->external_id . 'RusPL';
                    $video = '';
    @endphp

    @php
        $price_rrc = $product->price_rozn;
        $price_old = 0;
        $brand = 'Rusplitka';
        $price = avito_price($price_rrc, $brand, $discounts, $price_old);

        $description .= avito_show_discount($price_rrc, $brand, $discounts, $price_old);
    @endphp

    @php
        if ($CeramicPorcelainTilesSubType == 'Керамогранит' || $CeramicPorcelainTilesSubType == 'Керамическая плитка') {
            $PackagingType = avito_packaging_type($product->unit);
            if ($PackagingType == 'Упаковка') {
                $PackageQuantity = '1';
            } else {
                $PackageQuantity = avito_package_quantity(round($product->in_pack_m2, 2));
            }
        } else {
            $PackagingType = '';
            $PackageQuantity = '';
        }
    @endphp

    @php
        $AdStatus = 'Free';
        $Delivery = 'Самовывоз с онлайн-оплатой';

        $WeightForDelivery = 25;
        $LengthForDelivery = round((float)$Length + 2);
        $HeightForDelivery = 5;
        $WidthForDelivery = round((float)$Width + 2);
    @endphp

    @php
        $Surface = avito_surface_leedo($product->surface);
        $Texture = avito_texture_leedo($product->surface);
        $EdgeType = '';
        $Shape = '';
        $ResistanceClass = '';
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
    </tr>
@endforeach
{{-----RUSPLITKA-END----}}

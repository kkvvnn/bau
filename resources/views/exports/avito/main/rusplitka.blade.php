{{-----RUSPLITKA-----}}
@foreach($rusplitka as $product)
    @php
        $GoodsSubType = 'Отделка';
        $FinishingMaterialsType = 'Керамическая плитка и керамогранит';
        $CeramicPorcelainTilesSubType = 'Керамогранит';
        $FlooringMaterialsSubType = '';
        $ExteriorFinishingDecorativeStoneSubType = '';
        $WallPanelsSlatsDecorativeElementsSubType = '';
        $MixesType = '';
    @endphp
    @php

        //                --------------------------
                    $title = $product->svoystvo.' '.$product->brand_name.' '.$product->name;
        //                -----------------------------
        //              ------------------------------------------FOTO-------------------------------------

                    $img = $product->picture;
                    $img_collection = $product->collection->picture;

                    $img = $img . ' | ' . $img_collection;

                    $img_arr = [];
                    $img_arr = explode(' | ', $img);

                    $image_urls = avito_images_urls($img_arr);

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
                    $video = '';
    @endphp

    @php
        $price_rrc = $product->price_rozn;
        $price_old = 0;
        $brand = 'Rusplitka';
        $price = avito_price($price_rrc, $brand, $discounts, $price_old);

        if ($show_discount = avito_show_discount($brand, $discounts)) {
            $description .= $show_discount;
        }
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
    </tr>
@endforeach
{{-----RUSPLITKA-END----}}

{{-----NTCERAMIC-----}}
@foreach($ntceramic as $product)
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
        if (!isset($product->referer)) {
            continue;
        }
    @endphp
    @php

        //                --------------------------
                    $title = $product->referer->title;
        //                -----------------------------
        //              ------------------------------------------FOTO-------------------------------------

                $img_arr = [];
                if ($product->referer->img1 != null) {
                    $img_arr[] = $product->referer->img1;
                }
                if ($product->referer->img2 != null) {
                    $img_arr[] = $product->referer->img2;
                }
                if ($product->referer->img3 != null) {
                    $img_arr[] = $product->referer->img3;
                }
                if ($product->referer->img4 != null) {
                    $img_arr[] = $product->referer->img4;
                }
                if ($product->referer->img5 != null) {
                    $img_arr[] = $product->referer->img5;
                }
                if ($product->referer->img6 != null) {
                    $img_arr[] = $product->referer->img6;
                }
                if ($product->referer->img7 != null) {
                    $img_arr[] = $product->referer->img7;
                }
                if ($product->referer->img8 != null) {
                    $img_arr[] = $product->referer->img8;
                }
                if ($product->referer->img9 != null) {
                    $img_arr[] = $product->referer->img9;
                }
                if ($product->referer->img10 != null) {
                    $img_arr[] = $product->referer->img10;
                }
                if ($product->referer->img11 != null) {
                    $img_arr[] = $product->referer->img11;
                }
                if ($product->referer->img12 != null) {
                    $img_arr[] = $product->referer->img12;
                }
                if ($product->referer->img13 != null) {
                    $img_arr[] = $product->referer->img13;
                }
                if ($product->referer->img14 != null) {
                    $img_arr[] = $product->referer->img14;
                }
                if ($product->referer->img15 != null) {
                    $img_arr[] = $product->referer->img15;
                }
                if ($product->referer->img16 != null) {
                    $img_arr[] = $product->referer->img16;
                }
                if ($product->referer->img17 != null) {
                    $img_arr[] = $product->referer->img17;
                }
                if ($product->referer->img18 != null) {
                    $img_arr[] = $product->referer->img18;
                }
                if ($product->referer->img19 != null) {
                    $img_arr[] = $product->referer->img19;
                }
                if ($product->referer->img20 != null) {
                    $img_arr[] = $product->referer->img20;
                }

                $image_urls = avito_images_urls($img_arr);
        //
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


                    $code = $product->vendor_code;
                    $video = '';
    @endphp

    @php
        $price_rrc = $product->price;
        $price_old = 0;
        $brand = 'NT Ceramic';
        $price = avito_price($price_rrc, $brand, $discounts, $price_old);
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
{{-----NTCERAMIC-END----}}

{{-----LEEDO-----}}
@foreach($leedo as $product)
    @php
        if(stripos($product->Category, 'литка') !== false) {
            $GoodsSubType = 'Отделка';
            $FinishingMaterialsType = 'Керамическая плитка и керамогранит';
            $CeramicPorcelainTilesSubType = 'Керамическая плитка';
        }
        elseif(stripos($product->Category, 'озаика') !== false) {
            $GoodsSubType = 'Другое';
            $FinishingMaterialsType = '';
            $CeramicPorcelainTilesSubType = '';
        }
        elseif(stripos($product->Category, 'ерамогранит') !== false) {
            $GoodsSubType = 'Отделка';
            $FinishingMaterialsType = 'Керамическая плитка и керамогранит';
            $CeramicPorcelainTilesSubType = 'Керамогранит';
        } else {
            $GoodsSubType = 'Другое';
            $FinishingMaterialsType = '';
            $CeramicPorcelainTilesSubType = '';
        }
        $FlooringMaterialsSubType = '';
        $ExteriorFinishingDecorativeStoneSubType = '';
        $WallPanelsSlatsDecorativeElementsSubType = '';
        $MixesType = '';
    @endphp
    @php

        //                --------------------------
                    $title = '';
                    if (stripos($product->Category, 'Декор') != false) {
                        $title = 'Декор ';
                    } elseif (stripos($product->Category, 'Бордюр') != false) {
                        $title = 'Бордюр ';
                    } elseif (stripos($product->Category, 'Керамическая_плитка') != false) {
                        $title = 'Керамическая плитка ';
                    } elseif (stripos($product->Category, 'Керамический_гранит') != false) {
                        $title = 'Керамогранит ';
                    } elseif (stripos($product->Category, 'заика') != false) {
                        $title = 'Мозаика ';
                    }

                    $title .= $product->Item_name;
                    $title = str_replace('(распродажа остатков)', '', $title);
                    $title = str_replace('40 шт в упак.', '', $title);
                    $title = str_replace('20 шт в упак.', '', $title);
                    $title = str_replace('(14 шт в коробке)', '', $title);
        //                -----------------------------
        //              ------------------------------------------FOTO-------------------------------------

                    $img_arr = [];
                    $img_arr[] = $product->Basic_pic;
                    if ($product->Picture1 != null) {
                        $img_arr[] = $product->Picture1;
                    }
                    if ($product->Picture2 != null) {
                        $img_arr[] = $product->Picture2;
                    }
                    if ($product->Picture3 != null) {
                        $img_arr[] = $product->Picture3;
                    }
                    if ($product->Picture4 != null) {
                        $img_arr[] = $product->Picture4;
                    }
                    if ($product->Picture5 != null) {
                        $img_arr[] = $product->Picture5;
                    }
                    if ($product->Picture6 != null) {
                        $img_arr[] = $product->Picture6;
                    }
                    if ($product->Picture7 != null) {
                        $img_arr[] = $product->Picture7;
                    }

                    foreach ($img_arr as &$i) {
                        if (!str_starts_with($i, 'http')) {
                            $i = str_replace('www.leedo.ru', 'https://www.leedo.ru', $i);
                        }
                    }

                    $image_urls = avito_images_urls($img_arr);

                    $description = '';

                    if($add_description_first != '') {
                    $description .= '<p>'.nl2br($add_description_first).'</p>';
                    }

                    $description .= '<p>Мозаика и керамогранит Caramelle & LeeDo. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены. Доставка по Москве, cамовывоз на западе Москвы.</p>';
                    $description .= '<p><strong>' . $product->Item_chip . '. '
                            . $product->Brand_name . '</strong></p>';

                    $description .= '<p>--------------------</p>';
                    $date = date('d.m.Y');
                    if (($product->Sklad_Msk_LeeDo > 0 && $product->Sklad_Msk_LeeDo != null) || ($product->Sklad_SPb_LeeDo > 0 && $product->Sklad_SPb_LeeDo != null)) {
                    $description .= '<p>&#9989; На утро '.$date.' остаток '.round($product->Sklad_Msk_LeeDo)+round($product->Sklad_SPb_LeeDo).' '.$product->unit.' <em>(информация приблизительная, точную информацию о наличии спрашивайте у менеджера)</em></p>';
                    }
                    $description .= '<p>--------------------</p>';

                    $description .= '<p><em>Цена указана за 1 '.$product->unit.'</em></p><ul>';


                        if($product->Tile_size_cm != null) {
                        $description .= '<li><strong>Размер листа, см: </strong>' . $product->Tile_size_cm . '</li>';
                        }
                        if($product->Chip_size_mm != null) {
                        $description .= '<li><strong>Размер чипа, мм: </strong>' . $product->Chip_size_mm . '</li>';
                        }
                        if($product->Thickness_mm != null) {
                        $description .= '<li><strong>Толщина, мм: </strong>' . $product->Thickness_mm . '</li>';
                        }
                        if($product->Tile_sheet_square != null) {
                        $description .= '<li><strong>Площадь листа: </strong>' . $product->Tile_sheet_square . '</li>';
                        }
                        if($product->Form != null) {
                        $description .= '<li><strong>Форма: </strong>' . $product->Form . '</li>';
                        }
                        if($product->Color_text != null) {
                        $description .= '<li><strong>Цвет: </strong>' . $product->Color_text . '</li>';
                        }
                        if($product->Surface != null) {
                        $description .= '<li><strong>Поверхность: </strong>' . $product->Surface . '</li>';
                        }
                        if($product->Material != null) {
                        $description .= '<li><strong>Материал: </strong>' . $product->Material . '</li>';
                        }
                        if($product->Usage != null) {
                        $description .= '<li><strong>Применение: </strong>' . $product->Usage . '</li>';
                        }
                        if($product->Category != null) {
                        $description .= '<li><strong>Категория: </strong>' . str_replace('_', ' ', $product->Category) . '</li>';
                        }

                        $description .= '</ul><p><em>';

                        $description .= ucfirst(trim($product->Description, '"')) . '</em></p>';
                        $description .= '<p>-------------------</p>';


                    $description .= '<p>Наличие а также актуальные цены уточняйте у менеджера.</p>';
                    $description .= '<p>В нашем шоуруме представлены коллекции многих других известных производителей керамогранита, керамической плитки, мозаики и других напольных покрытий (ламинат, паркет, кварцвинил, инженерная доска и др.)</p>';
                    $description .= '<p>Работаем с розничными и оптовыми покупателями. А так же предлагаем сотрудничество дизайнерам и строительным компаниям.</p>';

                    if($add_description != '') {
                    $description .= '<p>'.nl2br($add_description).'</p>';
                    }

                    $code = $product->System_ID;
                    $video = '';
    @endphp

    @php
        $price_rrc = $product->Price_rozn;
        $price_old = 0;
        $brand = 'Leedo';
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
    </tr>
@endforeach
{{-----LEEDO-END----}}

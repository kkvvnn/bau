{{-----ARTKERA-----}}
@foreach($altacera as $product)
    @php
        if(stripos($product->collection_item, 'литка') !== false) {
            $GoodsSubType = 'Отделка';
            $FinishingMaterialsType = 'Керамическая плитка и керамогранит';
            $CeramicPorcelainTilesSubType = 'Керамическая плитка';
        }
        elseif(stripos($product->collection_item, 'озаика') !== false) {
            $GoodsSubType = 'Другое';
            $FinishingMaterialsType = '';
            $CeramicPorcelainTilesSubType = '';
        }
        elseif(stripos($product->collection_item, 'ерамогранит') !== false) {
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
        //        -----------------------------------UNIT--------------------------
                                $units = $product->units;
                                $unit_id = $product->balance[0]->unit_id;
        //                        dd($units);
                                $unit = '';
                                foreach ($units as $u) {
                                    if ($u['unit_id'] == $unit_id) {
                                        $unit = $u['unit'];
                                        break;
                                    }
                                }

                                $pack_ratio = '';
                                foreach ($units as $u2) {
                                    if ($u2['unit'] == 'Упак') {
                                        $pack_ratio = $u2['unit_ratio'];
                                        break;
                                    }
                                }

                                $one_count_ratio = '';
                                foreach ($units as $u3) {
                                    if ($u3['unit'] == 'шт') {
                                        $one_count_ratio = $u3['unit_ratio'];
                                        break;
                                    }
                                }

                                $count_in_pack = (float)$pack_ratio / (float)$one_count_ratio;
        //        --------------------------------------------------------------


                    $title = $product->category_rel->parent.' '.$product->collection_item.' '.$product->name_for_site.' '.$product->artikul;
                    $title = str_replace('Архив', '', $title);
        //                -----------------------------
        //              ------------------------------------------FOTO-------------------------------------

                    $img_arr = [];
                    if (isset($product->picture->images)) {
                        $img_arr = $product->picture->images;
                    } else {
                        $img_arr[] = config('app.url').Storage::disk('altacera')->url($product->tovar_id . '.JPEG');
                    }

                    $image_urls = avito_images_urls($img_arr);

        $description = '';

        if($add_description_first != '') {
        $description .= '<p>'.nl2br($add_description_first).'</p>';
        }
                    $description .= '<p>Керамическая плитка и керамогранит '.$product->category_rel->parent.'. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены. Доставка по Москве, cамовывоз на западе Москвы.</p>';
                    $description .= '<p><strong>' . $product->tovar . '. '
                            . $product->category_rel->parent . ' ('
                            . $product->country . ')</strong></p>';
                    $description .= '<p><strong>Коллекция: </strong>'.$product->category_rel->parent.' / '.$product->category. '</p>';



                    $date = date('d.m.Y');
                    $description .= '<p>--------------------</p>';
                    $description .= '<p>&#9989; На утро '.$date.' остаток: </p><ul>';


                    $balances = $product->balance;

                    $balance_moscow = 0;
                    $balance_krasnodar = 0;
                    $balance_kazan = 0;
                    $balance_spb = 0;

                    foreach ($balances as $balance) {
                        if ($balance['depot_id'] == '8c279853-d2c9-11e8-80c3-0cc47afc14e9') {
                            $balance_moscow = (float)$balance['free_balance'];
                        }
                        if ($balance['depot_id'] == '64c17eef-42d6-11e8-812c-10feed0262c6') {
                            $balance_krasnodar = (float)$balance['free_balance'];
                        }
                        if ($balance['depot_id'] == 'd1666584-d536-11ec-80f8-00155d5d5700') {
                            $balance_kazan = (float)$balance['free_balance'];
                        }
                        if ($balance['depot_id'] == '2170fa9f-bcdc-11ed-8167-00155d5d5700') {
                            $balance_spb = (float)$balance['free_balance'];
                        }
                    }

                    if($balance_moscow) {
                        $description .= '<li>Москва: ' . $balance_moscow . ' ' . $unit . '</li>';
                    }
                    if($balance_krasnodar) {
                        $description .= '<li>Краснодар: ' . $balance_krasnodar . ' ' . $unit . '</li>';
                    }
                    if($balance_kazan) {
                        $description .= '<li>Казань: ' . $balance_kazan . ' ' . $unit . '</li>';
                    }
                    if($balance_spb) {
                        $description .= '<li>СПб: ' . $balance_spb . ' ' . $unit . '</li>';
                    }



                    $description .= '</ul><p><em>(информация приблизительная, точную информацию о наличии спрашивайте у менеджера)</em></p>';
                    $description .= '<p>--------------------</p>';

//                        $description .= '<p><em>Цена указана за 1 '.$unit.'.</em></p><ul>';
                    $description .= '<p><em>Цена зависит от количества, формы оплаты, даты доставки (срочности), адреса доставки и подъема. Более детально по вашему заказу можем ответить после получения всех вводных данных.</em></p><ul>';


                        if($product->width != 0 && $product->height != 0) {
                        $description .= '<li><strong>Размер: </strong>' . $product->height .'x' . $product->width . ' мм</li>';
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
                        if($unit == 'м2' && $one_count_ratio != 1) {
                        $description .= '<li><strong>Штук в упаковке: </strong>' . round($count_in_pack) . '</li>';
                        }
                        if($unit == 'м2' && $one_count_ratio != 1) {
                        $description .= '<li><strong>Кв. метров в упаковке: </strong>' . $pack_ratio . '</li>';
                        }
                        if($product->country != null) {
                        $description .= '<li><strong>Страна производства: </strong>' . $product->country . '</li>';
                        }
                        if($product->artikul != null) {
                        $description .= '<li><strong>Артикул: </strong>' . $product->artikul . '</li>';
                        }

                        $description .= '</ul><br>';


                    $description .= '<p>Наличие а также актуальные цены уточняйте у менеджера.</p>';
                    $description .= '<p>В нашем шоуруме представлены коллекции многих других известных производителей керамогранита, керамической плитки, мозаики и других напольных покрытий (ламинат, паркет, кварцвинил, инженерная доска и др.)</p>';
                    $description .= '<p>Работаем с розничными и оптовыми покупателями. А так же предлагаем сотрудничество дизайнерам и строительным компаниям.</p>';

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

                    $keywords .= $product->category_rel->parent . ' ' . $type . ', ';


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
        $price_rrc = $product->price->price;
        $price_old = $product->sale;
        $brand = 'Artkera';
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
{{-----ARTKERA-END----}}

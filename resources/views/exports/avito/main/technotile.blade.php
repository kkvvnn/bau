{{-----TECHNOTILE-----}}
@foreach($technotile as $product)
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
        //            $price = $product->price;
                    $price = '';
        //            $price = round($price * 0.93, -1);
        //                --------------------------
                    $title = str_replace('Плитка керамогранит ', '', $product->name).' '.($product->width/10).'x'.($product->length/10);
                    $title = str_replace('полированный', 'полир.', $title);

                    if (mb_strlen($title) > 50) {
                        $title = str_replace('лаппатирование', 'лаппатир.', $title);
                    }
                    if (mb_strlen($title) > 50) {
                        $title = str_replace('структурный', 'структ.', $title);
                    }
                    if (mb_strlen($title) > 50) {
                        $title = str_replace('легкое', '', $title);
                    }
                    if (mb_strlen($title) > 50) {
                        $title = str_replace('мягкое', '', $title);
                    }
                    if (mb_strlen($title) > 50) {
                        $title = str_replace('бежевый', 'беж', $title);
                    }
                    if (mb_strlen($title) > 50) {
                        $title = str_replace('антискользящий', 'антиск.', $title);
                    }
                    if (mb_strlen($title) > 50) {
                        $title = str_replace('оранжевый', 'оранж.', $title);
                    }
                    if (mb_strlen($title) > 50) {
                        $title = str_replace('коричневый', 'корич.', $title);
                    }
                    if (mb_strlen($title) > 50) {
                        $title = str_replace('Тёмный', 'Тём', $title);
                    }
                    if (mb_strlen($title) > 50) {
                        $title = str_replace('Светлый', 'Свет', $title);
                    }
                    if (mb_strlen($title) > 50) {
                        $title = str_replace('Светло', 'Св', $title);
                    }
                    if (mb_strlen($title) > 50) {
                        $title = str_replace('Натуральный', 'Натур.', $title);
                    }
                    if (mb_strlen($title) > 50) {
                        $title = str_replace('Рифленый', 'Рифл.', $title);
                    }

                    if (mb_strlen($title) < 37) {
                        $title = 'Керамогранит ' . $title;
                    }

        //                -----------------------------
        //              ------------------------------------------FOTO-------------------------------------

                    $img = $product->picture;

                    $img_arr = [];
                    $img_arr = explode(' | ', $img);

                    $image_urls = avito_images_urls($img_arr);

                    $description = '';

                    if($add_description_first != '') {
                    $description .= '<p>'.nl2br($add_description_first).'</p>';
                    }

                    $description .= '<p>Керамогранит '.$product->description.'. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены. Доставка по Москве, cамовывоз на западе Москвы.</p>';
                    $description .= '<p><strong>'.$product->name.' '.$product->width.'x'
                            .$product->length.' '.$product->description.' ('
                            .$product->country.')</strong></p>';

                    $description .= '<p>Коллекция: '.$product->collection.'</p>';
        //            $description .= '<p><em>Цена указана за 1 '.$product->unit.'</em></p><ul>';

                        $description .= '<ul>';
                        $description .= '<li><strong>Размер: </strong>' . $product->width.'х'.$product->length. ' мм</li>';
                        if($product->fat != null) {
                        $description .= '<li><strong>Толщина: </strong>' . $product->fat . ' мм</li>';
                        }
                        if($product->surface_type != null) {
                        $description .= '<li><strong>Поверхность: </strong>' . $product->surface_type . '</li>';
                        }
                        if($product->surface_faktura != null) {
                        $description .= '<li><strong>Фактура поверхности: </strong>' . $product->surface_faktura . '</li>';
                        }
                        if($product->count_in_box != null) {
                        $description .= '<li><strong>Штук в упаковке: </strong>' . $product->count_in_box . '</li>';
                        }
                        if($product->in_box_m2 != null) {
                        $description .= '<li><strong>Кв. метров в упаковке: </strong>' . $product->in_box_m2 . '</li>';
                        }
                        if($product->country != null) {
                        $description .= '<li><strong>Страна производства: </strong>' . $product->country . '</li>';
                        }

                        $description .= '</ul><br>';


                    $description .= '<p>Наличие а также актуальные цены уточняйте у менеджера.</p>';
                    $description .= '<p>В нашем шоуруме представлены коллекции многих других известных производителей керамогранита, керамической плитки, мозаики и других напольных покрытий (ламинат, паркет, кварцвинил, инженерная доска и др.)</p>';
                    $description .= '<p>Работаем с розничными и оптовыми покупателями. А так же предлагаем сотрудничество дизайнерам и строительным компаниям.</p>';

                    if($add_description != '') {
                    $description .= '<p>'.nl2br($add_description).'</p>';
                    }

        //            $description .= '<p>-------------------------</p>';
        //            $description .= '<p>'.$product->code.'</p>';

                    $description .= '<p>-------------------------</p>';
                    $description .= '<p><em>'.$product->surface_type.' '.$product->surface_faktura.'<br>';
                    $description .= $product->surface_faktura.' '.$product->surface_type.'<br>';
                    $description .= $product->code.'</em></p>';


                    $code = $product->code . 't_tile';
                    $video = '';

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
{{-----TECHNOTILE-END----}}

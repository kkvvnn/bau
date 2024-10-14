{{-----AQUAFLOOR-----}}
@foreach($aquafloor as $product)
    @php
        if(stripos($product->title, 'варцвинил') !== false) {
            $GoodsSubType = 'Отделка';
            $FinishingMaterialsType = 'Напольные покрытия';
            $FlooringMaterialsSubType = 'Кварц-винил';
            $WallPanelsSlatsDecorativeElementsSubType = '';
            $Material = '';
            $SpaceType = '';
            $OutsideUsage = '';
        } elseif(stripos($product->title, 'теновые пане') !== false) {
            $GoodsSubType = 'Отделка';
            $FinishingMaterialsType = 'Стеновые панели, рейки и элементы декора';
            $FlooringMaterialsSubType = '';
            $WallPanelsSlatsDecorativeElementsSubType = 'Стеновые панели';
            $Material = 'SPC';
            $SpaceType = 'Стены | Потолок | Двери';
            $OutsideUsage = 'Да';
        } else {
            $GoodsSubType = 'Другое';
            $FinishingMaterialsType = '';
            $FlooringMaterialsSubType = '';
            $WallPanelsSlatsDecorativeElementsSubType = '';
            $Material = '';
            $SpaceType = '';
            $OutsideUsage = '';
        }
        $CeramicPorcelainTilesSubType = '';
        $ExteriorFinishingDecorativeStoneSubType = '';
        $MixesType = '';
        $Brand = '';
        $TileType = '';
        $InstallationType = '';
        $Width = '';
        $Length = '';
        $Height = '';
        $Pattern = '';
        $Color = '';

    @endphp
    @php

        //                --------------------------
                    $title = $product->title;

                    if (mb_strlen($title) > 50) {
                        $title = str_replace('Кварцвиниловый ламинат', 'Кварцвинил', $title);
                    }
                    if (mb_strlen($title) > 50) {
                        $title = str_replace('Кварцвиниловая плитка', 'Кварцвинил', $title);
                    }
                    if (mb_strlen($title) > 50) {
                        $title = str_replace('Кварцвиниловая SPC плитка', 'Кварцвинил SPC', $title);
                    }
                    if (mb_strlen($title) > 50) {
                        $title = str_replace('Aquafloor ', '', $title);
                    }
//
//                        if (mb_strlen($title) < 37) {
//                            $title = 'Керамогранит ' . $title;
//                        }

        //              ------------------------------------------FOTO-------------------------------------

                    $img = $product->picture;

                    $img_arr = [];
                    $img_arr = explode(' | ', $img);

                    $image_urls = avito_images_urls($img_arr);

                    $description = '';

                    if($add_description_first != '') {
                    $description .= '<p>'.nl2br($add_description_first).'</p>';
                    }

                    $description .= '<p>Кварцвиниловый ламинат и стеновые панели SPC. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены. Доставка по Москве, cамовывоз на западе Москвы.</p>';
                    $description .= '<p><strong>'.$product->title.' ('
                            .$product->country.')</strong></p>';

                    $description .= '<p>Коллекция: '.$product->collection.'</p>';

                        $description .= '<ul>';
                        if($product->dlina != null) {
                        $description .= '<li><strong>Длина: </strong>' . $product->dlina. '</li>';
                        }
                        if($product->shirina != null) {
                        $description .= '<li><strong>Ширина: </strong>' . $product->shirina. '</li>';
                        }
                        if($product->fat != null) {
                        $description .= '<li><strong>Толщина: </strong>' . $product->fat . '</li>';
                        }
                        if($product->vendor_code != null) {
                        $description .= '<li><strong>Артикул: </strong>' . $product->vendor_code . '</li>';
                        }
                        if($product->tip_risunka != null) {
                        $description .= '<li><strong>Тип рисунка: </strong>' . $product->tip_risunka . '</li>';
                        }
                        if($product->tip_soedineniya != null) {
                        $description .= '<li><strong>Тип соединения: </strong>' . $product->tip_soedineniya . '</li>';
                        }
                        if($product->vlagostojkost != null) {
                        $description .= '<li><strong>Влагостойкость: </strong>' . $product->vlagostojkost . '</li>';
                        }
                        if($product->vstroennaya_podlozhka != null) {
                        $description .= '<li><strong>Встроенная подложка: </strong>' . $product->vstroennaya_podlozhka . '</li>';
                        }
                        if($product->material != null) {
                        $description .= '<li><strong>Материал: </strong>' . $product->material . '</li>';
                        }
                        if($product->shumoizolyacziya != null) {
                        $description .= '<li><strong>Шумоизоляция: </strong>' . $product->shumoizolyacziya . '</li>';
                        }
                        if($product->faska != null) {
                        $description .= '<li><strong>Фаска: </strong>' . $product->faska . '</li>';
                        }
                        if($product->massa_box != null) {
                        $description .= '<li><strong>Масса упаковки: </strong>' . $product->massa_box . '</li>';
                        }
                        if($product->count_in_box != null) {
                        $description .= '<li><strong>Количество в упаковке: </strong>' . $product->count_in_box . '</li>';
                        }
                        if($product->country != null) {
                        $description .= '<li><strong>Страна: </strong>' . $product->country . '</li>';
                        }

                        $description .= '</ul><br>';


                    $description .= '<p>Наличие а также актуальные цены уточняйте у менеджера.</p>';
                    $description .= '<p>В нашем шоуруме представлены коллекции многих других известных производителей напольных покрытий (керамогранит, мозаика, ламинат, паркет, инженерная доска и др.)</p>';
                    $description .= '<p>Работаем с розничными и оптовыми покупателями. А так же предлагаем сотрудничество дизайнерам и строительным компаниям.</p>';

                    if($add_description != '') {
                    $description .= '<p>'.nl2br($add_description).'</p>';
                    }

                    $description .= '<p>--------------------------</p>';
                    $description .= '<p><em>кварцвинил кварцвиниловая плитка виниловый ламинат spc ламинат аквафлор ламинат аквафлур</em></p>';

                    $code = str_replace(' ', '_',$product->vendor_code) . '_af';
                    $video = '';
    @endphp

    @php
        $price_rrc = $product->price;
        $price_old = 0;
        $brand = 'Aquafloor';
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
{{-----AQUAFLOOR-END----}}

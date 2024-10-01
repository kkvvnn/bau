{{-----ABSOLUT_GRES-----}}
@foreach($absolut_gres as $product)
    @php
        if(stripos($product->title, 'литка') !== false) {
            $GoodsSubType = 'Отделка';
            $FinishingMaterialsType = 'Керамическая плитка и керамогранит';
            $CeramicPorcelainTilesSubType = 'Керамическая плитка';
        }
        elseif(stripos($product->title, 'озаика') !== false) {
            $GoodsSubType = 'Другое';
            $FinishingMaterialsType = '';
            $CeramicPorcelainTilesSubType = '';
        }
        elseif(stripos($product->title, 'ерамогранит') !== false) {
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
        if ($product->price_old == null) {
            $price = round($product->price_from_xml * 0.93, -1);
        } else {
            $price = $product->price_from_xml;
        }

        $title = $product->title_avito;
//                -----------------------------
//              ------------------------------------------FOTO-------------------------------------

        $img_arr = [];
        $img_arr[] = $product->picture;

        $image_urls = avito_images_urls($img_arr);

        $description = '';

        if($add_description_first != '') {
        $description .= '<p>'.nl2br($add_description_first).'</p>';
        }

        $description .= '<p>Керамическая плитка и керамогранит Absolut Gres , Абсолют Грес. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены. Доставка по Москве, cамовывоз на западе Москвы.</p>';
        $description .= '<p><strong>' . $product->title . '. '
                . $product->brand . ' ('
                . $product->country . ')</strong></p>';
        $description .= '<p><strong>Коллекция: </strong>' .$product->collection. '</p>';
        $description .= '<p><em>Цена указана за 1 '.$product->unit.'.</em></p><ul>';


            if($product->width != 0 && $product->length != 0) {
            $description .= '<li><strong>Размер: </strong>' . $product->length .'x' . $product->width . '</li>';
            }
            if($product->size != null) {
            $description .= '<li><strong>Формат: </strong>' . $product->size . '</li>';
            }
            if($product->style != null) {
            $description .= '<li><strong>Стиль: </strong>' . $product->style . '</li>';
            }
            if($product->surface != null) {
            $description .= '<li><strong>Поверхность: </strong>' . $product->surface . '</li>';
            }
            if($product->count_in_pack != null) {
            $description .= '<li><strong>Штук в упаковке: </strong>' . $product->count_in_pack . '</li>';
            }
            if($product->meters_in_pack != null) {
            $description .= '<li><strong>Кв. метров в упаковке: </strong>' . str_replace(',', '.', $product->meters_in_pack) . '</li>';
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


        $keywords = '';


        $type = 'керамогранит';

        $lenght = round((float)str_replace(',', '.', $product->length), 0, PHP_ROUND_HALF_EVEN);
        $height = round((float)str_replace(',', '.', $product->width), 0, PHP_ROUND_HALF_EVEN);

        $size = '';
        $size .= $type . ' ' . $lenght . 'х' . $height . ', ';
        if ($lenght != $height) {
            $size .= $type . ' ' . $height . 'х' . $lenght . ', ';
        }
        $size .= $type . ' ' . $lenght . '*' . $height . ', ';
        if ($lenght != $height) {
            $size .= $type . ' ' . $height . '*' . $lenght . ', ';
        }

        if($product->width != 0 && $product->length != 0) {
        $keywords .= $size;
        }


        $keywords .= $type . ' абсолют грес, ';


        $surface = $product->surface;
        $surf = '';

        if ($surface != null) {

            if ($type == 'мозаика' || $type == 'керамическая плитка') {
                $surf = $surface;
            }

            if ($type == 'керамогранит') {
                $surf = str_replace('ая', 'ый', $surface);
            }
        }

        $keywords .= $type . ' ' .mb_strtolower($surf) . ', ';

        $keywords .= $product->brand . ' ' . $type . ', ';


        $owner_code = $product->vendor_code;

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

        $code = str_replace(' ', '', $product->vendor_code);
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
{{-----ABSOLUT_GRES-END----}}

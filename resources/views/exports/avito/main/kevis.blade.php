{{-----KEVIS-----}}
@foreach($kevis as $product)
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
                    $title = $product->category.' '.$product->brand.' '.$product->title;
        //                -----------------------------
        //              ------------------------------------------FOTO-------------------------------------

                    $img_arr = [];
                    $img_arr[] = $product->images;

                    $image_urls = avito_images_urls($img_arr);

                    $description = '';

                    if($add_description_first != '') {
                    $description .= '<p>'.nl2br($add_description_first).'</p>';
                    }

                    $description .= '<p>Керамогранит Kevis. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены. Доставка по Москве, cамовывоз на западе Москвы.</p>';
                    $description .= '<p><strong>Керамогранит ' . $product->brand . ' '
                            . $product->title . ' ('
                            . $product->country . ')</strong></p>';

                    $description .= '<p>----------</p>';
                    $description .= '<p>&#9989; <strong>В наличии!</strong></p>';
                    $description .= '<p>----------</p>';

                    $description .= '<p>Коллекция: '.$product->collection.'</p>';
                    $description .= '<p><em>Цена указана за 1 '.$product->unit.'</em></p><ul>';


                        $description .= '<li><strong>Размер, см: </strong>' . $product->width.'х'.$product->length. '</li>';

                        if($product->surface != null) {
                        $description .= '<li><strong>Поверхность: </strong>' . $product->surface . '</li>';
                        }
                        if($product->count_in_pack != null) {
                        $description .= '<li><strong>Штук в упаковке: </strong>' . $product->count_in_pack . '</li>';
                        }
                        if($product->meters_in_pack != null) {
                        $description .= '<li><strong>Кв. метров в упаковке: </strong>' . $product->meters_in_pack . '</li>';
                        }
                        if($product->country != null) {
                        $description .= '<li><strong>Страна производства: </strong>' . $product->country . '</li>';
                        }
                        if($product->code != null) {
                        $description .= '<li><strong>Артикул: </strong>' . $product->code . '</li>';
                        }

                        $description .= '</ul><br>';


                    $description .= '<p>Наличие а также актуальные цены уточняйте у менеджера.</p>';
                    $description .= '<p>В нашем шоуруме представлены коллекции многих других известных производителей керамогранита, керамической плитки, мозаики и других напольных покрытий (ламинат, паркет, кварцвинил, инженерная доска и др.)</p>';
                    $description .= '<p>Работаем с розничными и оптовыми покупателями. А так же предлагаем сотрудничество дизайнерам и строительным компаниям.</p>';

                    if($add_description != '') {
                    $description .= '<p>'.nl2br($add_description).'</p>';
                    }


                    $code = $product->code;
                    $video = '';
    @endphp

    @php
        $price = $product->price;
        list('discount' => $discount, 'additional' => $additional) = $discounts['Kevis'];

        if ($additional == 'По умолчанию') {
            if ($discount) {
                $price = round($product->price * (100 - $discount)/100, -1);
            }
        }

        if ($additional == 'Не указывать цену') {
            $price = '';
        }

        if ($additional == 'Цена 1 рубль') {
            $price = 1;
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
{{-----KEVIS-END----}}

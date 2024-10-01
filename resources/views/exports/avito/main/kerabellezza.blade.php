{{-----KERABELLEZZA-----}}
@foreach($kerabellezza as $product)
    @php
        $GoodsSubType = 'Строительные смеси';
        $FinishingMaterialsType = '';
        $CeramicPorcelainTilesSubType = '';
        $FlooringMaterialsSubType = '';
        $ExteriorFinishingDecorativeStoneSubType = '';
        $WallPanelsSlatsDecorativeElementsSubType = '';
        $MixesType = 'Затирки';
    @endphp
    @php
        $description = '';

        if($add_description_first != '') {
        $description .= '<p>'.nl2br($add_description_first).'</p>';
        }

        $description .= '<p>Затирка эпоксидная для плитки, керамогранита, мозаики KeraBellezza. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены. Доставка по Москве, cамовывоз на западе Москвы.</p>';

        $title = str_replace('кг.', 'кг', $product->title);
        $title .= ' ' . $product->color;

        $description .= '<p><strong> ' . $title .  ' </strong></p>';

        $description .= '<p><em>Цена указана за 1 шт</em></p>';

            $description .= '<ul>';

            if($product->color != null) {
                $description .= '<li><strong>Цвет: </strong>' . $product->color . ' </li>';
            }
            if($product->parent->massa != null) {
                $description .= '<li><strong>Вес: </strong>' . $product->parent->massa . ' </li>';
            }
            if($product->parent->shov != null) {
                $description .= '<li><strong>Ширина шва: </strong>' . $product->parent->shov . ' </li>';
            }
            if($product->parent->froze_resistant != null) {
                $description .= '<li><strong>Морозостойкость: </strong>' . $product->parent->froze_resistant . ' </li>';
            }
            if($product->parent->vid_rabot != null) {
                $description .= '<li><strong>Вид работ: </strong>' . $product->parent->vid_rabot . ' </li>';
            }
            if($product->parent->country_proizv != null) {
                $description .= '<li><strong>Страна производства: </strong>' . $product->parent->country_proizv . ' </li>';
            }
            if($product->parent->brand != null) {
                $description .= '<li><strong>Производитель: </strong>' . $product->parent->brand . '</li>';
            }

            $description .= '</ul><br>';

        $description .= '<p>'. nl2br($product->parent->description) .'</p>';

        $description .= '<p>Наличие а также актуальные цены уточняйте у менеджера.</p>';
        $description .= '<p>В нашем шоуруме представлены коллекции многих других известных производителей керамогранита, керамической плитки, мозаики и других напольных покрытий (ламинат, паркет, кварцвинил, инженерная доска и др.)</p>';
        $description .= '<p>Работаем с розничными и оптовыми покупателями. А так же предлагаем сотрудничество дизайнерам и строительным компаниям.</p>';

        if($add_description != '') {
        $description .= '<p>'.nl2br($add_description).'</p>';
        }

        $keywords = 'эпоксидная затирка для плитки затирка эпоксидная для керамогранита эпоксидная затирка для мозаики эпоксидка затирка эпоксидная недорогая для плитки эпоксидная затирка';

        $description .= '<p>_____________________</p>';
        $description .= '<p><em>' . $keywords . '</em></p>';
    @endphp

    @php //---FOTO---
                    $img_arr = [];
                    $img_arr[] = $product->image;

                    $image_urls = avito_images_urls($img_arr);
    @endphp

    @php //---TITLE---
        $title = str_replace('кг.', 'кг', $product->title);
        $title .= ' ' . $product->color;

        if (mb_strlen($title) > 50) {
            $title = str_replace('Design ', '', $title);
        }
        if (mb_strlen($title) > 50) {
            $title = str_replace('Color Neutral ', '', $title);
        }
        if (mb_strlen($title) > 50) {
            $title = str_replace(' Нейтральный', '', $title);
        }
        if (mb_strlen($title) > 50) {
            $title = str_replace('цветная ', '', $title);
        }
    @endphp

    @php
        $code = $product->parent_code . '_' . $product->color;
        $video = '';
    @endphp

    @php //---PRICE---
        $price = $product->price;
        list('discount' => $discount, 'additional' => $additional) = $discounts['Kerabellezza'];

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
{{-----KERABELLEZZA-END----}}

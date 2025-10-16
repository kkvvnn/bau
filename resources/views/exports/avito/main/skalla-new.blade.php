{{-----SKALLA-----}}
@foreach($skalla as $product)


    @php
        $GoodsSubType = 'Отделка';
        $FinishingMaterialsType = 'Напольные покрытия';
        $CeramicPorcelainTilesSubType = '';
        $Brand = 'Skalla';
        $TileType = '';
        $SpaceType = '';
        $InstallationType = 'Замковый';
        $Width = $product->width;
        $Length = $product->length;
        $Thickness = avito_spc_skalla_thickness($product->fat);
        $Pattern = avito_spc_skalla_pattern($product->title);
        $Color = '';
        $ColorName = $Color;

        $FlooringMaterialsSubType = 'Кварц-винил';
        $ExteriorFinishingDecorativeStoneSubType = '';
        $WallPanelsSlatsDecorativeElementsSubType = '';
        $MixesType = '';
        $Material = '';
        $OutsideUsage = '';
    @endphp

    @php
        $price_rrc = $product->price->price;
        $price_old = $product->price->price_old;


        $price = avito_price($price_rrc, $Brand, $discounts, $price_old);

        $show_discount = avito_show_discount($price_rrc, $Brand, $discounts, $price_old);
    @endphp

    @php
        $PackagingType = '';
//        $PackageQuantity = $product->square_in_pack;
        $PackageQuantity = 1;
    @endphp

    @php

        $title = 'Skalla ' . $product->title;

        $images = [];
        $string_for_delete = 'https://static.tildacdn.com/';
        foreach ($product->images as $key => $value) {
            $images[] = Storage::disk('skalla')->url(Str::remove($string_for_delete, $value));
        }
        $image_urls = avito_images_urls($images, true);

        $description = '';
        if($add_description_first != '') {
            $description .= '<p>'.nl2br($add_description_first).'</p>';
        }

        $description .= '<p><strong>' . $product->title . '</strong></p>';
                    $description .= '<p><strong>Коллекция: </strong>'.$product->collection.'</p>';



//                    $date = date('d.m.Y');
//                    $description .= '<p>--------------------</p>';
//                    $description .= '<p>&#9989; На утро '.$date.' остаток: </p><ul>';
//
//                    $description .= '<li>Москва: ' . ($product->moscow + $product->moscow_sale + $product->moscow_depot_reserve) . ' ' . $product->unit . '</li>';

//                    if($product->moscow_way) {
//                        $description .= '<li>Москва (в пути): ' . $product->moscow_way . ' ' . $product->unit . '</li>';
//                    }
//
//                    $description .= '<li>Казань: ' . $product->kazan + $product->kazan_sale . ' ' . $product->unit . '</li>';
//                    if($product->kazan_way) {
//                        $description .= '<li>Казань (в пути): ' . $product->kazan_way . ' ' . $product->unit . '</li>';
//                    }
//
//                    $description .= '<li>СПб: ' . $product->spb + $product->spb_sale . ' ' . $product->unit . '</li>';
//                    if($product->spb_way) {
//                        $description .= '<li>СПб (в пути): ' . $product->spb_way . ' ' . $product->unit . '</li>';
//                    }



//                    $description .= '</ul><p><em>(информация приблизительная, точную информацию о наличии спрашивайте у менеджера)</em></p>';

//        $description .= '<p>--------------------</p>';
//        $date = date('d.m.Y');
//
//            $description .= '<p>&#9989; На утро '.$date.' в Москве '.round($product->moscow + $product->moscow_sale + $product->moscow_depot_reserve).' '.$product->unit.' <em>(уточняйте)</em></p>';


        $description .= '<p>--------------------</p>';

//                    if ($is_big_format) {
//                        $description .= '<p><strong>&#9889; Цена в объявлении указана за 1 шт &#9889;</strong></p>';
//                    } else {
            $description .= '<p><strong>&#9889; Цена в объявлении указана за 1 '.$product->unit.' (есть доп скидки)</strong></p>';
//                    }

        $description .= '<p><strong>&#128165; Скидки от объема &#128165;</strong></p>';
        $description .= '<p><strong>Сделаем индивидуальную скидку, обращайтесь в чат.</strong></p>';
        $description .= '<p><strong>Отгружаем кратно упаковкам. Минимальный заказ - от 1 упаковки</strong></p>';
        $description .= '<p><strong>Доставка / Самовывоз. Оплата при получении. </strong></p>';
        $description .= '<p>--------------------</p>';

        $description .= '<ul>';

            if($product->length != 0 && $product->width != 0) {
            $description .= '<li><strong>Размер: </strong>' . $product->length .'x' . $product->width . ' мм </li>';
            }
            if($product->fat != null && $product->fat != 0) {
            $description .= '<li><strong>Толщина: </strong>' . $product->fat . ' мм </li>';
            }
            if($product->design != null) {
            $description .= '<li><strong>Дизайн: </strong>' . $product->design . '</li>';
            }
            if($product->faska != null) {
            $description .= '<li><strong>Фаска: </strong>' . $product->faska . '</li>';
            }
            if($product->class != null) {
            $description .= '<li><strong>Класс: </strong>' . $product->class . '</li>';
            }

            $description .= '</ul><br>';


        $description .= '<p>Наличие и цены на ваш объем спрашивайте у менеджера.</p>';
        $description .= '<p>Скидки от розничной цены. Доставка по Москве, cамовывоз на западе Москвы.</p>';

//                    $description .= '<p>В наших шоурумах представлены коллекции многих других известных производителей керамогранита, керамической плитки, мозаики и других напольных покрытий (ламинат, паркет, кварцвинил, инженерная доска и др.)</p>';

        $description .= '<p><em>Так же в наличии другие бренды: Aquafloor Аквафлор , Alpinefloor Альпинфлор и многие другие</em></p>';
        $description .= '<br>А ещё у нас можно приобрести керамогранит, керамическую плитку, мозаику, инженерную доску, по очень выгодным ценам</em></p>';

        $description .= '<p>Можно приехать и вживую посмотреть - выбор огромный (4 шоурума в одном месте)! Керамогранит, керамическая плитка, мозаика, ламинат, кварцвинил, инженерная доска и др.</p>';
//                    $description .= '<p>Работаем с розничными и оптовыми покупателями. Предлагаем сотрудничество дизайнерам и строительным компаниям.</p>';
        $description .= '<p>Отправляем через ТК по всей России.</p>';

        if($add_description != '') {
        $description .= '<p>'.nl2br($add_description).'</p>';
        }


        $keywords = 'Кварцвинил скалла skalla водостойкий кварцвинил skalla spc skalla hdf ламинат skalla кварц-винил skalla кварц винил skalla кварцвинил skalla кварцвинил кварцвиниловая плитка виниловый ламинат spc ламинат skalla ламинат кварц-винил скала кварцвинил skalla кварц винил';

        $description .= '<p>_____________________</p>';
        $description .= '<p><em>' . $keywords . '</em></p>';

        $code = $product->vendor_code . '_skalla';
        $video = '';
    @endphp



    @php
        $AdStatus = 'Free';
        $Delivery = 'Самовывоз с онлайн-оплатой';

        $WeightForDelivery = '';
        $LengthForDelivery = round((float)$Length + 2);
        $HeightForDelivery = '';
        $WidthForDelivery = round((float)$Width + 2);
    @endphp

    @php
        $Surface = '';
        $Texture = '';
        $EdgeType = '';
        $Shape = '';
        $ResistanceClass = $product->class;
    @endphp

    @php
        $description .= $show_discount;
    @endphp

    <tr>
        <td>{{ $code }}</td>                                    {{-- Id --}}
        <td>{{ $AdStatus }}</td>                                {{-- AdStatus --}}
        <td></td>                                               {{-- AvitoId --}}
        <td>{{ $name }}</td>                                    {{-- ManagerName --}}
        <td>{{ $phone }}</td>                                   {{-- ContactPhone --}}
        <td>{{ $address }}</td>                                 {{-- Address --}}
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
{{-----SKALLA-END----}}

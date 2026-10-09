{{-----AQUAFLOOR-COLLECTIONS-----}}
@foreach($aquafloor_collections as $product)

    @php
        $size_mm = $product->size;
        $width_mm = (float) explode('х', $size_mm)[1];
        $length_mm = (float) explode('х', $size_mm)[0];
    @endphp

    @php
        $GoodsSubType = 'Отделка';
        $FinishingMaterialsType = 'Напольные покрытия';
        $CeramicPorcelainTilesSubType = '';
        $Brand = 'Aquafloor';
        $TileType = '';
        $SpaceType = '';
        $InstallationType = avito_kvartz_vinil_installation_type($product->connection);
        $Width = round($width_mm);
        $Length = round($length_mm);
        $Thickness = $product->fat;
        $Pattern = '';
        $Color = avito_bauservice_color('123');
        $ColorName = $Color;

        $FlooringMaterialsSubType = 'Кварц-винил';
        $ExteriorFinishingDecorativeStoneSubType = '';
        $WallPanelsSlatsDecorativeElementsSubType = '';
        $MixesType = '';
        $Material = '';
        $OutsideUsage = '';
    @endphp

    @php
        $description = '';

        if($add_description_first != '') {
        $description .= '<p>'.nl2br($add_description_first).'</p>';
        }

        $description .= '<p><strong>' . $product->category .
                        ' Аквафлор ' . $product->collection .  '</strong></p>';

        $description .= '<p><strong>Индивидуальная скидка</strong> — укажите нужный артикул и  объем, рассчитаем цену.</p>';

//        $description .= '<p>--------------------</p>';
//        $date = date('d.m.Y');
//        if ($product->props->balance > 0) {
//            $description .= '<p>&#9989; На утро '.$date.' склад Москва '.round($product->props->balance, 2).' '.$product->unit.' <em>(информация приблизительная, точную информацию о наличии спрашивайте у менеджера)</em></p>';
//        }
//
//        $description .= '<p>--------------------</p>';
//        $description .= '<p><strong>&#9889; Цена в объявлении указана за 1 '. $product->unit .' (есть доп скидки) &#9889;</strong></p>';
        $description .= '<p><strong>&#128165; Скидки от объема &#128165;</strong></p>';
//        $description .= '<p><strong>Сделаем индивидуальную скидку, обращайтесь в чат.</strong></p>';
        $description .= '<p>Отгружаем кратно упаковкам. Минимальный заказ - от 1 упаковки</p>';
        $description .= '<p>Доставка / Самовывоз. Оплата при получении.</p>';
        $description .= '<p>--------------------</p>';


//        $description .= '<p><em>Цена указана за 1 ' . $product->unit . '</em></p>';

//        $description .= '<p><strong>Коллекция: </strong>';
//        $description .= $product->collection . '</p>';

        $description .= '<ul>';
            if($product->connection) {
            $description .= '<li><strong>Соединение: </strong>' . $product->connection . '</li>';
            }
            if($product->size) {
            $description .= '<li><strong>Размер: </strong>' . $product->size . ' мм </li>';
            }
            if($product->fat) {
            $description .= '<li><strong>Толщина: </strong>' . $product->fat . ' мм </li>';
            }

            if($product->count_in_pack && $product->meters_in_pack) {
            $description .= '<li><strong>В упаковке: </strong>' . $product->count_in_pack . ' шт (' . $product->meters_in_pack . ' м2) </li>';
            }
//            if($product->meters_in_pack) {
//            $description .= '<li><strong>В упаковке: </strong>' . $product->meters_in_pack . ' м2</li>';
//            }
            if($product->faska) {
            $description .= '<li><strong>Фаска: </strong>' . $product->faska . '</li>';
            }
//            if($product->type) {
//            $description .= '<li><strong>Основа: </strong>' . $product->type . '</li>';
//            }
            if($product->class) {
            $description .= '<li><strong>Класс: </strong>' . $product->class . '</li>';
            }
            if($product->tisnenie_v_register) {
            $description .= '<li><strong>Тиснение в регистр: </strong>' . $product->tisnenie_v_register . '</li>';
            }
            if($product->protect_layer) {
            $description .= '<li><strong>Защитный слой: </strong>' . $product->protect_layer . ' мм</li>';
            }
            if($product->podlozhka) {
            $description .= '<li><strong>Встроенная подложка: </strong>' . $product->podlozhka . '</li>';
            }

            $description .= '</ul><br>';

            $description .= 'Список артикулов коллекции:';
            $description .= '<ol>';
                foreach ($product->units as $unit) {
                    if ($unit->stock) {
                        $description .= '<li> ' . $unit->vendor_code . ' </li>';
                    }
                }
            $description .= '</ol><br>';


        $description .= '<p>Наличие и цены на ваш объем спрашивайте у менеджера.</p>';
                    $description .= '<p><strong>Скидки от розничной цены. Доставка по Москве, cамовывоз на западе Москвы.</strong></p>';

//                    $description .= '<p>В наших шоурумах представлены коллекции многих других известных производителей керамогранита, керамической плитки, мозаики и других напольных покрытий (ламинат, паркет, кварцвинил, инженерная доска и др.)</p>';

//                    $description .= '<p><em>Так же в наличии другие бренды: Alpine Floor и многие другие</em></p>';
                    $description .= '<br>А ещё у нас можно приобрести керамогранит, плитку, мозаику по очень выгодным ценам</em></p>';

                    $description .= '<p><em>Можно приехать и вживую посмотреть - выбор огромный (4 шоурума в одном месте)! Керамогранит, керамическая плитка, мозаика, ламинат, кварцвинил, инженерная доска и др.</em></p>';
//                    $description .= '<p>Работаем с розничными и оптовыми покупателями. Предлагаем сотрудничество дизайнерам и строительным компаниям.</p>';
                    $description .= '<p>Отправляем через ТК по всей России.</p>';

        if($add_description != '') {
            $description .= '<p>'.nl2br($add_description).'</p>';
        }
    @endphp

    @php

//        $path =str_replace(' ', '-', strtolower($product->slug));
//        $files = Storage::disk('images-hand')->files('aquafloor/collections/' . $path);
//        $files = Arr::sortDesc($files);

        $path =str_replace(' ', '-', strtolower($product->slug));
        $files = Storage::disk('images-hand')->files('aquafloor/collections/' . $path);
        $last_file = array_pop($files);
        array_unshift($files, $last_file);


            $images = [];

            foreach ($files as $file) {
                $images[] = Storage::disk('images-hand')->url($file);
            }



            $image_urls = avito_images_urls($images, false);

    @endphp

    @php
        $title = $product->category .
                ' ' . $product->brand .
                ' ' . $product->slug;
    @endphp

    @php
        $price_rrc = $product->price;
        $price_old = 0;
        $brand = 'Aquafloor';
        $price = avito_price($price_rrc, $brand, $discounts, $price_old);

        $description .= avito_show_discount($price_rrc, $brand, $discounts, $price_old);
    @endphp

    @php
        $code = str_replace(' ', '-', strtolower($product->brand . '-' . $product->slug));
//        $video = $custom_video;
        $video = '';
    @endphp

    @php
        $PackageQuantity = $product->meters_in_pack;
        $PackagingType = '';
    @endphp

    @php
        $AdStatus = 'Free';
        $Delivery = 'Самовывоз с онлайн-оплатой';

        $WeightForDelivery = $product->massa_pack;
        $LengthForDelivery = round($length_mm / 10);
        $HeightForDelivery = 15;
        $WidthForDelivery = round($width_mm / 10);
    @endphp

    @php
        $Surface = '';
        $Texture = '';
        $EdgeType = '';
        $Shape = '';
        $ResistanceClass = $product->class;
    @endphp

    @php
        $VideoFileURL = '';
    @endphp

    @php
//        $Promo = '';
//        $PromoManualOptions = '';

        $Promo = 'Manual';
        $PromoManualOptions = '|11|550';
    @endphp

    <tr>
        <td>{{ $code }}</td>                                    {{-- Id --}}
        <td>{{ $AdStatus }}</td>                                {{-- AdStatus --}}
        <td></td>                                               {{-- AvitoId --}}
        <td>{{ $name }}</td>                                    {{-- ManagerName --}}
        <td></td>                                               {{-- Email --}}
        <td>{{ $phone }}</td>                                   {{-- ContactPhone --}}
{{--        <td>{{ $address }}</td>                                 --}}{{-- Address --}}
        <td>{{ $address_id }}</td>                              {{-- SellerAddressID --}}
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
        <td>{{ $VideoFileURL }}</td>                            {{-- VideoFileURL --}}
        <td>{{ $Promo }}</td>                                   {{-- Promo --}}
        <td>{{ $PromoManualOptions }}</td>                      {{-- PromoManualOptions --}}
    </tr>
@endforeach
{{-----AQUAFLOOR-COLLECTIONS-END----}}

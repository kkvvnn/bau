{{-----PIXMOSAIC-----}}
@foreach($pixmosaics as $product)
    @php
        $GoodsSubType = 'Отделка';
        $FinishingMaterialsType = 'Керамическая плитка и керамогранит';
        $CeramicPorcelainTilesSubType = 'Керамическая плитка';
        $Brand = 'Pixel Mosaic';
        $TileType = 'Мозаика';
        $SpaceType = avito_bauservice_space_type('default');
        $InstallationType = ($product->fat >= 5)?'На пол | На стену':'На стену';
        $Width = avito_bauservice_size('', 0, 150, str_replace('*', 'x', $product->size_tile), 'W') / 10;
        $Length = avito_bauservice_size('', 1, 400, str_replace('*', 'x', $product->size_tile), 'L') / 10;
        $Thickness = '';
        $Pattern = avito_bauservice_pattern('', 'Другой');
        $Color = avito_bauservice_color('Другой');
        $ColorName = $Color;
        $FlooringMaterialsSubType = '';
        $ExteriorFinishingDecorativeStoneSubType = '';
        $WallPanelsSlatsDecorativeElementsSubType = '';
        $MixesType = '';
        $Material = '';
        $OutsideUsage = '';
    @endphp
    @php



        //            ---TITLE-AVITO--
        $title = explode(',', $product->title2)[0];
        if (stripos($title, 'PIX') === false) {
            $title = $title . ' ' . $product->vendor_code;
        }
//        if (mb_strlen($title) > 50) {
//            $title = str_replace(' прокрашенного в массе', '', $title);
//        }
        if (stripos($title, 'озаика') === false) {
            $title .= ' мозаика';
        }

        $title .= ' Pixel mosaic';
        //            ---TITLE-AVITO-END--

        //            ---IMAGES---
        $img_arr = [];
        $img_arr[] = Storage::disk('pixmosaic')->url(str_replace(' ', '', $product->vendor_code) . '.jpg');

        $image_urls = avito_images_urls($img_arr);
        //            ---IMAGES-END--

        //            ---DESCRIPTION---
        $description = '';

         if($add_description_first != '') {
            $description .= '<p>'.nl2br($add_description_first).'</p>';
        }

        $description .= '<p>Мозаика Pixel mosaic / Пикс Мозаик. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены. Доставка по Москве, cамовывоз на западе Москвы.</p>';

        $description .= '<p><strong>' . $product->title . '</strong></p>';

        if ($product->stock != null) {
            $description .= '<p>--------------------</p>';
            $date = $product->updated_at->format('d.m.Y');
            $description .= '<p>&#9989; На утро '.$date.' склад Москва '.$product->stock.' м2 <em>(информация приблизительная, точную информацию о наличии спрашивайте у менеджера)</em></p>';
            $description .= '<p>--------------------</p>';
        }
//        $description .= '<p><strong>На заказ до 10000 рублей при самовывозе установлена фиксированная доплата 300 рублей. Это сделано для того, чтобы не увеличивать минимальную сумму заказа, и мы могли отгрузить Вам даже самый минимальный заказ. <br>Для нас важен каждый клиент и каждый заказ! Спасибо за понимание.</strong></p>';
//        $description .= '<p>--------------------</p>';

//        $description .= '<p><em>Цена указана за 1 шт.</em></p>';

        $description .='<ul>';
        if($product->surface != null) {
            $description .= '<li>Поверхность: <em>' . $product->surface . '</em></li>';
        }
        if($product->material != null) {
            $description .= '<li>Материал: <em>' . $product->material . '</em></li>';
        }
        if($product->osnova != null) {
            $description .= '<li>Основа: <em>' . $product->osnova . '</em></li>';
        }
        if($product->size_tile != null) {
            $description .= '<li>Размер листа: <em>' . $product->size_tile . ' мм</em></li>';
        }
        if($product->size_chip != null) {
            $description .= '<li>Размер чипа: <em>' . $product->size_chip . ' мм</em></li>';
        }
        if($product->fat != null) {
            $description .= '<li>Толщина: <em>' . $product->fat . ' мм</em></li>';
        }
        if($product->square_list != null) {
            $description .= '<li>Площадь листа: <em>' . $product->square_list . ' м2</em></li>';
        }

        $description .= '</ul>';
        //          ------------------
                    $key_words = '';
                    if ($product->material == 'Стекло') {
                        $key_words .= ' мозаика из стекла мозаика стеклянная мозаика стекло мозаика';
                    }
                    if ($product->material == 'Керамогранит') {
                        $key_words .= ' мозаика из керамогранита мозаика керамогранитная мозаика керамогранит мозаика';
                    }
                    if ($product->material == 'Перламутр') {
                        $key_words .= ' мозаика перламутр мозаика из перламутра мозаика';
                    }
                    if ($product->material == 'Зеркало') {
                        $key_words .= ' мозаика из зеркала мозаика зеркальная мозаика зеркало мозаика';
                    }
                    if ($product->material == 'Камень и стекло') {
                        $key_words .= ' мозаика из зеркала мозаика зеркальная мозаика из камня мозаика каменная мозаика камень мозаика стекло мозаика';
                    }
                    if ($product->material == 'Стекло и металл') {
                        $key_words .= ' мозаика из стекла мозаика стеклянная мозаика металлическая мозаика из металла мозаика стекло мозаика камень мозаика';
                    }
                    if ($product->material == 'Металл') {
                        $key_words .= ' мозаика из металла мозаика металлическая мозаика металл мозаика';
                    }
                    if ($product->material == 'Мрамор') {
                        $key_words .= ' мозаика из мрамора мозаика мраморная мозаика мрамор мозаика';
                    }
                    if ($product->material == 'Травертин') {
                        $key_words .= ' мозаика травертин мозаика из травертина мозаика';
                    }
                    if ($product->material == 'Сланец') {
                        $key_words .= ' мозаика сланец мозаика из сланца мозаика';
                    }
                    if ($product->material == 'Оникс') {
                        $key_words .= ' мозаика оникс мозаика из оникса мозаика';
                    }
                    if ($product->material == 'Оникс и мрамор') {
                        $key_words .= ' мозаика из мрамора мозаика из оникса мозаика оникс мозаика мрамор мозаика';
                    }
                    if ($product->material == 'Галька') {
                        $key_words .= ' мозаика галька мозаика из гальки мозаика';
                    }

                    $number_pix = str_replace('PIX', '', $product->vendor_code);
                    $key_words .= ' pix '. $number_pix . ' мозаика';
        //          ------------------

                    $description .= '<p>Под крупный проект сделаем скидку.</p>';
                    $description .= '<p>Наличие а также актуальные цены уточняйте у менеджера.</p>';
                    $description .= '<p>В нашем шоуруме представлены коллекции многих других известных производителей керамогранита, керамической плитки, мозаики и других напольных покрытий (ламинат, паркет, кварцвинил, инженерная доска и др.)</p>';
                    $description .= '<p>Работаем с розничными и оптовыми покупателями. А так же предлагаем сотрудничество дизайнерам и строительным компаниям.</p>';

                    $description .= '<p>_____________</p>';
                    $description .= '<p><em>pixmosaic pixelmosaic pixel mosaic мозаика для ванной мозайка для пола ';
                    $description .= 'мозаика со скидкой купить мозаику купить мозайку красивая мозаика красивая мозайка недорогая ';
                    $description .= 'писк мозаик пиксель мозаика pix mosaic мозаика для хамам мозаика для бассейнов мозаика на фартук ';
                    $description .= $key_words;
                    $description .= '</em></p>';
                    if($add_description != '') {
                        $description .= '<p>'.nl2br($add_description).'</p>';
                    }

    @endphp
    @php
        if (isset($product->props->video_url)) {
            $video = $product->props->video_url;
        } else {
            $video = '';
        }

        $code = $product->vendor_code.'_pixmosaic';
    @endphp

    @php
        $price_rrc = $product->price;
        $price_old = 0;
        $brand = 'Pixmosaic';
        $price = avito_price($price_rrc, $brand, $discounts, $price_old);

        $price = round($price * (float)$product->square_list, -1);

        $description .= avito_show_discount($price_rrc, $brand, $discounts, $price_old);
    @endphp


    @php
        if ($CeramicPorcelainTilesSubType == 'Керамогранит' || $CeramicPorcelainTilesSubType == 'Керамическая плитка') {
            $PackagingType = avito_packaging_type('шт');
            $PackageQuantity = avito_package_quantity(round(1.1, 2));
        } else {
            $PackagingType = '';
            $PackageQuantity = '';
        }
    @endphp

    @php
        $AdStatus = 'Free';
        $Delivery = 'Выключена';

        $WeightForDelivery = 1;
        $LengthForDelivery = 35;
        $WidthForDelivery = 35;
        $HeightForDelivery = 2;
    @endphp

    @php
        $Surface = avito_surface_leedo($product->surface);
        $Texture = avito_texture_leedo($product->surface); //!!!!!!!!!!!!!!!!!!!!!
        $EdgeType = '';
        $Shape = avito_shape_leedo('DEFAULT'); //!!!!!!!!!!!!!!!!!!!!!
        $ResistanceClass = '';
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
    </tr>
@endforeach
{{-----PIXMOSAIC-END----}}

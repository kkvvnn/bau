{{-----KERRANOVA-----}}
@foreach($kerranova as $product)

    @php
        $GoodsSubType = 'Отделка';
        $FinishingMaterialsType = 'Керамическая плитка и керамогранит';
        $CeramicPorcelainTilesSubType = 'Керамогранит';
        $Brand = 'Kerranova';
        $TileType = '';
        $SpaceType = '';
        $InstallationType = avito_bauservice_for('На пол | На стену');
        $Width = avito_bauservice_size($product->width/10, 5, 200, '', 'W');
        $Length = avito_bauservice_size($product->length/10, 5, 400, '', 'L');
        $Thickness = avito_bauservice_height($product->fat, 2, 30);
        $Pattern = avito_bauservice_pattern($product->title, $product->design);
        $Color = avito_bauservice_color($product->color);
        $ColorName = $Color;

        $FlooringMaterialsSubType = '';
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

        if ($product->brand == 'KERRANOVA') {
            $description .= '<p>Керамическая плитка и керамогранит Kerranova , Керранова. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены при покупке большого объема. Доставка по Москве, cамовывоз на западе Москвы.</p>';
        } else {
            $description .= '<p>Керамическая плитка и керамогранит. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены при покупке большого объема. Доставка по Москве, cамовывоз на западе Москвы.</p>';
        }

        $description .= '<p><strong>' . $product->category . ' ' . $product->title .  '</strong></p>';

        $description .= '<p>--------------------</p>';
        $date = date('d.m.Y');
        if ($product->props->balance > 0) {
            $description .= '<p>&#9989; На утро '.$date.' склад Москва '.round($product->props->balance, 2).' '.$product->unit.' <em>(информация приблизительная, точную информацию о наличии спрашивайте у менеджера)</em></p>';
        }

        $description .= '<p>--------------------</p>';
        $description .= '<p><strong>&#9889; Цена в объявлении указана за 1 '. $product->unit .' (есть доп скидки) &#9889;</strong></p>';
        $description .= '<p><strong>&#128165; Скидки от объема &#128165;</strong></p>';
        $description .= '<p><strong>Сделаем индивидуальную скидку, обращайтесь в чат.</strong></p>';
        $description .= '<p><strong>Отгружаем кратно упаковкам. Минимальный заказ - от 1 упаковки</strong></p>';
        $description .= '<p><strong>Доставка / Самовывоз. Оплата при получении. Замена боя</strong></p>';
        $description .= '<p>--------------------</p>';


//        $description .= '<p><em>Цена указана за 1 ' . $product->unit . '</em></p>';

        $description .= '<p><strong>Коллекция: </strong>';
        $description .= $product->collection . '</p>';

        $description .= '<ul>';
            if($product->length != 0 && $product->width != 0) {
            $description .= '<li><strong>Размер: </strong>' . $product->length/10 .'x' . $product->width/10 . ' см </li>';
            }
            if($product->fat != null && $product->fat != 0) {
            $description .= '<li><strong>Толщина: </strong>' . $product->fat/10 . ' см </li>';
            }
            if($product->type != null) {
            $description .= '<li><strong>Место в коллекции: </strong>' . $product->type . '</li>';
            }
            if($product->design != null) {
            $description .= '<li><strong>Рисунок: </strong>' . $product->design . '</li>';
            }
            if($product->color != null) {
            $description .= '<li><strong>Цвет: </strong>' . $product->color . '</li>';
            }
//                if($product->Cover != null) {
//                $description .= '<li><strong>Покрытие: </strong>' . $product->Cover . '</li>';
//                }
            if($product->surface != null) {
            $description .= '<li><strong>Поверхность: </strong>' . $product->surface . '</li>';
            }
            if($product->unit != null) {
            $description .= '<li><strong>Единица измерения товара: </strong>' . $product->unit . '</li>';
            }
            if($product->count_in_pack != null) {
            $description .= '<li><strong>Штук в упаковке: </strong>' . $product->count_in_pack . '</li>';
            }
            if($product->square_in_pack != null) {
            $description .= '<li><strong>Кв. метров в упаковке: </strong>' . $product->square_in_pack . '</li>';
            }
            if($product->brand != null) {
            $description .= '<li><strong>Производитель: </strong>' . $product->brand . '</li>';
            }
            if($product->country != null) {
            $description .= '<li><strong>Страна производства: </strong>' . $product->country . '</li>';
            }

            $description .= '</ul><br>';


        $description .= '<p>Наличие и цены на ваш объем спрашивайте у менеджера.</p>';
                    $description .= '<p>Скидки от розничной цены. Доставка по Москве, cамовывоз на западе Москвы.</p>';

//                    $description .= '<p>В наших шоурумах представлены коллекции многих других известных производителей керамогранита, керамической плитки, мозаики и других напольных покрытий (ламинат, паркет, кварцвинил, инженерная доска и др.)</p>';

                    $description .= '<p><em>Так же в наличии другие бренды: Kerama Marazzi Керама Марацци , Italon Италон , Primavera Примавера , ENNFACE энфэйс , NT CERAMIC НТ КЕРАМИК , Gravita Гравита, Realistik Реалистик и многие другие</em></p>';
                    $description .= '<br>А ещё у нас можно приобрести кварцвинил, ламинат, инженерную доску, SPC по очень выгодным ценам</em></p>';

                    $description .= '<p>Можно приехать и вживую посмотреть - выбор огромный (4 шоурума в одном месте)! Керамогранит, керамическая плитка, мозаика, ламинат, кварцвинил, инженерная доска и др.</p>';
//                    $description .= '<p>Работаем с розничными и оптовыми покупателями. Предлагаем сотрудничество дизайнерам и строительным компаниям.</p>';
                    $description .= '<p>Отправляем через ТК по всей России.</p>';

        if($add_description != '') {
        $description .= '<p>'.nl2br($add_description).'</p>';
        }


        $keywords = '';

        $type = 'керамогранит';


        if(stripos($product->design, 'Дерев') !== false) {
            $pod = $type . ' под дерево';
        }
        elseif(stripos($product->design, 'рамор') !== false) {
            $pod = $type . ' под мрамор';
        }
        elseif(stripos($product->design, 'амен') !== false) {
            $pod = $type . ' под камень';
        }
        elseif(stripos($product->design, 'етон') !== false) {
            $pod = $type . ' под бетон';
        }
        elseif(stripos($product->design, 'никс') !== false) {
            $pod = $type . ' под оникс';
        }
        elseif(stripos($product->design, 'емент') !== false) {
            $pod = $type . ' под цемент';
        } else {
            $pod = '';
        }

        $keywords .= $pod . ' ';

//            $lenght = round((float)str_replace(',', '.', $product->Lenght), 0, PHP_ROUND_HALF_EVEN);
//            $height = round((float)str_replace(',', '.', $product->Height), 0, PHP_ROUND_HALF_EVEN);

        $lenght = $product->length / 10;
        $height = $product->width / 10;

        $size = '';
        $size .= $type . ' ' . $lenght . 'х' . $height . ' ';
        if ($lenght != $height) {
            $size .= $type . ' ' . $height . 'х' . $lenght . ' ';
        }
        $size .= $type . ' ' . $lenght . '*' . $height . ' ';
        if ($lenght != $height) {
            $size .= $type . ' ' . $height . '*' . $lenght . ' ';
        }

        if($product->length != 0 && $product->width != 0) {
        $keywords .= $size;
        }

        $keywords .= $type . ' керранова kerranova ';

        $surface = $product->surface;
        $surf = '';

        if ($surface != null) {
            $surf = str_replace('ая', 'ый', $surface);
        }

        $keywords .= $type . ' ' .mb_strtolower($surf) . ' ';


        $keywords .= ' плитка керамическая плитка ';

        $keywords .= $type . ' ' .mb_strtolower($product->color) . ' ';

        $keywords .= ucfirst(strtolower($product->brand)) . ' ' . $type . ' ';


        $owner_code = $product->vendor_code;

        if ($owner_code != null) {
            $keywords .= $type . ' ' . $owner_code . ' ';
            $keywords .= $type . ' ' . str_replace('/', ' ', $owner_code) . ' ';
        }

        $keywords .= $type . ' ' . $product->vendor_code_short . ' ';


        if ($product->color == 'Белый' && $product->design == 'Мрамор') {
            $keywords .= $type . ' белый мрамор ';
            $keywords .= $type . ' под мрамор белый ';
        }

        if ($product->color == 'Черный' && $product->design == 'Мрамор') {
            $keywords .= $type . ' черный мрамор ';
            $keywords .= $type . ' под мрамор черный ';
        }

        if (stripos($product->title, 'alacatta') || stripos($product->title, 'alacata')) {
            $keywords .= ' керамогранит калаката плитка калаката керамогранит калакатта плитка калакатта';
        }



        if ($type != 'декор') {
            $description .= '<p>_____________________</p>';
            $description .= '<p><em>' . $keywords . '</em></p>';
        }


    @endphp

    @php
        $string_for_delete = 'https://lk.kerranova.ru/storage/images/products/';

        $img_arr = [];
        foreach ($product->images as $key => $value) {
            $img_arr[] = Storage::disk('kerranova')->url(Str::remove($string_for_delete, $value));
        }

        $image_urls = avito_images_urls($img_arr, true);
    @endphp

    @php
        $title = 'Керамогранит '. $product->title . ' ' . $Width . 'x' . $Length . ' см';

        if (mb_strlen($title) > 100) {
            $title = str_replace(' Керамогранит', '', $title);
        }
    @endphp

    @php
        $price_rrc = $product->props->price;
        $price_old = 0;
        $brand = 'Kerranova';
        $price = avito_price($price_rrc, $brand, $discounts, $price_old);

        $description .= avito_show_discount($price_rrc, $brand, $discounts, $price_old);
    @endphp

    @php
        $code = str_replace('/', '-', $product->vendor_code);
        $video = '';
    @endphp

    @php
        if ($CeramicPorcelainTilesSubType == 'Керамогранит' || $CeramicPorcelainTilesSubType == 'Керамическая плитка') {
            $PackagingType = avito_packaging_type('м2');
            if ($PackagingType == 'Упаковка') {
                $PackageQuantity = '1';
            } else {
                $PackageQuantity = avito_package_quantity(round($product->square_in_pack, 2));
            }
        } else {
            $PackagingType = '';
            $PackageQuantity = '';
        }
    @endphp

    @php
        $AdStatus = 'Free';
        $Delivery = 'Самовывоз с онлайн-оплатой';

        $WeightForDelivery = round((float)$product->massa_one_meter * (float)$product->square_in_pack, 2);
        $LengthForDelivery = round((float)$Length + 2);
        $HeightForDelivery = 5;
        $WidthForDelivery = round((float)$Width + 2);
    @endphp

    @php
        $Surface = avito_surface_leedo($product->surface);
        $Texture = avito_texture_leedo($product->surface);
        $EdgeType = '';
        $Shape = '';
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
{{-----KERRANOVA-END----}}

{{-----PRIMAVERA-----}}
@foreach($primavera as $product)

    @php
        $product_type = avito_type($product->title);

        switch ($product_type) {
            case 'Керамогранит':
                $GoodsSubType = 'Отделка';
                $FinishingMaterialsType = 'Керамическая плитка и керамогранит';
                $CeramicPorcelainTilesSubType = 'Керамогранит';
                $Brand = 'Primavera';
                $TileType = '';
                $SpaceType = '';
                $InstallationType = avito_bauservice_for('На пол | На стену');
                $Width = avito_bauservice_size($product->width, 5, 200, $product->title, 'W');
                $Length = avito_bauservice_size($product->length, 5, 400, $product->title, 'L');
                $Thickness = avito_bauservice_height($product->fat, 2, 30);
                $Pattern = avito_bauservice_pattern($product->title, $product->design);
                $Color = avito_bauservice_color($product->color);
                $ColorName = $Color;
                break;
            case 'Керамическая плитка':
                $GoodsSubType = 'Отделка';
                $FinishingMaterialsType = 'Керамическая плитка и керамогранит';
                $CeramicPorcelainTilesSubType = 'Керамическая плитка';
                $Brand = 'Primavera';
                $TileType = avito_tile_type($product->title);
                $SpaceType = avito_bauservice_space_type('default');
                $InstallationType = avito_bauservice_for($product->title);
                $Width = avito_bauservice_size($product->width, 0, 150, $product->title, 'W');
                $Length = avito_bauservice_size($product->length, 1, 400, $product->title, 'L');
                $Thickness = '';
                $Pattern = avito_bauservice_pattern($product->title, $product->design);
                $Color = avito_bauservice_color($product->color);
                $ColorName = $Color;
                break;
            case 'Другое':
                $GoodsSubType = 'Другое';
                $FinishingMaterialsType = '';
                $CeramicPorcelainTilesSubType = '';
                $Brand = '';
                $TileType = '';
                $SpaceType = '';
                $InstallationType = '';
                $Width = '';
                $Length = '';
                $Thickness = '';
                $Pattern = '';
                $Color = '';
                $ColorName = '';
                break;
        }

        $FlooringMaterialsSubType = '';
        $ExteriorFinishingDecorativeStoneSubType = '';
        $WallPanelsSlatsDecorativeElementsSubType = '';
        $MixesType = '';
        $Material = '';
        $OutsideUsage = '';
    @endphp

    @php
        $string_for_delete = 'https://domix-club.ru/upload/iblock/';

        $img_arr = [];
        if ($product->image_collection != '') {
            $img_arr[] = Storage::disk('primavera-new')->url(Str::remove($string_for_delete, $product->image_collection));
        }
        foreach ($product->images as $key => $value) {
            $img_arr[] = Storage::disk('primavera-new')->url(Str::remove($string_for_delete, $value));
        }


        $image_urls = avito_images_urls($img_arr);



        $description = '';

        if($add_description_first != '') {
        $description .= '<p>'.nl2br($add_description_first).'</p>';
        }

        $description .= '<p>Керамическая плитка и керамогранит '.$product->brand.'. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены. Доставка по Москве, cамовывоз на западе Москвы.</p>';
        $description .= '<p><strong>' . $product->title . '. '
                . $product->brand . ' ('
                . $product->country . ')</strong></p>';


        $description .= '<p>--------------------</p>';
        $date = date('d.m.Y');
        $stocks = $product->balance;
        $balance = 0;
        foreach ($stocks as $st) {
            $balance +=  $st->balance;
        }
        if ($balance >= 0) {
            $description .= '<p>&#9989; На утро '.$date.' склад Москва '.round($balance, 2).' '.$product->unit.' <em>(информация приблизительная, точную информацию о наличии спрашивайте у менеджера)</em></p>';
        }

        $description .= '<p>--------------------</p>';
        $description .= '<p><strong>&#9889; Цена в объявлении указана за 1 ' . $product->unit . ' &#9889;</strong></p>';
        $description .= '<p><strong>&#128165; Скидки от объема &#128165;</strong></p>';
        $description .= '<p><strong>Под каждый проект действуют индивидуальные условия предоставления скидки, обращайтесь в чат к менеджеру для рассчета.</strong></p>';
        $description .= '<p><strong>Отгрузка с нашего склада осуществляется кратно упаковкам. Минимальный заказ - от 8000 р. Скидка рассчитывается индивидуально.</strong></p>';
        $description .= '<p>--------------------</p>';


//        $description .= '<p><em>Цена указана за 1 ' . $product->unit . '</em></p>';

        $description .= '<p><strong>Коллекция: </strong>'. $product->collection .'</p>';


        $description .= '<ul>';
            if($product->width != 0 && $product->length != 0) {
            $description .= '<li><strong>Размер: </strong>' . $product->length .'x' . $product->width . ' см</li>';
            }
            if($product->fat != null && $product->fat != 0) {
            $description .= '<li><strong>Толщина: </strong>' . $product->fat . ' мм</li>';
            }
//                if($product->format != null) {
//                $description .= '<li><strong>Формат: </strong>' . $product->format . '</li>';
//                }
            if($product->design != null) {
            $description .= '<li><strong>Рисунок: </strong>' . $product->design . '</li>';
            }
            if($product->color != null) {
            $description .= '<li><strong>Цвет: </strong>' . str_replace(';', ' ', $product->color) . '</li>';
            }
            if($product->surface != null) {
            $description .= '<li><strong>Поверхность: </strong>' . $product->surface . '</li>';
            }
            if($product->count_in_pack != null) {
            $description .= '<li><strong>Штук в упаковке: </strong>' . $product->count_in_pack . '</li>';
            }
            if($product->square_in_pack != null) {
            $description .= '<li><strong>Кв. метров в упаковке: </strong>' . str_replace(',', '.', $product->square_in_pack) . '</li>';
            }
            if($product->country != null) {
            $description .= '<li><strong>Страна производства: </strong>' . $product->country . '</li>';
            }
            if($product->for != null) {
            $description .= '<li><strong>Назначение: </strong>' . str_replace(';', ' ', $product->for) . '</li>';
            }
            if($product->vendor_code != null) {
            $description .= '<li><strong>Артикул: </strong>' . $product->vendor_code . '</li>';
            }

            $description .= '</ul><br>';


        $description .= '<p>Наличие а также актуальные цены уточняйте у менеджера.</p>';

        $description .= '<p>В наших шоурумах представлены коллекции многих других известных производителей керамогранита, керамической плитки, мозаики и других напольных покрытий (ламинат, паркет, кварцвинил, инженерная доска и др.)</p>';
        $description .= '<p>Можно приехать и вживую посмотреть - выбор огромный (4 шоурума в одном месте)! Керамогранит, керамическая плитка, мозаика, ламинат, кварцвинил, инженерная доска и др.</p>';
        $description .= '<p>Работаем с розничными и оптовыми покупателями. А так же предлагаем сотрудничество дизайнерам и строительным компаниям.</p>';
        $description .= '<p>Отправляем через ТК по всей России.</p>';

        if($add_description != '') {
        $description .= '<p>'.nl2br($add_description).'</p>';
        }


        $keywords = '';


        if(stripos($product->title, 'екор') !== false) {
        $type = 'декор';
        }
        elseif(stripos($product->title, 'озаика') !== false) {
        $type = 'мозаика';
        }
        elseif(stripos($product->title, 'литка') !== false) {
        $type = 'керамическая плитка';
        }
        elseif(stripos($product->title, 'ерамогранит') !== false) {
        $type = 'керамогранит';
        }
        else {
            $type = '';
        }


        $naznachenie = '';
        foreach ($product->for_room as $fr) {
            $naznachenie .= $type . ' ' . mb_strtolower($fr) . ' ';
        }
        $for = explode(';', mb_strtolower($product->for));
        foreach ($for as $f) {
            $naznachenie .= $type . ' ' . mb_strtolower($f) . ' ';
        }
        $keywords .= $naznachenie . ' ';


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
        } else {
            $pod = '';
        }

        $keywords .= $pod . ' ';

//            $lenght = round((float)str_replace(',', '.', $product->Lenght), 0, PHP_ROUND_HALF_EVEN);
//            $height = round((float)str_replace(',', '.', $product->Height), 0, PHP_ROUND_HALF_EVEN);
        $lenght = $product->length;
        $height = $product->width;

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

        if ($product->brand == 'Primavera') {
            $keywords .= $type . ' примавера ';
        } elseif ($product->brand == 'Тянь-Шань') {
            $keywords .= $type . ' Тянь-Шань ';
        }



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

        $keywords .= $type . ' ' .mb_strtolower($surf) . ' ';


        $keywords .= ' плитка керамическая плитка ';


        $color_baza = str_replace(';', ' ', mb_strtolower($product->color));
        $color = '';

        if ($color_baza != null) {

            if ($type == 'мозаика' || $type == 'керамическая плитка') {
                $color = str_replace('ый', 'ая', $color_baza);
                $color = str_replace('ой', 'ая', $color);
                $color = str_replace('ий', 'яя', $color);
            }

            if ($type == 'керамогранит') {
                $color = $color_baza;
            }
        }

        $keywords .= $type . ' ' .mb_strtolower($color) . ' ';

        $keywords .= $product->brand . ' ' . $type . ' ';


        $owner_code = $product->vendor_code;

        if ($owner_code != null) {
            $keywords .= $type . ' ' . $owner_code . ' ';
        }

        $country = $product->country;

        if ($country != null) {
            $keywords .= $type . ' ' . $country . ' ';
        }

        $keywords .= $type . ' купить ';

        if (stripos($product->color, 'Белый') !== false && stripos($product->design, 'Мрамор') !== false) {
            $keywords .= $type . ' белый мрамор ';
            $keywords .= $type . ' под мрамор белый ';
        }

        if (stripos($product->color, 'Черный') !== false && stripos($product->design, 'Мрамор') !== false) {
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

//            -----------------------------------------------------------

        $title = $product->title;
        $title = str_replace('см (', '', $title);
        $title = str_replace(')', '', $title);


        if (mb_strlen($title) > 50) {
            $title = str_replace(' настенный', '', $title);
        }
        if (mb_strlen($title) > 50) {
            $title = str_replace('Primavera ', '', $title);
        }
        if (mb_strlen($title) > 50) {
            $title = str_replace('Тянь-Шань ', '', $title);
        }
        if (mb_strlen($title) > 50) {
            $title = str_replace(' настенная', '', $title);
        }
        if (mb_strlen($title) > 50) {
            $title = str_replace(' напольная', '', $title);
        }
        if (mb_strlen($title) > 50) {
            $title = str_replace(' напольный', '', $title);
        }
        if (mb_strlen($title) > 50) {
            $title = str_replace('Серый', 'Сер.', $title);
        }
        if (mb_strlen($title) > 50) {
            $title = str_replace('серый', 'сер.', $title);
        }
        if (mb_strlen($title) > 50) {
            $title = str_replace('Бежевый', 'Беж.', $title);
        }
        if (mb_strlen($title) > 50) {
            $title = str_replace('бежевый', 'беж.', $title);
        }
        if (mb_strlen($title) > 50) {
            $title = str_replace('Керамогранит ', '', $title);
        }


        if (mb_strlen($title) < 40) { $title = $product->brand . ' ' . $title; }

//            $title = preg_replace('/\d+-\d+-\d+-\d+/', '', $title);

        $code = $product->vendor_code;
        $video = '';

    @endphp
    @php
        $price_rrc = $product->price->price;
        $price_old = 0;
        $brand = 'Primavera';
        $price = avito_price($price_rrc, $brand, $discounts, $price_old);

        $description .= avito_show_discount($price_rrc, $brand, $discounts, $price_old);
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

        $WeightForDelivery = 25;
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
{{-----PRIMAVERA-END----}}

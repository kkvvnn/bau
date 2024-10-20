{{-----ARTCENTER-----}}
@foreach($artcenter as $product)
    @php
        $GoodsSubType = 'Отделка';
        $FinishingMaterialsType = 'Керамическая плитка и керамогранит';
        $CeramicPorcelainTilesSubType = 'Керамогранит';
        $Brand = '';
        $TileType = '';
        $SpaceType = '';
        $InstallationType = avito_bauservice_for('На пол | На стену');
        $Width = avito_bauservice_size(null, 5, 200, $product->title, 'W');
        $Length = avito_bauservice_size(null, 5, 400, $product->title, 'L');
        $Height = avito_bauservice_height($product->fat*10, 2, 30);
        $Pattern = avito_bauservice_pattern($product->title, '');
        $Color = avito_bauservice_color($product->color??'');

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

        if ($product->brand == 'Art Ceramic') {
            $description .= '<p>Керамическая плитка и керамогранит Art Ceramic , Арткерамик. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены при покупке большого объема. Доставка по Москве, cамовывоз на западе Москвы.</p>';
        } else {
            $description .= '<p>Керамическая плитка и керамогранит. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены при покупке большого объема. Доставка по Москве, cамовывоз на западе Москвы.</p>';
        }

        $title = str_replace('Плитка ', 'Керамогранит ', $product->title);
        $title = str_replace(' (1,44 кв.м.)', '', $title);

        $description .= '<p><strong>' . $product->brand . ' ' . $title .  ' (Индия)</strong></p>';

        $title2 = str_replace('Плитка Artceramic', 'Керамогранит Арткерамик', $product->title);
        $title2 = str_replace(' (1,44 кв.м.)', '', $title2);
        $title2 = str_replace('High Glossy', 'полированный', $title2);
        $title2 = str_replace('High Gloss', 'полированный', $title2);
        $title2 = str_replace('Glossy', 'полированный', $title2);
        $title2 = str_replace('Matt', 'матовый', $title2);
        $description .= '<p>' . $title2 .  '</p>';

        $description .= '<p>--------------------</p>';
        $date = date('d.m.Y');
        if ($product->moscow_stock > 0) {
            $description .= '<p>&#9989; На утро '.$date.' склад Москва '.round($product->moscow_stock, 2).' '.$product->unit.' <em>(информация приблизительная, точную информацию о наличии спрашивайте у менеджера)</em></p>';
        }
        $description .= '<p>--------------------</p>';


        $description .= '<p><em>Цена указана за 1 ' . $product->unit . '</em></p>';

        $description .= '<p><strong>Коллекция: </strong>'.$product->collection.'</p>';


            $description .= '<ul>';


            if($product->size != null) {
            $description .= '<li><strong>Размер: </strong>' . $product->size . ' см </li>';
            }
            if($product->fat != null && $product->fat != 0) {
            $description .= '<li><strong>Толщина: </strong>' . $product->fat . '</li>';
            }
            if($product->material != null) {
            $description .= '<li><strong>Место в коллекции: </strong>' . $product->material . '</li>';
            }
            if($product->color != null) {
            $description .= '<li><strong>Цвет: </strong>' . $product->color . '</li>';
            }
            if($product->surface != null) {
            $description .= '<li><strong>Поверхность: </strong>' . $product->surface . '</li>';
            }
            if($product->unit != null) {
            $description .= '<li><strong>Единица измерения товара: </strong>' . $product->unit . '</li>';
            }
            if($product->meters_in_pack != null) {
            $description .= '<li><strong>Кв. метров в упаковке: </strong>' . $product->meters_in_pack . '</li>';
            }
            if($product->brand != null) {
            $description .= '<li><strong>Производитель: </strong>' . $product->brand . '</li>';
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

        $naznachenie = $type . ' для пола ' . $type . ' для ванной комнаты';

        $keywords .= $naznachenie . ' ';

        $size = '';
        $size .= $type . ' ' . $product->size . ' ';

        $keywords .= $size;

        if ($product->brand == 'Art Ceramic') {
            $keywords .= $type . ' арт керамик ';
            $keywords .= $type . ' арткерамик ';
        } elseif ($product->brand == 'Cersanit') {
            $keywords .= $type . ' церсанит ';
        } elseif ($product->brand == 'Vitra') {
            $keywords .= $type . ' витра ';
        } elseif ($product->brand == 'Ceradim') {
            $keywords .= $type . ' керадим ';
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

        $color_baza = $product->color;
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

        $country = 'Индия';

        if ($country != null) {
            $keywords .= $type . ' ' . $country . ' ';
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
        $string_for_delete = 'https://media.artcentre.club/';

        if ($product->image1 != '') {
            $artcenter_img1 = Storage::disk('artcenter')->url(Str::remove($string_for_delete, $product->image1));
        } else {
            $artcenter_img1 = null;
        }

        if ($product->image2 != '') {
            $artcenter_img2 = Storage::disk('artcenter')->url(Str::remove($string_for_delete, $product->image2));
        } else {
            $artcenter_img2 = null;
        }

        if ($product->image3 != '') {
            $artcenter_img3 = Storage::disk('artcenter')->url(Str::remove($string_for_delete, $product->image3));
        } else {
            $artcenter_img3 = null;
        }

        if ($product->image4 != '') {
            $artcenter_img4 = Storage::disk('artcenter')->url(Str::remove($string_for_delete, $product->image4));
        } else {
            $artcenter_img4 = null;
        }

        $img_arr = [];
        $img_arr[] = $artcenter_img1;

        if (isset($artcenter_img2) && $artcenter_img2 != null) {
        $img_arr[] = $artcenter_img2;
        }
        if (isset($artcenter_img3) && $artcenter_img3 != null) {
        $img_arr[] = $artcenter_img3;
        }
        if (isset($artcenter_img4) && $artcenter_img4 != null) {
        $img_arr[] = $artcenter_img4;
        }

        $image_urls = avito_images_urls($img_arr);

    @endphp

    @php
        $title = str_replace('Плитка ', 'Керамогранит ', $product->title);
        $title = str_replace(' (1,44 кв.м.)', '', $title);
        $title = str_replace('High Glossy', 'полированный', $title);
        $title = str_replace('High Gloss', 'полированный', $title);
        $title = str_replace('Glossy', 'полированный', $title);
        $title = str_replace('Matt', 'матовый', $title);

        if (mb_strlen($title) > 50) {
            $title = str_replace('Artceramic ', '', $title);
        }
        if (mb_strlen($title) > 50) {
            $title = str_replace('Полированный', 'полиров', $title);
        }
        if (mb_strlen($title) > 50) {
            $title = str_replace('полированный', 'полиров', $title);
        }
    @endphp

    @php
        $code = str_replace('ЦБ-', '', $product->code).'_artcenter';
        $video = '';
    @endphp

    @php
        $price_rrc = $product->price;
        $price_old = 0;
        $brand = 'Art Centre';
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
{{-----ARTCENTER-END----}}

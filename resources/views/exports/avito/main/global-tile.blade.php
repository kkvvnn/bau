{{-----GLOBAL-TILE-----}}
@foreach($globaltile as $product)

    @php
        $product_type = avito_type($product->type);

        switch ($product_type) {
            case 'Керамогранит':
                $GoodsSubType = 'Отделка';
                $FinishingMaterialsType = 'Керамическая плитка и керамогранит';
                $CeramicPorcelainTilesSubType = 'Керамогранит';
                $Brand = '';
                $TileType = '';
                $SpaceType = '';
                $InstallationType = avito_bauservice_for('На пол | На стену');
                $Width = avito_bauservice_size($product->width*100, 5, 200, $product->title, 'W');
                $Length = avito_bauservice_size($product->length*100, 5, 400, $product->title, 'L');

                $gb_fat = $product->fat*1000;
                if ($gb_fat > 30) {
                    $gb_fat = $gb_fat / 10;
                }

                $Height = avito_bauservice_height($gb_fat, 2, 30);
                $Pattern = avito_bauservice_pattern($product->title, $product->design);
                $Color = avito_bauservice_color($product->color);
                break;
            case 'Керамическая плитка':
                $GoodsSubType = 'Отделка';
                $FinishingMaterialsType = 'Керамическая плитка и керамогранит';
                $CeramicPorcelainTilesSubType = 'Керамическая плитка';
                $Brand = 'Global Tile';
                $TileType = avito_tile_type($product->title);
                $SpaceType = avito_bauservice_space_type('default');
                $InstallationType = avito_bauservice_for($product->title);
                $Width = avito_bauservice_size($product->width*100, 0, 150, $product->title, 'W');
                $Length = avito_bauservice_size($product->length*100, 1, 400, $product->title, 'L');
                $Height = '';
                $Pattern = avito_bauservice_pattern($product->title, $product->design);
                $Color = avito_bauservice_color($product->color);
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
                $Height = '';
                $Pattern = '';
                $Color = '';
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

        $description = '';

        if($add_description_first != '') {
        $description .= '<p>'.nl2br($add_description_first).'</p>';
        }

        if ($product->brand == 'GlobalTile') {
            $description .= '<p>Керамическая плитка и керамогранит Global Tile , Глобалтайл. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены при покупке большого объема. Доставка по Москве, cамовывоз на западе Москвы.</p>';
        } else {
            $description .= '<p>Керамическая плитка и керамогранит. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены при покупке большого объема. Доставка по Москве, cамовывоз на западе Москвы.</p>';
        }


        if ($product->status == 'New') {
            $description .= '<p>&#9889;Новинка&#9889; <strong>' . $product->brand . ' ' . $product->title .  ' ('
                . $product->country . ')</strong></p>';
        } else {
            $description .= '<p><strong>' . $product->brand . ' ' . $product->title .  ' ('
                . $product->country . ')</strong></p>';
        }

        $description .= '<p>--------------------</p>';
        $date = date('d.m.Y');
        if ($product->balance > 0) {
            $description .= '<p>&#9989; На утро '.$date.' остаток '.round($product->balance, 2).' '.$product->unit.' <em>(информация приблизительная, точную информацию о наличии спрашивайте у менеджера)</em></p>';
        }
        $description .= '<p>--------------------</p>';




        $description .= '<p><em>Цена указана за 1 ' . $product->unit . '</em></p>';

        $description .= '<p><strong>Коллекция: </strong>';
        $description .= str_replace('_GT', '', $product->collection) . '</p><ul>';


            if($product->length != 0 && $product->width != 0) {
            $description .= '<li><strong>Размер: </strong>' . $product->length*100 .'x' . $product->width*100 . ' см </li>';
            }
            if($product->fat != null && $product->fat != 0) {
            $description .= '<li><strong>Толщина: </strong>' . $product->fat*100 . ' см </li>';
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
            if($product->meters_in_pack != null && $product->meters_in_pack != $product->count_in_pack) {
            $description .= '<li><strong>Кв. метров в упаковке: </strong>' . $product->meters_in_pack . '</li>';
            }
            if($product->brand != null) {
            $description .= '<li><strong>Производитель: </strong>' . $product->brand . '</li>';
            }
            if($product->country != null) {
            $description .= '<li><strong>Страна производства: </strong>' . $product->country . '</li>';
            }

            $description .= '</ul><br>';


        $description .= '<p>Наличие а также актуальные цены уточняйте у менеджера.</p>';
        $description .= '<p>В нашем шоуруме представлены коллекции многих других известных производителей керамогранита, керамической плитки, мозаики и других напольных покрытий (ламинат, паркет, кварцвинил, инженерная доска и др.)</p>';
        $description .= '<p>Работаем с розничными и оптовыми покупателями. А так же предлагаем сотрудничество дизайнерам и строительным компаниям.</p>';

        if($add_description != '') {
        $description .= '<p>'.nl2br($add_description).'</p>';
        }


        $keywords = '';


        if(stripos($product->type, 'екор') !== false) {
        $type = 'декор';
        }
        elseif(stripos($product->type, 'озаика') !== false) {
        $type = 'мозаика';
        }
        elseif(stripos($product->type, 'литка') !== false) {
        $type = 'керамическая плитка';
        }
        elseif(stripos($product->type, 'ерамогранит') !== false) {
        $type = 'керамогранит';
        }
        else {
            $type = '';
        }

        if((stripos($product->for, 'астенна') !== false)) {
            $naznachenie = $type . ' для стен';
        }
        elseif(stripos($product->for, 'пол') !== false) {
            $naznachenie = $type . ' для пола';
        }
        elseif(stripos($product->for, 'иверсальна') !== false) {
            if ($type == 'керамическая плитка' || $type == 'мозаика') {
                $naznachenie = $type . ' универсальная';
            } elseif ($type == 'керамогранит') {
                $naznachenie = $type . ' универсальный';
            } else {
                $naznachenie = $type . ' универсальный';
            }

        } else {
            $naznachenie = '';
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

        $lenght = $product->length * 100;
        $height = $product->width * 100;

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

        if ($product->brand == 'GlobalTile') {
            $keywords .= $type . ' globaltile глобал тайл ';
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

        $country = $product->country;

        if ($country != null) {
            $keywords .= $type . ' ' . $country . ' ';
        }

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
        $img1 = str_replace('https://gallery.vogtrade.ru/wp-content/uploads/images/', config('app.url').'/storage/images/global-tile/', $product->Picture);

        if (isset($product->Picture2) && $product->Picture2 != null) {
            $img2 = str_replace('https://gallery.vogtrade.ru/wp-content/uploads/images/', config('app.url').'/storage/images/global-tile/', $product->Picture2);
        } else {
            $img2 = null;
        }
        if (isset($product->Picture3) && $product->Picture3 != null) {
            $img3 = str_replace('https://gallery.vogtrade.ru/wp-content/uploads/images/', config('app.url').'/storage/images/global-tile/', $product->Picture3);
        } else {
            $img3 = null;
        }
        if (isset($product->Picture4) && $product->Picture4 != null) {
            $img4 = str_replace('https://gallery.vogtrade.ru/wp-content/uploads/images/', config('app.url').'/storage/images/global-tile/', $product->Picture4);
        } else {
            $img4 = null;
        }
        if (isset($product->Picture5) && $product->Picture5 != null) {
            $img5 = str_replace('https://gallery.vogtrade.ru/wp-content/uploads/images/', config('app.url').'/storage/images/global-tile/', $product->Picture5);
        } else {
            $img5 = null;
        }
        if (isset($product->Picture6) && $product->Picture6 != null) {
            $img6 = str_replace('https://gallery.vogtrade.ru/wp-content/uploads/images/', config('app.url').'/storage/images/global-tile/', $product->Picture6);
        } else {
            $img6 = null;
        }
        if (isset($product->Picture7) && $product->Picture7 != null) {
            $img7 = str_replace('https://gallery.vogtrade.ru/wp-content/uploads/images/', config('app.url').'/storage/images/global-tile/', $product->Picture7);
        } else {
            $img7 = null;
        }
        if (isset($product->Picture8) && $product->Picture8 != null) {
            $img8 = str_replace('https://gallery.vogtrade.ru/wp-content/uploads/images/', config('app.url').'/storage/images/global-tile/', $product->Picture8);
        } else {
            $img8 = null;
        }
        if (isset($product->Picture9) && $product->Picture9 != null) {
            $img9 = str_replace('https://gallery.vogtrade.ru/wp-content/uploads/images/', config('app.url').'/storage/images/global-tile/', $product->Picture9);
        } else {
            $img9 = null;
        }

        if (isset($product->image_collection) && $product->image_collection != null) {
            $img_coll = str_replace('https://gallery.vogtrade.ru/wp-content/uploads/images/', config('app.url').'/storage/images/global-tile/', $product->image_collection);
        } else {
            $img_coll = null;
        }

        $img_arr = [];
        $img_arr[] = $img1;
        if ($img_coll != null) {
            $img_arr[] = $img_coll;
        }
        if ($img2 != null) {
            $img_arr[] = $img2;
        }
        if ($img3 != null) {
            $img_arr[] = $img3;
        }
        if ($img4 != null) {
            $img_arr[] = $img4;
        }
        if ($img5 != null) {
            $img_arr[] = $img5;
        }
        if ($img6 != null) {
            $img_arr[] = $img6;
        }
        if ($img7 != null) {
            $img_arr[] = $img7;
        }
        if ($img8 != null) {
            $img_arr[] = $img8;
        }
        if ($img9 != null) {
            $img_arr[] = $img9;
        }

        $image_urls = avito_images_urls($img_arr);

    @endphp

    @php
        $title = $product->vendor_code . ' ' . $product->type . ' ' . $product->brand . ' ' . str_replace('_GT', ' GT', $product->collection);

        if (mb_strlen($title) > 50) {
            $title = str_replace(' Керамическая плитка', '', $title);
        }
        if (mb_strlen($title) > 50) {
            $title = str_replace(' Керамогранит', '', $title);
        }
        if (mb_strlen($title) > 50) {
            $title = str_replace(' Керамогранит', '', $title);
        }
        if (mb_strlen($title) > 50) {
            $title = str_replace(' GT', '', $title);
        }


//            $title = preg_replace('/\d+-\d+-\d+-\d+/', '', $title);
//            if (mb_strlen($title) < 42) { $title = $product->Producer_Brand . ' ' . $title; }
    @endphp

    @php
        $price_rrc = $product->price;
        $price_old = 0;
        $brand = 'Global Tile';
        $price = avito_price($price_rrc, $brand, $discounts, $price_old);

        $description .= avito_show_discount($price_rrc, $brand, $discounts, $price_old);
    @endphp

    @php
        $code = $product->vendor_code;
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
{{-----GLOBAL-TILE-END----}}

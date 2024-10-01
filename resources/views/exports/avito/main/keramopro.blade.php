{{-----KERAMOPRO-----}}
@foreach($keramopro as $product)
    @php
        $GoodsSubType = 'Отделка';
        $FinishingMaterialsType = 'Наружная отделка и декоративный камень';
        $CeramicPorcelainTilesSubType = '';
        $FlooringMaterialsSubType = '';
        $ExteriorFinishingDecorativeStoneSubType = 'Тротуарная плитка';
        $WallPanelsSlatsDecorativeElementsSubType = '';
        $MixesType = '';
    @endphp
    @php
        $description = '';

        if($add_description_first != '') {
        $description .= '<p>'.nl2br($add_description_first).'</p>';
        }

        if ($product->brand == 'Novin Ceram') {
            $description .= '<p>Керамогранит для улицы Novin Ceram (толщина 2 см). Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены при покупке большого объема. Доставка по Москве, cамовывоз на западе Москвы.</p>';
        } else {
            $description .= '<p>Керамическая плитка и керамогранит. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены при покупке большого объема. Доставка по Москве, cамовывоз на западе Москвы.</p>';
        }

        $description .= '<p><strong>' . $product->type . ' ' . $product->title . ' (толщина 2 см) ' .$product->country.  ' </strong></p>';

        $description .= '<p>--------------------</p>';
        $date = date('d.m.Y');
        if ($product->balance > 0) {
            $description .= '<p>&#9989; На утро '.$date.' остаток '.round($product->balance, 2).' '.$product->unit.' <em>(информация приблизительная, точную информацию о наличии спрашивайте у менеджера)</em></p>';
        }
        $description .= '<p>--------------------</p>';




        $description .= '<p><em>Цена указана за 1 ' . $product->unit . '</em></p>';

        $description .= '<p><strong>Коллекция: </strong>';
        $description .= $product->collection . '</p><ul>';


            if($product->length != 0 && $product->width != 0) {
            $description .= '<li><strong>Размер: </strong>' . $product->length .'x' . $product->width . ' см </li>';
            }
            if($product->fat != null && $product->fat != 0) {
            $description .= '<li><strong>Толщина: </strong>' . $product->fat/10 . ' см </li>';
            }
//                if($product->type != null) {
//                $description .= '<li><strong>Место в коллекции: </strong>' . $product->type . '</li>';
//                }
            if($product->type != null) {
            $description .= '<li><strong>Назначение: </strong>Для улицы, для террасы</li>';
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


        $description .= '<p>Наличие а также актуальные цены уточняйте у менеджера.</p>';
        $description .= '<p>В нашем шоуруме представлены коллекции многих других известных производителей керамогранита, керамической плитки, мозаики и других напольных покрытий (ламинат, паркет, кварцвинил, инженерная доска и др.)</p>';
        $description .= '<p>Работаем с розничными и оптовыми покупателями. А так же предлагаем сотрудничество дизайнерам и строительным компаниям.</p>';

        if($add_description != '') {
        $description .= '<p>'.nl2br($add_description).'</p>';
        }


        $keywords = '';

        $type = 'уличный керамогранит';


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

        $surface = $product->surface;
        $surf = '';

        if ($surface != null) {
            $surf = str_replace('ая', 'ый', $surface);
        }

        $keywords .= $type . ' ' .mb_strtolower($surf) . ' ';

        $keywords .= $type . ' ' .mb_strtolower($product->color) . ' ';

        $keywords .= ucfirst(strtolower($product->brand)) . ' ' . $type . ' ';

        $keywords .= $type . ' ' . $product->vendor_code . ' ';

        if ($product->color == 'Белый' && $product->design == 'Мрамор') {
            $keywords .= $type . ' белый мрамор ';
            $keywords .= $type . ' под мрамор белый ';
        }

        if ($product->color == 'Черный' && $product->design == 'Мрамор') {
            $keywords .= $type . ' черный мрамор ';
            $keywords .= $type . ' под мрамор черный ';
        }

        $keywords .= ' керамогранит для улицы утолщенный керамогранит уличный керамогранит 20 мм керамогранит для террасы керамогранит усиленный керамогранит';

        if ($type != 'декор') {
            $description .= '<p>_____________________</p>';
            $description .= '<p><em>' . $keywords . '</em></p>';
        }


    @endphp

    @php
        $string_for_delete = 'https://keramoproshop.ru/wp-content/';

        $img_arr = [];
        foreach ($product->images as $key => $value) {
            $img_arr[] = Storage::disk('keramopro')->url(Str::remove($string_for_delete, $value));
        }

        $image_urls = avito_images_urls($img_arr);
    @endphp

    @php
        $title = $product->title;
        $arr_of_title = explode(' ', $title);
        foreach ($arr_of_title as &$arr) {
            $arr = ucfirst(strtolower($arr));
        }
        $title = implode(' ', $arr_of_title);

        $title = 'Керамогранит ' .$title. ' (толщина 2 см)';

        if (mb_strlen($title) > 50) {
            $title = str_replace('Керамогранит ', '', $title);
        }
        if (mb_strlen($title) > 50) {
            $title = str_replace('толщина', 'толщ.', $title);
        }


//            $title = preg_replace('/\d+-\d+-\d+-\d+/', '', $title);
//            if (mb_strlen($title) < 42) { $title = $product->Producer_Brand . ' ' . $title; }
    @endphp

    @php
        $price_rrc = $product->price;
        $price_old = 0;
        $brand = 'Novin Ceram';
        $price = avito_price($price_rrc, $brand, $discounts, $price_old);

        if ($show_discount = avito_show_discount($brand, $discounts)) {
            $description .= $show_discount;
        }
    @endphp

    @php
        $code = $product->vendor_code . '_keramopro';
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
{{-----KERAMOPRO-END----}}

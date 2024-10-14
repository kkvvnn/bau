{{-----SKALLA-----}}
@foreach($skalla as $product)
    @php
        $GoodsSubType = 'Отделка';
        $FinishingMaterialsType = 'Напольные покрытия';
        $FlooringMaterialsSubType = 'Кварц-винил';
        $WallPanelsSlatsDecorativeElementsSubType = '';
        $CeramicPorcelainTilesSubType = '';
        $ExteriorFinishingDecorativeStoneSubType = '';
        $Brand = '';
        $TileType = '';
        $SpaceType = '';
        $InstallationType = '';
        $Width = '';
        $Length = '';
        $Height = '';
        $Pattern = '';
        $Color = '';
        $MixesType = '';
        $Material = '';
        $OutsideUsage = '';
    @endphp
    @php
                    $title = $product->title;

                    if (mb_strlen($title) > 50) {
                        $title = str_replace('SKALLA ', '', $title);
                    }
//
//                        if (mb_strlen($title) < 37) {
//                            $title = 'Керамогранит ' . $title;
//                        }

        //              ------------------------------------------FOTO-------------------------------------

                    $img = [];
                    $string_for_delete = 'https://static.tildacdn.com/';
                    foreach ($product->images as $key => $value) {
                        $img[] = Storage::disk('skalla')->url(Str::remove($string_for_delete, $value));
                    }

                    $img_arr = [];
                    $img_arr = $img;

                    $image_urls = avito_images_urls($img_arr);

                    $description = '';

                    if($add_description_first != '') {
                    $description .= '<p>'.nl2br($add_description_first).'</p>';
                    }

                    $description .= '<p>SPC ламинат (кварцвинил) SKALLA. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены. Доставка по Москве, cамовывоз на западе Москвы.</p>';
                    $description .= '<p><strong>'.$product->title.'</strong></p>';

                    $description .= '<p><em>Цена указана за 1 '.$product->unit.'</em></p>';
                    $description .= '<p><strong>Коллекция: </strong>'.$product->collection.'</p>';

                    If ($product->description) {
                        $description .= '<p><em>'.$product->description.'</em></p>';
                    }

                        $description .= '<ul>';
                        if($product->vendor_code != null) {
                        $description .= '<li><strong>Артикул: </strong>' . $product->vendor_code . '</li>';
                        }
                        if($product->length != null) {
                        $description .= '<li><strong>Длина: </strong>' . $product->length. ' мм</li>';
                        }
                        if($product->width != null) {
                        $description .= '<li><strong>Ширина: </strong>' . $product->width. ' мм</li>';
                        }
                        if($product->fat != null) {
                        $description .= '<li><strong>Толщина: </strong>' . $product->fat . ' мм</li>';
                        }
                        if($product->design != null) {
                        $description .= '<li><strong>Дизайн: </strong>' . $product->design . '</li>';
                        }
                        if($product->faska != null) {
                        $description .= '<li><strong>Фаска: </strong>' . $product->faska . '</li>';
                        }
                        if($product->massa_pack != null) {
                        $description .= '<li><strong>Масса упаковки: </strong>' . $product->massa_pack . ' кг</li>';
                        }
                        if($product->count_in_pack!= null) {
                        $description .= '<li><strong>Количество в упаковке: </strong>' . $product->count_in_pack. '</li>';
                        }
                        if($product->square_in_pack!= null) {
                        $description .= '<li><strong>Кв.м в упаковке: </strong>' . $product->square_in_pack. '</li>';
                        }

                        $description .= '</ul><br>';


                    $description .= '<p>Наличие а также актуальные цены уточняйте у менеджера.</p>';
                    $description .= '<p>В нашем шоуруме представлены коллекции многих других известных производителей напольных покрытий (керамогранит, мозаика, ламинат, паркет, инженерная доска и др.)</p>';
                    $description .= '<p>Работаем с розничными и оптовыми покупателями. А так же предлагаем сотрудничество дизайнерам и строительным компаниям.</p>';

                    if($add_description != '') {
                    $description .= '<p>'.nl2br($add_description).'</p>';
                    }

                    $description .= '<p>--------------------------</p>';
                    $description .= '<p><em>кварцвинил кварцвиниловая плитка виниловый ламинат spc ламинат skalla ламинат кварц-винил скала кварцвинил skalla кварц винил</em></p>';

                    $code = $product->vendor_code . '_skalla';
                    $video = '';
    @endphp

    @php
        $price_rrc = $product->price->price;
        $price_old = (int) $product->price->sale;
        $brand = 'Skalla';
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
{{-----SKALLA-END----}}

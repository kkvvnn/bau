{{-----LEEDO-SPB-----}}
@foreach($leedo as $product)

    @php
        $GoodsSubType = 'Отделка';
        $FinishingMaterialsType = 'Керамическая плитка и керамогранит';
        $CeramicPorcelainTilesSubType = 'Керамическая плитка';
        $Brand = 'LeeDo Ceramica';
        $TileType = 'Мозаика';
        $SpaceType = avito_bauservice_space_type('default');
        $InstallationType = ($product->Thickness_mm >= 5)?'На пол | На стену':'На стену';
        $Width = avito_bauservice_size('', 0, 150, str_replace('*', 'x', $product->Tile_size_cm), 'W');
        $Length = avito_bauservice_size('', 1, 400, str_replace('*', 'x', $product->Tile_size_cm), 'L');
        $Height = '';
        $Pattern = avito_bauservice_pattern('', 'Другой');
        $Color = avito_bauservice_color($product->Color);
        $FlooringMaterialsSubType = '';
        $ExteriorFinishingDecorativeStoneSubType = '';
        $WallPanelsSlatsDecorativeElementsSubType = '';
        $MixesType = '';
        $Material = '';
        $OutsideUsage = '';

        if ($Width == 0) {
            $Width = 30;
        }
        if ($Length == 0) {
            $Length = 30;
        }
    @endphp

    @php

        //                --------------------------
                    $title = '';
                    if (stripos($product->Category, 'Декор') !== false) {
                        $title = 'Декор ';
                    } elseif (stripos($product->Category, 'Бордюр') !== false) {
                        $title = 'Бордюр ';
                    } elseif (stripos($product->Category, 'Керамическая_плитка') !== false) {
                        $title = 'Керамическая плитка ';
                    } elseif (stripos($product->Category, 'Керамический_гранит') !== false) {
                        $title = 'Керамогранит ';
                    } elseif (stripos($product->Category, 'заика') !== false) {
                        $title = 'Мозаика ';
                    }

                    $title .= $product->Item_name;
                    $title = str_replace('(распродажа остатков)', '', $title);
                    $title = str_replace('40 шт в упак.', '', $title);
                    $title = str_replace('20 шт в упак.', '', $title);
                    $title = str_replace('(14 шт в коробке)', '', $title);
        //                -----------------------------
        //              ------------------------------------------FOTO-------------------------------------

                    $img_arr = [];
                    $img_arr[] = Storage::disk('leedo-images')->url(Str::remove('https://www.leedo.ru/pictures/', $product->Basic_pic));
                    if ($product->Picture1 != null) {
                        $img_arr[] = Storage::disk('leedo-images')->url(Str::remove('https://www.leedo.ru/pictures/', $product->Picture1));
                    }
                    if ($product->Picture2 != null) {
                        $img_arr[] = Storage::disk('leedo-images')->url(Str::remove('https://www.leedo.ru/pictures/', $product->Picture2));
                    }
                    if ($product->Picture3 != null) {
                        $img_arr[] = Storage::disk('leedo-images')->url(Str::remove('https://www.leedo.ru/pictures/', $product->Picture3));
                    }
                    if ($product->Picture4 != null) {
                        $img_arr[] = Storage::disk('leedo-images')->url(Str::remove('https://www.leedo.ru/pictures/', $product->Picture4));
                    }
                    if ($product->Picture5 != null) {
                        $img_arr[] = Storage::disk('leedo-images')->url(Str::remove('https://www.leedo.ru/pictures/', $product->Picture5));
                    }
                    if ($product->Picture6 != null) {
                        $img_arr[] = Storage::disk('leedo-images')->url(Str::remove('https://www.leedo.ru/pictures/', $product->Picture6));
                    }
                    if ($product->Picture7 != null) {
                        $img_arr[] = Storage::disk('leedo-images')->url(Str::remove('https://www.leedo.ru/pictures/', $product->Picture7));
                    }

                    $image_urls = avito_images_urls($img_arr, true);

                    $description = '';

                    if($add_description_first != '') {
                    $description .= '<p>'.nl2br($add_description_first).'</p>';
                    }

                    $description .= '<p><strong>' . $product->Item_chip . '. '
                            . $product->Brand_name . '</strong></p>';


                    $description .= '<p><em>Цена указана за 1 '.$product->unit.'</em></p><ul>';


                        if($product->Tile_size_cm != null) {
                        $description .= '<li><strong>Размер листа, см: </strong>' . $product->Tile_size_cm . '</li>';
                        }
                        if($product->Chip_size_mm != null) {
                        $description .= '<li><strong>Размер чипа, мм: </strong>' . $product->Chip_size_mm . '</li>';
                        }
                        if($product->Thickness_mm != null) {
                        $description .= '<li><strong>Толщина, мм: </strong>' . $product->Thickness_mm . '</li>';
                        }
                        if($product->Tile_sheet_square != null) {
                        $description .= '<li><strong>Площадь листа: </strong>' . $product->Tile_sheet_square . '</li>';
                        }
                        if($product->Form != null) {
                        $description .= '<li><strong>Форма: </strong>' . $product->Form . '</li>';
                        }
                        if($product->Color_text != null) {
                        $description .= '<li><strong>Цвет: </strong>' . $product->Color_text . '</li>';
                        }
                        if($product->Surface != null) {
                        $description .= '<li><strong>Поверхность: </strong>' . $product->Surface . '</li>';
                        }
                        if($product->Material != null) {
                        $description .= '<li><strong>Материал: </strong>' . $product->Material . '</li>';
                        }
                        if($product->Usage != null) {
                        $description .= '<li><strong>Применение: </strong>' . $product->Usage . '</li>';
                        }
                        if($product->Category != null) {
                        $description .= '<li><strong>Категория: </strong>' . str_replace('_', ' ', $product->Category) . '</li>';
                        }

                        $description .= '</ul><p><em>';

                        $description .= ucfirst(trim($product->Description, '"')) . '</em></p>';
                        $description .= '<p>-------------------</p>';

                    $description .= '<p>Наличие и актуальные цены уточняйте у менеджера.</p>';
                    $description .= '<p>Под крупный проект действуют специальные условия и скидки.</p>';

                    if($add_description != '') {
                    $description .= '<p>'.nl2br($add_description).'</p>';
                    }

                    $code = $product->System_ID . '_leedo_millennium_spb';
                    $video = '';
    @endphp

    @php
        $price_rrc = $product->Price_rozn;
        $price_old = 0;
        $brand = 'Leedo';
        $price = avito_price($price_rrc, $brand, $discounts, $price_old);

        $description .= avito_show_discount($price_rrc, $brand, $discounts, $price_old);
    @endphp

    @php
        if ($CeramicPorcelainTilesSubType == 'Керамогранит' || $CeramicPorcelainTilesSubType == 'Керамическая плитка') {
            $PackagingType = avito_packaging_type('шт');
            $PackageQuantity = avito_package_quantity(round($product->Sq_m_per_box, 2));
        } else {
            $PackagingType = '';
            $PackageQuantity = '';
        }
    @endphp

    <tr>
        <td></td>                                                   {{-- AvitoID --}}
        <td>{{ $code }}</td>                                        {{-- Id --}}
        <td>Денис</td>                                              {{-- ManagerName --}}
        <td>{{ $phone }}</td>                                       {{-- ContactPhone --}}
        <td>Санкт-Петербург, Лесной проспект, 22</td>               {{-- Address --}}
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
        <td>{{ $PackagingType }}</td>                               {{-- PackagingType --}}
        <td>{{ $PackageQuantity }}</td>                             {{-- PackageQuantity --}}
    </tr>
@endforeach
{{-----LEEDO-SPB-END----}}

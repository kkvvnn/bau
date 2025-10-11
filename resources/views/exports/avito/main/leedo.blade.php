{{-----LEEDO-----}}
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
        $Thickness = round($product->Thickness_mm);
        $Pattern = avito_pattern_leedo($product->Color_solution);
        $Color = avito_color_leedo($product->Color);
        $ColorName = $Color;
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

                    $image_urls = avito_images_urls($img_arr);

                    $description = '';

                    if($add_description_first != '') {
                    $description .= '<p>'.nl2br($add_description_first).'</p>';
                    }

                    $description .= '<p>Мозаика Caramelle & LeeDo / Лидо. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены. Доставка по Москве, по РФ, cамовывоз на западе Москвы.</p>';
                    $description .= '<p><strong>' . $product->Item_chip . '. '
                            . $product->Brand_name . '</strong></p>';

                    $description .= '<p>--------------------</p>';
                    $date = date('d.m.Y');
                    if (($product->Sklad_Msk_LeeDo > 0 && $product->Sklad_Msk_LeeDo != null) || ($product->Sklad_SPb_LeeDo > 0 && $product->Sklad_SPb_LeeDo != null)) {
                    $description .= '<p>&#9989; На утро '.$date.' склад Москва '.round($product->Sklad_Msk_LeeDo)+round($product->Sklad_SPb_LeeDo).' '.$product->unit.' <em>(информация приблизительная, точную информацию о наличии спрашивайте у менеджера)</em></p>';
                    }

                    $description .= '<p><em>Цена указана за 1 '.$product->unit.'</em></p><ul>';


                        if($product->Tile_size_cm != null) {
                        $description .= '<li><strong>Размер листа: </strong>' . $Width. ' x ' .$Length. ' см</li>';
                        }
                        if($product->Chip_size_mm != null) {
                        $description .= '<li><strong>Размер чипа: </strong>' . $product->Chip_size_mm . ' мм</li>';
                        }
                        if($product->Thickness_mm != null) {
                        $description .= '<li><strong>Толщина, мм: </strong>' . round($product->Thickness_mm) . '</li>';
                        }
                        if($product->Tile_sheet_square != null) {
                        $description .= '<li><strong>Площадь листа: </strong>' . round($product->Tile_sheet_square, 3) . ' м2</li>';
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
//                        if($product->Category != null) {
//                        $description .= '<li><strong>Категория: </strong>' . str_replace('_', ' ', $product->Category) . '</li>';
//                        }

                        $description .= '</ul><p><em>';

                        $description .= ucfirst(trim($product->Description, '"')) . '</em></p>';
                        $description .= '<p>-------------------</p>';


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

                    $code = $product->System_ID;
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

    @php
        $AdStatus = 'Free';
        $Delivery = 'Выключена';

        $WeightForDelivery = round($product->Kg_per_box / $product->Pcs_per_box, 2);
        $LengthForDelivery = round($Length + 2);
        $WidthForDelivery = round($Width + 2);
        $HeightForDelivery = round($Thickness / 10 + 2);
    @endphp

    @php
        $Surface = avito_surface_leedo($product->Surface);
        $Texture = avito_texture_leedo($product->Surface);
        $EdgeType = '';
        $Shape = avito_shape_leedo($product->Form);
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
{{-----LEEDO-END----}}

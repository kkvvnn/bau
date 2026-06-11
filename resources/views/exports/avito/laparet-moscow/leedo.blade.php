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

                    $description .= '<p>Мозаика Caramelle & LeeDo Лидо.</p>';
                    $description .= '<p><strong>' . $product->Item_chip . '. '
                            . $product->Brand_name . '</strong></p>';

                    $description .= '<p><strong>Персональная скидка</strong> — пишите объем, рассчитаем цену.</p>';

                    $description .= '<p>--------------------</p>';
                    $date = date('d.m.Y');
                    if ($product->Sklad_Msk_LeeDo > 0 && $product->Sklad_Msk_LeeDo != null) {
//                        $description .= '<p>&#9989; На утро '.$date.' склад Москва '.round($product->Sklad_Msk_LeeDo)+round($product->Sklad_SPb_LeeDo).' '.$product->unit.' <em>(информация приблизительная, точную информацию о наличии спрашивайте у менеджера)</em></p>';
                        $description .= '<p><strong>&#9989; В наличии на складе в Москве: '.round($product->Sklad_Msk_LeeDo).' '.$product->unit.'</strong> (актуально на '.$date.' — уточняйте перед заказом).</p>';
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


                    $description .= '<p>&#128142; <strong>Наши преимущества:</strong></p><ul>';
        $description .= '<li>Надежная компания, опыт работы более 15 лет</li>';
        $description .= '<li>Выгодные скидки: больше объем - больше скидка!</li>';
        $description .= '<li>Быстрая доставка: Возможна уже на следующий день</li>';
        $description .= '<li>Несколько шоурумов: все образцы в одном месте</li>';
        $description .= '<li>Есть пункт самовывоза - поможем с погрузкой. Или доставим до адреса</li>';
        $description .= '<li>Специальные условия и бонусы для постоянных клиентов, дизайнеров, строителей</li>';
        $description .= '</ul>';

        $description .= '<p><em>Так же в наличии другие бренды: Kerama Marazzi Керама Марацци , Vitra Витра , Primavera Примавера , GlobalTile ГлобалТайл , NT CERAMIC НТ КЕРАМИК , Delacora Делакора, LCM ЛЦМ, EMPERO ЭМПЕРО, и многие другие</em></p>';
        $description .= '<p><em>А ещё у нас можно приобрести кварцвинил, ламинат, инженерную доску, SPC по очень выгодным ценам</em></p>';

//            $description .= '<p>&#127972; <strong>Адрес шоурума: ТД"Можайский двор" ул.Западная, стр 100</strong></p>';
        $description .= '<p>&#128345; <strong>Часы работы шоурума: пн-пт 10:00-19:00, сб-вс 10:00-18:00</strong></p>';
//            $description .= '<p><strong>Онлайн отдел отвечает на Ваши вопросы в рабочее время с 10 до 18 (в выходные дни с 10 до 15)</strong></p>';
//            $description .= '<p>&#127873; Приезжайте в наш шоурум, сообщите менеджеру промокод <strong>"Laparet Avito Запад"</strong>, и Вам предложат специальные условия по цене и дополнительные бонусы</p>';

//            $description .= '<p>Доставка возможна на следующий день после заказа, если он был оформлен до 14:00</p>';

    $description .= '<p>&#128073; НАПИШИТЕ СЕЙЧАС! Укажите нужную площадь — рассчитаем количество и стоимость</p>';

                    if($add_description != '') {
                    $description .= '<p>'.nl2br($add_description).'</p>';
                    }

                    $code = $product->System_ID . '_leedo_lz';
//                    $video = $custom_video;
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

    @php
        $MultiItem = 'Да';
        $first_word = explode(' ', $product->Item_name)[0];
        $MultiName = 'Leedo ' . $first_word ;
    @endphp

    @php
        $Promo = '';
        $PromoManualOptions = '';
    @endphp

    @php
        $WholesaleType = '';
        $WholesaleMinOrderType = '';
        $WholesaleMinOrderCount = '';
        $WholesalePacking = '';
        $WholesalePackingCount = '';
        $WholesaleMeasureUnit = '';
        $WholesaleDiscountLadderType = '';
        $DiscountLadderList = '';
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
        <td>{{ $MultiItem }}</td>                               {{-- MultiItem --}}
        <td>{{ $MultiName }}</td>                               {{-- MultiName --}}
        <td>{{ $Promo }}</td>                                   {{-- Promo --}}
        <td>{{ $PromoManualOptions }}</td>                      {{-- PromoManualOptions --}}
        <td>{{ $WholesaleType }}</td>                           {{-- WholesaleType --}}
        <td>{{ $WholesaleMinOrderType }}</td>                   {{-- WholesaleMinOrderType --}}
        <td>{{ $WholesaleMinOrderCount }}</td>                  {{-- WholesaleMinOrderCount --}}
        <td>{{ $WholesalePacking }}</td>                        {{-- WholesalePacking --}}
        <td>{{ $WholesalePackingCount }}</td>                   {{-- WholesalePackingCount --}}
        <td>{{ $WholesaleMeasureUnit }}</td>                    {{-- WholesaleMeasureUnit --}}
        <td>{{ $WholesaleDiscountLadderType }}</td>             {{-- WholesaleDiscountLadderType --}}
        <td>{{ $DiscountLadderList }}</td>                      {{-- DiscountLadderList --}}
    </tr>
@endforeach
{{-----LEEDO-END----}}

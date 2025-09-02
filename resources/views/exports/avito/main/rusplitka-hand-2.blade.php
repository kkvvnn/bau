{{-----PRIMAVERA-HAND-----}}
    @php

        $image_main = Storage::disk('images-hand')->url('rusplitka/1.jpg');
        $image_2 = Storage::disk('images-hand')->url('rusplitka/2.jpg');


                $image_urls = $image_2 . ' | ' . $image_main;

                    $description = '';

                    if($add_description_first != '') {
                    $description .= '<p>'.nl2br($add_description_first).'</p>';
                    }

                    $description .= '<p>Керамогранит Velsaa. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены. Доставка по Москве, cамовывоз на западе Москвы.</p>';
                    $description .= '<p><strong>Керамогранит Velsaa все коллекции</strong></p>';
                    $description .= '<p>--------------------</p>';
                    $description .= '<p><strong>Отгрузка с нашего склада осуществляется кратно упаковкам. Минимальный заказ - от 8000 р.</strong></p>';
                    $description .= '<p>--------------------</p>';

                    $vendor_codes = [
                        'Velsaa - Aldorado Terra - Brown - 120x60',
                        'Velsaa -  Керамогранит - Lumix White - 120x60',
                        'Velsaa - Calacata Paonazzo - 120x60',
                        'Velsaa - Calacatta Lite Satin 60 - 60x60',
                        'Velsaa - Emperador Brown - High Glossy (распроджа) - 60x60',
                        'Velsaa - Golden Panda - Dark brown - 120x60',
                        'Velsaa - Prizma Bianco - 120x60',
                        'Velsaa - Prizma Crema - 120x60',
                        'Velsaa -Quartz Green - 120x60',
                        'Velsaa - Satvario Gold 120x60 Satin - 120x60',
                        'Velsaa - Satvario Gold 60 Satin - 60x60',
                        'Velsaa - Statuario Eva - 60x60',
                        'Velsaa - Statuario Eva 60 Satin - 60x60',
                        'Velsaa - Statuario Eva Brown  60 Satin - 60x60',
                        'Velsaa - Vitoria Fendi - Glossy - 60x60',
                        'Velsaa - Azul White - Glossy (Серия LIGHT) - 60x60',
                        'Velsaa - Bruni Onix  - Bianco Glossy (Серия LIGHT)- 60x60',
                        'Velsaa - Bruni Onix  - Blue Glossy (Серия LIGHT) - 60x60',
                        'Velsaa - Bruni Onix - Bianco Glossy (Серия LIGHT) - 120x60',
                        'Velsaa - Royal (Серия LIGHT) - 60x60',
                        'Velsaa - Pantheon (Серия LIGHT) - 60x60',
                        'Velsaa - Rosa Aurora - Satin (Серия LIGHT) - 60x60',
                        'Velsaa - Rosa Aurora(Серия LIGHT)  - 120x60',
                        'Velsaa - Satvario Lite - White (Серия LIGHT) - 60x60',
                        'Velsaa - Satvario Lite - White (Серия LIGHT)- 60x120',
                        'Velsaa - Sisam White Glossy (Серия LIGHT) - 60x60',
                        'Velsaa - Sisam White Glossy (Серия LIGHT)- 120x60',
                        'Velsaa - Alcantro - Nero - 120x60',
                        'Velsaa - Calacatta Lite - 120x60',
                        'Velsaa - Calacatta Lite - 60x60',
                        'Velsaa - Copper Slab black - 120x60',
                        'Velsaa - Copper Slab black 60 - 60x60',
                        'Velsaa - Emperador Dark - 120x60',
                        'Velsaa - Estrada Nero - 120x60',
                        'Velsaa - Golassia - Blue - 120x60',
                        'Velsaa - Golassia - Grey - 120x60',
                        'Velsaa - Antisky - 60x60',
                        'Velsaa - Onix - Classic - 120x60',
                        'Velsaa - Onix - Classic - 60x60',
                        'Velsaa - Onix Sky (MDP-102)  - 120x60',
                        'Velsaa - Python Rock - Dark - 60x120',
                        'Velsaa - Regal Zuccini Coffee - 120x60',
                        'Velsaa - Royal Infinite - White - 120x60',
                        'Velsaa - Saturio Glacier - 120x60',
                        'Velsaa - Satvario Gold - 120x60',
                        'Velsaa - Satvario Gold - 60x60',
                        'Velsaa - Statuario Eva - 120x60',
                        'Velsaa - Super Black - 60x60',
                        'Velsaa - Super White - 60x60',
                        'Velsaa - Versace Gold - 120x60',
                        'Velsaa - Ониче Белый - 120x60 (Detroit Light)',
                        'Velsaa - Ониче Черный - 120x60 (Detroit Black)',
                        'Velsaa - Ониче Черный - 60x60 (Detroit Black)',
                        'Zibo Fusure - Chengdu - Silver Glitter - 60x120',
                        'Zibo Fusure - Dalyan Onice - Blue Silver Glitter- 60x120',
                        'Zibo Fusure - Hong Kong Marble - Brown Gold Glitter - 60x120',
                        'Zibo Fusure - Pekin Marble - Gold Glitter - 60x120',
                        'Zibo Fusure - Shanghai Marble - Gold Glitter - 60x120',
                    ];

                    $description .= '<ul>';

                    foreach ($vendor_codes as $v_c) {
                        $description .= '<li>' . $v_c . '</li>';
                    }
                    $description .= '</ul><br>';


                    $description .= '<p>Наличие а также актуальные цены уточняйте у менеджера.</p>';
                    $description .= '<p>В нашем шоуруме представлены коллекции многих других известных производителей керамогранита, керамической плитки, мозаики и других напольных покрытий (ламинат, паркет, кварцвинил, инженерная доска и др.)</p>';
                    $description .= '<p>Работаем с розничными и оптовыми покупателями. А так же предлагаем сотрудничество дизайнерам и строительным компаниям.</p>';

                    if($add_description != '') {
                    $description .= '<p>'.nl2br($add_description).'</p>';
                    }
    @endphp

    @php
        $code = 'Rusplitka-Hand-2';
        $video = '';
        $price = '';
        $title = 'Керамогранит Velsaa все коллекции';
    @endphp

    @php
        $PackagingType = 'Упаковка';
        $PackageQuantity = '1.44';
    @endphp

    @php
        $GoodsSubType = 'Отделка';
        $FinishingMaterialsType = 'Керамическая плитка и керамогранит';
        $CeramicPorcelainTilesSubType = 'Керамогранит';
        $Brand = 'Velsaa';
        $TileType = '';
        $SpaceType = '';
        $InstallationType = 'На пол | На стену';

        $Width = 60;
        $Length = 120;
        $Thickness = 10;
        $Pattern = 'Дерево';
        $Color = 'Золотая';
        $ColorName = $Color;

        $FlooringMaterialsSubType = '';
        $ExteriorFinishingDecorativeStoneSubType = '';
        $WallPanelsSlatsDecorativeElementsSubType = '';
        $MixesType = '';
        $Material = '';
        $OutsideUsage = '';

        $AdStatus = 'Free';
        $Delivery = 'Выключена';
        $WeightForDelivery = '';
        $LengthForDelivery = '';
        $HeightForDelivery = '';
        $WidthForDelivery = '';

        $Surface = 'Глянцевая';
        $Texture = 'Гладкая';
        $EdgeType = 'Ректифицированные';
        $Shape = 'Прямоугольник';
        $ResistanceClass = 'Значительная проходимость (PEI 4)';
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
</tr>
{{-----PRIMAVERA-END-HAND----}}

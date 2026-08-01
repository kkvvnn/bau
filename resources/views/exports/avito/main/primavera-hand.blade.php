{{-----PRIMAVERA-HAND-----}}
    @php

        $image_main = Storage::disk('images-hand')->url('primavera/1.jpg');
        $image_2 = Storage::disk('images-hand')->url('primavera/2.jpg');


                $image_urls = $image_main . ' | ' . $image_2;

                    $description = '';

                    if($add_description_first != '') {
                    $description .= '<p>'.nl2br($add_description_first).'</p>';
                    }

                    $description .= '<p>Керамогранит PRIMAVERA. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены. Доставка по Москве, cамовывоз на западе Москвы.</p>';
                    $description .= '<p><strong>Керамогранит Primavera все коллекции - 1</strong></p>';
                    $description .= '<p>--------------------</p>';
                    $description .= '<p><strong>Отгрузка с нашего склада осуществляется кратно упаковкам. Минимальный заказ - от 8000 р.</strong></p>';
                    $description .= '<p>--------------------</p>';

                    $vendor_codes = [
                        'NR115 Elgon Dark grey 60x60',
                        'NR116 Elgon Grey 60x60',
                        'NR117 Elgon Light grey 60x60',
                        'NR203 Elgon Dark grey 60x120',
                        'NR204 Elgon Light grey 60x120',
                        'NR204 Elgon Light grey 60x120',
                        'NR206 Elgon Grey 60x120',
                        'NR206 Elgon Grey 60x120',
                        'NR113  Maderas Dark grey 60x60',
                        'NR114 Maderas Light grey 60x60',
                        'NR205 Maderas Dark grey 60x120',
                        'NR207 Maderas Light grey 60x120',
                        'NR118 Milos White 60x60',
                        'NR208 Milos White 60x120',
                        'NR208 Milos White 60x120',
                        'NR120 Nemo Grey 60x60',
                        'NR121 Nemo Light grey 60x60',
                        'NR122 Nemo White 60x60',
                        'NR210 Nemo Grey 60x120',
                        'NR211 Nemo Light grey 60x120',
                        'NR211 Nemo Light grey 60x120',
                        'NR212 Nemo Whit 60x120',
                        'NR212 Nemo White 60x120',
                        'NR214 Nemo Dark grey 60x120',
                        'NR119 Ross Black 60x60',
                        'NR209 Ross Black 60x120',
                        'NR213 Takora White 60x120',
                        'NR213 Takora White 60x120',
                        'NR008 Alcor Light grey 30x60',
                        'NR108 Alcor Light grey 60x60',
                        'NR011 Alzirr Light 30x60',
                        'NR012 Alzirr Dark 30x60',
                        'NR111 Alzirr Light 60x60',
                        'NR112 Alzirr Dark 60x60',
                        'NR006 Antares White rock 30x60',
                        'NR007 Antares Taupe rock 30x60',
                        'NR106 Antares White rock 60x60',
                        'NR107 Antares Taupe rock 60x60',
                        'NR009 Botein Mink 30x60',
                        'NR010 Botein Dark orobico 30x60',
                        'NR109 Botein Mink 60x60',
                        'NR110 Botein Dark orobico 60x60',
                        'WD05 Branch White 20x80',
                        'WD05 Branch White Rec 20x80',
                        'WD06 Branch Taupe Rec 20x80',
                        'WD07 Branch Mink Rec 20x80',
                        'WD08 Branch Grey 20x80',
                        'WD08 Branch Grey Rec 20x80',
                        'NR004 Dalim white 30x60',
                        'NR005 Dalim Black 30x60',
                        'NR104 Dalim white 60x60',
                        'NR105 Dalim Black 60x60',
                        'WD09 Forest Crema 20x80',
                        'WD09 Forest Crema Rec 20x80',
                        'WD10 Forest Flax 20x80',
                        'WD10 Forest Flax Rec 20x80',
                        'WD11 Forest Gold Terra Rec 20x80',
                        'WD12 Forest Grey 20x80',
                        'WD12 Forest Grey Rec 20x80',
                        'NR002 Mizar Light grey 30x60',
                        'NR003 Mizar Dark grey 30x60',
                        'NR102 Mizar Light grey 60x60',
                        'NR103 Mizar Dark grey 60x60',
                        'WD01 Taiga Dark Grey Rec 20x80',
                        'WD02 Taiga Grey Rec 20x80',
                        'WD03 Taiga Mink Rec WD03 20x80',
                        'WD04 Taiga Wenge Rec 20x80',
                        'PR147 Abside Ice Polished 60x60',
                        'PR221 Acacia 60x120см polished',
                        'NR129 Acothly Matt 60x60',
                        'NR219 Acothly Matt 60x120',
                        'PR150 Acothly Polished 60x60',
                        'PR234 Acothly Polished 60x120',
                        'PR111 Adagio Polished 600x600',
                        'PR125 Almond Cascais Polished 60x60',
                        'PR216 Almond Cascais Polished 60x120',
                        'PR216 Almond Cascais Polished 60x120',
                        'PR152 Almond Light Grey Polished 60x60',
                        'PR108 Ardesia Grafito Polished 60x60',
                        'PR208 Ardesia Grafito Polished 60x120',
                        'PR208 Ardesia Grafito Polished 60x120',
                        'PR114 Arena White Polished 60x60',
                        'CR105 Arseno Gris 60x60см carving',
                        'CR106 Arseno Nero 60x60см carving',
                        'CR208 Arseno Gris 60x120см carving',
                        'CR208 Arseno Gris 60x120см carving',
                        'CR209 Arseno Nero 60x120см carving',
                        'CR209 Arseno Nero 60x120см carving',
                        'CR101 Ayton Brown 60x60см carving',
                        'CR203 Ayton Brown 60x120см carving',
                        'CR203 Ayton Brown 60x120см carving',
                        'PR128 Ayton Brown 60x60см polished',
                        'PR220 Ayton Brown 60x120см polished',
                        'PR220 Ayton Brown 60x120см polished',
                        'GG207 Beira Stone Grit Granula 60x120',
                        'CR217 Belfast Choco 60x120см carving',
                        'CR217 Belfast Choco 60x120см carving',
                        'GG209 Bellevue Grit Granula 60x120',
                        'PC203 Bellevue Punch-Carving 60x120',
                        'PR126 Bellevue Gold 60x60см polished',
                        'PR218 Bellevue Gold 60x120см polished',
                        'NR134 Berat Grey Matt 60x60',
                        'NR224 Berat Grey Matt 60x120',
                        'GR202 Bigium Blue High glossy 60x120',
                        'GR108 Black Modulo 60x60см high glossy',
                        'GR210 Black Modulo 60x120см high glossy',
                        'GR210 Black Modulo 60x120см high glossy',
                        'CR124 Black Velvet Carving 60x60',
                        'CR233 Black Velvet Carving 60x120',
                        'CR103 Blanco Tranco 60x60см carving',
                        'CR206 Blanco Tranco 60x120см carving',
                    ];

                    $description .= '<ul>';

                    foreach ($vendor_codes as $v_c) {
                        $description .= '<li>' . $v_c . '</li>';
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
    @endphp

    @php
        $code = 'Primavera-Hand-1';
        $video = $custom_video;
        $price = '1590';
        $title = 'Primavera все коллекции - 1';
    @endphp

    @php
        $PackagingType = 'Упаковка';
        $PackageQuantity = '1.44';
    @endphp

    @php

        $GoodsSubType = 'Отделка';
        $FinishingMaterialsType = 'Керамическая плитка и керамогранит';
        $CeramicPorcelainTilesSubType = 'Керамогранит';
        $Brand = 'Primavera';
        $TileType = '';
        $SpaceType = '';
        $InstallationType = 'На пол | На стену';

        $Width = 60;
        $Length = 120;
        $Thickness = 10;
        $Pattern = 'Оникс';
        $Color = 'Зелёная';
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

    @php
        $VideoFileURL = '';
    @endphp

<tr>
    <td>{{ $code }}</td>                                    {{-- Id --}}
    <td>{{ $AdStatus }}</td>                                {{-- AdStatus --}}
    <td></td>                                               {{-- AvitoId --}}
    <td>{{ $name }}</td>                                    {{-- ManagerName --}}
    <td></td>                                               {{-- Email --}}
    <td>{{ $phone }}</td>                                   {{-- ContactPhone --}}
{{--    <td>{{ $address }}</td>                                 --}}{{-- Address --}}
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
    <td>{{ $VideoFileURL }}</td>                            {{-- VideoFileURL --}}
</tr>
{{-----PRIMAVERA-END-HAND----}}

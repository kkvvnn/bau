{{-----PRIMAVERA-HAND-----}}
    @php

        $image_main = Storage::disk('images-hand')->url('primavera/1.jpg');
        $image_2 = Storage::disk('images-hand')->url('primavera/2.jpg');


                $image_urls = $image_2 . ' | ' . $image_main;

                    $description = '';

                    if($add_description_first != '') {
                    $description .= '<p>'.nl2br($add_description_first).'</p>';
                    }

//                    $description .= '<p>Керамогранит PRIMAVERA. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены. Доставка по Москве, cамовывоз на западе Москвы.</p>';
                    $description .= '<p><strong>Керамогранит Primavera все коллекции - 2</strong></p>';
                    $description .= '<p>--------------------</p>';
                    $description .= '<p><strong>Отгрузка с нашего склада осуществляется кратно упаковкам. Минимальный заказ - от 8000 р.</strong></p>';
                    $description .= '<p>--------------------</p>';

                    $vendor_codes = [
                        'GR207 Bondford 60x120см high glossy',
                        'PR104 Brecia Ivory Polished 60x60',
                        'PR204 Brecia Ivory Polished 60x120',
                        'PR205 Brecia Silver Polished 600x1200',
                        'CR211 Canyon Grey 60x120см carving',
                        'CR205 Caribbean Black Rust 60x120см carving',
                        'CR205 Caribbean Black Rust 60x120см carving',
                        'NR135 Chalco Grey Matt 60x60',
                        'NR225 Chalco Grey Matt 60x120',
                        'PR135 Chembra Onyx Ice 60x60см polished',
                        'PC209 Cobar Nero Punch-Carving 60x120',
                        'CR114 Colonial White Carving 60x60',
                        'CR222 Colonial White Carving 60x120',
                        'PR106 Colonial White Polished 60x60',
                        'PR206 Colonial white Polished 60x120',
                        'PC207 Cork Beige Punch-Carving 60x120',
                        'SR103 Cork Beige 60x60см sugar',
                        'SR203 Cork Beige 60x120см sugar',
                        'SR203 Cork Beige 60x120см sugar',
                        'NR101 Dario Matt 60x60',
                        'NR201 Dario Matt 60x120',
                        'NR201 Dario Matt 60x120',
                        'GG208 Dior White Grit Granula 60x120',
                        'GR105 Black Emperador High glossy 60x60',
                        'GR205 Black Emperador High glossy 60x120',
                        'GR205 Black Emperador High glossy 60x120',
                        'PR209 Essence Grey Polished 60x120',
                        'PR209 Essence Grey Polished 60x120',
                        'CR201 Fantasy Mix 60x120см carving',
                        'CR201 Fantasy Mix 60x120см carving',
                        'PR127 Fantasy Black 60x60см polished',
                        'PR219 Fantasy Mix 60x120см polished',
                        'PR219 Fantasy Mix 60x120см polished',
                        'PR226 Fantasy Black 60x120см Polished',
                        'PR226 Fantasy Black 60x120см Polished',
                        'GR203 Fedele Negro High glossy 60x120',
                        'GR203 Fedele Negro High glossy 60x120',
                        'CR102 Fiji Grey 60x60см carving',
                        'CR204 Fiji Grey 60x120см carving',
                        'CR204 Fiji Grey 60x120см carving',
                        'CR107 Fort Charcoal Expo 60x60см carving',
                        'CR212 Fort Charcoal Expo 60x120см carving',
                        'CR212 Fort Charcoal Expo 60x120см carving',
                        'GR113 French Nero High Glossy 60x60',
                        'GR212 French Nero High Glossy 60x120',
                        'PR210 Galeno Grafito Polished 600x1200',
                        'NR133 Geelong Grey Matt 60x60',
                        'NR223 Geelong Grey Matt 60x120',
                        'GG203 Golden Black Grit Granula 60x120',
                        'GG205 Golden Stone Grit Granula 60x120',
                        'GR101 Golden Black High glossy 60x60',
                        'PR212 Golden Grey Polished 60x120',
                        'PR212 Golden Grey Polished 60x120',
                        'GR211 Hex Azul 60x120см high glossy',
                        'GR211 Hex Azul 60x120см high glossy',
                        'GG206 Hez Grey Grit Granula 60x120',
                        'CR210 Jakarta Blue 60x120см carving',
                        'CR210 Jakarta Blue 60x120см carving',
                        'PC208 Jakarta Blue Punch-Carving 60x120',
                        'PR124 Kalos Bianco Polished 60x60',
                        'PR112 Lambert Bianco Polished 60x60',
                        'CR226 Lamia White Carving 60x120',
                        'NR130 Lamia White Matt 60x60',
                        'NR220 Lamia White Matt 60x120',
                        'CR119 Latur White Carving 60x60',
                        'CR225 Latur White Carving 60x120',
                        'CR227 Marbillo Sky Carving 60x120',
                        'CR228 Marbillo Rose Carving 60x120',
                        'PC201 Marbillo Sky Punch-Carving 60x120',
                        'PC202 Marbillo Grey Punch-Carving 60x120',
                        'PR235 Marbillo Sky Polished 60x120',
                        'PR236 Marbillo Blue Polished 60x120',
                        'CR219 Marla White Carving 60x120',
                        'CR220 Marla Grey Carving 60x120',
                        'CR221 Marla Dark Grey Carving 60x120',
                        'PR143 Marvel Onix Grey Polished 60x60',
                        'PR228 Marvel Onix Grey Polished 60x120',
                        'CR104 Maverick White 60x60см carving',
                        'CR207 Maverick White 60x120см carving',
                        'PR130 Maverick White 60x60см polished',
                        'PR223 Maverick White 60x120см polished',
                        'PR223 Maverick White 60x120см polished',
                        'PR123 Mezza Grey Polished 60x60',
                        'LR203 Montreal Grey Lapato 60x120',
                        'LR203 Montreal Grey Lapato 60x120',
                        'LR204 Montreal Dark Grey Lapato 60x120',
                        'LR204 Montreal Dark Grey Lapato 60x120',
                        'GG202 Namibia Black Grit Granula 60x120',
                        'PR116 Namibian Marble Polished 60x60',
                        'PR211 Namibia black High glossy 60x120',
                        'PC204 Nola White Punch-Carving 60x120',
                        'PC205 Nola Dark Punch-Carving 60x120',
                        'CR125 Oltan Black Techno Matt + Carving 60x60',
                        'CR115 Onyx Pink Carving 60x60',
                        'CR116 Onyx Аmber Carving 60x60',
                        'CR223 Onyx Pink Carving 60x120',
                        'CR224 Onyx Аmber Carving 60x120',
                        'NR126 Onyx Pink Matt 60x60',
                        'NR127 Onyx Аmber Matt 60x60',
                        'NR131 Honey Onyx Bianco Matt 60x60',
                        'NR216 Onyx Pink Matt 60x120',
                        'NR217 Onyx Аmber Matt 60x120',
                        'NR221 Honey Onyx Bianco Matt 60x120',
                        'PR101 Onyx Аmber Polished 60x60',
                        'PR102 Onyx Pink Polished 60x60',
                        'PR119 Honey onyx sky Polished 60x60',
                        'PR120 Honey onyx bianco Polished 60x60',
                        'PR121 Honey onyx gris Polished 60x60',
                        'PR151 Honey Onyx Blue Polished 60x60',
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
        $code = 'Primavera-Hand-2';
        $video = $custom_video;
        $price = '1590';
        $title = 'Primavera все коллекции - 2';
    @endphp

    @php
        $PackagingType = 'Упаковка';
        $PackageQuantity = '1';
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
        $Pattern = 'Бетон';
        $Color = 'Бежевая';
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

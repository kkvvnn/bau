{{-----PRIMAVERA-HAND-----}}
    @php

        $image_main = Storage::disk('images-hand')->url('primavera/1.jpg');
        $image_2 = Storage::disk('images-hand')->url('primavera/2.jpg');


                $image_urls = $image_2 . ' | ' . $image_main;

                    $description = '';

                    if($add_description_first != '') {
                    $description .= '<p>'.nl2br($add_description_first).'</p>';
                    }

                    $description .= '<p>Керамогранит PRIMAVERA. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены. Доставка по Москве, cамовывоз на западе Москвы.</p>';
                    $description .= '<p><strong>Керамогранит Primavera все коллекции - 3</strong></p>';
                    $description .= '<p>--------------------</p>';
                    $description .= '<p><strong>Отгрузка с нашего склада осуществляется кратно упаковкам. Минимальный заказ - от 8000 р.</strong></p>';
                    $description .= '<p>--------------------</p>';

                    $vendor_codes = [
                        'PR201 Onyx Аmber Polished 60x120',
                        'PR201 Onyx Аmber Polished 60x120',
                        'PR202 Onyx Pink Polished 60x120',
                        'PR202 Onyx Pink Polished 60x120',
                        'PR213 Honey Onyx Blue Polished 60x120',
                        'PR213 Honey Onyx Blue Polished 60x120',
                        'PR214 Honey Onyx Bianco Polished 60x120',
                        'PR214 Honey Onyx Bianco Polished 60x120',
                        'PR215 Honey Onyx Sky Polished 60x120',
                        'NR128 Pirgos White Matt 60x60',
                        'NR218 Pirgos White Matt 60x120',
                        'PR149 Pirgos White Polished 60x60',
                        'PR233 Pirgos White Polished 60x120',
                        'PC206 Porto Stone Grey Punch-Carving 60x120',
                        'SR102 Provo Grey 60x60см sugar',
                        'SR202 Provo Grey 60x120см sugar',
                        'SR202 Provo Grey 60x120см sugar',
                        'GG201 Regal Carara Grit Granula 60x120',
                        'PR103 Regal Carara Polished 60x60',
                        'PR203 Regal Carara Polished 60x120',
                        'PR203 Regal Carara Polished 60x120',
                        'CR108 Remate Crema 60x60см carving',
                        'CR218 Remate Crema 60x120см carving',
                        'CR218 Remate Crema 60x120см carving',
                        'GR104 Richter brown High glossy 60x60',
                        'GR204 Richter brown High glossy 60x120',
                        'GR204 Richter brown High glossy 60x120',
                        'PR133 Rockstone 60x60см polished',
                        'PR225 Rockstone 60x120см polished',
                        'PR225 Rockstone 60x120см polished',
                        'CR118 Rodas Light Carving 60x60',
                        'NR132 Rodas Light Matt 60x60',
                        'NR222 Rodas Light Matt 60x120',
                        'PR132 Rodas Light 60x60см polished',
                        'PR224 Rodas Light 60x120см polished',
                        'PR224 Rodas Light 60x120см polished',
                        'GR106 Roman Empro Brown 60x60см high glossy',
                        'GR107 Roman Empro Gold 60x60см high glossy',
                        'GR208 Roman Empro Brown 60x120см high glossy',
                        'GR208 Roman Empro Brown 60x120см high glossy',
                        'GR209 Roman Empro Gold 60x120см high glossy',
                        'CR232 Romero Grey Carving 60x120',
                        'PR131 Rubin Sky 60x60см polished',
                        'CR117 Salvatore Carving 60x60',
                        'PR107 Salvatore Polished 60x60',
                        'PR207 Salvatore Polished 60x120',
                        'NR125 Siroco Matt 60x60',
                        'NR215 Siroco Matt 60x120',
                        'PR148 Siroco Polished 60x60',
                        'PR232 Siroco Polished 60x120',
                        'GR206 Speranza gold light blue High glossy 60x120',
                        'GR206 Speranza gold light blue High glossy 60x120',
                        'PR122 Speranza gold light grey Polished 60x60',
                        'PR217 Speranza gold light grey Polished 60x120',
                        'PR217 Speranza gold light grey Polished 60x120',
                        'CR213 Stoneart Grey 60x120см carving',
                        'CR213 Stoneart Grey 60x120см carving',
                        'CR214 Stoneart Copper 60x120см carving',
                        'CR215 Stoneart Gold 60x120см carving',
                        'CR215 Stoneart Gold 60x120см carving',
                        'CR216 Stoneart Metal 60x120см carving',
                        'CR216 Stoneart Metal 60x120см carving',
                        'GR213 Stoneart Gold High Glossy 60x120',
                        'CR121 Tanami Pearl Carving 60x60',
                        'GG210 Tanami Blue Grit Granula 60x120',
                        'GG211 Tanami Mint Grit Granula 60x120',
                        'GG212 Tanami Almond Grit Granula 60x120',
                        'NR136 Titan Black Matt 60x60',
                        'NR226 Titan Black Matt 60x120',
                        'PR115 Titan Black High glossy 60x60',
                        'GR103 Toledo black High glossy 60x60',
                        'GR201 Toledo black High glossy 60x120',
                        'GR201 Toledo black High glossy 60x120',
                        'CR122 Vanity Grey Carving 60x60',
                        'CR123 Vanity Bianco Carving 60x60',
                        'CR230 Vanity Bianco Carving 60x120',
                        'CR231 Vanity Grey Carving 60x120',
                        'PR113 Vendome Blanco Polished 60x60',
                        'SR101 Vendome Crema 60x60см sugar',
                        'SR201 Vendome Crema 60x120см sugar',
                        'SR201 Vendome Crema 60x120см sugar',
                        'PR153 Vezin Grey Polished 60x60',
                        'PR237 Vezin Grey Polished 60x120',
                        'PR129 Videl Bianco 60x60см polished',
                        'PR222 Videl Bianco 60x120см polished',
                        'PR222 Videl Bianco 60x120см polished',
                        'SR104 Videl Bianco 60x60см sugar',
                        'SR204 Videl Bianco 60x120см sugar',
                        'PR144 Vilema White Polished 60x60',
                        'PR145 Vilema Grey Polished 60x60',
                        'PR146 Vilema Cream Polished 60x60',
                        'PR229 Vilema White Polished 60x120',
                        'PR230 Vilema Grey Polished 60x120',
                        'PR231 Vilema Cream Polished 60x120',
                        'CR120 Vivia Cemento Carving 60x60',
                        'CR229 Vivia Cemento Carving 60x120',
                        'GG204 Wilton Black Grit Granula 60x120',
                        'LR201 Zola Crema Lapato 60x120',
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
        $code = 'Primavera-Hand-3';
        $video = $custom_video;
        $price = '1590';
        $title = 'Primavera все коллекции - 3';
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
</tr>
{{-----PRIMAVERA-END-HAND----}}

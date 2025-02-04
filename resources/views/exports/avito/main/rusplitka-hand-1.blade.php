{{-----PRIMAVERA-HAND-----}}
    @php
        $GoodsSubType = 'Отделка';
        $FinishingMaterialsType = 'Керамическая плитка и керамогранит';
        $CeramicPorcelainTilesSubType = 'Керамогранит';
        $Brand = 'Colortile';
        $TileType = '';
        $SpaceType = '';
        $InstallationType = 'На пол | На стену';

        $Width = 60;
        $Length = 120;
        $Height = 10;
        $Pattern = '';
        $Color = '';

        $FlooringMaterialsSubType = '';
        $ExteriorFinishingDecorativeStoneSubType = '';
        $WallPanelsSlatsDecorativeElementsSubType = '';
        $MixesType = '';
        $Material = '';
        $OutsideUsage = '';

        $image_main = Storage::disk('images-hand')->url('rusplitka/1.jpg');
        $image_2 = Storage::disk('images-hand')->url('rusplitka/2.jpg');


                $image_urls = $image_2 . ' | ' . $image_main;

                    $description = '';

                    if($add_description_first != '') {
                    $description .= '<p>'.nl2br($add_description_first).'</p>';
                    }

                    $description .= '<p>Керамогранит Bluezone, Colortile. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены. Доставка по Москве, cамовывоз на западе Москвы.</p>';
                    $description .= '<p><strong>Керамогранит Bluezone, Colortile все коллекции</strong></p>';
                    $description .= '<p>--------------------</p>';
                    $description .= '<p><strong>Отгрузка с нашего склада осуществляется кратно упаковкам. Минимальный заказ - от одной упаковки.<br>На заказ до 10000 рублей при самовывозе установлена фиксированная доплата 300 рублей. Это сделано для того, чтобы не увеличивать минимальную сумму заказа, и мы могли отгрузить Вам даже 1 упаковку. <br>Для нас важен каждый клиент и каждый заказ! Спасибо за понимание.</strong></p>';
                    $description .= '<p>--------------------</p>';

                    $vendor_codes = [
                        'Bluezone - Arizona - Green High Glossy - 120x60',
                        'Bluezone - Bellisimo - Crema Glossy - 120x60',
                        'Bluezone - Delta - White & Black - 120x60',
                        'Bluezone - Ethipian - White - 120x60',
                        'Bluezone - Istanbul - Crema Glossy - 120x60',
                        'Bluezone - Istanbul - Sepia Glossy - 120x60',
                        'Bluezone - Oriental - White - 120x60',
                        'Bluezone - Romano Versailles - Blue High Glossy - 120x60',
                        'Bluezone - Romano Versailles - Brown High Glossy - 120x60',
                        'Bluezone - Soft White - Полированный - 120x60',
                        'Bluezone - Toros - Grey Sugar - 60x60',
                        'Bluezone - Toros - White Sugar - 60x60',
                        'Bluezone - Worner - Black Sugar - 60x60',
                        'Bluezone - Worner - Grey Sugar - 60x60',
                        'Bluezone - Worner - White Sugar - 60x60',
                        'Bluezone - Antique Satvario - White Carving - 120x60',
                        'Bluezone - BZ-1012 - Grey Glossy - 120x60',
                        'Bluezone - Delta - Black - 120x60',
                        'Bluezone  - Filito Rosso - Snow Carving - 120x60',
                        'Bluezone - Istanbul - Argenta Glossy - 120x60',
                        'Bluezone - Istanbul - Steel Glossy - 120x60',
                        'Bluezone - Liverpool - Sky High Glossy - 120x60',
                        'Bluezone - Longines - Pine Glossy - 120x60',
                        'Bluezone - Phantome - White Sugar - 60x60',
                        'Bluezone - Romano Versailles - Natural High Glossy - 120x60',
                        'Bluezone - Stelvio - Davi Grey Carving 120x60 - 120x60',
                        'Bluezone - Supreme Evo - Полированный - 120x60',
                        'Bluezone - Toros - Black Sugar - 60x60',
                        'Colortile - Adrina Smoke - Bianco Satin - 120x60',
                        'Colortile - Evardo - Bianco Base Micro Matt - 120x60',
                        'Colortile - Evardo - Bianco Micro Matt - 120x60',
                        'Colortile - Evardo - Gris Micro Matt - 120x60',
                        'Colortile - Evardo - Nero Micro Matt - 120x60',
                        'Colortile - Evolic Nero - 120x60',
                        'Colortile - Noble - Белый - 60x120',
                        'Colortile - Noble Super White Satin Matt - Белый - 60x120',
                        'Colortile - Onyx Silver - Glossy - 120x60',
                        'Colortile - Onyx Silver - Satin - 60x60',
                        'Colortile - Onyx Bianco - 120x60',
                        'Colortile - Onyx Pearl - 120x60',
                        'Colortile - Onyx Prima Gris - 120x60',
                        'Colortile - Onyx Rich Bianco - 120x60',
                        'Colortile - Onyx Sea Blue - Blue Satin (New) - 120x60',
                        'Colortile - Onyx Sea Blue - Blue Полированный - 120x60',
                        'Colortile - Onyx Sea Blue - Satin   - 60x60',
                        'Colortile - Onyx Ultra - Lush Plus 120x60 - 120x60',
                        'Colortile - Onyx Verde - Verde  полированный- 120x60',
                        'Colortile - Onyx Verde - Verde Satin - 60x60',
                        'Colortile - Opal - Grey Lush Plus - 120x60',
                        'Colortile - Opal - Mint Blue Lush Plus - 120x60',
                        'Colortile - Petra Bianco - Duragrip - 120x60',
                        'Colortile - Petra Bianco - Duragrip - 60x60',
                        'Colortile - Petra Gris - Duragrip - 120x60',
                        'Colortile - Petra Gris - Duragrip - 60x60',
                        'Colortile - Petra Nero - Duragrip - 120x60',
                        'Colortile - Petra Nero - Duragrip - 60x60',
                        'Colortile - Rio - Bianco Carving - 120x60',
                        'Colortile - Soleste - Bianco Rustic Carving - 120x60',
                        'Colortile - Stonella - Dark Shadow - 60x120',
                        'Colortile - Stonella - Ice Crystal - 60x120',
                        'Colortile - Stonella - Smooth Flow - 60x120',
                        'Colortile - Stonella - Steel Grey - 60x120',
                        'Colortile - Supreme White - Glossy - 120x60',
                        'Colortile - Supreme White - Rustic Matt - 120x60',
                        'Colortile - Zibon - Grey Carving - 120x60',
                        'Colortile - Armani - Brown Satin - 60x60',
                        'Colortile - Armani - Camel Satin - 60x60',
                        'Colortile - Awetic - Bianco Glossy - 120x60',
                        'Colortile - Awetic - Nero Glossy - 120x60',
                        'Colortile - Belfino - Silver Mine Lush  - 120x60',
                        'Colortile - Statuario Cromite - Lush 120x60 - 120x60',
                        'Colortile - Thar - Down - 120x60 (Распродажа с 22.01.23)',
                        'Colortile - Thar - Smoke - 120x60 ( Распродажа)',
                        'Colortile - Thar - Wood - 120x60 (Распродажа с 22.01.23)',
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
        $code = 'Rusplitka-Hand-1';
        $video = '';
        $price = '';
        $title = 'Керамогранит Bluezone, Colortile все коллекции';
    @endphp

    @php
        $PackagingType = 'Упаковка';
        $PackageQuantity = '1.44';
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
        <td>{{ $PackagingType }}</td>                               {{-- PackagingType --}}
        <td>{{ $PackageQuantity }}</td>                             {{-- PackageQuantity --}}
    </tr>
{{-----PRIMAVERA-END-HAND----}}

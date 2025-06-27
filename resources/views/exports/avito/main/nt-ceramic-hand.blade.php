{{-----NTCERAMIC-HAND-----}}
    @php
        $GoodsSubType = 'Отделка';
        $FinishingMaterialsType = 'Керамическая плитка и керамогранит';
        $CeramicPorcelainTilesSubType = 'Керамогранит';
        $Brand = 'NT Ceramic';
        $TileType = '';
        $SpaceType = '';
        $InstallationType = 'На пол | На стену';

        $Width = 60;
        $Length = 120;
        $Thickness = 10;
        $Pattern = 'Мрамор';
        $Color = 'Белая';

        $FlooringMaterialsSubType = '';
        $ExteriorFinishingDecorativeStoneSubType = '';
        $WallPanelsSlatsDecorativeElementsSubType = '';
        $MixesType = '';
        $Material = '';
        $OutsideUsage = '';

        $image_main = Storage::disk('images-hand')->url('nt-images/main.jpg');
        $image_1 = Storage::disk('images-hand')->url('nt-images/1.jpg');
        $image_2 = Storage::disk('images-hand')->url('nt-images/2.jpg');
        $image_3 = Storage::disk('images-hand')->url('nt-images/3.jpg');
        $image_4 = Storage::disk('images-hand')->url('nt-images/4.jpg');
        $image_5 = Storage::disk('images-hand')->url('nt-images/5.jpg');


                $image_urls = $image_main . ' | '
                        . $image_1 . ' | '
                        . $image_2 . ' | '
                        . $image_3 . ' | '
                        . $image_4 . ' | '
                        . $image_5;

                    $description = '';

                    if($add_description_first != '') {
                    $description .= '<p>'.nl2br($add_description_first).'</p>';
                    }

                    $description .= '<p>Керамогранит NT Ceramic. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены. Доставка по Москве, cамовывоз на западе Москвы.</p>';
                    $description .= '<p><strong>Керамогранит НТ Керамик все коллекции</strong></p>';
                    $description .= '<p>--------------------</p>';
                    $description .= '<p><strong>Отгрузка с нашего склада осуществляется кратно упаковкам. Минимальный заказ - от 8000 р.</strong></p>';
                    $description .= '<p>--------------------</p>';

                    $vendor_codes = [
                        'AU612NTT9801P 60x120',
                        'BB612NTT9101P 60x120',
                        'BB612NTT9102P 60x120',
                        'BB6NTT910P 60x60',
                        'BB6NTT9101P 60x60',
                        'BB6NTT9102P 60x60',
                        'NTT9106P 60x120',
                        'NTT9107P 60x120',
                        'NTT9109P 60x120',
                        'NTT9111P 60x120',
                        'NTT9118M 60x120',
                        'NTT9119M 60x120',
                        'NTT9120M 60x120',
                        'NTT9121P 60x120',
                        'NTT9122M 60x120',
                        'NTT9125M 60x120',
                        'NTT99600M 60x60',
                        'NTT9960M 60x120',
                        'NTT99601M 60x120',
                        'NTT99602M 60x120',
                        'NTT99603M 60x120',
                        'NTT996040M 60x60',
                        'NTT99604M 60x120',
                        'NTT99610С 60x120',
                        'NTT99611С 60x120',
                        'NTT99703M  80x160',
                        'NTT9114L 60x120',
                        'NTT9115L 60x120',
                        'NTT9116L 60x120',
                        'NTT9117L 60x120',
                        'IS36NTT9042L 30x60',
                        'IS6NTT9044L 60x60',
                        'NTT99612L 60x120',
                        'NTT99613L 60x120',
                        'NTT99614L 60x120',
                        'NTT99615L 60x120',
                        'NTT99616M 60x120',
                        'NTT99617M 60x120',
                        'NTT99618M 60x120',
                        'NTT99508P 60x120',
                        'NTT99509P 60x120',
                        'NTT99514M 60x120',
                        'NTT99522P 60x120',
                        'NTT99523C 60x120',
                        'NS36NTT9024L 30x60',
                        'NS6NTT9024L 60x60',
                        'NTT9401DDG 60x120',
                        'NTT9402DDG 60x120',
                        'NTT9403DDG 60x120',
                        'NTT9404DDG 60x120',
                        'LC36NTT9301M 30x60',
                        'LC36NTT9302M 30x60',
                        'LC36NTT9303M 30x60',
                        'LC6NTT9303M 60x60',
                        'LC6NTT9306M 60x60',
                        'LC6NTT9307M 60x60',
                        'LC6NTT9308M 60x60',
                        'NTT9950P 60x120',
                        'NTT99501P 60x120',
                        'NTT995060M 60x60',
                        'NTT99506P 60x120',
                        'NTT99507P 60x120',
                        'NTT99512M 60x120',
                        'NTT99513M 60x120',
                        'NTT99515M 60x120',
                        'NTT995160M 60x60',
                        'NTT99516M 60x120',
                        'NTT99517M 60x120',
                        'NTT99518M 60x120',
                        'NTT99519M 60x120',
                        'NTT99525P 60x120',
                        'NTT99526M 60x120',
                        'NTT99527С 60x120',
                        'NTT99528P 60x120',
                        'NTT99529P 60x120',
                        'NTT99605M 60x120',
                        'NTT996070M 60x60',
                        'NTT99607M 60x120',
                        'BK126NTT9401P 120x60',
                        'BK126NTT9402P 120x60',
                        'BK126NTT9403P 120x60',
                        'BK6NTT9401P 60x60',
                        'BK6NTT9402P 60x60',
                        'BK6NTT9405P 60x60',
                        'BK6NTT9407P 60x60',
                        'ML612NTT101L 60x120',
                        'NTT99608M 60x120',
                        'NTT99609M 60x120',
                        'BB6NTT9103P 60x60',
                        'NTT99502P 60x120',
                        'NTT995030P 60x60',
                        'NTT99503P 60x120',
                        'NTT99504P 60x120',
                        'NTT99505P 60x120',
                        'NTT99510P 60x120',
                        'NTT995110P 60x60',
                        'NTT99511P 60x120',
                        'NTT99524C 60x120',
                        'PT612NTT1101L 60x120',
                        'PT612NTT1102L 60x120',
                        'PT6NTT1101P 60x60',
                        'PT6NTT1102L 60x60',
                        'MC36NTT902М 30x60',
                        'MC612NTT901М 60x120',
                        'MC612NTT902М 60x120',
                        'MC6NTT901М 60x60',
                        'MC918NTT902М 90x180',
                        'MC918NTT903М 90x180',
                        'NS36NTT9021L 30x60',
                        'NS36NTT9022L 30x60',
                        'NS36NTT9023L 30x60',
                        'NS612NTT9021L 60x120',
                        'NS612NTT9023L 60x120',
                        'NS612NTT9026L 60x120',
                        'NS612NTT9027L 60x120',
                        'NS612NTT9028L 60x120',
                        'NS6NTT9021L 60x60',
                        'NS6NTT9022L 60x60',
                        'NS6NTT9023L 60x60',
                        'NTT99606M 60x120',
                        'TZ612NTT9502L 60x120',
                        'VN612NTT9602P 60x120',
                        'NTT92301M 20x120',
                        'NTT92302M 20x120',
                        'NTT92303M 20x120',
                        'NTT92306M 20x120',
                        'NTT92307M 20x120',
                        'NTT92308M 20x120',
                        'NTT92311M 20x120',
                        'NTT92313M 20x120',
                        'NTT93101M 20x120',
                        'NTT93102M 20x120',
                        'NTT93103M 20x120',
                        'NTT93104M 20x120',
                        'NTT93105M 20x120',
                        'NTT93106M 20x120',
                        'NTT93107M 20x120',
                        'NTT93108M 20x120',
                        'ZS612NTT9702P 60x120',
                        'ZS612NTT9704M 60x120',
                        'ZS6NTT9701M 60x60',
                        'ZS6NTT9703M 60x60',
                        'ZS6NTT9704M 60x60',

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
        $code = 'NT-Ceramic-Hand';
        $video = '';
        $price = '';
        $title = 'NT Ceramic все коллекции';
    @endphp

    @php
        $PackagingType = 'Упаковка';
        $PackageQuantity = '1.44';
    @endphp

    @php
        $AdStatus = 'Free';
        $Delivery = 'Выключена';
        $WeightForDelivery = '';
        $LengthForDelivery = '';
        $HeightForDelivery = '';
        $WidthForDelivery = '';

        $Surface = 'Матовая';
        $Texture = 'Рельефная (структурированная)';
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
    </tr>
{{-----NTCERAMIC-END-HAND----}}

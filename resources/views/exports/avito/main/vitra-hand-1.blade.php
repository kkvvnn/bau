{{-----VITRA-HAND-----}}
    @php

        $image_main = 'https://service-plitka.ru/storage/images/vitra-hand/1.jpg';
        $image_2 = 'https://service-plitka.ru/storage/images/vitra-hand/2.jpg';
        $image_3 = 'https://service-plitka.ru/storage/images/vitra-hand/3.jpg';


                $image_urls = $image_main . ' | ' . $image_2  . ' | ' . $image_3;

                    $description = '';

                    if($add_description_first != '') {
                    $description .= '<p>'.nl2br($add_description_first).'</p>';
                    }

                    $description .= '<p>Керамогранит VITRA Витра. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены. Доставка по Москве, cамовывоз на западе Москвы.</p>';
                    $description .= '<p><strong>Керамогранит Vitra все коллекции - 1</strong></p>';

                    $description .= '<p>--------------------</p>';
                    $description .= '<p><strong>&#128165; Скидки от объема &#128165;</strong></p>';
                    $description .= '<p><strong>Под каждый проект действуют индивидуальные условия предоставления скидки, обращайтесь в чат к менеджеру для рассчета.</strong></p>';
                    $description .= '<p><strong>Отгрузка с нашего склада осуществляется кратно упаковкам. Минимальный заказ - от 8000 р. Скидка рассчитывается индивидуально.</strong></p>';
                    $description .= '<p>--------------------</p>';

                    $vitra = [
                        'K947899R0001VTER ArcticStone Кремовый МатR10A 60x120',
                        'K947899R0001VTSP ArcticStone Кремовый МатR10A 60x120',
                        'K947902R0001VTET ArcticStone Кремовый МатR10A 60x60',
                        'K947897R0001VTER ArcticStone Серый МатR10A 60x120',
                        'K947897R0001VTSP ArcticStone Серый МатR10A 60x120',
                        'K947900R0001VTET ArcticStone Серый МатR10A 60x60',
                        'K948672R0001VTER ArdeStone Белый МатR10A 60x120',
                        'K948673R0001VTER ArdeStone Песочный МатR10A 60x120',
                        'K948700R0001VTER ArdeStone Серый МатR10A 60x120',
                        'K946242R0001VTEB Aspenwood Бежевый МатR10A 20x120',
                        'K945695R0001VTEB Aspenwood Венге МатR10A 20x120',
                        'K945695R0001VTE0 Aspenwood Венге МатR10A 20х120',
                        'K946243R0001VTEB Aspenwood Вишня МатR10A 20x120',
                        'K945696R0001VTEP Aspenwood Норковый МатR10A 20x120',
                        'K945696R0001VTEB Aspenwood Норковый МатR10A 20x120',
                        'K945693R0001VTEB Aspenwood Серый МатR10A 20x120',
                        'K945693R0001VTE0 Aspenwood Серый МатR10A 20х120',
                        'K949751LPR01VTER Beton-X светлый LPR 60X120',
                        'K949765LPR01VTE0 Beton-X светлый LPR 60X60',
                        'K949765LPR01VTET Beton-X светлый LPR 60X60',
                        'K948554R0001VTER CementBase Белый МатR10A 60x120',
                        'K948555R0001VTER CementBase Песочный МатR10A 60x120',
                        'K948556R0001VTER CementBase Св.Серый МатR10A 60x120',
                        'K948557R0001VTER CementBase Серый МатR10A 60x120',
                        'K951846LPR01VTEP CityMarble амазония мультиколор LPR 60x120',
                        'K951846LPR01VTER CityMarble амазония мультиколор LPR 60x120',
                        'K951839LPR01VTET CityMarble амазония мультиколор LPR 60x60',
                        'K951845LPR01VTER CityMarble калакатта блэк LPR 60x120',
                        'K951838LPR01VTET CityMarble калакатта блэк LPR 60x60',
                        'K951844LPR01VTER CityMarble статуарио венато LPR 60x120',
                        'K951837LPR01VTE0 CityMarble статуарио венато LPR 60x60',
                        'K951837LPR01VTEP CityMarble статуарио венато LPR 60x60',
                        'K951837LPR01VTET CityMarble статуарио венато LPR 60x60',
                        'K951848R0001VTER CityStone травертин клауд 60x120',
                        'K951848R0001VTSP CityStone травертин клауд 60x120',
                        'K951841R0001VTET CityStone травертин клауд 60x60',
                        'K951847R0001VTSP CityStone травертин линейный Крем 60x120',
                        'K951840R0001VTE0 CityStone травертин линейный Крем 60x60',
                        'K951840R0001VTET CityStone травертин линейный Крем 60x60',
                        'K951849R0001VTER CityStone чеппо мультиколор 60x120',
                        'K951842R0001VTE0 CityStone чеппо мультиколор 60x60',
                        'K951842R0001VTET CityStone чеппо мультиколор 60x60',
                        'K947903R0001VTEB CraftWood Медовый МатR10A 20x120',
                        'K947904R0001VTEB CraftWood Тауп МатR10A 20x120',
                        'K947894R0001VTER FlakeCement Кремовый МатR10A 60x120',
                        'K947894R0001VTSP FlakeCement Кремовый МатR10A 60x120',
                        'K947896R0001VTET FlakeCement Кремовый МатR10A 60x60',
                        'K947893R0001VTER FlakeCement Серый МатR10A 60x120',
                        'K947893R0001VTSP FlakeCement Серый МатR10A 60x120',
                        'K947895R0001VTET FlakeCement Серый МатR10A 60x60',
                        'K948125R0001VTEB LucidWood Венге 20x120',
                        'K948123R0001VTEB LucidWood Тауп 20x120',
                        'K948124R0001VTEB LucidWood Темно-серый 20x120',
                        'K949750LPR01VTEP Marble-X Аугустос тауп LPR 60x120',
                        'K949750LPR01VTER Marble-X Аугустос тауп LPR 60x120',
                        'K949747LPR01VTER Marble-X Бреча капрайа белый LPR 60x120',
                        'K949761LPR01VTE0 Marble-X Бреча Капрайа Белый Лаппато Рект 60x60',
                        'K949761LPR01VTEP Marble-X Бреча Капрайа Белый Лаппато Рект 60x60',
                        'K949761LPR01VTET Marble-X Бреча Капрайа Белый Лаппато Рект 60x60',
                        'K948091LPR01VTER MarbleS Аляска 60x120',
                        'K948085LPR01VTER MarbleS Бреча Белый 60x120',
                        'K948087LPR01VTER MarbleS Бреча Черный 60x120',
                        'K948093LPR01VTER MarbleS Оникс Кристал 60x120',
                        'K948090LPR01VTER MarbleS Перла Кремовый 60x120',
                        'K948089LPR01VTER MarbleS Порт Лорен 60x120',
                        'K948088LPR01VTER MarbleS Сан Лорен 60x120',
                        'K948086LPR01VTER MarbleS Тундра Серый 60x120',
                        'K948092LPR01VTER MarbleS Эмперадор Коричневый 60x120',
                        'K948094LPR01VTER MarbleS Эмперадор Кремовый 60x120',
                        'K951332LPR01VTEP Marbleset Арабескато норковый LPR 60x120',
                        'K951332LPR01VTER Marbleset Арабескато норковый LPR 60x120',
                        'K951303LPR01VTEP Marbleset Арабескато норковый LPR 60x60',
                        'K951330LPR01VTEP MarbleSet Венато cветло-серый LPR 60X120',
                        'K951333LPR01VTER Marbleset Оробико темн.греж LPR 60x120',
                        'K951304LPR01VTET Marbleset Оробико темн.греж LPR 60x60',
                        'K946537LPR01VTE0 Marmori каррара белый 60x60',
                        'K9465768LPR1VTE0 Marmori мозаичный микс 30x30',
                        'K945338LPR01VTE0 Marmori С.Лорен черный 30x60',
                        'K951327LPR01VTER Marmostone норковый LPR 60X120',
                        'K951325LPR01VTER Marmostone светло-серый LPR 60X120',
                        'K951293LPR01VTEP Marmostone светло-серый LPR 60X60',
                        'K951293LPR01VTET Marmostone светло-серый LPR 60X60',


                    ];


                    $description .= '<ul>';

                    foreach ($vitra as $v) {
                        $description .= '<li> ' . $v . ' </li>';
                    }

                    $description .= '</ul><br>';


                    $description .= '<p>Наличие а также актуальные цены уточняйте у менеджера.</p>';
                    $description .= '<p>В нашем шоуруме представлены коллекции многих других известных производителей керамогранита, керамической плитки, мозаики и других напольных покрытий (ламинат, паркет, кварцвинил, инженерная доска и др.)</p>';
                    $description .= '<p>Работаем с розничными и оптовыми покупателями. А так же предлагаем сотрудничество дизайнерам и строительным компаниям.</p>';

                    if($add_description != '') {
                        $description .= '<p>'.nl2br($add_description).'</p>';
                    }

                    $description .= '<p>____________________</p>';
                    $description .= '<p><em>турецкий керамогранит турецкая плитка керамогранит витра керамогранит vitra керамогранит турция керамогранит со скидкой керамогранит купить керамогранит москва керамика</em></p>';
    @endphp

    @php
        $code = 'vitra-hand-1';
        $video = '';
        $price = '';
        $title = 'Керамогранит Vitra все коллекции - 1';
    @endphp

    @php
        $PackagingType = 'Упаковка';
        $PackageQuantity = '1.44';
    @endphp

    @php

        $GoodsSubType = 'Отделка';
        $FinishingMaterialsType = 'Керамическая плитка и керамогранит';
        $CeramicPorcelainTilesSubType = 'Керамогранит';
        $Brand = 'Vitra';
        $TileType = '';
        $SpaceType = '';
        $InstallationType = 'На пол | На стену';

        $Width = 60;
        $Length = 120;
        $Thickness = 10;
        $Pattern = 'Мрамор';
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

        $Surface = 'Лаппатированная (полуполированная)';
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
    <td></td>                                               {{-- ProductType --}}
    <td></td>                                               {{-- ProductSubType --}}
    <td>{{ $ColorName }}</td>                               {{-- ColorName --}}
    <td>{{ $TargetAudience }}</td>                          {{-- TargetAudience --}}
</tr>
{{-----VITRA-END-HAND----}}

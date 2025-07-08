{{-----VITRA-HAND-----}}
    @php

        $image_main = 'https://service-plitka.ru/storage/images/vitra-hand/4.jpg';
        $image_2 = 'https://service-plitka.ru/storage/images/vitra-hand/5.jpg';
        $image_3 = 'https://service-plitka.ru/storage/images/vitra-hand/6.jpg';


                $image_urls = $image_main . ' | ' . $image_2  . ' | ' . $image_3;

                    $description = '';

                    if($add_description_first != '') {
                    $description .= '<p>'.nl2br($add_description_first).'</p>';
                    }

                    $description .= '<p>Керамогранит VITRA Витра. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены. Доставка по Москве, cамовывоз на западе Москвы.</p>';
                    $description .= '<p><strong>Керамогранит Vitra все коллекции - 2</strong></p>';

                    $description .= '<p>--------------------</p>';
                    $description .= '<p><strong>&#128165; Скидки от объема &#128165;</strong></p>';
                    $description .= '<p><strong>Под каждый проект действуют индивидуальные условия предоставления скидки, обращайтесь в чат к менеджеру для рассчета.</strong></p>';
                    $description .= '<p><strong>Отгрузка с нашего склада осуществляется кратно упаковкам. Минимальный заказ - от 8000 р. Скидка рассчитывается индивидуально.</strong></p>';
                    $description .= '<p>--------------------</p>';

                    $vitra_2 = [
                        'K947810R0001VTER MicroCement Кремовый МатR10A 60x120',
                        'K947810R0001VTSP MicroCement Кремовый МатR10A 60x120',
                        'K947914R0001VTET MicroCement Кремовый МатR10A 60x60',
                        'K947891R0001VTER MicroCement Светло-серый МатR10A 60x120',
                        'K947891R0001VTSP MicroCement Светло-серый МатR10A 60x120',
                        'K947813R0001VTET MicroCement Светло-серый МатR10A 60x60',
                        'K947811R0001VTER MicroCement Светлый Греж МатR10A 60x120',
                        'K947811R0001VTSP MicroCement Светлый Греж МатR10A 60x120',
                        'K947892R0001VTET MicroCement Светлый Греж МатR10A 60x60',
                        'K947806R0001VTSP MicroCement Серый МатR10A 60x120',
                        'K947812R0001VTET MicroCement Серый МатR10A 60x60',
                        'K947907R0001VTEB OakWood Бежевый МатR10A 20x120',
                        'K947908R0001VTEB OakWood Греж МатR10A 20x120',
                        'K952408R0001VTET OriginWood Беж МатR10A 20x80',
                        'K952409R0001VTET OriginWood Орех МатR10A 20x80',
                        'K952407R0001VTET OriginWood С.Беж МатR10A 20x80',
                        'K952407R0001VTE0 OriginWood С.Беж МатR10A 7Р 20x80',
                        'K952412R0001VTET OriginWood С.Греж МатR10A 20x80',
                        'K952413R0001VTET OriginWood Тауп МатR10A 20x80',
                        'K948040R0001VTSP Quarstone антрацит 60x120',
                        'K948044R0001VTET Quarstone антрацит 60x60',
                        'K948038R0001VTSP Quarstone бежевый 60x120',
                        'K948038R0001VTER Quarstone бежевый 60x120',
                        'K948042R0001VTET Quarstone бежевый 60x60',
                        'K948037R0001VTSP Quarstone белый 60x120',
                        'K948037R0001VTER Quarstone белый 60x120',
                        'K951809R0001VTE0 Quarstone белый 60x60',
                        'K948041R0001VTET Quarstone белый 60x60',
                        'K951843R0001VTET Quarstone декор пэчворк 60x60',
                        'K951850R0001VTER Quarstone декоративный фон 60x120',
                        'K948039R0001VTSP Quarstone серый 60x120',
                        'K948043R0001VTET Quarstone серый 60x60',
                        'K948108R0001VTER Rigato Декор Антрацит 60x120',
                        'K948106R0001VTER Rigato Декор Кремовый 60x120',
                        'K948105R0001VTER Rigato Декор Серый 60x120',
                        'K948107R0001VTER Rigato Декор Табачный 60x120',
                        'K952399R0001VTET RoyalWood Беж МатR10A 20x80',
                        'K952399R0001VTE0 RoyalWood Беж МатR10A 7Р 20x80',
                        'K952405R0001VTET RoyalWood Венге МатR10A 20x80',
                        'K952398R0001VTET RoyalWood Крем МатR10A 20x80',
                        'K952400R0001VTET RoyalWood Медовый МатR10A 20x80',
                        'K952401R0001VTET RoyalWood Орех МатR10A 20x80',
                        'K952414R0001VTET RusticWood Белый Мат R10A 7Р 20x80',
                        'K952417R0001VTET RusticWood Черный МатR10A 7Р 20x80',
                        'K948597R0001VTER SandStone Белый МатR10A 60x120',
                        'K948598R0001VTER SandStone Песочный МатR10A 60x120',
                        'K948634R0001VTER SandStone Серый МатR10A 60x120',
                        'K947780R0001VTER SilkMarble Бреча Серый МатR9 60x120',
                        'K947780R0001VTSP SilkMarble Бреча Серый МатR9 60x120',
                        'K947791R0001VTET SilkMarble Бреча Серый МатR9 60x60',
                        'K951682R0001VTEP SilkMarble Калакатта Оро МатR9 60x120',
                        'K951682R0001VTSP SilkMarble Калакатта Оро МатR9 60x120',
                        'K947789R0001VTET SilkMarble Калакатта Оро МатR9 60x60',
                        'K947783R0001VTER SilkMarble Марфим Кремовый МатR9 60x120',
                        'K947783R0001VTSP SilkMarble Марфим Кремовый МатR9 60x120',
                        'K947792R0001VTET SilkMarble Марфим Кремовый МатR9 60x60',
                        'K950299R0001VTSP SilkMarble Порто Неро МатR9 60x120',
                        'K947790R0001VTET SilkMarble Порто Неро МатR9 60x60',
                        'K948701R0001VTER SoftCeppo Песочный МатR10A 60x120',
                        'K948702R0001VTER SoftCeppo Серый МатR10A 60x120',
                        'K952392R0001VTET SoftWood Бежевый МатR10A 20x80',
                        'K952397R0001VTET SoftWood Греж МатR10A 20x80',
                        'K952372R0001VTET SoftWood Крем МатR10A 20x80',
                        'K952393R0001VTET SoftWood С.Греж МатR10A 20x80',
                        'K952394R0001VTET SoftWood С.Серый МатR10A 20x80',
                        'K952394R0001VTE0 SoftWood С.Серый МатR10A 7Р 20x80',
                        'K952396R0001VTET SoftWood Серебрист МатR10A 20x80',
                        'K952395R0001VTET SoftWood Т.Серый МатR10A 20x80',
                        'K952371R0001VTET SoftWood Тепл Бел МатR10A 20x80',
                        'K948095R0001VTER StoneS Боргония Клауд Серый 60x120',
                        'K948096R0001VTER StoneS Боргония Линейный Серый 60x120',
                        'K948103R0001VTER StoneS ДекоТравертин Рoccо 60x120',
                        'K948104R0001VTER StoneS ДекоТравертин Сильвер 60x120',
                        'K948102R0001VTER StoneS Пьетра Рома Антрацит 60x120',
                        'K948101R0001VTER StoneS Пьетра Рома Табачный 60x120',
                        'K948100R0001VTER StoneS Терра Антрацит 60x120',
                        'K948098R0001VTER StoneS Терра Кремовый 60x120',
                        'K948099R0001VTER StoneS Терра Табачный 60x120',
                        'K948097R0001VTER StoneS Чеппо Ди Гре Серый 60x120',
                        'K948121R0001VTEB VividWood Дуб 20x120',
                        'K948122R0001VTEB VividWood Светло-серый 20x120',
                        'K948120R0001VTEB VividWood Светлый Дуб 20x120',
                        'K947905R0001VTEB Walnut Бежевый МатR10A 20x120',
                        'K947906R0001VTEP Walnut Венге МатR10A 20x120',
                        'K947906R0001VTEB Walnut Венге МатR10A 20x120',
                        'K949582R0001VTE0 Wood-X Орех Беленый МатR10A 20x120',
                        'K949582R0001VTEB Wood-X Орех Беленый МатR10A 20x120',
                        'K949583R0001VTEB Wood-X Орех Голд Терра МатR10A 20x120',
                        'K949581R0001VTEP Wood-X Орех Кремовый МатR10A 20x120',
                        'K949581R0001VTEB Wood-X Орех Кремовый МатR10A 20x120',
                        'K949584R0001VTE0 Wood-X Орех Тауп МатR10A 20x120',
                        'K949584R0001VTEB Wood-X Орех Тауп МатR10A 20x120',
                    ];


                    $description .= '<ul>';

                    foreach ($vitra_2 as $v) {
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
        $code = 'vitra-hand-2';
        $video = '';
        $price = '';
        $title = 'Керамогранит Vitra все коллекции - 2';
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
        $Color = 'Чёрная';

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
</tr>
{{-----VITRA-END-HAND----}}

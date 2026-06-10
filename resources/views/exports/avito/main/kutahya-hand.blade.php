{{-----KUTAHYA-HAND-----}}
    @php

        $image_main = 'https://service-plitka.ru/storage/images/kutahya-hand/1.jpg';
        $image_2 = 'https://service-plitka.ru/storage/images/kutahya-hand/2.jpg';
        $image_3 = 'https://service-plitka.ru/storage/images/kutahya-hand/3.jpg';
        $image_4 = 'https://service-plitka.ru/storage/images/kutahya-hand/4.jpg';
        $image_5 = 'https://service-plitka.ru/storage/images/kutahya-hand/5.jpg';
        $image_6 = 'https://service-plitka.ru/storage/images/kutahya-hand/6.jpg';


                $image_urls = $image_main . ' | ' . $image_2  . ' | ' . $image_3  . ' | ' . $image_4  . ' | ' . $image_5  . ' | ' . $image_6;

                    $description = '';

                    if($add_description_first != '') {
                    $description .= '<p>'.nl2br($add_description_first).'</p>';
                    }

                    $description .= '<p>Керамогранит NG KUTAHYA USAK SERAMIK. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены. Доставка по Москве, cамовывоз на западе Москвы.</p>';
                    $description .= '<p><strong>Керамогранит Kutahya Usak все коллекции</strong></p>';

                    $description .= '<p>--------------------</p>';
                    $description .= '<p><strong>&#128165; Скидки от объема &#128165;</strong></p>';
                    $description .= '<p><strong>Под каждый проект действуют индивидуальные условия предоставления скидки, обращайтесь в чат к менеджеру для рассчета.</strong></p>';
                    $description .= '<p><strong>Отгрузка с нашего склада осуществляется кратно упаковкам. Минимальный заказ - от 8000 р. Скидка рассчитывается индивидуально.</strong></p>';
                    $description .= '<p>--------------------</p>';

                    $kutahya = [
                        'BLACK CALACATTA KRISTAL RPN',
                        'BLUETTA  POLISHED PORCELAIN TILE',
                        'DAMASEN KUM DDG REKTIFIYE',
                        'DAMASEN MARINE DDG REKTIFIYE',
                        'GEMSTONE ANTRASITE LAPPATO PORCELAIN TILE',
                        'GEMSTONE DARK GREY LAPPATO PORCELAIN TILE',
                        'KALSEDON REKTIFIYE PARLAK NANO',
                        'KEOPS LATTE MAT REKTIFIYE',
                        'KEOPS LATTE REKTIFIYE PARLAK NANO',
                        'KEOPS MOCHA REKTIFIYE PARLAK NANO',
                        'LOGAN ANTRASIT REKTIFIYE',
                        'LOGAN BONE REKTIFIYE',
                        'MAREA DARK GREY REKTIFIYE PARLAK NANO',
                        'MAREA WHITE REKTIFIYE PARLAK NANO',
                        'MERIT REKTIFIYE LAPPATO',
                        'NORDIC WOOD REKTIFIYE',
                        'NOX BLACK CRISTAL POLISHED PORCELAIN',
                        'NOX WHITE CRISTAL POLISHED PORCELAIN',
                        'ONELYA BEYAZ REKTIFIYE PARLAK NANO',
                        'ONELYA WHITE NANO POLISHED PORCELAIN TILE',
                        'ONELYA WHITE POLISHED PORCELAIN TILE',
                        'ONIKS WHITE REKTIFIYE PARLAK NANO',
                        'OPAL BONE REKTIFIYE GLOSYY NANO',
                        'POMPEI ANTRASIT REKTIFIYE LAPPATO',
                        'POMPEI GREY REKTIFIYE LAPPATO',
                        'PULPIS PRIME DARK GREY RECTIFIYE PARLAK NANO',
                        'PULPIS PRIME LIGHT GREY RPN',
                        'REGNUM DF REKTIFIYE',
                        'ROYAL CALACATTA REKTIFIYE PARLAK NANO',
                        'SIERRA GRAFIT MAT REKTIFIYE',
                        'SIERRA GRI MAT REKTIFIYE',
                        'SIERRA VIZON MAT REKTIFIYE',
                        'SPAZIO GREY MATT PORCELAIN TILE',
                        'STATUARIO MAT REKTIFIYE',
                        'STATUARIO REKTIFIYE PARLAK NANO',
                        'TERRA STONE GREY Rectified LAPPATO',
                        'TERRA STONE MOCHA  Rectified MATT',
                        'VISTA ANTRASIT REKTIFIYE',
                        'VISTA BONE REKTIFIYE',
                        'VISTA FUME REKTIFIYE',
                        'VISTA GREY REKTIFIYE',
                        'VISTA GRI REKTIFIYE',
                    ];

                    $usak = [
                        'ASCOT ANTRACITE MATT',
                        'ASCOT BEIGE MATT',
                        'ASCOT GREY MATT',
                        'BALI BROWN MATT',
                        'BELEK BONE GRANULED',
                        'BODRUM BEIGE MATT',
                        'BODRUM BONE MATT',
                        'BODRUM DARK MATT',
                        'BODRUM SILVER MATT',
                        'BOLOGNA BEIGE ANTISLIP',
                        'BOLOGNA SILVER ANTISLIP',
                        'CARRARA MATT',
                        'CARRARA POLISHED',
                        'FRANKFURT POLISHED',
                        'HELSINKI POLISHED',
                        'JUMANAH MATT',
                        'LUXURY BLACK GRANULED TECHNICAL',
                        'MANAVGAT ANTRACITE  POLISHED',
                        'MANAVGAT BONE  POLISHED',
                        'MANAVGAT MOCHA  POLISHED',
                        'NEW ONICE WHITE POLISHED',
                        'OLD WOOD BROWN MATT TECHNICAL',
                        'PULPIS BONE MATT',
                        'PULPIS BONE POLISHED',
                        'PULPIS DARK GREY  POLISHED',
                        'SWINDON BEIGE POLISHED',
                        'SWINDON BLACK  POLISHED',
                        'SWINDON GREY  POLISHED',
                        'SWINDON MOCHA  POLISHED',
                        'TITAN ANTRACITE MATT',
                        'TITAN BLACK MATT',
                        'TITAN BONE MATT',
                        'TITAN GREY MATT',
                        'TORONTO BLACK GRANULED (SUGAR)',
                        'VENICE WHITE GRANULED',
                        'VERA  MATT',
                        'VERA  MATT',
                    ];

                    $description .= '<ul>';

                    foreach ($kutahya as $k) {
                        $description .= '<li>KUTAHYA ' . $k . ' 60x120</li>';
                    }

                    foreach ($usak as $u) {
                        $description .= '<li>USAK SERAMIK ' . $u . ' 60x120</li>';
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

                    $description .= '<p>____________________</p>';
                    $description .= '<p><em>турецкий керамогранит турецкая плитка керамогранит кутахья керамогранит кутахия керамогранит юсак турция керамогранит со скидкой керамогранит купить керамогранит москва керамика</em></p>';
    @endphp

    @php
        $code = 'Kutahya-usak-Hand';
        $video = $custom_video;
        $price = '1590';
        $title = 'Керамогранит NG KUTAHYA SERAMIK USAK SERAMIK Турция';
    @endphp

    @php
        $PackagingType = 'Упаковка';
        $PackageQuantity = '2.16';
    @endphp

    @php

        $GoodsSubType = 'Отделка';
        $FinishingMaterialsType = 'Керамическая плитка и керамогранит';
        $CeramicPorcelainTilesSubType = 'Керамогранит';
        $Brand = 'Kutahya';
        $TileType = '';
        $SpaceType = '';
        $InstallationType = 'На пол | На стену';

        $Width = 60;
        $Length = 120;
        $Thickness = 10;
        $Pattern = 'Мрамор';
        $Color = 'Белая';
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
{{-----KUTAHYA-END-HAND----}}

{{-----ALPINFLOOR-SPC-HAND-----}}
    @php

        $image_main = Storage::disk('images-hand')->url('alpinefloor/spc-1.png');
//        $image_2 = Storage::disk('images-hand')->url('aquafloor/2.jpg');
//        $image_3 = Storage::disk('images-hand')->url('aquafloor/3.jpg');
//        $image_4 = Storage::disk('images-hand')->url('aquafloor/4.jpg');
//        $image_5 = Storage::disk('images-hand')->url('aquafloor/5.jpg');
//        $image_7 = Storage::disk('images-hand')->url('aquafloor/7.jpg');
//        $image_8 = Storage::disk('images-hand')->url('aquafloor/8.jpg');
//        $image_9 = Storage::disk('images-hand')->url('aquafloor/9.jpg');
//        $image_10 = Storage::disk('images-hand')->url('aquafloor/10.jpg');


                $image_urls = $image_main;
//                        . ' | ' . $image_2
//                        . ' | ' . $image_3
//                        . ' | ' . $image_4
//                        . ' | ' . $image_5
//                        . ' | ' . $image_7
//                        . ' | ' . $image_8
//                        . ' | ' . $image_9
//                        . ' | ' . $image_10;

                    $description = '';

                    if($add_description_first != '') {
                    $description .= '<p>'.nl2br($add_description_first).'</p>';
                    }

                    $description .= '<p>SPC ламинат Alpine Floor, Альпин Флор. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены. Доставка по Москве, cамовывоз на западе Москвы.</p>';
                    $description .= '<p><strong>Кварц-винил Alpine Floor все коллекции - 2.</strong></p>';


                    $description .= '<p>--------------------</p>';
                    $description .= '<p><strong>&#128165; Скидки от объема &#128165;</strong></p>';
                    $description .= '<p><strong>Под каждый проект действуют индивидуальные условия предоставления скидки, обращайтесь в чат к менеджеру для рассчета.</strong></p>';
                    $description .= '<p><strong>Отгрузка с нашего склада осуществляется кратно упаковкам. Минимальный заказ - от 10000 р. Скидка рассчитывается индивидуально.</strong></p>';
                    $description .= '<p>--------------------</p>';

                    $vendor_codes = [
                        'Дуб Антарес ЕСО 13-19 MC',
                        'Дуб Лейтена ЕСО 13-18 MC',
                        'Дуб Синистра ЕСО 13-17 MC',
                        'Дуб Фафнир ЕСО 13-16 MC',
                        'Дуб Исида ЕСО 13-15 MC',
                        'Дуб Адара ЕСО 13-14 MC',
                        'Дуб Мерга ЕСО 13-13 MC',
                        'Дуб Альхена ЕСО 13-12 MC',
                        'СНЕЖНЫЙ ЕСО 13-11 MC',
                        'МАКАДАМИЯ ЕСО 13-10 MC',
                        'ГОЛУБОЙ ЛЕС ЕСО 13-9 MC',
                        'ВЕНГЕ ГРЕЙ ЕСО 13-8 MC',
                        'ДУБ НАСЫЩЕННЫЙ ЕСО 13-7 MC',
                        'ЗИМНИЙ ЛЕС ЕСО 13-6 MC',
                        'ДУБ НАТУРАЛЬНЫЙ ОТБЕЛЕННЫЙ ЕСО 13-5 MC',
                        'ДУБ АРКТИК ЕСО 13-4 MC',
                        'ДУБ ROYAL ЕСО 13-2 MC',
                        'ДУБ ВАНИЛЬ СЕЛЕКТ ЕСО 13-3 MC',
                        'Дуб Алиот ЕСО 13-23 MC',
                        'ГРАНД СЕКВОЙЯ ШЕРМАН ECO 11-33 MC',
                        'ГРАНД СЕКВОЙЯ ГРАНД ECO 11-32 MC',
                        'ГРАНД СЕКВОЙЯ СЬЕРРА ECO 11-31 MC',
                        'ГРАНД СЕКВОЙЯ ТАКСОДИУМ ECO 11-30 MC',
                        'ГРАНД СЕКВОЙЯ НИДЛЕС ECO 11-29 MC',
                        'ГРАНД СЕКВОЙЯ ПАЙНИ ECO 11-28 MC',
                        'ГРАНД СЕКВОЙЯ МЕТА ECO 11-27 MC',
                        'ГРАНД СЕКВОЙЯ КИПАРИСОВАЯ ECO 11-26 MC',
                        'ГРАНД СЕКВОЙЯ ГИПЕРИОН ECO 11-25 MC',
                        'ГРАНД СЕКВОЙЯ ГИГАНТУМ ECO 11-24 MC',
                        'ГРАНД СЕКВОЙЯ АДЕНДРОН ECO 11-23 MC',
                        'ГРАНД СЕКВОЙЯ САГАНО ECO 11-22 MC',
                        'ГРАНД СЕКВОЙЯ ИНИО ECO 11-21 MC',
                        'ГРАНД СЕКВОЙЯ КАДДО ECO 11-20 MC',
                        'ГРАНД СЕКВОЙЯ ВАЙПУА ECO 11-19 MC',
                        'ГРАНД СЕКВОЙЯ ШВАРЦЕВАЛЬД ECO 11-18 MC',
                        'ГРАНД СЕКВОЙЯ НЕГАРА ECO 11-17 MC',
                        'ГРАНД СЕКВОЙЯ ГОРБЕА ECO 11-16 MC',
                        'ГРАНД СЕКВОЙЯ КЛАУД ECO 11-15 MC',
                        'ГРАНД СЕКВОЙЯ КАУНДА ECO 11-14 MC',
                        'ГРАНД СЕКВОЙЯ КВЕБЕК ECO 11-13 MC',
                        'ГРАНД СЕКВОЙЯ ДЕЙНТРИ ECO 11-12 MC',
                        'ГРАНД СЕКВОЙЯ МАСЛИНА ECO 11-11 MC',
                        'ГРАНД СЕКВОЙЯ МАКАДАМИЯ ECO 11-10 MC',
                        'ГРАНД СЕКВОЙЯ КАРИТЕ ECO 11-9 MC',
                        'ГРАНД СЕКВОЙЯ ВЕНГЕ ГРЕЙ ECO 11-8 MC',
                        'ГРАНД СЕКВОЙЯ ГЕВУИНА ECO 11-7 MC',
                        'ГРАНД СЕКВОЙЯ МИНДАЛЬ ECO 11-6 MC',
                        'ГРАНД СЕКВОЙЯ КАМФОРА ECO 11-5 MC',
                        'ГРАНД СЕКВОЙЯ ЛАВР ECO 11-4 MC',
                        'ГРАНД СЕКВОЙЯ СОНОМА ECO 11-3 MC',
                        'ГРАНД СЕКВОЙЯ АТЛАНТА ECO 11-2 MC',
                        'ГРАНД СЕКВОЙЯ ЭВКАЛИПТ ECO 11-1 MC',
                        'Тихий лес ЕСО 9-13 MC',
                        'Баварский лес ЕСО 9-12 MC',
                        'Редвуд ECO 9-11 MC',
                        'Шервудский лес ECO 9-10 MC',
                        'Белый лес ECO 9-9 MC',
                        'Голубой лес ECO 9-8 MC',
                        'Зимний лес ECO 9-5 MC',
                        'Туманный лес ECO 9-4 MC',
                        'Бурый лес ECO 9-3 MC',
                        'Канадский лес ECO 9-2 MC',
                        'Норвежский лес ECO 9-1 MC',
                        'Дуб Кливио ABA ECO 7-33 MC',
                        'Дуб Марко ABA ECO 7-32 MC',
                        'Дуб Эниф ABA ECO 7-31 MC',
                        'Дуб Сириус ABA ECO 7-30 MC',
                        'Дуб Вега ABA ECO 7-29 MC',
                        'Дуб Мориа ABA ECO 7-28 MC',
                        'Дуб Майя ABA ECO 7-27 MC',
                        'Дуб Франц ABA ECO 7-26 MC',
                        'Дуб Фелис ABA ECO 7-25 MC',
                        'Дуб Эльнат ABA ECO 7-24 MC',
                        'Дуб Дия ABA ECO 7-23 MC',
                        'Дуб серебряный ABA ECO 7-22 MC',
                        'Дуб морская пена ABA ECO 7-21 MC',
                        'Дуб персиковый ABA ECO 7-20 MC',
                        'Дуб сливочный ABA ECO 7-19 MC',
                        'Дуб шоколадный ABA ECO 7-18 MC',
                        'Дуб слоновая кость ABA ECO 7-17 MC',
                        'Дуб медовый ABA ECO 7-16 MC',
                        'Дуб состаренный ABA ECO 7-15 MC',
                        'Дуб платина ABA ECO 7-14 MC',
                        'Дуб млечный ABA ECO 7-13 MC',
                        'Дуб капучино ABA ECO 7-12 MC',
                        'Дуб коричневый ABA ECO 7-9 MC',
                        'Дуб торфяной ECO 7-11 MC',
                        'Дуб песчаный ECO 7-10 MC',
                        'Дуб гранит ABA ECO 7-8 MC',
                        'Дуб Насыщенный ABA ECO 7-7 MC',
                        'Дуб Природный Изысканный ABA ECO 7-6 MC',
                        'Дуб Натуральный Отбеленный ABA ECO 7-5 MC',
                        'Дуб Грей Дождливый ABA ECO 7-4 MC',
                        'Северная История ABA ECO 7-3 MC',
                        'Дуб Белая ночь ABA ECO 7-2 MC',
                        'Дуб Фантазия ABA ECO 7-1 MC',
                        'Санди ЕСО 4-32 MC',
                        'Гранти ЕСО 4-31 MC',
                        'Рок ЕСО 4-30 MC',
                        'Сторм ЕСО 4-29 MC',
                        'Гермес ЕСО 4-28 MC',
                        'Неро ЕСО 4-27 MC',
                        'Вилио ЕСО 4-26 MC',
                        'Делмар ЕСО 4-25 MC',
                        'Элдгея (без подложки) ЕСО 4-16 MC',
                        'Шеффилд (без подложки) ECO 4-13 MC',
                        'Чили (без подложки) ЕСО 4-19 MC',
                        'Хэмпшир (без подложки) ECO 4-9 MC',
                        'Сумидеро (без подложки) ЕСО 4-18 MC',
                        'Самерсет (без подложки) ЕСО 4-2 MC',
                        'Ройал (без подложки) ЕСО 4-21 MC',
                        'Ричмонд (без подложки) ЕСО 4-1 MC',
                        'Ратленд (без подложки) ECO 4-6 MC',
                        'Майдес (без подложки) ЕСО 4-23 MC',
                        'Ларнака (без подложки) ECO 4-11 MC',
                        'Корнуолл (без подложки) ECO 4-10 MC',
                        'Зион (без подложки) ЕСО 4-24 MC',
                        'Дорсет (без подложки) ECO 4-7 MC',
                        'Девон (без подложки) ECO 4-12 MC',
                        'Гранд Каньон (без подложки) ЕСО 4-22 MC',
                        'Вердон (без подложки) ЕСО 4-17 MC',
                        'Ваймеа (без подложки) ECO 4-15 MC',
                        'Бристоль (без подложки) ECO 4-8 MC',
                        'Брайс (без подложки) ЕСО 4-20 MC',
                        'Блайд (без подложки) ECO 4-14 MC',
                        'Авенгтон (без подложки) ЕСО 4-4 MC',
                        'Дуб Самерсет ЕСО 2-11 MC',
                        'Дуб Carry ЕСО 2-10 MC',
                        'Дуб натуральный ECO 2-5 MC',
                        'Дуб Verdan ECO 2-4 MC',
                        'Дуб Vermont ЕСО 2-3 MC',
                        'Дуб Мокка ECO 2-2 MC',
                        'Дуб Royal ECO 2-1 MC',
                        'Бук ECO 141-8 MC',
                        'Тисс ECO 135-6 MC',
                        'Клен классический ECO 173-6 MC',
                        'Дуб выбеленный ЕСО 182-8 MC',
                        'Дуб Ваниль Селект ECO 106-3 MC',
                        'Дуб Ваниль ECO 106-2 MC',
                        'Ясень Серый ECO 134-5 MC',
                        'Акация CLICK ЕСО 107-8 MC',
                        'Дуб Арктик ЕСО 134-7 MC',
                        'Дуб классический ЕСО 162-7 MC',
                        'Ясень Макао ЕСО 106-1 MC',
                    ];


                    $description .= '<ul>';
                    foreach ($vendor_codes as $code) {
                        $description .= '<li>' . $code . '</li>';
                    }
                    $description .= '</ul><br>';


                    $description .= '<p>Наличие а также актуальные цены уточняйте у менеджера.</p>';
                    $description .= '<p>В наших шоурумах представлены коллекции многих других известных производителей керамогранита, керамической плитки, мозаики и других напольных покрытий (ламинат, паркет, кварцвинил, инженерная доска и др.)</p>';
                    $description .= '<p>Можно приехать и вживую посмотреть - выбор огромный (4 шоурума в одном месте)! Керамогранит, керамическая плитка, мозаика, ламинат, кварцвинил, инженерная доска и др.</p>';
                    $description .= '<p>Работаем с розничными и оптовыми покупателями. А так же предлагаем сотрудничество дизайнерам и строительным компаниям.</p>';
                    $description .= '<p>Отправляем через ТК по всей России.</p>';

                    if($add_description != '') {
                    $description .= '<p>'.nl2br($add_description).'</p>';
                    }

                    $description .= '<p>____________________</p>';
                    $description .= '<p><em>Кварцвинил alpine floor spc кварц винил альпинфлор кварц винил альпин флор кварцвиниловая плитка аквафлур стеновые панели alpine flor ламинат spc кварц-винил кварцвиниловый ламинат</em></p>';
    @endphp

    @php
        $code = 'Alpinefloor-spc-Hand-2';
        $video = '';
        $price = '';
        $title = 'SPC ламинат Alpine Floor все коллекции - 2';
    @endphp

    @php
        $PackagingType = '';
        $PackageQuantity = '1.56';
    @endphp

    @php
        $GoodsSubType = 'Отделка';
        $FinishingMaterialsType = 'Напольные покрытия';
        $FlooringMaterialsSubType = 'Кварц-винил';
        $WallPanelsSlatsDecorativeElementsSubType = '';
        $Material = '';
        $SpaceType = '';
        $OutsideUsage = '';
        $CeramicPorcelainTilesSubType = '';
        $ExteriorFinishingDecorativeStoneSubType = '';
        $MixesType = '';
        $Brand = 'Alpine Floor';
        $TileType = '';
        $InstallationType = 'Замковый';
        $Width = 225;
        $Length = 1460;
        $Thickness = '';
        $Pattern = '';
        $Color = '';

        $AdStatus = 'Free';
        $Delivery = 'Выключена';
        $WeightForDelivery = '';
        $LengthForDelivery = '';
        $HeightForDelivery = '';
        $WidthForDelivery = '';

        $Surface = '';
        $Texture = '';
        $EdgeType = '';
        $Shape = '';
        $ResistanceClass = '';
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
{{-----ALPINFLOOR-SPC-END-HAND----}}

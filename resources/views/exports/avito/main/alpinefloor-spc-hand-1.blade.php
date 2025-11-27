{{-----ALPINFLOOR-SPC-HAND-----}}
    @php

        $image_main = Storage::disk('images-hand')->url('alpinefloor/spc-1.png');
        $image_2 = Storage::disk('images-hand')->url('alpinefloor/1.jpg');
        $image_3 = Storage::disk('images-hand')->url('alpinefloor/3.jpg');
        $image_4 = Storage::disk('images-hand')->url('alpinefloor/5.jpg');
        $image_5 = Storage::disk('images-hand')->url('alpinefloor/7.jpg');
        $image_6 = Storage::disk('images-hand')->url('alpinefloor/9.jpg');
//


                $image_urls = $image_main
                        . ' | ' . $image_2
                        . ' | ' . $image_3
                        . ' | ' . $image_4
                        . ' | ' . $image_5
                        . ' | ' . $image_6;
//                        . ' | ' . $image_8
//                        . ' | ' . $image_9
//                        . ' | ' . $image_10;

                    $description = '';

                    if($add_description_first != '') {
                    $description .= '<p>'.nl2br($add_description_first).'</p>';
                    }

                    $description .= '<p>SPC ламинат Alpine Floor, Альпин Флор. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены. Доставка по Москве, cамовывоз на западе Москвы.</p>';
                    $description .= '<p><strong>Кварц-винил Alpine Floor все коллекции - 1.</strong></p>';


                    $description .= '<p>--------------------</p>';
                    $description .= '<p><strong>&#128165; Скидки от объема &#128165;</strong></p>';
                    $description .= '<p><strong>Под каждый проект действуют индивидуальные условия предоставления скидки, обращайтесь в чат к менеджеру для рассчета.</strong></p>';
                    $description .= '<p><strong>Отгрузка с нашего склада осуществляется кратно упаковкам. Минимальный заказ - от 10000 р. Скидка рассчитывается индивидуально.</strong></p>';
                    $description .= '<p>--------------------</p>';

                    $vendor_codes = [
                        'PARQUET SIROCCO Елисейские поля ECO 25-3',
                        'PARQUET SIROCCO Лувр ECO 25-2',
                        'PARQUET SIROCCO Версаль ECO 25-1',
                        'Фореста ЕСО 21-36',
                        'Энигма ЕСО 21-31',
                        'Калькутта ЕСО 21-26',
                        'Ноктюрн ЕСО 21-24',
                        'Жардин ЕСО 21-17',
                        'Фраменто ЕСО 21-10',
                        'Умбра ЕСО 21-7',
                        'Веро ЕСО 21-32',
                        'Элиас ЕСО 21-23',
                        'Твист ЕСО 21-15',
                        'Лунар ЕСО 21-1',
                        'Орех Акорн ECO 22-6 MC',
                        'Орех Нойер ECO 22-5 MC',
                        'Орех Кенари ECO 22-4 MC',
                        'Орех Ногал Классик ECO 22-3 MC',
                        'Орех Маррон Классик ECO 22-2 MC',
                        'Орех Ногуэра Классик ECO 22-1 MC',
                        'Grand Sequoia Village Инио ECO 11-2107 MC',
                        'Grand Sequoia Village Вайпуа ECO 11-1907 MC',
                        'Grand Sequoia Village Клауд ECO 11-1507 MC',
                        'Grand Sequoia Village Карите ECO 11-907 MC',
                        'Grand Sequoia Village Венге Грей ECO 11-807 MC',
                        'Grand Sequoia Village Гевуина ECO 11-707 MC',
                        'Grand Sequoia Village Миндаль ECO 11-607 MC',
                        'Grand Sequoia Village Сонома ECO 11-307 MC',
                        'Grand Sequoia Village Камфора ECO 11-507 MC',
                        'Grand Sequoia Village Макадамия ECO 11-1007 MC',
                        'Grand Sequoia Village Атланта ECO 11-207 MC',
                        'Дуб Медия ECO 19-20 MC',
                        'Дуб Природный Изысканный ECO 19-17 MC',
                        'Фафнир ECO 19-16 MC',
                        'Северная История ECO 19-15 MC',
                        'Дуб Адара ECO 19-14 MC',
                        'Макадамия ECO 19-10 MC',
                        'Дуб насыщенный ECO 19-7 MC',
                        'Дуб Натуральный Отбеленный ECO 19-5 MC',
                        'Дуб Ваниль Селект ECO 19-3 MC',
                        'Дуб Royal ECO 19-2 MC',
                        'Дуб Фантазия ECO 19-1 MC',
                        'Дейнтри ECO 11-1203 MC',
                        'Вайпуа ECO 11-1903 MC',
                        'Клауд ECO 11-1503 MC',
                        'Макадамия ECO 11-1003 MC',
                        'Карите ECO 11-903 MC',
                        'Венге Грей ECO 11-803 MC',
                        'Гевуина ECO 11-703 MC',
                        'Миндаль ECO 11-603 MC',
                        'Камфора ECO 11-503 MC',
                        'Сонома ECO 11-303 MC',
                        'Атланта ECO 11-203 MC',
                        'Дуб Выбеленный ECO 182-88 MC',
                        'Клен классический ECO 173-66 MC',
                        'Дуб Классический ECO 162-77 MC',
                        'Бук ECO 141-88 MC',
                        'Тисс ECO 135-66 MC',
                        'Дуб Арктик ECO 134-77 MC',
                        'Ясень Серый ECO 134-55 MC',
                        'Акация Click ECO 107-88 MC',
                        'Дуб Ваниль Селект ECO 106-33 MC',
                        'Дуб Ваниль ECO 106-22 MC',
                        'Ясень Макао ECO 106-11 MC',
                        'ГРАНД СЕКВОЙЯ МАКАДАМИЯ ЕСО 11-1001 MC',
                        'ГРАНД СЕКВОЙЯ ДЕЙНТРИ ЕСО 11-1201 MC',
                        'ГРАНД СЕКВОЙЯ ВАЙПУА ЕСО 11-1901 MC',
                        'ГРАНД СЕКВОЙЯ КЛАУД ЕСО 11-1501 MC',
                        'ГРАНД СЕКВОЙЯ КАРИТЕ ЕСО 11-901 MC',
                        'ГРАНД СЕКВОЙЯ ВЕНГЕ ГРЕЙ ЕСО 11-801 MC',
                        'ГРАНД СЕКВОЙЯ ГЕВУИНА ЕСО 11-701 MC',
                        'ГРАНД СЕКВОЙЯ МИНДАЛЬ ЕСО 11-601 MC',
                        'ГРАНД СЕКВОЙЯ КАМФОРА ЕСО 11-501 MC',
                        'ГРАНД СЕКВОЙЯ СОНОМА ECO 11-301 MC',
                        'ГРАНД СЕКВОЙЯ АТЛАНТА ЕСО 11-201 MC',
                        'Модерато ЕСО 14-1101 MC',
                        'Анданте ЕСО 14-1001 MC',
                        'Маэстоса ЕСО 14-901 MC',
                        'Прэсто ЕСО 14-801 MC',
                        'Комодо ЕСО 14-701 MC',
                        'Ларго ЕСО 14-601 MC',
                        'Ленто ЕСО 14-501 MC',
                        'Ададжио ЕСО 14-401 MC',
                        'Ларгетто ЕСО 14-301 MC',
                        'Виваче ЕСО 14-201 MC',
                        'Аллегро ЕСО 14-101 MC',
                        'Орех Нойер ECO 18-22 MC',
                        'Гикори ECO 18-21 MC',
                        'Caldo ECO 18-20 MC',
                        'Дуб Самерсет ECO 18-19 MC',
                        'Баварский лес ECO 18-18 MC',
                        'Tesoro ECO 18-16 MC',
                        'Дуб Буна ECO 18-15 MC',
                        'Вайпуа ECO 18-14 MC',
                        'Дуб Коричневый ECO 18-13 MC',
                        'Дуб Мокка ECO 18-12 MC',
                        'Карите ECO 18-11 MC',
                        'Гевуина ECO 18-10 MC',
                        'Дуб Антарес ECO 18-9 MC',
                        'Дуб Исида ECO 18-8 MC',
                        'Сонома ECO 18-7 MC',
                        'Дуб Синистра ECO 18-6 MC',
                        'Макадамия ECO 18-5 MC',
                        'Дуб Насыщенный ECO 18-4 MC',
                        'Дуб Натуральный Отбеленный ECO 18-3 MC',
                        'Дуб Ваниль Селект ECO 18-2 MC',
                        'ДУБ ФАНТАЗИЯ ECO 18-1 MC',
                        'Секвойя Пуро ЕСО 6-14 SPC',
                        'Секвойя Венето ЕСО 6-13 SPC',
                        'Секвойя Рустикальная ЕСО 6-11 SPC',
                        'Секвойя Темная ЕСО 6-12 SPC',
                        'Секвойя Классик ЕСО 6-10 SPC',
                        'Секвойя Натуральная ЕСО 6-9 SPC',
                        'Секвойя Снежная ЕСО 6-8 SPC',
                        'Секвойя Калифорния ЕСО 6-6 SPC',
                        'Секвойя Серая ЕСО 6-5 SPC',
                        'Секвойя Royal ЕСО 6-4 SPC',
                        'Секвойя Light ЕСО 6-3 SPC',
                        'Секвойя Коньячная ЕСО 6-2 SPC',
                        'Grazioso ECO 18-17 MC',
                        'Модерато ЕСО 14-11 MC',
                        'Анданте ЕСО 14-10 MC',
                        'Маэстоса ЕСО 14-9 MC',
                        'Прэсто ЕСО 14-8 MC',
                        'Комодо ЕСО 14-7 MC',
                        'Ларго ЕСО 14-6 MC',
                        'Ленто ЕСО 14-5 MC',
                        'Ададжио ЕСО 14-4 MC',
                        'Ларгетто ЕСО 14-3 MC',
                        'Виваче ЕСО 14-2 MC',
                        'Аллегро ЕСО 14-1 MC',
                        'Дуб Хатиса ЕСО 13-27 MC',
                        'Дуб Далим ЕСО 13-33 MC',
                        'Дуб Селена ЕСО 13-32 MC',
                        'Дуб Капелла ЕСО 13-31 MC',
                        'Дуб Буна ЕСО 13-30 MC',
                        'Дуб Батейн ЕСО 13-29 MC',
                        'Дуб Поллукс ЕСО 13-28 MC',
                        'Дуб Лесат ЕСО 13-26 MC',
                        'Дуб Денеб ЕСО 13-25 MC',
                        'Дуб Ригель ЕСО 13-24 MC',
                        'ДУБ ФАНТАЗИЯ ЕСО 13-1 MC',
                        'Дуб Альферац ЕСО 13-22 MC',
                        'Дуб Полис ЕСО 13-21 MC',
                        'Дуб Медия ЕСО 13-20 MC',
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
                    $description .= '<p><em>Кварцвинил alpine floor spc кварц винил альпинфлор кварц винил альпин флор кварцвиниловая плитка аквафлур стеновые панели alpine flor ламинат spc кварц-винил кварцвиниловый ламинат spc альпин флур кварцвинил alpinfloor ламинат alpin floor alpinefloor</em></p>';
    @endphp

    @php
        $code = 'Alpinefloor-spc-Hand-1';
        $video = $custom_video;
        $price = '';
        $title = 'SPC ламинат Alpine Floor все коллекции - 1';
    @endphp

    @php
        $PackagingType = '';
        $PackageQuantity = '2.23';
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
        $Width = 180;
        $Length = 1524;
        $Thickness = '';
        $Pattern = '';
        $Color = '';
        $ColorName = '';

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
{{-----ALPINFLOOR-SPC-END-HAND----}}

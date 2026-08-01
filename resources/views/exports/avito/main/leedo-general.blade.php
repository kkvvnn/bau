{{-----LEEDO-GENERAL----}}

    @php
        $GoodsSubType = 'Отделка';
        $FinishingMaterialsType = 'Керамическая плитка и керамогранит';
        $CeramicPorcelainTilesSubType = 'Керамическая плитка';
        $Brand = 'LeeDo Ceramica';
        $TileType = 'Мозаика';
        $SpaceType = avito_bauservice_space_type('default');
        $InstallationType = 'На пол | На стену';
        $Width = 30;
        $Length = 30;
        $Thickness = '';
        $Pattern = avito_bauservice_pattern('', 'Другой');
        $Color = avito_bauservice_color('Другой');
        $ColorName = $Color;
        $FlooringMaterialsSubType = '';
        $ExteriorFinishingDecorativeStoneSubType = '';
        $WallPanelsSlatsDecorativeElementsSubType = '';
        $MixesType = '';
        $Material = '';
        $OutsideUsage = '';
    @endphp
    @php



        //            ---TITLE-AVITO--
        $title = 'Мозаика LeeDo Лидо';
        //            ---TITLE-AVITO-END--

        //            ---IMAGES---
        $img_1 = 'https://service-plitka.ru/storage/images/leedo-general/leedo-1.jpg';
        $img_2 = 'https://service-plitka.ru/storage/images/leedo-general/leedo-2.jpg';
        $img_3 = 'https://service-plitka.ru/storage/images/leedo-general/leedo-3.jpg';
        $img_4 = 'https://service-plitka.ru/storage/images/leedo-general/leedo-4.jpg';
        $img_5 = 'https://service-plitka.ru/storage/images/leedo-general/leedo-5.jpg';

        $image_urls = $img_1 . ' | ' . $img_2 . ' | ' . $img_3 . ' | ' . $img_4 . ' | ' . $img_5;
        //            ---IMAGES-END--

        //            ---DESCRIPTION---
        $description = '';

         if($add_description_first != '') {
            $description .= '<p>'.nl2br($add_description_first).'</p>';
        }

        $description .= '<p>Мозаика LeeDo / Лидо. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены. Доставка по Москве, cамовывоз на западе Москвы.</p>';

        $description .= '<p><strong>Мозаика из натурального камня, стекла, керамогранита, оникса и др. </strong></p>';

        $description .= '<p><strong>&#128165; Скидки от объема &#128165;</strong></p>';
        $description .= '<p><strong>Под каждый проект действуют индивидуальные условия предоставления скидки, обращайтесь в чат к менеджеру для рассчета.</strong></p>';

                    $description .= '<p>';

                    foreach ($leedo as $ld) {
                        $description .= $ld->Item_name . ' ';
                    }
                    $description .= '</p>';




        //          ------------------
                    $key_words = ' мозаика из стекла мозаика стеклянная мозаика стекло мозаика';
                    $key_words .= ' мозаика из керамогранита мозаика керамогранитная мозаика керамогранит мозаика';
                    $key_words .= ' мозаика перламутр мозаика из перламутра мозаика';
                    $key_words .= ' мозаика из зеркала мозаика зеркальная мозаика зеркало мозаика';
                    $key_words .= ' мозаика из зеркала мозаика зеркальная мозаика из камня мозаика каменная мозаика камень мозаика стекло мозаика';
                    $key_words .= ' мозаика из стекла мозаика стеклянная мозаика металлическая мозаика из металла мозаика стекло мозаика камень мозаика';
                    $key_words .= ' мозаика из металла мозаика металлическая мозаика металл мозаика';
                    $key_words .= ' мозаика из мрамора мозаика мраморная мозаика мрамор мозаика';
                    $key_words .= ' мозаика травертин мозаика из травертина мозаика';
                    $key_words .= ' мозаика сланец мозаика из сланца мозаика';
                    $key_words .= ' мозаика оникс мозаика из оникса мозаика';
                    $key_words .= ' мозаика из мрамора мозаика из оникса мозаика оникс мозаика мрамор мозаика';
                    $key_words .= ' мозаика галька мозаика из гальки мозаика';


                    $description .= '<p>Под крупный проект сделаем скидку.</p>';
                    $description .= '<p>Наличие а также актуальные цены уточняйте у менеджера.</p>';
                    $description .= '<p>В нашем шоуруме представлены коллекции многих других известных производителей керамогранита, керамической плитки, мозаики и других напольных покрытий (ламинат, паркет, кварцвинил, инженерная доска и др.)</p>';
                    $description .= '<p>Работаем с розничными и оптовыми покупателями. А так же предлагаем сотрудничество дизайнерам и строительным компаниям.</p>';

                    $description .= '<p>_____________</p>';
                    $description .= '<p><em>leedo caramelle мозаика для ванной мозайка для пола ';
                    $description .= 'мозаика со скидкой купить мозаику купить мозайку красивая мозаика красивая мозайка недорогая ';
                    $description .= 'мозаика для хамам мозаика для бассейнов мозаика на фартук ';
                    $description .= $key_words;
                    $description .= '</em></p>';
                    if($add_description != '') {
                        $description .= '<p>'.nl2br($add_description).'</p>';
                    }

    @endphp
    @php

        $video = $custom_video;

        $code = 'leedo-general';
    @endphp

    @php
        $price = 500;
    @endphp


    @php
            $PackagingType = 'Штучно';
            $PackageQuantity = 1;

    @endphp

    @php
        $AdStatus = 'Free';
        $Delivery = 'Выключена';

        $WeightForDelivery = 1;
        $LengthForDelivery = 35;
        $WidthForDelivery = 35;
        $HeightForDelivery = 2;
    @endphp

    @php
        $Surface = 'Комбинированная';
        $Texture = 'Гладкая';
        $EdgeType = '';
        $Shape = avito_shape_leedo('DEFAULT'); //!!!!!!!!!!!!!!!!!!!!!
        $ResistanceClass = '';
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
{{--        <td>{{ $address }}</td>                                 --}}{{-- Address --}}
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

{{-----LEEDO-GENERAL-END----}}

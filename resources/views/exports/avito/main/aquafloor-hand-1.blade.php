{{-----AQUAFLOOR-HAND-----}}
    @php

        $image_main = Storage::disk('images-hand')->url('aquafloor/1.jpg');
        $image_2 = Storage::disk('images-hand')->url('aquafloor/2.jpg');
        $image_3 = Storage::disk('images-hand')->url('aquafloor/3.jpg');
        $image_4 = Storage::disk('images-hand')->url('aquafloor/4.jpg');
        $image_5 = Storage::disk('images-hand')->url('aquafloor/5.jpg');
        $image_7 = Storage::disk('images-hand')->url('aquafloor/7.jpg');
        $image_8 = Storage::disk('images-hand')->url('aquafloor/8.jpg');
        $image_9 = Storage::disk('images-hand')->url('aquafloor/9.jpg');
        $image_10 = Storage::disk('images-hand')->url('aquafloor/10.jpg');


                $image_urls = $image_main
                        . ' | ' . $image_2
                        . ' | ' . $image_3
                        . ' | ' . $image_4
                        . ' | ' . $image_5
                        . ' | ' . $image_7
                        . ' | ' . $image_8
                        . ' | ' . $image_9
                        . ' | ' . $image_10;

                    $description = '';

                    if($add_description_first != '') {
                    $description .= '<p>'.nl2br($add_description_first).'</p>';
                    }

                    $description .= '<p>Кварцвиниловая плитка Aquafloor. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены. Доставка по Москве, cамовывоз на западе Москвы.</p>';
                    $description .= '<p><strong>Кварц-винил Aquafloor все коллекции - 1</strong></p>';
                    $description .= '<p>--------------------</p>';
                    $description .= '<p><strong>Отгрузка с нашего склада осуществляется кратно упаковкам. Минимальный заказ - от 8000 р.</strong></p>';
                    $description .= '<p>--------------------</p>';

                    $vendor_codes = [
                         'AQUAFLOOR Chevron Premium 24 (12A+12B)шт 1,99м2 в упаковке' => [
                            'AF7011CVR',
                            'AF7012CVR',
                            'AF7013CVR',
                            'AF7014CVR',
                            'AF7015CVR',
                            'AF7016CVR',
                            'AF7017CVR',
                            'AF7018CVR',
                            'AF7019CVR',
                            'AF7020CVR',
                        ],
                        'AQUAFLOOR Classic (SPC)' => [
                            'AF5503 (SPC 3,5 мм)',
                            'AF5504 (SPC 3,5 мм)',
                            'AF5514 (SPC 3,5 мм)',
                            'AF5516 (SPC 3,5 мм)',
                            'AF5517 (SPC 3,5 мм)',

                        ],
                        'AQUAFLOOR Nano 16шт 3.52 м2 в упаковке' => [
                            'Nano AF3201N',
                            'Nano AF3202N',
                            'Nano AF3203N',
                            'Nano AF3204N',
                            'Nano AF3206N',
                            'Nano AF3207N',
                            'Nano AF3208N',
                            'Nano AF3209N',
                            'Nano AF3210N',
                            'Nano AF3211N',
                            'Nano AF3212N',
                            'Nano AF3213N',
                            'Nano AF3214N',
                            'Nano AF3215N',
                            'Nano AF3216N',
                            'Nano AF3217N',
                            'Nano AF3218N',
                            'Nano AF3220N',
                        ],
                        'AQUAFLOOR Parquet Plus (12A+12B)*2.074 м2 с подложкой' => [
                            'AF6011PQ+',
                            'AF6012PQ+',
                            'AF6013PQ+',
                            'AF6014PQ+',
                            'AF6015PQ+',
                            'AF6016PQ+',
                            'AF6017PQ+',
                            'AF6018PQ+',
                            'AF6019PQ+',
                            'AF6020PQ+',
                            'AF6021PQN+',
                            'AF6022PQN+',
                            'AF6023PQN+',
                            'AF6024PQN+',
                            'AF6025PQN+',
                        ],
                        'AQUAFLOOR Quartz 10шт 2,196м2 в упаковке' => [
                            'AF3501QV',
                            'AF3502QV',
                            'AF3503QV',
                            'AF3504QV',
                            'AF3505QV',
                            'AF3506QV',
                            'AF3507QV',
                            'AF3508QV',
                            'AF3509QV',
                            'AF3510QV',
                            'AF3511QV',
                            'AF3512QV',
                            'AF3513QV',
                            'AF3514QV',
                            'AF3515QV',
                        ],
                        'AQUAFLOOR RW 10шт 2,17м2 в упаковке' => [
                            'Real Wood AF6031',
                            'Real Wood AF6032',
                            'Real Wood AF6033',
                            'Real Wood AF6034',
                            'Real Wood AF6041',
                            'Real Wood AF6042',
                            'Real Wood AF6043',
                            'Real Wood AF6051',
                            'Real Wood AF6052',
                            'Real Wood AF6053',
                        ],
                        'AQUAFLOOR RW XL 8шт 2.78м2 в упаковке' => [
                            'Real Wood XL  AF8001XL',
                            'Real Wood XL  AF8002XL',
                            'Real Wood XL  AF8003XL',
                            'Real Wood XL  AF8004XL',
                            'Real Wood XL  AF8005XL',
                            'Real Wood XL  AF8006XL',
                            'Real Wood XL  AF8007XL',
                            'Real Wood XL  AF8008XL',
                            'Real Wood XL  AF8009XL',
                            'Real Wood XL  AF8010XL',
                        ],
                        'AQUAFLOOR RW XXL 5шт 2,052м2 в упаковке' => [
                            'RealWood XXL  AF8021XXL',
                            'RealWood XXL  AF8022XXL',
                            'RealWood XXL  AF8023XXL',
                            'RealWood XXL  AF8024XXL',
                            'RealWood XXL  AF8025XXL',
                            'RealWood XXL  AF8026XXL',
                        ],
                        'AQUAFLOOR Select XL 6шт 2,007м2 в упаковке' => [
                            'AF4081SXL',
                            'AF4082SXL',
                            'AF4083SXL',
                            'AF4084SXL',
                            'AF4085SXL',
                            'AF4086SXL',
                            'AF4087SXL',
                            'AF4088SXL',
                            'AF4089SXL',
                            'AF4090SXL',
                        ],
                        'AQUAFLOOR Space 10шт 2,196м2 в упаковке' => [
                            'AF4001SPC',
                            'AF4002SPC',
                            'AF4003SPC',
                            'AF4004SPC',
                            'AF4005SPC',
                            'AF4006SPC',
                            'AF4007SPC',
                            'AF4008SPC',
                            'AF4009SPC',
                            'AF4010SPC',
                            'AF4031SPC',
                            'AF4032SPC',
                            'AF4033SPC',
                            'AF4034SPC',
                            'AF4035SPC',
                            'AF4036SPC',
                            'AF4037SPC',
                            'AF4038SPC',
                            'AF4039SPC',
                            'AF4040SPC',
                            'AF4051SPC',
                            'AF4052SPC',
                            'AF4053SPC',
                            'AF4054SPC',
                            'AF4055SPC',
                            'AF4056SPC',
                            'AF4057SPC',
                            'AF4058SPC',
                            'AF4059SPC',
                            'AF4060SPC',
                        ],
                        'AQUAFLOOR Space Limited Edition 10шт 2,22м2 в упаковке' => [
                            'AF4041SPLE',
                            'AF4042SPLE',
                            'AF4043SPLE',
                            'AF4044SPLE',
                            'AF4045SPLE',
                            'AF4046SPLE',
                            'AF4047SPLE',
                            'AF4048SPLE',
                            'AF4049SPLE',
                            'AF4050SPLE',
                        ],
                    ];


                    foreach ($vendor_codes as $key => $value) {
                        $description .= '<p><strong>'.$key.' :</strong></p>';
                        $description .= '<ul>';

                        foreach ($value as $v) {
                            $description .= '<li>' . $v . '</li>';
                        }

                        $description .= '</ul><br>';
                    }


                    $description .= '<p>Наличие а также актуальные цены уточняйте у менеджера.</p>';
                    $description .= '<p>В нашем шоуруме представлены коллекции многих других известных производителей керамогранита, керамической плитки, мозаики и других напольных покрытий (ламинат, паркет, кварцвинил, инженерная доска и др.)</p>';
                    $description .= '<p>Работаем с розничными и оптовыми покупателями. А так же предлагаем сотрудничество дизайнерам и строительным компаниям.</p>';

                    if($add_description != '') {
                    $description .= '<p>'.nl2br($add_description).'</p>';
                    }

                    $description .= '<p>____________________</p>';
                    $description .= '<p><em>Кварцвинил aquafloor кварц винил аквафлор кварцвиниловая плитка аквафлур стеновые панели aquafloor ламинат spc кварц-винил кварцвиниловый ламинат</em></p>';
    @endphp

    @php
        $code = 'Aquafloor-Hand-1';
        $video = '';
        $price = '';
        $title = 'Кварцвинил Aquafloor все коллекции - 1';
    @endphp

    @php
        $PackagingType = '';
        $PackageQuantity = '2.07';
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
        $Brand = 'Aquafloor';
        $TileType = '';
        $InstallationType = 'Замковый';
        $Width = 220;
        $Length = 1520;
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
{{-----AQUAFLOOR-END-HAND----}}

{{-----AQUAFLOOR-HAND-----}}
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
        $InstallationType = 'Клеевое';
        $Width = 228;
        $Length = 1524;
        $Height = '';
        $Pattern = '';
        $Color = '';

        $image_main = Storage::disk('images-hand')->url('aquafloor/1.jpg');
        $image_2 = Storage::disk('images-hand')->url('aquafloor/2.jpg');
        $image_3 = Storage::disk('images-hand')->url('aquafloor/3.jpg');
        $image_4 = Storage::disk('images-hand')->url('aquafloor/4.jpg');
        $image_5 = Storage::disk('images-hand')->url('aquafloor/5.jpg');
        $image_7 = Storage::disk('images-hand')->url('aquafloor/7.jpg');
        $image_8 = Storage::disk('images-hand')->url('aquafloor/8.jpg');
        $image_9 = Storage::disk('images-hand')->url('aquafloor/9.jpg');
        $image_10 = Storage::disk('images-hand')->url('aquafloor/10.jpg');


                $image_urls = $image_9
                        . ' | ' . $image_2
                        . ' | ' . $image_3
                        . ' | ' . $image_4
                        . ' | ' . $image_5
                        . ' | ' . $image_7
                        . ' | ' . $image_8
                        . ' | ' . $image_main
                        . ' | ' . $image_10;

                    $description = '';

                    if($add_description_first != '') {
                    $description .= '<p>'.nl2br($add_description_first).'</p>';
                    }

                    $description .= '<p>Кварцвиниловая плитка Aquafloor. Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены. Доставка по Москве, cамовывоз на западе Москвы.</p>';
                    $description .= '<p><strong>Кварц-винил Aquafloor все коллекции - 2</strong></p>';
                    $description .= '<p>--------------------</p>';
                    $description .= '<p><strong>Отгрузка с нашего склада осуществляется кратно упаковкам. Минимальный заказ - от одной упаковки.<br>На заказ до 10000 рублей при самовывозе установлена фиксированная доплата 300 рублей. Это сделано для того, чтобы не увеличивать минимальную сумму заказа, и мы могли отгрузить Вам даже 1 упаковку. <br>Для нас важен каждый клиент и каждый заказ! Спасибо за понимание.</strong></p>';
                    $description .= '<p>--------------------</p>';

                    $vendor_codes = [

                        'AQUAFLOOR Space Nuts XL 6шт 2,007м2 в упаковке' => [
                            'AF4071NXL',
                            'AF4072NXL',
                            'AF4073NXL',
                            'AF4074NXL',
                            'AF4075NXL',
                            'AF4076NXL',
                            'AF4077NXL',
                            'AF4078NXL',
                            'AF4079NXL',
                            'AF4080NXL',
                        ],
                        'AQUAFLOOR Space Parquet Light' => [
                            'Space Parquet Light  AF4501PQL',
                            'Space Parquet Light  AF4502PQL',
                            'Space Parquet Light  AF4503PQL',
                            'Space Parquet Light  AF4504PQL',
                            'Space Parquet Light  AF4505PQL',
                            'Space Parquet Light  AF4506PQL',
                            'Space Parquet Light  AF4507PQL',
                            'Space Parquet Light  AF4508PQL',
                            'Space Parquet Light  AF4509PQL',
                            'Space Parquet Light  AF4510PQL',
                            'Space Parquet Light  AF4511PQL',
                            'Space Parquet Light  AF4512PQL',
                            'Space Parquet Light  AF4513PQL',
                            'Space Parquet Light  AF4514PQL',
                            'Space Parquet Light  AF4515PQL',
                            'Space Parquet Light  AF4516PQL',
                            'Space Parquet Light  AF4517PQL',
                            'Space Parquet Light  AF4518PQL',
                            'Space Parquet Light  AF4519PQL',
                            'Space Parquet Light  AF4520PQL',
                        ],
                        'AQUAFLOOR Space Parquet Light Limited Edition 20шт 1,489м2 в упаковке' => [
                            'Space Parquet Light Limited Edition AF4541PQLE',
                            'Space Parquet Light Limited Edition AF4542PQLE',
                            'Space Parquet Light Limited Edition AF4543PQLE',
                            'Space Parquet Light Limited Edition AF4544PQLE',
                            'Space Parquet Light Limited Edition AF4545PQLE',
                            'Space Parquet Light Limited Edition AF4546PQLE',
                            'Space Parquet Light Limited Edition AF4547PQLE',
                            'Space Parquet Light Limited Edition AF4548PQLE',
                            'Space Parquet Light Limited Edition AF4549PQLE',
                            'Space Parquet Light Limited Edition AF4550PQLE',
                        ],
                        'AQUAFLOOR Stone New 4mm 10шт 1.86м2 в упаковке' => [
                            'Stone (New 4mm) AF3531MST',
                            'Stone (New 4mm) AF3532MST',
                            'Stone (New 4mm) AF3533MST',
                            'Stone (New 4mm) AF3541CST',
                            'Stone (New 4mm) AF3542CST',
                            'Stone (New 4mm) AF3543CST',
                            'Stone (New 4mm) AF3551SST',
                            'Stone (New 4mm) AF3552SST',
                            'Stone (New 4mm) AF3553SST',
                            'Stone (New 4mm) AF3554SST',
                            'Stone (New 4mm) AF3555SST',
                        ],
                        'AQUAFLOOR Stone OLD 3,5mm 10 шт 1,86м2 в упаковке' => [
                            'Stone AF3533MST',
                        ],
                        'AQUAFLOOR Stone XL 5шт 2,209м2 в упаковке' => [
                            'Stone XL  AF5001MSXL',
                            'Stone XL  AF5002MSXL',
                            'Stone XL  AF5004MSXL',
                            'Stone XL  AF5005MSXL',
                            'Stone XL  AF5011OSXL',
                            'Stone XL  AF5012OSXL',
                            'Stone XL  AF5013OSXL',
                            'Stone XL  AF5021FSXL',
                            'Stone XL  AF5031ESXL',
                        ],
                        'AQUAFLOOR Versailles 6шт 2,16м2 в упаковке' => [
                            'Versailles AF7001VS',
                            'Versailles AF7002VS',
                            'Versailles AF7003VS',
                            'Versailles AF7004VS',
                            'Versailles AF7005VS',
                        ],
                        'AQUAFLOOR Chevron Glue 44шт 3,18м2 в упаковке' => [
                            'Chevron Glue AF2551PGCh',
                            'Chevron Glue AF2552PGCh',
                            'Chevron Glue AF2553PGCh',
                            'Chevron Glue AF2554PGCh',
                            'Chevron Glue AF2555PGCh',
                            'Chevron Glue AF2556PGCh',
                            'Chevron Glue AF2557PGCh',
                            'Chevron Glue AF2558PGCh',
                            'Chevron Glue AF2559PGCh',
                            'Chevron Glue AF2560PGCh',
                        ],
                        'AQUAFLOOR Classic GLUE 3,441/3,252м2' => [
                            'Classic GLUE AF5503',
                            'Classic GLUE AF5514',
                            'Classic GLUE AF5517',
                        ],
                        'AQUAFLOOR Parquet Glue 50шт 3,72м2 в упаковке' => [
                            'Parquet Glue AF2501PG',
                            'Parquet Glue AF2502PG',
                            'Parquet Glue AF2503PG',
                            'Parquet Glue AF2504PG',
                            'Parquet Glue AF2505PG',
                            'Parquet Glue AF2506PG',
                            'Parquet Glue AF2507PG',
                            'Parquet Glue AF2508PG',
                            'Parquet Glue AF2509PG',
                            'Parquet Glue AF2510PG',
                            'Parquet Glue AF2511PG',
                            'Parquet Glue AF2512PG',
                            'Parquet Glue AF2513PG',
                            'Parquet Glue AF2514PG',
                            'Parquet Glue AF2515PG',
                            'Parquet Glue AF2516PG',
                            'Parquet Glue AF2517PG',
                            'Parquet Glue AF2518PG',
                            'Parquet Glue AF2519PG',
                            'Parquet Glue AF2520PG',
                        ],
                        'AQUAFLOOR REALWOOD GLUE 20шт 4,335 м2 в упаковке' => [
                            'RealWood GLUE AF6031',
                            'RealWood GLUE AF6032',
                            'RealWood GLUE AF6033',
                            'RealWood GLUE AF6034',
                            'RealWood GLUE AF6042',
                            'RealWood GLUE AF6043',
                            'RealWood GLUE AF6051',
                            'RealWood GLUE AF6052',
                            'RealWood GLUE AF6053',
                        ],
                        'AQUAFLOOR Realwood XL GLUE 10шт 3.477м2 в упаковке' => [
                            'Realwood XL GLUE AF8001XL',
                            'Realwood XL GLUE AF8002XL',
                            'Realwood XL GLUE AF8003XL',
                            'Realwood XL GLUE AF8004XL',
                            'Realwood XL GLUE AF8005XL',
                            'Realwood XL GLUE AF8006XL',
                            'Realwood XL GLUE AF8007XL',
                            'Realwood XL GLUE AF8008XL',
                            'Realwood XL GLUE AF8009XL',
                            'Realwood XL GLUE AF8010XL',
                        ],
                        'Стеновые панели AQUAWALL 10шт 1,8м2 в упаковке' => [
                            'AW4231M',
                            'AW4232M',
                            'AW4241C',
                            'AW4242C',
                            'AW4243C',
                            'AW4251S',
                            'AW4252S',
                            'AW4253S',
                            'AW4254S',
                            'AW4255S',
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
        $code = 'Aquafloor-Hand-2';
        $video = '';
        $price = '';
        $title = 'Кварц-винил Aquafloor все коллекции - 2';
    @endphp

    @php
        $PackagingType = '';
        $PackageQuantity = '2.07';
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
{{-----AQUAFLOOR-END-HAND----}}

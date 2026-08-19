{{-----GENERAL-HAND-HAND-----}}
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
        $ColorName = $Color;

        $FlooringMaterialsSubType = '';
        $ExteriorFinishingDecorativeStoneSubType = '';
        $WallPanelsSlatsDecorativeElementsSubType = '';
        $MixesType = '';
        $Material = '';
        $OutsideUsage = '';

        $image_main = Storage::disk('media')->url('general/1.png');
        $image_1 = Storage::disk('media')->url('general/2.jpg');
        $image_2 = Storage::disk('media')->url('general/3.jpg');
        $image_3 = Storage::disk('media')->url('general/4.jpg');
        $image_4 = Storage::disk('media')->url('general/5.jpg');
        $image_5 = Storage::disk('media')->url('general/6.jpg');
        $image_6 = Storage::disk('media')->url('general/7.jpg');
        $image_7 = Storage::disk('media')->url('general/8.jpg');
        $image_8 = Storage::disk('media')->url('general/9.jpg');
        $image_9 = Storage::disk('media')->url('general/10.jpg');


                $image_urls = $image_main . ' | '
                        . $image_1 . ' | '
                        . $image_2 . ' | '
                        . $image_3 . ' | '
                        . $image_4 . ' | '
                        . $image_5 . ' | '
                        . $image_6 . ' | '
                        . $image_7 . ' | '
                        . $image_8 . ' | '
                        . $image_9;

                    $description = '';

                    if($add_description_first != '') {
                    $description .= '<p>'.nl2br($add_description_first).'</p>';
                    }

                    $description .= '<p><strong>Керамогранит, плитка, ламинат, кварцвинил, инженерная доска — у нас есть ВСЁ.<p></p>Несколько просторных шоурумов, где можно посмотреть материалы вживую, сравнить и выбрать.</strong></p><ul><li>&#127808;Несколько шоурумов в одном месте! Большой выбор:</li><li>&#9989;Керамогранит, керамическая плитка, мозаика</li><li>&#9989;Ламинат, кварцвинил, инженерная доска</li><li>&#9989;Бесплатный профессиональный подбор материалов</li><li>&#9989;Выгодные цены от производителей</li><li>&#9989;Приятные бонусы и скидки</li></ul><p><strong>У нас собраны лучшие коллекции в одном месте:</strong></p><ul><li>&#10024;Керамогранит и плитка для ванной, кухни, фасада</li><li>&#10024;Напольные покрытия: практичный ламинат, влагостойкий кварцвинил, роскошная инженерная доска</li></ul><p>Несколько шоурумов - огромный выбор и лучшие цены. Консультация специалиста - бесплатно!</p><p><strong>Приезжайте за вдохновением и выгодной ценой!</strong></p>';


                    if($add_description != '') {
                    $description .= '<p>'.nl2br($add_description).'</p>';
                    }
    @endphp

    @php
        $code = 'general-hand';
        $video = $custom_video;
        $price = '1590';
        $title = 'Керамогранит, плитка, мозаика, ламинат, кварцвинил — всё для ремонта!';
    @endphp

    @php
        $PackagingType = 'Упаковка';
        $PackageQuantity = '1';
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
{{-----GENERAL-HAND-END-HAND----}}

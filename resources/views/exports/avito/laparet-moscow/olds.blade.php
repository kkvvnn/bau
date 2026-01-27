{{-----------------OLDS--------------------}}
@foreach($olds as $old)
    @php
        $price = '';
        $title = $old->Title;

        $img_full = $old->ImageUrls;

        $description = '';

         if($add_description_first != '') {
            $description .= '<p>'.nl2br($add_description_first).'</p>';
        }

        $description .= $old->Description;


        if($add_description != '') {
            $description .= '<p>'.nl2br($add_description).'</p>';
        }

        $GoodsSubType = 'Отделка';
        $FinishingMaterialsType = 'Керамическая плитка и керамогранит';
        $CeramicPorcelainTilesSubType = 'Керамическая плитка';
        $Brand = 'Laparet';
        $TileType = 'Плитка';
        $SpaceType = 'Балкон | Ванная | Крыльцо | Кухня';
        $InstallationType = 'На пол | На стену';
        $Width = 60;
        $Length = 120;
        $Thickness = '';
        $Pattern = 'Мрамор';
        $Color = 'Бежевая';
        $ColorName = $Color;

        $PackagingType = 'Упаковка';
        $PackageQuantity = '1.44';
    @endphp
    @php
        $AdStatus = 'Free';
        $Delivery = 'Самовывоз с онлайн-оплатой';

        $WeightForDelivery = 30;
        $LengthForDelivery = 122;
        $HeightForDelivery = 5;
        $WidthForDelivery = 62;
    @endphp

    @php
        $Surface = 'Матовая';
        $Texture = 'Гладкая';
        $EdgeType = '';
        $Shape = '';
        $ResistanceClass = '';

        $ReturnPolicy = 'По любой причине — 7 дней';
        $TargetAudience = 'Частные лица';

        $FlooringMaterialsSubType = '';
    @endphp

    <tr>
        <td>{{ $old->Id_av }}</td>                              {{-- Id --}}
        <td>{{ $AdStatus }}</td>                                {{-- AdStatus --}}
        <td>{{ $old->AvitoId }}</td>                            {{-- AvitoId --}}
        <td>{{ $name }}</td>                                    {{-- ManagerName --}}
        <td>{{ $phone }}</td>                                   {{-- ContactPhone --}}
        <td>{{ $address }}</td>                                 {{-- Address --}}
        <td>{{ $title }}</td>                                   {{-- Title --}}
        <td>{{ $description }}</td>                             {{-- Description --}}
        <td>{{ $price }}</td>                                   {{-- Price --}}
        <td>{{ $img_full }}</td>                              {{-- ImageUrls --}}
        <td>{{ $old->VideoUrl }}</td>                           {{-- VideoURL --}}
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
        <td>{{ $ReturnPolicy }}</td>                            {{-- ReturnPolicy --}}
        <td>{{ $TargetAudience }}</td>                          {{-- TargetAudience --}}
        <td>{{ $ColorName }}</td>                               {{-- ColorName --}}
    </tr>
@endforeach
{{-----------------OLDS-END-------------------}}

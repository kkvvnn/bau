{{-----BAUSERVICE-WATER-MIXERS-----}}
@foreach($water_mixers as $product)

    @php
        $GoodsSubType = 'Смесители и комплектующие';
        $ProductType = 'Смесители';
        $ProductSubType = avito_type_of_water_mixers($product->Name);
        $FinishingMaterialsType = '';
        $CeramicPorcelainTilesSubType = '';
        $Brand = '';
        $TileType = '';
        $SpaceType = '';
        $InstallationType = '';
        $Width = '';
        $Length = '';
        $Thickness = '';
        $Pattern = '';
        $Color = '';
        $FlooringMaterialsSubType = '';
        $ExteriorFinishingDecorativeStoneSubType = '';
        $WallPanelsSlatsDecorativeElementsSubType = '';
        $MixesType = '';
        $Material = '';
        $OutsideUsage = '';
    @endphp
    @php
        $PackagingType = '';
        $PackageQuantity = '';
    @endphp

    @php
        $price_rrc = (int)$product->RMPrice;
        $price_old = (int)$product->RMPriceOld;
        $brand = $product->Producer_Brand;
//        $price = avito_price($price_rrc, $brand, $discounts, $price_old);
        $price = $price_rrc;

//        $show_discount = avito_show_discount($price_rrc, $brand, $discounts, $price_old);
    @endphp


    @php
        $description = '';

        if($add_description_first != '') {
        $description .= '<p>'.nl2br($add_description_first).'</p>';
        }



        if ($product->Novinka == 1) {
            $description .= '<p>&#9889;Новинка&#9889; <strong>' . $product->Producer_Brand . ' ' . $product->Name .  ' ('
                . $product->Country_of_manufacture . ')</strong></p>';
        } else {
            $description .= '<p><strong>' . $product->Producer_Brand . ' ' . $product->Name .  ' ('
                . $product->Country_of_manufacture . ')</strong></p>';
        }

        $description .= '<p>--------------------</p>';
        $date = date('d.m.Y');
        if ($product->balanceCount > 0) {
            $description .= '<p>&#9989; На утро '.$date.' в Москве '.round($product->balanceCount).' '.$product->MainUnit.' <em>(уточняйте у менеджера)</em></p>';
        }

//        $description .= '<p><strong>&#9889; Цена в объявлении указана за 1 ' . $product->MainUnit . ' &#9889;</strong></p>';

        $description .= '<p><strong>Наличие и актуальные цены уточняйте у менеджера в чате или по телефону.</strong></p>';

        $description .= '<p>Официальный дилер(работаем уже более 10 лет). Скидки от розничной цены. Доставка по Москве, cамовывоз на западе Москвы.</p>';

        $description .= '<p>В наших шоурумах представлены коллекции многих известных производителей керамогранита, керамической плитки, мозаики и других напольных покрытий (ламинат, паркет, кварцвинил, инженерная доска и др.)</p>';
        $description .= '<p>Можно приехать и вживую посмотреть - выбор огромный (4 шоурума в одном месте)! Керамогранит, керамическая плитка, мозаика, ламинат, кварцвинил, инженерная доска и др.</p>';
        $description .= '<p>Работаем с розничными и оптовыми покупателями. А так же предлагаем сотрудничество дизайнерам и строительным компаниям.</p>';
        $description .= '<p>Отправляем по всей России.</p>';

        if ($add_description != '') {
            $description .= '<p>'.nl2br($add_description).'</p>';
        }

    @endphp

    @php
        $keywords = 'смесители лапарет смесители laparet смесители cersanit смесители церсанит сантехника laparet';

        $description .= '<p>_____________________</p>';
        $description .= '<p><em>' . $keywords  . '</em></p>';
    @endphp

    @php
        $img1 = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', config('app.url').'/storage/images/bauservice/products/', $product->Picture);

        if (isset($product->Picture2) && $product->Picture2 != null) {
            $img2 = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', config('app.url').'/storage/images/bauservice/products/', $product->Picture2);
        } else {
            $img2 = null;
        }

        if (isset($product->Picture3) && $product->Picture3 != null) {
            $img3 = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', config('app.url').'/storage/images/bauservice/products/', $product->Picture3);
        } else {
            $img3 = null;
        }

        if (isset($product->Picture4) && $product->Picture4 != null) {
            $img4 = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', config('app.url').'/storage/images/bauservice/products/', $product->Picture4);
        } else {
            $img4 = null;
        }

        if (isset($product->Picture5) && $product->Picture5 != null) {
            $img5 = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', config('app.url').'/storage/images/bauservice/products/', $product->Picture5);
        } else {
            $img5 = null;
        }

        if (isset($product->Picture6) && $product->Picture6 != null) {
            $img6 = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', config('app.url').'/storage/images/bauservice/products/', $product->Picture6);
        } else {
            $img6 = null;
        }


        $img_arr = [];

        $img_arr[] = $img1;

        if ($img2 != null) {
            $img_arr[] = $img2;
        }
        if ($img3 != null) {
            $img_arr[] = $img3;
        }
        if ($img4 != null) {
            $img_arr[] = $img4;
        }
        if ($img5 != null) {
            $img_arr[] = $img5;
        }
        if ($img6 != null) {
            $img_arr[] = $img6;
        }

        $image_urls = avito_images_urls($img_arr, true);

    @endphp

    @php
        $title = $product->Name;

        if (mb_strlen($title) < 92) {
            $title = $product->Producer_Brand . ' ' . $title;
        }
    @endphp



    @php

        $code = $product->Element_Code;
        $video = '';

    @endphp



    @php
        $AdStatus = 'Free';
        $Delivery = 'ПВЗ | Самовывоз с онлайн-оплатой';

        $WeightForDelivery = round((float)$product->Package_Weight, 2);

        if ($product->Pgabarites) {
            $package_gabarites_array = explode('х', $product->Pgabarites);
            sort($package_gabarites_array);

            $LengthForDelivery = round($package_gabarites_array[2]);
            $HeightForDelivery = round($package_gabarites_array[1]);
            $WidthForDelivery = round($package_gabarites_array[0]);
        } else {
            $LengthForDelivery = '';
            $HeightForDelivery = '';
            $WidthForDelivery = '';
        }


    @endphp

    @php
        $Surface = '';
        $Texture = '';
        $EdgeType = '';
        $Shape = '';
        $ResistanceClass = '';
    @endphp

    @php
//        $description .= $show_discount;
    @endphp


    <tr>
        <td>{{ $code }}</td>                                    {{-- Id --}}
        <td>{{ $AdStatus }}</td>                                {{-- AdStatus --}}
        <td></td>                                               {{-- AvitoId --}}
        <td>{{ $name }}</td>                                    {{-- ManagerName --}}
        <td></td>                                               {{-- Email --}}
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
        <td>Сантехника, водоснабжение и сауна</td>              {{-- GoodsType --}}
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
        <td>{{ $ProductType }}</td>                             {{-- ProductType --}}
        <td>{{ $ProductSubType }}</td>                          {{-- ProductSubType --}}
    </tr>

@endforeach
{{-----BAUSERVICE-WATER-MIXERS-END----}}

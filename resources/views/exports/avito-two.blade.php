<table>
    <thead>
    <tr>
        <th>AvitoId</th>
        <th>Id</th>
        <th>ContactMethod</th>
        <th>EMail</th>
        <th>AvitoStatus</th>
        <th>ManagerName</th>
        <th>Price</th>
        <th>CompanyName</th>
        <th>Title</th>
        <th>ImageUrls</th>
        <th>GoodsSubType</th>
        <th>GoodsType</th>
        <th>Category</th>
        <th>ListingFee</th>
        <th>FinishingType</th>
        <th>ContactPhone</th>
        <th>Description</th>
        <th>Address</th>
        <th>AdType</th>
        <th>FinishingSubType</th>
        <th>Condition</th>
        <th>VideoUrl</th>
    </tr>
    </thead>
    <tbody>

    @foreach($collections as $collection)
        @php
            $__collection_id = $collection->Collection_Id;
            $products = \App\Models\Product::where([['Collection_Id', 'like', "%{$__collection_id}%"], ['GroupProduct', '01 Плитка'],['Producer_Brand', 'Laparet'],['Name', 'not like', '%ставк%'], ['Name', 'not like', '%пецэлем%'], ['RMPrice', '>=', '500'], ['Picture', '!=', '']])->whereColumn('RMPrice', '>', 'Price')->get();
        @endphp
        @continue($products->isEmpty())

        @php
            $img_coll_str = $collection->Interior_Pic;
            $img_coll_arr = explode(', ', $img_coll_str);
            $images_collection = []; //container for collection image
            foreach ($img_coll_arr as $i_c) {
                $images_collection[] = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', config('app.url').'/storage/images/bauservice/collections/', $i_c);
            }
        @endphp

        @php
            $description = '';

            if($add_description_first != '') {
                $description .= '<p>'.nl2br($add_description_first).'</p>';
            }

            $collection_first_word = explode(' ',trim($collection->Collection_Name))[0];

            $title = 'Керамогранит Laparet коллекция '.$collection->Collection_Name;

            $FinishingType = 'Плитка, керамогранит и мозаика';
            $FinishingSubType = 'Керамическая плитка';


            $description .= 'Laparet  '.$collection->Collection_Name . ' коллекция керамогранита и керамической плитки';

            $images_products_1 = []; //container for products image Picture1
            $images_products_2 = []; //container for products image Picture2
            $images_products_3 = []; //container for products image Picture3
            $images_products_4 = []; //container for products image Picture4
        @endphp
        @foreach($products as $product)
            @if(mb_stripos($product->Name, $collection_first_word) !== false)
                @php
                    $description .= '<p><em>---------------------</em></p>';
                    $description .= '<p><strong>' . $product->Name . '. '
                           . $product->Producer_Brand . '</strong></p>';
                @endphp

                @php
                    if($product->RMPrice != null) {
                    $description .= '<p><em>'.$product->RMPrice .' Р/'. $product->MainUnit . '</em></p>';
                    }
                    $description .='<ul>';
//                    if($product->Height != 0 && $product->Lenght != 0) {
//                    $description .= '<li>Размер: <em>' . $product->Height .'x' . $product->Lenght . '</em></li>';
//                    }
//                    if($product->Thickness != null && $product->Thickness != 0) {
//                    $description .= '<li>Толщина: <em>' . $product->Thickness . '</em></li>';
//                    }
                    if($product->DesignValue != null) {
                    $description .= '<li>Рисунок: <em>' . $product->DesignValue . '</em></li>';
                    }
                    if($product->Color != null) {
                    $description .= '<li>Цвет: <em>' . $product->Color . '</em></li>';
                    }
                    if($product->Surface != null) {
                    $description .= '<li>Поверхность: <em>' . $product->Surface . '</em></li>';
                    }
//                    if($product->PCS_in_Package != null) {
//                    $description .= '<li>В упаковке штук: <em>' . $product->PCS_in_Package . '</em></li>';
//                    }
//                    if($product->Package_Value != null && $product->Package_Value != $product->PCS_in_Package) {
//                    $description .= '<li>В упаковке: <em>' . $product->Package_Value .' '.$product->MainUnit. '</em></li>';
//                    }
//                    if($product->balanceCount != null) {
//                    $description .= '<li>Примерный остаток: <em>' . $product->balanceCount .' '.$product->MainUnit. '</em></li>';
//                    }

                    $description .= '</ul>';
                @endphp

                @php
                    $images_products_1[] = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', config('app.url').'/storage/images/bauservice/products/', $product->Picture);
                    if (isset($product->Picture2) && $product->Picture2 != null) {
                    $images_products_2[] = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', config('app.url').'/storage/images/bauservice/products/', $product->Picture2);
                    } else {$img2 = null;}
                    if (isset($product->Picture3) && $product->Picture3 != null) {
                    $images_products_3[] = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', config('app.url').'/storage/images/bauservice/products/', $product->Picture3);
                    } else {$img3 = null;}
                    if (isset($product->Picture4) && $product->Picture4 != null) {
                    $images_products_3[] = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', config('app.url').'/storage/images/bauservice/products/', $product->Picture4);
                    } else {$img4 = null;}

        //    ------------------------------------------FOTO-------------------------------------



                @endphp
            @endif
        @endforeach

        @php
            $images_collection = array_slice($images_collection, 0, 2);
            $images_products_1 = array_slice($images_products_1, 0, 2);
            $images_products_2 = array_slice($images_products_2, 0, 2);
            $images_products_3 = array_slice($images_products_3, 0, 2);
            $images_products_4 = array_slice($images_products_4, 0, 2);

            $img_full = '';
            foreach ($images_collection as $i_c) {
                if (isset($i_c)) {
                    $img_full .= $i_c . ' | ';
                }
            }
            foreach ($images_products_1 as $i_p_1) {
                if (isset($i_p_1)) {
                    $img_full .= $i_p_1 . ' | ';
                }
            }
            foreach ($images_products_2 as $i_p_2) {
                if (isset($i_p_2)) {
                    $img_full .= $i_p_2 . ' | ';
                }
            }
            foreach ($images_products_3 as $i_p_3) {
                if (isset($i_p_3)) {
                    $img_full .= $i_p_3 . ' | ';
                }
            }
            foreach ($images_products_4 as $i_p_4) {
                if (isset($i_p_4)) {
                    $img_full .= $i_p_4 . ' | ';
                }
            }

            $img_full = trim($img_full, ' | ');

        @endphp

        @php
            if($add_description != '') {
                $description .= '<p>'.nl2br($add_description).'</p>';
            }
            $price = '';
            $element_code = str_replace('х', '', $product->Element_Code).'_bau';
        @endphp

        <tr>
            <td></td>
            <td>{{ $element_code }}</td>
            <td>{{ $contact_method }}</td>
            <td>rodioncom@yandex.ru</td>
            <td>Активно</td>
            <td>{{ $name }}</td>
            <td>{{$price}}</td>
            <td>Керамическая плитка. Керамогранит</td>
            <td>{{$title}}</td>
            <td>{{$img_full}}</td>
            <td>Отделка</td>
            <td>Стройматериалы</td>
            <td>Ремонт и строительство</td>
            <td>Package</td>
            <td>{{$FinishingType}}</td>
            <td>{{ $phone }}</td> <!-- -->
            <td>{{$description}}</td> <!-- -->
            <td>{{ $address }}</td>
            <td>Товар от производителя</td>
            <td>{{$FinishingSubType}}</td>
            <td>Новое</td>
            <td></td>
        </tr>
    @endforeach
    {{-----------------------------------END-BAUSERVICE--------------------------}}
    </tbody>
</table>

<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Type</th>
        <th>SKU</th>
        <th>Name</th>
        <th>Published</th>
        <th>Is featured?</th>
        <th>Visibility in catalog</th>
        <th>Short description</th>
        <th>Description</th>
        <th>Date sale price starts</th>
        <th>Date sale price ends</th>
        <th>Tax status</th>
        <th>Tax class</th>
        <th>In stock?</th>
        <th>Stock</th>
        <th>Low stock amount</th>
        <th>Backorders allowed?</th>
        <th>Sold individually?</th>
        <th>Weight (unit)</th>
        <th>Length (unit)</th>
        <th>Width (unit)</th>
        <th>Height (unit)</th>
        <th>Allow customer reviews?</th>
        <th>Purchase Note</th>
        <th>Sale price</th>
        <th>Regular price</th>
        <th>Categories</th>
        <th>Tags</th>
        <th>Shipping class</th>
        <th>Images</th>
        <th>Download limit</th>
        <th>Download expiry days</th>
        <th>Parent</th>
        <th>Grouped products</th>
        <th>Upsells</th>
        <th>Cross-sells</th>
        <th>External URL</th>
        <th>Button text</th>
        <th>Position</th>
        <th>Attribute 1 name</th>
        <th>Attribute 1 value(s)</th>
        <th>Attribute 1 default</th>
        <th>Attribute 1 visible</th>
        <th>Attribute 1 global</th>
        <th>Download 1 name</th>
        <th>Download 1 URL</th>
        <th>Attribute 2 name</th>
        <th>Attribute 2 value(s)</th>
        <th>Attribute 2 default</th>
        <th>Attribute 2 visible</th>
        <th>Attribute 2 global</th>
        <th>Download 2 name</th>
        <th>Download 2 URL</th>
        <th>Attribute 3 name</th>
        <th>Attribute 3 value(s)</th>
        <th>Attribute 3 default</th>
        <th>Attribute 3 visible</th>
        <th>Attribute 3 global</th>
        <th>Download 3 name</th>
        <th>Download 3 URL</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)

        @php
            $img1 = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', config('app.url').'/storage/images/bauservice/products/', $product->Picture);

            if (isset($product->Picture2) && $product->Picture2 != null) {
            $img2 = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', config('app.url').'/storage/images/bauservice/products/', $product->Picture2);
            } else {$img2 = null;}
            if (isset($product->Picture3) && $product->Picture3 != null) {
            $img3 = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', config('app.url').'/storage/images/bauservice/products/', $product->Picture3);
            } else {$img3 = null;}
            if (isset($product->Picture4) && $product->Picture4 != null) {
            $img4 = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', config('app.url').'/storage/images/bauservice/products/', $product->Picture4);
            } else {$img4 = null;}
            if (isset($product->Picture5) && $product->Picture5 != null) {
            $img5 = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', config('app.url').'/storage/images/bauservice/products/', $product->Picture5);
            } else {$img5 = null;}
            if (isset($product->Picture6) && $product->Picture6 != null) {
            $img6 = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', config('app.url').'/storage/images/bauservice/products/', $product->Picture6);
            } else {$img6 = null;}

            if (isset($product->collections[0])) {
            $img_coll_all = $product->collections[0]->Interior_Pic;
            $img_coll_all = explode(', ', $img_coll_all);
            $img_coll = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', config('app.url').'/storage/images/bauservice/collections/', $img_coll_all[0]);
            } else {
            $img_coll = null;
            }


//            if (isset($img_coll_all[1])) {
//            $img_coll_2 = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', config('app.url').'/storage/images/bauservice/collections/', $img_coll_all[1]);
//            } else {
//            $img_coll_2 = null;
//            }


            if ($img_coll != null) {
                $img_full = $img_coll . ', ' . $img1;
            } else {
                $img_full = $img1;
            }


//            if ($img_coll != null) {
//            $img_full .= ' | ' . $img1;
//            }
//            if ($img_coll_2 != null) {
//            $img_full .= ' | ' . $img_coll_2;
//            }

            if ($img2 != null) {
            $img_full .= ', ' . $img2;
            }
            if ($img3 != null) {
            $img_full .= ', ' . $img3;
            }
            if ($img4 != null) {
            $img_full .= ', ' . $img4;
            }
            if ($img5 != null) {
            $img_full .= ', ' . $img5;
            }
            if ($img6 != null) {
            $img_full .= ', ' . $img6;
            }

        @endphp

        @php
            if ($product->RMPriceOld == 0) {
                $sale_price = '';
                $price = $product->RMPrice;
            } else {
                $sale_price = $product->RMPrice;
                $price = $product->RMPriceOld;
            }
        @endphp

        <tr>
            <td>{{ Str::replace('х', '', $product->Element_Code) }}</td>
            <td>simple</td>
            <td>{{ Str::slug($product->Name) }}</td>
            <td>{{ $product->Name }}</td>
            <td>1</td>
            <td>1</td>
            <td>visible</td>
            <td>Короткое описание {{ $product->Name }}</td>
            <td>Полное описание {{ $product->Name }}</td>
            <td></td>
            <td></td>
            <td>taxable</td>
            <td>standard</td>
            <td>1</td>
            <td>{{ round($product->balanceCount) }}</td>
            <td></td>
            <td>1</td>
            <td>0</td>
            <td>15</td>
            <td>{{ round($product->Lenght) }}</td>
            <td>{{ round($product->Width) }}</td>
            <td></td>
            <td>1</td>
            <td>Спасибо за покупку!</td>
            <td>{{ $sale_price }}</td>
            <td>{{ $price }}</td>
            <td>Керамогранит > Карвинг</td>
            <td></td>
            <td></td>
            <td>{{ $img_full }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>1</td>
            <td>Цвет</td>
            <td>{{ $product->Color }}</td>
            <td></td>
            <td>1</td>
            <td>1</td>
            <td></td>
            <td></td>
            <td>Поверхность</td>
            <td>{{ $product->Surface }}</td>
            <td></td>
            <td>1</td>
            <td>1</td>
            <td></td>
            <td></td>
            <td>Дизайн</td>
            <td>{{ $product->DesignValue }}</td>
            <td></td>
            <td>1</td>
            <td>1</td>
            <td></td>
            <td></td>
        </tr>
    @endforeach
    </tbody>
</table>

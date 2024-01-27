{{--AVITO-2--}}

{{--    -------------HELPERS---------------}}
@php
    function avito_header_add(string $vendor_name): string
    {
        $header = '<p>Добрый день. Мы являемся официальными дилерами производителя '.$vendor_name.'. ';
        $header .='В нашем шоу-руме вы можете ознакомиться со всеми коллекциями керамогранита и керамической плитки.</p>';
        return $header;
    }

    function avito_footer_add(): string
    {
        $footer = '<p>_____________</p>';
        $footer .= '<p>Приглашаем вас в наш салон</p>';
        $footer .= '<p>Более детально по наличию и цене уточняйте в виде сообщения</p>';
        $footer .= '<p>Если вам не хватило, то укажите нужный артикул керамогранита (дату производства, номер партии, тон, калибр), и мы ответим вам по наличию и цене</p>';
        $footer .= '<p>Просим учесть что некоторые позиции заканчиваются или поступление будет в ближайшее время</p>';
        return $footer;
    }
@endphp
{{--    -----------HELPERS-END-------------}}

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

    {{---------------------BAUSERVICE--------------------------}}
    @foreach($collections as $collection)
        @php
            $description = '';
            if($add_description_first != '') {
                $description .= '<p>'.nl2br($add_description_first).'</p>';
            }

            $__collection_id = $collection->Collection_Id;
            $products = \App\Models\Product::where([['Collection_Id', 'like', "%{$__collection_id}%"], ['GroupProduct', '01 Плитка'],['Producer_Brand', 'Laparet'],['Name', 'not like', '%ставк%'], ['Name', 'not like', '%пецэлем%'], ['RMPrice', '>=', '500'], ['Picture', '!=', '']])->whereColumn('RMPrice', '>', 'Price')->get();

            $img_coll_str = $collection->Interior_Pic;
            $img_coll_arr = explode(', ', $img_coll_str);
            $images_collection = []; //container for collection image
            foreach ($img_coll_arr as $i_c) {
                $images_collection[] = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', config('app.url').'/storage/images/bauservice/collections/', $i_c);
            }

            $description .= avito_header_add('Laparet');

            $collection_first_word = explode(' ',trim($collection->Collection_Name))[0];

//            $title = 'Керамогранит Laparet коллекция '.$collection->Collection_Name;
//            $title = 'Laparet '.$collection->Collection_Name.' керамогранит Лапарет';
            $title = 'Керамогранит Laparet '.$collection->Collection_Name;

            if (mb_strlen($title) > 50) {
                $title = str_replace(' Laparet', '', $title);
            }
            if (mb_strlen($title) > 50) {
                $title = str_replace('Керамогранит ', '', $title);
            }

            $FinishingType = 'Плитка, керамогранит и мозаика';
            $FinishingSubType = 'Керамическая плитка';


            $description .= '<p><strong>Laparet  '.$collection->Collection_Name . ' коллекция керамогранита и керамической плитки</strong></p>';

            $images_products_1 = []; //container for products image Picture1
            $images_products_2 = []; //container for products image Picture2
            $images_products_3 = []; //container for products image Picture3
            $images_products_4 = []; //container for products image Picture4
            $images_products_5 = []; //container for products image Picture5
            $images_products_6 = []; //container for products image Picture6
        @endphp
        @foreach($products as $product)
            @if(mb_stripos($product->Name, $collection_first_word) !== false)
                @php
                    $description .= '<p><em>---------------------</em></p>';
                    $description .= '<p><strong>&#128204; ' . $product->Name . ' '
                           . $product->Producer_Brand . '</strong></p>';


                    if ($product->RMPriceOld == 0 || $product->RMPriceOld == $product->RMPrice) {
                        $price_product = round($product->RMPrice * 0.9, -1);
                    } else {
                        $price_product = $product->RMPrice;
                    }

                        if($product->RMPrice != null) {
                        $description .= '<p>Цена <em>'.$price_product .' Р/'. $product->MainUnit . '</em></p>';
                        }
                        $description .='<ul>';
    //                    if($product->Height != 0 && $product->Lenght != 0) {
    //                    $description .= '<li>Размер: <em>' . $product->Height .'x' . $product->Lenght . '</em></li>';
    //                    }
    //                    if($product->Thickness != null && $product->Thickness != 0) {
    //                    $description .= '<li>Толщина: <em>' . $product->Thickness . '</em></li>';
    //                    }
                        if($product->Owner_Article != null) {
                        $description .= '<li>Артикул: <em>' . $product->Owner_Article . '</em></li>';
                        }
                        if($product->DesignValue != null) {
                        $description .= '<li>Рисунок: <em>' . $product->DesignValue . '</em></li>';
                        }
                        if($product->Color != null) {
                        $description .= '<li>Цвет: <em>' . $product->Color . '</em></li>';
                        }
                        if($product->Surface != null) {
                        $description .= '<li>Поверхность: <em>' . $product->Surface . '</em></li>';
                        }
//                        if($product->Field_of_Application != null) {
//                        $description .= '<li>Подходит: <em>' . $product->Field_of_Application . '</em></li>';
//                        }
    //                    if($product->PCS_in_Package != null) {
    //                    $description .= '<li>В упаковке штук: <em>' . $product->PCS_in_Package . '</em></li>';
    //                    }
    //                    if($product->Package_Value != null && $product->Package_Value != $product->PCS_in_Package) {
    //                    $description .= '<li>В упаковке: <em>' . $product->Package_Value .' '.$product->MainUnit. '</em></li>';
    //                    }
                        $date_now = $product->updated_at->format('d.m.Y');

                            if ($product->balanceCount == 0) {
                                $description .= '<li>Свободный остаток: <em>по запросу</em></li>';
                            } elseif ($product->balanceCount > 0 && $product->balanceCount <= 2) {
                                $description .= '<li>Свободный остаток: <em> до 2 '.$product->MainUnit. ' ('. $date_now .')</em></li>';
                            } elseif ($product->balanceCount > 2 && $product->balanceCount <= 5) {
                                $description .= '<li>Свободный остаток: <em> 2 - 5 '.$product->MainUnit. ' ('. $date_now .')</em></li>';
                            } elseif ($product->balanceCount > 5 && $product->balanceCount <= 10) {
                                $description .= '<li>Свободный остаток: <em> 5 - 10 '.$product->MainUnit. ' ('. $date_now .')</em></li>';
                            } elseif ($product->balanceCount > 10 && $product->balanceCount <= 25) {
                                $description .= '<li>Свободный остаток: <em> 10 - 25 '.$product->MainUnit. ' ('. $date_now .')</em></li>';
                            } elseif ($product->balanceCount > 25 && $product->balanceCount <= 50) {
                                $description .= '<li>Свободный остаток: <em> 25 - 50 '.$product->MainUnit. ' ('. $date_now .')</em></li>';
                            } elseif ($product->balanceCount > 50 && $product->balanceCount <= 75) {
                                $description .= '<li>Свободный остаток: <em> 50 - 75 '.$product->MainUnit. ' ('. $date_now .')</em></li>';
                            } elseif ($product->balanceCount > 75 && $product->balanceCount <= 100) {
                                $description .= '<li>Свободный остаток: <em> 75 - 100 '.$product->MainUnit. ' ('. $date_now .')</em></li>';
                            } elseif ($product->balanceCount > 100 && $product->balanceCount <= 125) {
                                $description .= '<li>Свободный остаток: <em> 100 - 125 '.$product->MainUnit. ' ('. $date_now .')</em></li>';
                            } elseif ($product->balanceCount > 125 && $product->balanceCount <= 150) {
                                $description .= '<li>Свободный остаток: <em> 125 - 150 '.$product->MainUnit. ' ('. $date_now .')</em></li>';
                            } elseif ($product->balanceCount > 150 && $product->balanceCount <= 175) {
                                $description .= '<li>Свободный остаток: <em> 150 - 175 '.$product->MainUnit. ' ('. $date_now .')</em></li>';
                            } elseif ($product->balanceCount > 175 && $product->balanceCount <= 200) {
                                $description .= '<li>Свободный остаток: <em> 175 - 200 '.$product->MainUnit. ' ('. $date_now .')</em></li>';
                            } elseif ($product->balanceCount > 200 && $product->balanceCount <= 300) {
                                $description .= '<li>Свободный остаток: <em> 200 - 300 '.$product->MainUnit. ' ('. $date_now .')</em></li>';
                            } elseif ($product->balanceCount > 300 && $product->balanceCount <= 400) {
                                $description .= '<li>Свободный остаток: <em> 300 - 400 '.$product->MainUnit. ' ('. $date_now .')</em></li>';
                            } elseif ($product->balanceCount > 400 && $product->balanceCount <= 500) {
                                $description .= '<li>Свободный остаток: <em> 400 - 500 '.$product->MainUnit. ' ('. $date_now .')</em></li>';
                            } else {
                                $description .= '<li>Свободный остаток: <em> более 500 '.$product->MainUnit. ' ('. $date_now .')</em></li>';
                            }

                        $description .= '</ul>';

                    $images_products_1[] = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', config('app.url').'/storage/images/bauservice/products/', $product->Picture);
                    if (isset($product->Picture2) && $product->Picture2 != null) {
                    $images_products_2[] = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', config('app.url').'/storage/images/bauservice/products/', $product->Picture2);
                    } else {$img2 = null;}
                    if (isset($product->Picture3) && $product->Picture3 != null) {
                    $images_products_3[] = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', config('app.url').'/storage/images/bauservice/products/', $product->Picture3);
                    } else {$img3 = null;}
                    if (isset($product->Picture4) && $product->Picture4 != null) {
                    $images_products_4[] = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', config('app.url').'/storage/images/bauservice/products/', $product->Picture4);
                    } else {$img4 = null;}
                    if (isset($product->Picture5) && $product->Picture5 != null) {
                    $images_products_5[] = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', config('app.url').'/storage/images/bauservice/products/', $product->Picture5);
                    } else {$img4 = null;}
                    if (isset($product->Picture6) && $product->Picture6 != null) {
                    $images_products_6[] = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', config('app.url').'/storage/images/bauservice/products/', $product->Picture6);
                    } else {$img4 = null;}

        //    ------------------------------------------FOTO-------------------------------------

                @endphp
            @endif
        @endforeach

        @php
            $images_collection = array_slice($images_collection, 0, 2);

            $img_full_arr = [];
            foreach ($images_collection as $i_c) {
                if (isset($i_c)) {
                    $img_full_arr[] = $i_c;
                }
            }
            foreach ($images_products_1 as $i_p_1) {
                if (isset($i_p_1)) {
                    $img_full_arr[] = $i_p_1;
                }
            }
            foreach ($images_products_2 as $i_p_2) {
                if (isset($i_p_2)) {
                    $img_full_arr[] = $i_p_2;
                }
            }
            foreach ($images_products_3 as $i_p_3) {
                if (isset($i_p_3)) {
                    $img_full_arr[] = $i_p_3;
                }
            }
            foreach ($images_products_4 as $i_p_4) {
                if (isset($i_p_4)) {
                    $img_full_arr[] = $i_p_4;
                }
            }
            foreach ($images_products_5 as $i_p_5) {
                if (isset($i_p_5)) {
                    $img_full_arr[] = $i_p_5;
                }
            }
            foreach ($images_products_6 as $i_p_6) {
                if (isset($i_p_6)) {
                    $img_full_arr[] = $i_p_6;
                }
            }

            $img_full_arr = array_slice($img_full_arr, 0, 10);
            $img_full = implode(' | ', $img_full_arr);
            $img_full = trim($img_full, ' | ');

        @endphp

        @php
            $description .= avito_footer_add();
            if($add_description != '') {
                        $description .= '<p>'.nl2br($add_description).'</p>';
            }

            $description .= '<p>_____________</p>';
            $description .= '<p><em>Лапарет '.$collection->Collection_Name.'</em><br>';
            $description .= '<em>Laparet '.$collection->Collection_Name.'</em></p>';
            $description .= '<p><em>керамогранит для пола купить керамогранит 60х120 керамогранит для ванной для кухни керамогранит в ванную керамогранит керамическая плитка купить керамогранит плитка для пола 60*60 керамогранит 60*120 керамогранит со скидкой</em></p>';
            if($add_description != '') {
                $description .= '<p>'.nl2br($add_description).'</p>';
            }
            $price = '';

            $element_code = str_replace(' ', '', $collection->Collection_Name).'_bau';
            $element_code = str_replace('бежевый', 'bezh', $element_code);
            $element_code = str_replace('серый', 'ser', $element_code);
            $element_code = str_replace('беж', 'bezhe', $element_code);
            $element_code = str_replace('Студио', 'Studio', $element_code);
            $element_code = str_replace('Мармара', 'Marmara', $element_code);

//            if ($collection->Collection_Name == 'Vita') {
//                 $element_code = '9999303577_bau';
//            }
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
    {{------------------END-BAUSERVICE--------------------}}


    {{-------------------MONPARNAS--------------------}}
    @php
        $description = '';

        $collection = $monparnas[0]->collections[0];
        $img_coll_str = $collection->Interior_Pic;
        $img_coll_arr = explode(', ', $img_coll_str);
        $images_collection = []; //container for collection image
        foreach ($img_coll_arr as $i_c) {
            $images_collection[] = str_replace('ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/', config('app.url').'/storage/images/bauservice/collections/', $i_c);
        }


        if($add_description_first != '') {
            $description .= '<p>'.nl2br($add_description_first).'</p>';
        }

        $description .= avito_header_add('Kerama Marazzi');

//            $collection_first_word = explode(' ',trim($collection->Collection_Name))[0];

        $title = 'Kerama Marazzi коллекция '.$collection->Collection_Name;

        $FinishingType = 'Плитка, керамогранит и мозаика';
        $FinishingSubType = 'Керамическая плитка';

        $description .= '<p><strong>&#127876; Kerama Marazzi  '.$collection->Collection_Name . ' коллекция настенной плитки и декоров</strong></p>';

        $images_products_1 = []; //container for products image Picture1
        $images_products_2 = []; //container for products image Picture2
        $images_products_3 = []; //container for products image Picture3
        $images_products_4 = []; //container for products image Picture4
    @endphp
    @foreach($monparnas as $product)
        @php
            $description .= '<p><em>---------------------</em></p>';
            $description .= '<p><strong>&#128204; ' . $product->Name . '. '
                   . $product->Producer_Brand . '</strong></p>';


//                    if ($product->RMPriceOld == 0 || $product->RMPriceOld == $product->RMPrice) {
//                        $price_product = round($product->RMPrice * 0.9, -1);
//                    } else {
//                        $price_product = $product->RMPrice;
//                    }
                $price_product = $product->RMPrice;

                if($product->RMPrice != null) {
                $description .= '<p>Цена <em>'.$price_product .' Р/'. $product->MainUnit . '</em></p>';
                }
                $description .='<ul>';
//                    if($product->Height != 0 && $product->Lenght != 0) {
//                    $description .= '<li>Размер: <em>' . $product->Height .'x' . $product->Lenght . '</em></li>';
//                    }
//                    if($product->Thickness != null && $product->Thickness != 0) {
//                    $description .= '<li>Толщина: <em>' . $product->Thickness . '</em></li>';
//                    }
                if($product->Owner_Article != null) {
                $description .= '<li>Артикул: <em>' . $product->Owner_Article . '</em></li>';
                }
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
                $date_now = $product->updated_at->format('d.m.Y');

                    if ($product->balanceCount == 0) {
                        $description .= '<li>Остаток: <em>по запросу</em></li>';
                    } elseif ($product->balanceCount > 0 && $product->balanceCount <= 2) {
                        $description .= '<li>Остаток: <em> до 2 '.$product->MainUnit. ' ('. $date_now .')</em></li>';
                    } elseif ($product->balanceCount > 2 && $product->balanceCount <= 5) {
                        $description .= '<li>Остаток: <em> 2 - 5 '.$product->MainUnit. ' ('. $date_now .')</em></li>';
                    } elseif ($product->balanceCount > 5 && $product->balanceCount <= 10) {
                        $description .= '<li>Остаток: <em> 5 - 10 '.$product->MainUnit. ' ('. $date_now .')</em></li>';
                    } elseif ($product->balanceCount > 10 && $product->balanceCount <= 25) {
                        $description .= '<li>Остаток: <em> 10 - 25 '.$product->MainUnit. ' ('. $date_now .')</em></li>';
                    } elseif ($product->balanceCount > 25 && $product->balanceCount <= 50) {
                        $description .= '<li>Остаток: <em> 25 - 50 '.$product->MainUnit. ' ('. $date_now .')</em></li>';
                    } elseif ($product->balanceCount > 50 && $product->balanceCount <= 75) {
                        $description .= '<li>Остаток: <em> 50 - 75 '.$product->MainUnit. ' ('. $date_now .')</em></li>';
                    } elseif ($product->balanceCount > 75 && $product->balanceCount <= 100) {
                        $description .= '<li>Остаток: <em> 75 - 100 '.$product->MainUnit. ' ('. $date_now .')</em></li>';
                    } elseif ($product->balanceCount > 100 && $product->balanceCount <= 125) {
                        $description .= '<li>Остаток: <em> 100 - 125 '.$product->MainUnit. ' ('. $date_now .')</em></li>';
                    } elseif ($product->balanceCount > 125 && $product->balanceCount <= 150) {
                        $description .= '<li>Остаток: <em> 125 - 150 '.$product->MainUnit. ' ('. $date_now .')</em></li>';
                    } elseif ($product->balanceCount > 150 && $product->balanceCount <= 175) {
                        $description .= '<li>Остаток: <em> 150 - 175 '.$product->MainUnit. ' ('. $date_now .')</em></li>';
                    } elseif ($product->balanceCount > 175 && $product->balanceCount <= 200) {
                        $description .= '<li>Остаток: <em> 175 - 200 '.$product->MainUnit. ' ('. $date_now .')</em></li>';
                    } elseif ($product->balanceCount > 200 && $product->balanceCount <= 300) {
                        $description .= '<li>Остаток: <em> 200 - 300 '.$product->MainUnit. ' ('. $date_now .')</em></li>';
                    } elseif ($product->balanceCount > 300 && $product->balanceCount <= 400) {
                        $description .= '<li>Остаток: <em> 300 - 400 '.$product->MainUnit. ' ('. $date_now .')</em></li>';
                    } elseif ($product->balanceCount > 400 && $product->balanceCount <= 500) {
                        $description .= '<li>Остаток: <em> 400 - 500 '.$product->MainUnit. ' ('. $date_now .')</em></li>';
                    } else {
                        $description .= '<li>Остаток: <em> более 500 '.$product->MainUnit. ' ('. $date_now .')</em></li>';
                    }

                $description .= '</ul>';

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
    @endforeach

    @php
        $images_collection = array_slice($images_collection, 0, 2);
        $images_products_1 = array_slice($images_products_1, 0, 9);
        $images_products_2 = array_slice($images_products_2, 0, 2);
        $images_products_3 = array_slice($images_products_3, 0, 2);
        $images_products_4 = array_slice($images_products_4, 0, 2);

//            dd($images_products_2);

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

//            dd($img_full);

    @endphp

    @php
        $description .= avito_footer_add();
        $description .= '<p><em>Керама Марацци '.$collection->Collection_Name.'</em><br>';
        $description .= '<em>Kerama Marazzi '.$collection->Collection_Name.'</em></p>';
        if($add_description != '') {
            $description .= '<p>'.nl2br($add_description).'</p>';
        }
        $price = '';
        $element_code = 'monparnas_bau';
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
    {{-----------------MONPARNAS-END--------------------}}

    {{-------------------EMPERO--------------------}}
    @foreach($emperos as $product)
        @php
            $price = $product->price;
//            $price = round($price * 0.93, -1);
//                --------------------------
            $title = 'Керамогранит ' . str_replace(' Универсальная', '', $product->$title);
//                -----------------------------
//              ------------------------------------------FOTO-------------------------------------

            $img = [];
            foreach ($product->images as $i) {
                $img[] = Storage::disk('empero')->url(mb_substr($i['images-href'], mb_strpos($i['images-href'], 'src=') + 4));
            }

            $img_collection = [];
            foreach ($product->img_collection as $i_c) {
                if ((mb_substr($i_c['img_collection-src'], mb_strpos($i_c['img_collection-src'], 'src=') + 4)) != '/components/com_jshopping/files/img_categories/noimage.gif') {
                    $img_collection[] = Storage::disk('empero')->url(mb_substr($i_c['img_collection-src'], mb_strpos($i_c['img_collection-src'], 'src=') + 4));
                }
            }



            $img_full_arr = array_merge($img_collection, $img);

            if (count($img_full_arr) <= 10) {
                $img_ready = implode(' | ', $img_full_arr);
            } else {
                $img_full_arr = array_slice($img_full_arr, 0, 10);
                $img_ready = implode(' | ', $img_full_arr);
            }
            // -------------FOTO-END----------------

            $description = '';

             if($add_description_first != '') {
                $description .= '<p>'.nl2br($add_description_first).'</p>';
            }

            $description .= avito_header_add('Empero');

            $FinishingType = 'Плитка, керамогранит и мозаика';
            $FinishingSubType = 'Керамическая плитка';

            $description .= '<p><em>---------------------</em></p>';
                    $description .= '<p><strong>&#128204; ' . $product->title . ' '
                           . $product->brand . '</strong></p>';


                        $description .='<ul>';
                        if($product->price != null) {
                            $description .= '<li>Цена <em>'. $price .' Р/м2</em></li>';
                        }
                        if($product->collection != null) {
                            $description .= '<li>Коллекция: <em>' . $product->collection . '</em></li>';
                        }
                        if($product->size != null) {
                            $description .= '<li>Размер: <em>' . $product->size . ' см</em></li>';
                        }
                        if($product->fat != null) {
                            $description .= '<li>Толщина: <em>' . $product->fat . ' мм</em></li>';
                        }
                        if($product->stock_real != null) {
                            $description .= '<li>Свободный остаток: '.($product->stock_real * $product->square_one). ' м2 ('. $product->updated_at->format('d.m.Y') .')</em></li>';
                        }
//                        if($product->Field_of_Application != null) {
//                        $description .= '<li>Подходит: <em>' . $product->Field_of_Application . '</em></li>';
//                        }
    //                    if($product->PCS_in_Package != null) {
    //                    $description .= '<li>В упаковке штук: <em>' . $product->PCS_in_Package . '</em></li>';
    //                    }
    //                    if($product->Package_Value != null && $product->Package_Value != $product->PCS_in_Package) {
    //                    $description .= '<li>В упаковке: <em>' . $product->Package_Value .' '.$product->MainUnit. '</em></li>';
    //                    }
                        $description .= '</ul>';

            $description .= avito_footer_add();
            $description .= '<p>_____________</p>';
            $description .= '<p><em>Empero '.$product->collection.'</em></p>';
            $description .= '<p><em>керамогранит для пола купить керамогранит 60х120 керамогранит для ванной для кухни керамогранит в ванную керамогранит керамическая плитка купить керамогранит плитка для пола 60*60 керамогранит 60*120 керамогранит со скидкой</em></p>';
            if($add_description != '') {
                $description .= '<p>'.nl2br($add_description).'</p>';
            }
            $element_code = $product->vendor_code.'_empero';
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
            <td>{{$img_ready}}</td>
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
    {{-----------------EMPERO-END-------------------}}

    </tbody>
</table>

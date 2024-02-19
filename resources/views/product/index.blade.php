@extends('main')

@section('title', config('app.name'))

@section('content')
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div>
                <p></p>
            </div>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="row row-cols-1 row-cols-md-3 g-4">

                @foreach($products as $product)

                    @php
                        $string_for_delete = 'ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/';
                        $name_file = Str::remove($string_for_delete, $product->Picture);
                        $url1 = Storage::disk('public')->url($name_file);
                    @endphp

                    @php
                        if ($product->RMPriceOld > 0 && $product->RMPriceOld > $product->RMPrice) {
                          $old_price = $product->RMPriceOld;
                        } else {
                            $old_price = '';
                        }

                        $vivod = $product->Vivod;
                        if ($vivod == 1) {
                            $vivod = 'Вывод из OA';
                        } else {
                            $vivod = '';
                        }

                    @endphp
                    @php
                        $text_color = '';
                        $date_now = \Carbon\Carbon::now();
                        $date_of_update = $product->updated_at;
                        $diff_days = $date_now->diffInDays($date_of_update);

                        if ($diff_days == 0) {
                            $text_color = 'text-success';
                        } elseif ($diff_days <= 7) {
                            $text_color = 'text-warning';
                        } else {
                            $text_color = 'text-danger';
                        }
//                        -------------------------
                    if ($product->spb) {
                        $stock_spb = $product->spb->balanceCount;
                    } else {
                        $stock_spb = null;
                    }


                    @endphp

                    <div class="col">
                        <div class="card h-100">
                            <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> -->
                            <a href="/product/{{$product->id}}">
                                <img src="{{$url1}}" class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <a href="/product/{{$product->id}}" class="text-decoration-none text-reset">
                                    <h5 class="card-title">{{$product->Producer_Brand}} {{$product->Name}}</h5>
                                </a>
                            </div>
                            <div class="card-footer">
                                <h5 class="card-title pricing-card-title">{{$product->RMPrice}} <span class="text-muted fw-light">₽/{{$product->MainUnit}}</span> <span class="text-muted fw-light"><del>{{$old_price}} </del></span></h5>
                                <hr>
                                @if($product->Producer_Brand == 'Laparet' && ($product->RMPriceOld == 0 || $product->RMPriceOld == $product->RMPrice))
                                    <p class="d-inline-flex mb-1 px-2 py-1 fw-semibold text-info-emphasis bg-info-subtle border border-info-subtle rounded-2">Цена -10% {{round($product->RMPrice * 0.90, -1)}} ₽/{{$product->MainUnit}}</p>
                                    <hr>
                                @endif
                                @if($product->Producer_Brand == 'Vitra' && ($product->RMPriceOld == 0 || $product->RMPriceOld == $product->RMPrice))
                                    <p class="d-inline-flex mb-1 px-2 py-1 fw-semibold text-info-emphasis bg-info-subtle border border-info-subtle rounded-2">Цена -5% {{round($product->RMPrice * 0.95, -1)}} ₽/{{$product->MainUnit}}</p>
                                    <hr>
                                @endif
                                @if($product->RMPriceOld && $product->RMPriceOld != $product->RMPrice)
                                    <p class="d-inline-flex mb-1 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2 text-uppercase">Распродажа</p>                                    <hr>
                                @endif

                                @if ($stock_spb)
                                    <p class="fs-5 text-body-secondary">Остаток: {{$product->balanceCount}} {{$product->MainUnit}} <mark>(СПб: {{$stock_spb}} {{$product->MainUnit}})</mark> {{$vivod}}</p>
                                @else
                                    <p class="fs-5 text-body-secondary">Остаток: {{$product->balanceCount}} {{$product->MainUnit}} {{$vivod}}</p>
                                @endif
                                <hr>

                                <small class="fs-5 text-body-secondary"> Обновлено: <span class="{{$text_color}}" style="--bs-text-opacity: .7;">{{$product->updated_at->format('d.m.Y')}}</span></small>
{{--                                <hr>--}}
{{--                                @php--}}
{{--                                    $vendor_code = str_replace('х', '', $product->Element_Code);--}}
{{--                                    $files = Storage::disk('foto')->files('/'.$vendor_code);--}}
{{--                                @endphp--}}
{{--                                @if(count($files))--}}
{{--                                    <p class="h5 text-success">Есть {{ count($files) }} фото</p>--}}
{{--                                @else--}}
{{--                                    <p class="h5 text-danger">Нет фото</p>--}}
{{--                                @endif--}}
                            </div>


                        </div>
                    </div>

                @endforeach

            </div>


            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
            <a href="whatsapp://send?phone=79151274000&text=" class="float" target="_blank">
                <i class="fa fa-whatsapp my-float"></i>
            </a>


        </div>
    </div>
    {{ $products->links() }}
@endsection

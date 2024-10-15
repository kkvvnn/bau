@extends('main')

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
                        if ($product->RMPriceOld > 0) {
                          $old_price = $product->RMPriceOld;
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
                @endphp

                    <div class="col">
                        <div class="card h-100">
                            <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> -->
                            <a href="/product/{{$product->slug}}">
                                <img src="{{$url1}}" class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <a href="/product/{{$product->slug}}" class="text-decoration-none text-reset">
                                    <h5 class="card-title">{{$product->Producer_Brand}} {{$product->Name}}</h5>
                                </a>
                                <p class="card-text"></p>
                            </div>
                            <div class="card-footer">
                                <p class="fs-5 text-body-secondary">Цена: {{$product->RMPrice}}    <small class="text-muted"><del>{{$product->RMPriceOld}} </del></small>  ₽/{{$product->MainUnit}} <span class="d-inline-flex mb-1 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2 text-uppercase">-{{100*round(($product->RMPriceOld-$product->RMPrice)/$product->RMPriceOld, 2)}}%</span></p>
                                <p class="mb-0 fs-5 text-body-secondary">Доступно: {{$product->balanceCount}} {{$product->MainUnit}}</p>
{{--                                <hr>--}}

{{--                                <p class="text-body-secondary"> Дата обновления: {{$product->updated_at->toDateString()}}</p>--}}
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
                                <small class="fs-5 text-body-secondary"> Обновлено: <span class="{{$text_color}}" style="--bs-text-opacity: .7;">{{$product->updated_at->format('d.m.Y')}}</span></small>
                            </div>


                        </div>
                    </div>

                @endforeach

            </div>
        </div>
    </div>
    {{ $products->links() }}
@endsection

@extends('main')

@section('title', $search_name??'Artkera')

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
                @php
                    $img = Storage::disk('artkera')->url($product->images->images[0]);
                @endphp

                    <div class="col">
                        <div class="card h-100">
                            <a href="/artkera/{{$product->slug}}">
                                <img src="{{$img}}"
                                     class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <a href="/artkera/{{$product->slug}}" class="text-decoration-none text-reset">
                                    @if($product->status == 'Снято с производства')
                                        <h6 class="text-danger fw-light">{{$product->status}}</h6>
                                    @else
                                        <h6 class="text-muted fw-light">{{$product->status}}</h6>
                                    @endif


                                    <h5 class="card-title">{{ $product->title }}</h5>
                                </a>
{{--                                <p class="card-text"></p>--}}
                            </div>
                            <div class="card-footer">
                                @if($product->price->price !== null)
                                    <h5 class="card-title pricing-card-title">
                                        {{$product->price->price}} <span class="text-muted fw-light"> ₽/{{$product->unit}}</span>
                                        @if($product->is_action)
                                            <p class="d-inline-flex mb-1 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">Акция</p>
                                        @endif
                                    </h5>
                                @else
                                    <h5 class="card-title pricing-card-title">Не указана</h5>
                                @endif


                                        <p class="mb-0 fs-5 text-body-secondary">
                                            Москва: {{$product->moscow + $product->moscow_sale + $product->moscow_depot_reserve}} {{$product->unit}}
{{--                                            @if($product->moscow_reserve)--}}
{{--                                                <span class="text-muted fw-light">(+{{$product->moscow_reserve}} резерв)</span>--}}
{{--                                            @endif--}}
                                        </p>
                                    @if($product->moscow_way)
                                        <p class="mb-0 fs-5 text-body-secondary"><span class="text-muted fw-light">Москва(в пути): {{$product->moscow_way}} {{$product->unit}}</span></p>
                                    @endif
{{--                                    @if($product->moscow_sale || $product->moscow_sale_reserve)--}}
{{--                                        <p class="mb-0 fs-5 text-body-secondary"><span class="text-muted fw-light">Москва Распродажа: {{$product->moscow_sale}} {{$product->unit}} (+{{$product->moscow_sale_reserve}} резерв)</span></p>--}}
{{--                                    @endif--}}
                                    @if($product->moscow_depot_reserve || $product->moscow_depot_reserve_reserve)
                                        <p class="mb-0 fs-5 text-body-secondary"><span class="text-muted fw-light">Москва РЕЗЕРВНЫЙ: {{$product->moscow_depot_reserve}} {{$product->unit}}</span></p>
                                    @endif


                                    @if($product->kazan + $product->kazan_sale)
                                        <p class="mb-0 fs-5 text-body-secondary">
                                            Казань: {{$product->kazan + $product->kazan_sale}} {{$product->unit}}
{{--                                            @if($product->kazan_reserve)--}}
{{--                                                <span class="text-muted fw-light">(+{{$product->kazan_reserve}} резерв)</span>--}}
{{--                                            @endif--}}
                                        </p>
                                    @endif
                                    @if($product->kazan_way)
                                        <p class="mb-0 fs-5 text-body-secondary"><span class="text-muted fw-light">Казань(в пути): {{$product->kazan_way}} {{$product->unit}}</span></p>
                                    @endif
{{--                                    @if($product->kazan_sale || $product->kazan_sale_reserve)--}}
{{--                                        <p class="mb-0 fs-5 text-body-secondary"><span class="text-muted fw-light">Казань Распродажа: {{$product->kazan_sale}} {{$product->unit}} (+{{$product->kazan_sale_reserve}} резерв)</span></p>--}}
{{--                                    @endif--}}

                                    @if($product->spb + $product->spb_sale)
                                        <p class="mb-0 fs-5 text-body-secondary">
                                            СПб: {{$product->spb + $product->spb_sale}} {{$product->unit}}
{{--                                            @if($product->spb_reserve)--}}
{{--                                                <span class="text-muted fw-light">(+{{$product->spb_reserve}} резерв)</span>--}}
{{--                                            @endif--}}
                                        </p>
                                    @endif
                                    @if($product->spb_way)
                                        <p class="mb-0 fs-5 text-body-secondary"><span class="text-muted fw-light">СПб(в пути): {{$product->spb_way}} {{$product->unit}}</span></p>
                                    @endif
{{--                                    @if($product->spb_sale || $product->spb_sale_reserve)--}}
{{--                                        <p class="mb-0 fs-5 text-body-secondary"><span class="text-muted fw-light">Казань Распродажа: {{$product->spb_sale}} {{$product->unit}} (+{{$product->spb_sale_reserve}} резерв)</span></p>--}}
{{--                                    @endif--}}

                                    @if($product->samara + $product->samara_sale)
                                        <p class="mb-0 fs-5 text-body-secondary">
                                            Самара: {{$product->samara + $product->samara_sale}} {{$product->unit}}
{{--                                            @if($product->samara_reserve)--}}
{{--                                                <span class="text-muted fw-light">(+{{$product->samara_reserve}} резерв)</span>--}}
{{--                                            @endif--}}
                                        </p>
                                    @endif
                                    @if($product->samara_way)
                                        <p class="mb-0 fs-5 text-body-secondary"><span class="text-muted fw-light">Самара(в пути): {{$product->samara_way}} {{$product->unit}}</span></p>
                                    @endif
{{--                                    @if($product->samara_sale || $product->samara_sale_reserve)--}}
{{--                                        <p class="mb-0 fs-5 text-body-secondary"><span class="text-muted fw-light">Казань Распродажа: {{$product->samara_sale}} {{$product->unit}} (+{{$product->samara_sale_reserve}} резерв)</span></p>--}}
{{--                                    @endif--}}


                                    <small class="fs-5 text-body-secondary"><span class="{{$text_color}}" style="--bs-text-opacity: .7;">{{$product->updated_at->format('d.m.Y')}}</span></small>
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>
    </div>
    {{ $products->links() }}
@endsection

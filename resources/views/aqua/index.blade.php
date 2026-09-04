@extends('main')

@section('title', $search_name??'Aquafloor')

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

                    $img = Storage::disk('aquafloor')->url($product->image);
                    @endphp

                    <div class="col">
                        <div class="card h-100">
                            <a href="/aquafloor/{{$product->slug}}">
                                <div class="ratio ratio-16x9">
                                    <img src="{{$img}}" class="card-img-top object-fit-cover rounded" alt="...">
                                </div>
                            </a>
                            <div class="card-body">
                                <a href="/aquafloor/{{$product->slug}}" class="text-decoration-none text-reset">
                                    <h5 class="card-title">{{$product->title}}</h5>
                                </a>
                            </div>
                            <div class="card-footer">
                                <h5 class="card-title pricing-card-title">{{$product->price??''}} <span class="text-muted fw-light">₽/{{$product->unit}}</span></h5>

                                @php
//                                    $stocks = $product->balance;
//                                    dd($stocks);
                                    $balance = 0;
//                                    foreach ($stocks as $st) {
//                                        $balance +=  $st->balance;
//                                    }
                                @endphp
                                <p class="mb-0 fs-5 text-body-secondary">Остаток: {{$balance}} {{$product->unit}}</p>
{{--                                <p class="mb-0 fs-5 text-body-secondary">Остаток: Balance {{$product->unit}}</p>--}}

                                <small class="mb-0 fs-5 text-body-secondary"> Обновлено: <span class="{{$text_color}}" style="--bs-text-opacity: .7;">{{$product->updated_at->format('d.m.Y')}}</span></small>
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>
    </div>
    {{ $products->links() }}
@endsection

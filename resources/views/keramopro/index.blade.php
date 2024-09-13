@extends('main')

@section('title', 'Keramopro')

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

                        $string_for_delete = 'https://keramoproshop.ru/wp-content/';
                        $img = Storage::disk('keramopro')->url(Str::remove($string_for_delete, $product->images[0]));
                    @endphp

                    <div class="col">
                        <div class="card h-100">
                            <a href="/keramopro/{{$product->id}}">
                                <img src="{{$img}}" class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <a href="/keramopro/{{$product->id}}" class="text-decoration-none text-reset">
                                    <h5 class="card-title">{{$product->name}}</h5>
                                </a>
                            </div>
                            <div class="card-footer">
                                <h5 class="card-title pricing-card-title">{{$product->price??''}} <span class="text-muted fw-light">₽/{{$product->unit}}</span></h5>
{{--                                <h5 class="card-title pricing-card-title">Price <span class="text-muted fw-light">₽/{{$product->unit}}</span></h5>--}}

                                @php
//                                    $stocks = $product->balance;
//                                    $balance = 0;
//                                    foreach ($stocks as $st) {
//                                        $balance +=  $st->balance;
//                                    }
                                @endphp
                                <p class="mb-0 fs-5 text-body-secondary">Остаток: {{$product->stock??''}} {{$product->unit}}</p>
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

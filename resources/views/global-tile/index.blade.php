@extends('main')

@section('title', 'Global Tile')

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
//                        $img = Storage::disk('pixmosaic')->url(str_replace(' ', '', $product->vendor_code) . '.jpg');
                        $img = $product->images[0];
                    @endphp

                    <div class="col">
                        <div class="card h-100">
                            <a href="/global-tile/{{$product->id}}">
                                <img src="{{$img}}" class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <a href="/global-tile/{{$product->id}}" class="text-decoration-none text-reset">
                                    <h5 class="card-title">{{$product->title}}</h5>
                                </a>
                            </div>
                            <div class="card-footer">
                                <h5 class="card-title pricing-card-title">{{$product->price}} <span class="text-muted fw-light">₽/{{$product->unit}}</span></h5>

                                <p class="mb-0 fs-5 text-body-secondary">Остаток: {{$product->balance}} {{$product->unit}}</p>

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

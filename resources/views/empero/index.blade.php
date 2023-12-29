@extends('main')

@section('title', 'Empero')

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
//                        dd($product->images);
                        $img = [];
                        foreach ($product->images as $i) {
//                            $img[] = $i['images-href'];
                            $img[] = 'https://empero.info/'.mb_substr($i['images-href'], mb_strpos($i['images-href'], 'src=') + 4);
                        }
//                        dd($img);
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
                            <a href="/empero/{{$product->id}}">
                                <img src="{{$img[0]}}" class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <a href="/empero/{{$product->id}}" class="text-decoration-none text-reset">
                                    <h5 class="card-title">{{$product->title}}</h5>
                                </a>
                            </div>
                            <div class="card-footer">
                                <h5 class="card-title pricing-card-title">{{$product->price}} <span class="text-muted fw-light">₽/м2</span></h5>
                                <hr>

                                <p class="fs-5 text-body-secondary">Остаток на складе: {{$product->stock}} шт<br>
                                Свободный остаток: {{$product->stock_real}} шт</p>
                                <hr>

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

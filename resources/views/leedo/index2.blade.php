@extends('main')

@section('title', $search_name??config('app.name'))

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

            @if(@isset($count))
                <h5>{{$count}}</h5>
            @endif

            <div class="row row-cols-1 row-cols-md-3 g-4 mt-3">

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
//                        -------------------------
                    @endphp

                @php
                    $img = Storage::disk('leedo-images')->url(Str::remove('https://www.leedo.ru/pictures/', $product->Basic_pic));
                @endphp

                    <div class="col">
                        <div class="card h-100">
                            <a href="{{ route('leedo.show', $product->slug) }}">
                                <img src="{{$img}}" class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <a href="{{ route('leedo.show', $product->slug) }}" class="text-decoration-none text-reset">
                                    <h5 class="card-title">{{$product->Brand_name}} {{$product->Item_name}}</h5>
                                </a>
                            </div>
                            <div class="card-footer">
                                <h5 class="card-title pricing-card-title">{{$product->Price_rozn}} <span class="text-muted fw-light">₽/{{$product->unit}}</span></h5>

                                <p class="mb-0 fs-5 text-body-secondary">Москва: {{$product->Sklad_Msk_LeeDo??0}} {{$product->unit}}</p>
                                <p class="mb-0 fs-5 text-body-secondary">СПб: {{$product->Sklad_SPb_LeeDo??0}} {{$product->unit}}</p>


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
    @if(method_exists($products, 'links'))
        {{ $products->links() }}
    @endif
@endsection

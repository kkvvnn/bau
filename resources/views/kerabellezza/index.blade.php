@extends('main')

@section('title', 'Kerabellezza')

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
                        $images = $product->images;
                        $images = explode(' | ', $images);
                        $url1 = $images[0];
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

                    @endphp

                    <div class="col">
                        <div class="card h-100">
                            <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> -->
                            <a href="/kerabellezza/{{$product->id}}">
                                <img src="{{$url1}}" class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <a href="/kerabellezza/{{$product->id}}" class="text-decoration-none text-reset">
                                    <h5 class="card-title">{{$product->title}}</h5>
                                </a>
                            </div>
                            <div class="card-footer">
                                <h5 class="card-title pricing-card-title">{{$product->price}} ₽</h5>
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
    @if(method_exists($products, 'links'))
        {{ $products->links() }}
    @endif
@endsection

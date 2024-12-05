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
                        $string_for_delete = 'https://media.artcentre.club/';

                        if (isset($product->images[0])) {
                            $name_file = Str::remove($string_for_delete, $product->images[0]);
                        } else {
                            $name_file = '';
                        }

//                        $name_file = Str::remove($string_for_delete, $product->images[0]);
                        $image1 = Storage::disk('artcenter')->url($name_file);
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
                     @php
                        $title = str_replace('Плитка ', '', $product->title);
                        $title = str_replace(' (1,44 кв.м.)', '', $title);
                     @endphp

                    <div class="col">
                        <div class="card h-100">
                            <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> -->
                            <a href="/artcenter/{{$product->id}}">
                                <img src="{{$image1}}" class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <a href="/artcenter/{{$product->id}}" class="text-decoration-none text-reset">
                                    <h5 class="card-title">{{$title}}</h5>
                                </a>
                            </div>
                            <div class="card-footer">
                                <h5 class="card-title pricing-card-title">{{$product->price}} <span class="text-muted fw-light">₽/{{$product->unit}}</span></h5>


                                @if(!$product->moscow && !$product->spb && !$product->kazan && !$product->nn && !$product->samara)
                                    <p class="mb-0 fs-5 text-body-secondary">Нет в наличии</p>
                                @else
                                    @if($product->moscow)
                                        <p class="mb-0 fs-5 text-body-secondary">Москва: {{$product->moscow}} {{$product->unit}}</p>
                                    @else
                                        <p class="mb-0 fs-5 text-body-secondary">Москва: 0 {{$product->unit}}</p>
                                    @endif

                                    @if($product->spb)
                                        <p class="mb-0 fs-5 text-body-secondary">СПб: {{$product->spb}} {{$product->unit}}</p>
                                    @endif
                                    @if($product->kazan)
                                        <p class="mb-0 fs-5 text-body-secondary">Казань: {{$product->kazan}} {{$product->unit}}</p>
                                    @endif
                                    @if($product->nn)
                                        <p class="mb-0 fs-5 text-body-secondary">Нижний Новгород: {{$product->nn}} {{$product->unit}}</p>
                                    @endif
                                    @if($product->samara)
                                        <p class="mb-0 fs-5 text-body-secondary">Самара: {{$product->samara}} {{$product->unit}}</p>
                                    @endif
                                @endif


                                <small class="fs-5 text-body-secondary"><span class="{{$text_color}}" style="--bs-text-opacity: .7;">{{$product->updated_at->format('d.m.Y')}}</span></small>
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

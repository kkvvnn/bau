@extends('main')

@section('title', $product->title)

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/>
@endsection

@section('content')

    <div class="album py-5 bg-body-tertiary">
        <div class="container pt-3">

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            @if (session('status_delete'))
                <div class="alert alert-warning">
                    {{ session('status_delete') }}
                </div>
            @endif

            <div class="row">
                <div class="col">
                    <h1 class="display-6">{{$product->title}}</h1>
                    <hr>
                    <h1 class="display-6">{{$product->brand}}</h1>

                    <p class="fs-2">Коллекция:
                        <a href="{{route('global-tile.collection', $product->collection)}}"
                           class="link-secondary text-decoration-none">{{$product->collection}}
                        </a></p>

                    <hr>

                </div>
            </div>
        </div>

        <div class="container-md">
            <div class="row">
                <div class="col-md-6">
                    {{--                    <p class="fs-5">Интерьер</p>--}}
                    <div id="carouselExample_collection" class="carousel slide carousel-dark pt-3">
                        <div class="carousel-indicators">
                            @php
                                $n_slide = 0;
                                $class_slide = 'class="active" aria-current="true"';
                            @endphp
                            @foreach($url_collection as $url_slide_collection)
                                <button type="button" data-bs-target="#carouselExample_collection" data-bs-slide-to="{{$n_slide}}" {!!$class_slide!!} aria-label="Slide {{++$n_slide}}"></button>
                                @php
                                    $class_slide = '';
                                @endphp
                            @endforeach
                        </div>
                        <div class="carousel-inner">
                            @php
                                $active_slider = 'active';
                                $nn_c = 0;
                                $nn_c_all = count($url_collection);
                            @endphp
                            @foreach($url_collection as $url_z)
                                @if ($url_z)
                                    <div class="carousel-item {{$active_slider}}">
                                        <a href="{{$url_z}}" data-fancybox="gallery_collection" data-caption="Интерьер {{++$nn_c}} из {{$nn_c_all}}">
                                            <img src="{{$url_z}}" class="d-block w-100" alt="...">
                                        </a>
                                    </div>
                                @endif
                                @php
                                    $active_slider = '';
                                @endphp
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample_collection"
                                data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample_collection"
                                data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col-md-6">

                    @php

                            $old_price = '';
                    @endphp

{{--                    <h2 class="card-title mt-5 pricing-card-title">{{$product->price}} <small--}}
                    <h2 class="card-title mt-5 pricing-card-title">Price <small
                            class="text-muted fw-light">₽/{{$product->unit}}</small> <span class="text-muted fw-light"><del>{{$old_price}} </del></span></h2>

                    <br>

{{--                        <p class="d-inline-flex mb-1 px-2 py-1 fw-semibold text-success-emphasis bg-success-subtle border border-success-subtle rounded-2">--}}
{{--                            Цена -10% {{round($product->price * 0.90, -1)}} ₽/{{$product->unit}}</p>--}}


{{--                    <h5 class="mt-4 mb-0">Москва: {{$product->balance}} {{$product->unit}} {{$vivod}}</h5>--}}
                    <h5 class="mt-4 mb-0">Москва: Balance {{$product->unit}} {{$vivod}}</h5>
{{--                    @if ($stock_spb)--}}
{{--                        <h5 class="mt-0 mb-0">СПб: {{$stock_spb}} {{$product->unit}} {{$vivod}}</h5>--}}
{{--                    @endif--}}
{{--                    @if ($stock_kzn)--}}
{{--                        <h5 class="mt-0 mb-0">Казань: {{$stock_kzn}} {{$product->unit}} {{$vivod}}</h5>--}}
{{--                    @endif--}}
                    <p class="mt-4">Актуально на <span
                            class="{{$text_color}} fw-bolder">{{$product->updated_at->format('d.m.Y')}}</span></p>


                    {{--                    <a title="Whatsapp" href="whatsapp://send?phone=79373209953&text={{$product->Name}}">--}}
                    {{--                        <p class="mb-0"><img src="{{asset('w2.svg')}}" alt="Написать в Whatsapp" /></p>--}}
                    {{--                    </a>--}}

                    {{--                    <a title="Telegram" href="tg://resolve?domain=kkvvnn89" target="_blank">--}}
                    {{--                        <p><img src="{{asset('t2.svg')}}" alt="Написать в Telegram" /></p>--}}
                    {{--                    </a>--}}

                    {{--                    <a class="link-secondary text-decoration-none" href="tel:+79373209953"><p class="fs-4"><img src="{{asset('telephone.svg')}}" /> +7(937)320-99-53</p></a>--}}

                </div>
            </div>
            <hr>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p class="fs-5">Изображения лиц</p>
                        <div id="carouselExample" class="carousel slide carousel-dark">
                            <div class="carousel-indicators">
                                @php
                                    $n_slide = 0;
                                    $class_slide = 'class="active" aria-current="true"';
                                @endphp
                                @foreach($urls as $url_slide)
                                    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="{{$n_slide}}" {!!$class_slide!!} aria-label="Slide {{++$n_slide}}"></button>
                                    @php
                                        $class_slide = '';
                                    @endphp
                                @endforeach
                            </div>
                            <div class="carousel-inner">
                                @php
                                    $active_slider = 'active';
                                    $nn = 0;
                                    $nn_all = count($urls);
                                @endphp
                                @foreach($urls as $url)
                                    <div class="carousel-item {{$active_slider}}">
                                        <a href="{{$url}}" data-fancybox="gallery" data-caption="Лицо {{++$nn}} из {{$nn_all}}">
                                            <img src="{{$url}}" class="d-block w-100" alt="...">
                                        </a>
                                    </div>
                                    @php
                                        $active_slider = '';
                                    @endphp
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                                    data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                                    data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>

                    </div>

                </div>
            </div>
            <hr>
        </div>



        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-striped">
                        <tbody>
                        @if($product->vendor_code)
                            <tr>
                                <th scope="row">Артикул</th>
                                <td>{{$product->vendor_code}}</td>
                            </tr>
                        @endif
                        @if($product->brand)
                            <tr>
                                <th scope="row">Бренд</th>
                                <td>{{$product->brand}}</td>
                            </tr>
                        @endif
                        @if($product->country)
                            <tr>
                                <th scope="row">Страна производства</th>
                                <td>{{$product->country}}</td>
                            </tr>
                        @endif
                        @if($product->type)
                            <tr>
                                <th scope="row">Категория</th>
                                <td>{{$product->type}}</td>
                            </tr>
                        @endif
{{--                        @if($product->Place_in_the_Collection)--}}
{{--                            <tr>--}}
{{--                                <th scope="row">Место в коллекции</th>--}}
{{--                                <td>{{$product->Place_in_the_Collection}}</td>--}}
{{--                            </tr>--}}
{{--                        @endif--}}
                        @if($product->design)
                            <tr>
                                <th scope="row">Дизайн</th>
                                <td>{{$product->design}}</td>
                            </tr>
                        @endif
                        @if($product->color)
                            <tr>
                                <th scope="row">Цвет</th>
                                <td>{{$product->color}}</td>
                            </tr>
                        @endif
                        @if($product->surface)
                            <tr>
                                <th scope="row">Поверхность</th>
                                <td>{{$product->surface}}</td>
                            </tr>
                        @endif
{{--                        @if($product->Cover)--}}
{{--                            <tr>--}}
{{--                                <th scope="row">Покрытие</th>--}}
{{--                                <td>{{$product->Cover}}</td>--}}
{{--                            </tr>--}}
{{--                        @endif--}}
                        @if($product->frost_resistance)
                            <tr>
                                <th scope="row">Морозоустойчивость</th>
                                <td>{{$product->frost_resistance}}</td>
                            </tr>
                        @endif
                        @if($product->rectificat)
                            <tr>
                                <th scope="row">Ректифицированная</th>
                                <td>{{$product->rectificat}}</td>
                            </tr>
                        @endif
                        @if($product->relief)
                            <tr>
                                <th scope="row">Рельеф</th>
                                <td>{{$product->relief}}</td>
                            </tr>
                        @endif
                        @if($product->length)
                            <tr>
                                <th scope="row">Длина</th>
                                <td>{{$product->length}} см</td>
                            </tr>
                        @endif
                        @if($product->width)
                            <tr>
                                <th scope="row">Ширина</th>
                                <td>{{$product->width}} см</td>
                            </tr>
                        @endif
                        @if($product->fat * 3 && $product->fat * 3 != 0)
                            <tr>
                                <th scope="row">Толщина</th>
                                <td>{{$product->fat}} мм</td>
                            </tr>
                        @endif
                        @if($product->massa_pack)
                            <tr>
                                <th scope="row">Вес упаковки</th>
                                <td>{{$product->massa_pack}} кг</td>
                            </tr>
                        @endif
{{--                        @if($product->Durability)--}}
{{--                            <tr>--}}
{{--                                <th scope="row">Стойкость к истиранию</th>--}}
{{--                                <td>{{$product->Durability}}</td>--}}
{{--                            </tr>--}}
{{--                        @endif--}}
                        @if($product->square_in_pack)
                            <tr>
                                <th scope="row">Кв.м в упаковке</th>
                                <td>{{$product->square_in_pack}}</td>
                            </tr>
                        @endif
                        @if($product->count_in_pack)
                            <tr>
                                <th scope="row">Количество в упаковке</th>
                                <td>{{$product->count_in_pack}}</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="container-fluid">
                        <div class="grid">
                            <div class="grid-sizer"></div>
                            @foreach ($urls as $url)
                                <div class="grid-item">
                                    <img src="{{$url}}"
                                         style="border-bottom:1px solid rgba(78, 73, 60, 0.20);border-left:1px solid rgba(78, 73, 60, 0.20)"/>
                                </div>
                            @endforeach
                        </div>
                        {{--                    <div class="grid">--}}
                        {{--                        <div class="grid-sizer"></div>--}}
                        {{--                        @foreach ($url_collection as $url_c)--}}
                        {{--                            <div class="grid-item">--}}
                        {{--                                <img src="/storage/Collections/{{$url_c}}"--}}
                        {{--                                     style="border-bottom:1px solid rgba(78, 73, 60, 0.20);border-left:1px solid rgba(78, 73, 60, 0.20)"/>--}}
                        {{--                            </div>--}}
                        {{--                        @endforeach--}}
                        {{--                    </div>--}}
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col text-center">
                    <div class="card-body">
                        {!! QrCode::size(300)->generate(url()->current()) !!}
                    </div>
                </div>
            </div>
        </div>



        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <a href="whatsapp://send?phone=79151274000&text={{$product->title}}" class="float" target="_blank">
            <i class="fa fa-whatsapp my-float"></i>
        </a>

    </div>

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script>
        Fancybox.bind("[data-fancybox]", {
            // Your custom options
        });
    </script>
@endsection

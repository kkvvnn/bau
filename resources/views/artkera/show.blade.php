@extends('main')

@section('meta')
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{url()->full()}}">
    <meta property="og:title" content="{{$product->title}}">
    <meta property="og:description" content="Коллекция {{$product->category_r->parent}}">
    <meta property="og:image" content="{{$images[0]}}">
@endsection

@section('title', $product->artikul.' '.$product->category_r->parent.' '.$product->collection_item.' '.$product->name_for_site)

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
                    <h1 class="display-6">{{$product->category_r->parent}}</h1>
{{--                    <p class="fs-2">Коллекция: {{$product->category}}</p>--}}
                    <p class="fs-2">Коллекция:
                        <a href="{{route('artkera.collection', $product->category)}}"
                           class="link-secondary text-decoration-none">{{$product->category}}
                        </a></p>
                    <hr>
                </div>
            </div>
        </div>

        <div class="container-md">
            <div class="row">
                <div class="col-md-6">
                    <div id="carouselExample_collection" class="carousel slide carousel-dark pt-3">
                        <div class="carousel-indicators">
                            @php
                                $n_slide = 0;
                                $class_slide = 'class="active" aria-current="true"';
                            @endphp
                            @foreach($images_collection as $url_slide_collection)
                                <button type="button" data-bs-target="#carouselExample_collection"
                                        data-bs-slide-to="{{$n_slide}}"
                                        {!!$class_slide!!} aria-label="Slide {{++$n_slide}}"></button>
                                @php
                                    $class_slide = '';
                                @endphp
                            @endforeach
                        </div>
                        <div class="carousel-inner">
                            @php
                                $active_slider = 'active';
                                $nn_c = 0;
                                $nn_c_all = count($images_collection);
                            @endphp
                            @foreach($images_collection as $url_z)
                                @if ($url_z)
                                    <div class="carousel-item {{$active_slider}}">
                                        <a href="{{$url_z}}" data-fancybox="gallery_collection"
                                           data-caption="Изображение {{++$nn_c}} из {{$nn_c_all}}">
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

                    @if($product->status == 'Снято с производства')
                        <h6 class="text-danger fw-light">{{$product->status}}</h6>
                    @else
                        <h6 class="text-muted fw-light">{{$product->status}}</h6>
                    @endif


                    @if($product->price !== null)
                    <h2 class="card-title mt-5 pricing-card-title">{{$product->price->price}} <small
                                class="text-muted fw-light">₽/{{$product->unit}}</small></h2>
                    @else
                        <h2 class="card-title mt-5 pricing-card-title">Не указана</h2>
                    @endif

                    <br>


                        @if($product->is_action || $product->sale)
                            <p class="d-inline-flex mb-1 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2 text-uppercase">
                                Распродажа</p>
                        @endif

{{--                        MOSCOW-STOCK--}}

                        @if($product->moscow)
                            <h5 class="mt-4 mb-0">
                                Москва: {{$product->moscow}} {{$product->unit}}
                                @if($product->moscow_reserve)
                                    <span class="text-muted fw-light">(+{{$product->moscow_reserve}} резерв)</span>
                                @endif
                            </h5>
                        @endif

                        @if($product->moscow_way)
                            <h5 class="mb-0 fs-5 text-body-secondary"><span class="text-muted fw-light">Москва(в пути): {{$product->moscow_way}} {{$product->unit}}</span></h5>
                        @endif
                        @if($product->moscow_sale || $product->moscow_sale_reserve)
                            <h5 class="mb-0 fs-5 text-body-secondary"><span class="text-muted fw-light">Москва Распродажа: {{$product->moscow_sale}} {{$product->unit}} (+{{$product->moscow_sale_reserve}} резерв)</span></h5>
                        @endif
                        @if($product->moscow_depot_reserve || $product->moscow_depot_reserve_reserve)
                            <h5 class="mb-0 fs-5 text-body-secondary"><span class="text-muted fw-light">Москва РЕЗЕРВНЫЙ: {{$product->moscow_depot_reserve}} {{$product->unit}} (+{{$product->moscow_depot_reserve_reserve}} резерв)</span></h5>
                        @endif

{{--                        KAZAN-STOCK--}}

                        @if($product->kazan)
                            <h5 class="mb-0 fs-5 text-body-secondary">
                                Казань: {{$product->kazan}} {{$product->unit}}
                                @if($product->kazan_reserve)
                                    <span class="text-muted fw-light">(+{{$product->kazan_reserve}} резерв)</span>
                                @endif
                            </h5>
                        @endif
                        @if($product->kazan_way)
                            <h5 class="mb-0 fs-5 text-body-secondary"><span class="text-muted fw-light">Казань(в пути): {{$product->kazan_way}} {{$product->unit}}</span></h5>
                        @endif
                        @if($product->kazan_sale || $product->kazan_sale_reserve)
                            <h5 class="mb-0 fs-5 text-body-secondary"><span class="text-muted fw-light">Казань Распродажа: {{$product->kazan_sale}} {{$product->unit}} (+{{$product->kazan_sale_reserve}} резерв)</span></h5>
                        @endif

{{--                        SPB-STOCK--}}

                        @if($product->spb)
                            <h5 class="mb-0 fs-5 text-body-secondary">
                                СПб: {{$product->spb}} {{$product->unit}}
                                @if($product->spb_reserve)
                                    <span class="text-muted fw-light">(+{{$product->spb_reserve}} резерв)</span>
                                @endif
                            </h5>
                        @endif
                        @if($product->spb_way)
                            <h5 class="mb-0 fs-5 text-body-secondary"><span class="text-muted fw-light">СПб(в пути): {{$product->spb_way}} {{$product->unit}}</span></h5>
                        @endif
                        @if($product->spb_sale || $product->spb_sale_reserve)
                            <h5 class="mb-0 fs-5 text-body-secondary"><span class="text-muted fw-light">СПб Распродажа: {{$product->spb_sale}} {{$product->unit}} (+{{$product->spb_sale_reserve}} резерв)</span></h5>
                        @endif

{{--                        SAMARA-STOCK--}}

                        @if($product->samara)
                            <h5 class="mb-0 fs-5 text-body-secondary">
                                Самара: {{$product->samara}} {{$product->unit}}
                                @if($product->samara_reserve)
                                    <span class="text-muted fw-light">(+{{$product->samara_reserve}} резерв)</span>
                                @endif
                            </h5>
                        @endif
                        @if($product->samara_way)
                            <h5 class="mb-0 fs-5 text-body-secondary"><span class="text-muted fw-light">Самара(в пути): {{$product->samara_way}} {{$product->unit}}</span></h5>
                        @endif
                        @if($product->samara_sale || $product->samara_sale_reserve)
                            <h5 class="mb-0 fs-5 text-body-secondary"><span class="text-muted fw-light">Самара Распродажа: {{$product->samara_sale}} {{$product->unit}} (+{{$product->samara_sale_reserve}} резерв)</span></h5>
                        @endif

                    <p class="mt-4">Актуально на <span
                                class="{{$text_color}} fw-bolder">{{$product->updated_at->format('d.m.Y')}}</span></p>

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
                                @foreach($images as $url_slide)
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
                                    $nn_all = count($images);
                                @endphp
                                @foreach($images as $url)
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
                        @if($product->artikul)
                            <tr>
                                <th scope="row">Артикул</th>
                                <td>{{$product->artikul}}</td>
                            </tr>
                        @endif
                        @if($product->category_r->parent)
                            <tr>
                                <th scope="row">Бренд</th>
                                <td>{{$product->category_r->parent}}</td>
                            </tr>
                        @endif
                        @if($product->country)
                            <tr>
                                <th scope="row">Страна производства</th>
                                <td>{{$product->country}}</td>
                            </tr>
                        @endif
                        @if($product->collection_item)
                            <tr>
                                <th scope="row">Категория</th>
                                <td>{{$product->collection_item}}</td>
                            </tr>
                        @endif
                        @if($product->surface_type)
                            <tr>
                                <th scope="row">Поверхность</th>
                                <td>{{$product->surface_type}}</td>
                            </tr>
                        @endif
                        @if($product->Ректификация)
                            <tr>
                                <th scope="row">Ректифицированная</th>
                                <td>{{$product->Ректификация}}</td>
                            </tr>
                        @endif
                        @if($product->width)
                            <tr>
                                <th scope="row">Длина</th>
                                <td>{{$product->width / 10}} см</td>
                            </tr>
                        @endif
                        @if($product->height)
                            <tr>
                                <th scope="row">Ширина</th>
                                <td>{{$product->height / 10}} см</td>
                            </tr>
                        @endif
                        @if($product->thickness && $product->thickness != 0)
                            <tr>
                                <th scope="row">Толщина</th>
                                <td>{{$product->thickness}} мм</td>
                            </tr>
                        @endif
                        @if($product->square_in_pack)
                            <tr>
                                <th scope="row">Кв.м в упаковке</th>
                                <td>{{$product->square_in_pack}}</td>
                            </tr>
                        @endif
                        @if($product->packing)
                            <tr>
                                <th scope="row">Штук в упаковке</th>
                                <td>{{$product->packing}}</td>
                            </tr>
                        @endif
                        @if($product->massa_pack)
                            <tr>
                                <th scope="row">Вес упаковки</th>
                                <td>{{$product->massa_pack}} кг</td>
                            </tr>
                        @endif

                        </tbody>
                    </table>
                </div>
                <hr>
            </div>
        </div>


        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="container-fluid">
                        <div class="grid">
                            <div class="grid-sizer"></div>
                            @foreach ($images as $url)
                                <div class="grid-item">
                                    <img src="{{$url}}"
                                         style="border-bottom:1px solid rgba(78, 73, 60, 0.20);border-left:1px solid rgba(78, 73, 60, 0.20)"/>
                                </div>
                            @endforeach
                        </div>
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
        <a href="whatsapp://send?phone=79151274000&text={{$product->Name}}" class="float" target="_blank">
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

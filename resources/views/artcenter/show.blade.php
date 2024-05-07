@extends('main')

@section('title', $product->Name)

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

            @php
                $title = str_replace('Плитка ', '', $product->title);
                $title = str_replace(' (1,44 кв.м.)', '', $title);
            @endphp

            <div class="row">
                <div class="col">
                    <h1 class="display-6">{{$title}}</h1>
                    <hr>
                    <h1 class="display-6">{{$product->brand}}</h1>
                    <p class="fs-2">Коллекция:
                        <a href="{{route('artcenter.collection', $product->collection)}}"
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
                            @foreach($images as $url_slide_collection)
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
                                $nn_c_all = count($images);
                            @endphp
                            @foreach($images as $url_z)
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


                    <h2 class="card-title mt-5 pricing-card-title">{{$product->price}} <small
                                class="text-muted fw-light">₽/{{$product->unit}}</small></h2>

                    <br>


                    @if($product->moscow_stock)
                        <h5 class="mb-0">Москва: {{$product->moscow_stock}} {{$product->unit}}</h5>
                    @endif
                    {{--                    @if($product->spb_stock)--}}
                    {{--                        <h5 class="mb-0">СПб: {{$product->spb_stock}} {{$product->unit}}</h5>--}}
                    {{--                    @endif--}}
                    {{--                    @if($product->kazan_stock)--}}
                    {{--                        <h5 class="mb-0">Казань: {{$product->kazan_stock}} {{$product->unit}}</h5>--}}
                    {{--                    @endif--}}
                    {{--                    @if($product->nn_stock)--}}
                    {{--                        <h5 class="mb-0">Нижний Новгород: {{$product->nn_stock}} {{$product->unit}}</h5>--}}
                    {{--                    @endif--}}
                    {{--                    @if($product->samara_stock)--}}
                    {{--                        <h5 class="mb-0">Самара: {{$product->samara_stock}} {{$product->unit}}</h5>--}}
                    {{--                    @endif--}}

                    {{--                    @if(!$product->moscow_stock && !$product->spb_stock && !$product->kazan_stock && !$product->nn_stock && !$product->samara_stock)--}}
                    {{--                        <h5 class="mb-0">Нет в наличии</h5>--}}
                    {{--                    @endif--}}


                    <p class="mt-4">Актуально на <span
                                class="{{$text_color}} fw-bolder">{{$product->updated_at->format('d.m.Y')}}</span></p>


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
                        {{--                        @if($product->Country_of_manufacture)--}}
                        {{--                            <tr>--}}
                        {{--                                <th scope="row">Страна производства</th>--}}
                        {{--                                <td>{{$product->Country_of_manufacture}}</td>--}}
                        {{--                            </tr>--}}
                        {{--                        @endif--}}
                        @if($product->material)
                            <tr>
                                <th scope="row">Категория</th>
                                <td>{{$product->material}}</td>
                            </tr>
                        @endif
                        {{--                        @if($product->Place_in_the_Collection)--}}
                        {{--                            <tr>--}}
                        {{--                                <th scope="row">Место в коллекции</th>--}}
                        {{--                                <td>{{$product->Place_in_the_Collection}}</td>--}}
                        {{--                            </tr>--}}
                        {{--                        @endif--}}
                        {{--                        @if($product->DesignValue)--}}
                        {{--                            <tr>--}}
                        {{--                                <th scope="row">Дизайн</th>--}}
                        {{--                                <td>{{$product->DesignValue}}</td>--}}
                        {{--                            </tr>--}}
                        {{--                        @endif--}}
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
                        {{--                        @if($product->FrostResistance)--}}
                        {{--                            <tr>--}}
                        {{--                                <th scope="row">Морозоустойчивость</th>--}}
                        {{--                                <td>{{$product->FrostResistance}}</td>--}}
                        {{--                            </tr>--}}
                        {{--                        @endif--}}
                        @if($product->rectified)
                            <tr>
                                <th scope="row">Ректифицированная</th>
                                <td>{{$product->rectified}}</td>
                            </tr>
                        @endif
                        @if($product->size)
                            <tr>
                                <th scope="row">Размер</th>
                                <td>{{$product->size}} см</td>
                            </tr>
                        @endif
                        {{--                        @if($product->Height)--}}
                        {{--                            <tr>--}}
                        {{--                                <th scope="row">Ширина</th>--}}
                        {{--                                <td>{{$product->Height}} см</td>--}}
                        {{--                            </tr>--}}
                        {{--                        @endif--}}
                        @if($product->fat)
                            <tr>
                                <th scope="row">Толщина</th>
                                <td>{{$product->fat}} см</td>
                            </tr>
                        @endif
                        @if($product->for)
                            <tr>
                                <th scope="row">Подходит для</th>
                                <td>{{$product->for}}</td>
                            </tr>
                        @endif
                        @if($product->style)
                            <tr>
                                <th scope="row">Стиль</th>
                                <td>{{$product->style}}</td>
                            </tr>
                        @endif
                        @if($product->meters_in_pack)
                            <tr>
                                <th scope="row">В упаковке</th>
                                <td>{{$product->meters_in_pack}} {{$product->unit}}</td>
                            </tr>
                        @endif
                        {{--                        @if($product->Package_Weight)--}}
                        {{--                            <tr>--}}
                        {{--                                <th scope="row">Вес упаковки</th>--}}
                        {{--                                <td>{{$product->Package_Weight}} кг</td>--}}
                        {{--                            </tr>--}}
                        {{--                        @endif--}}
                        {{--                        @if($product->Durability)--}}
                        {{--                            <tr>--}}
                        {{--                                <th scope="row">Стойкость к истиранию</th>--}}
                        {{--                                <td>{{$product->Durability}}</td>--}}
                        {{--                            </tr>--}}
                        {{--                        @endif--}}
                        {{--                        @if($product->Package_Value)--}}
                        {{--                            <tr>--}}
                        {{--                                <th scope="row">Кв.м в упаковке</th>--}}
                        {{--                                <td>{{$product->Package_Value}}</td>--}}
                        {{--                            </tr>--}}
                        {{--                        @endif--}}
                        {{--                        @if($product->PCS_in_Package)--}}
                        {{--                            <tr>--}}
                        {{--                                <th scope="row">Количество в упаковке</th>--}}
                        {{--                                <td>{{$product->PCS_in_Package}}</td>--}}
                        {{--                            </tr>--}}
                        {{--                        @endif--}}
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
                            @foreach ($images as $url)
                                <div class="grid-item">
                                    <img src="{{$url}}"
                                         style="border-bottom:1px solid rgba(78, 73, 60, 0.20);border-left:1px solid rgba(78, 73, 60, 0.20)"/>
                                </div>
                            @endforeach
                        </div>
                        {{--                    <div class="grid">--}}
                        {{--                        <div class="grid-sizer"></div>--}}
                        {{--                        @foreach ($images as $url_c)--}}
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

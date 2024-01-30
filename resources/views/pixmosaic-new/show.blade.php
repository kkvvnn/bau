@extends('main')

@section('title', $product->title2)

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
                    <h1 class="display-6">{{$product->title2}}</h1>

                    <hr>

                    <h1 class="display-6">Pixmosaic</h1>
                    <p class="fs-2">Коллекция: {{$product->material}}</p>
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
                            @foreach($img as $url_slide_collection)
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
                                $nn_c_all = count($img);
                            @endphp
                            @foreach($img as $url_z)
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


                    <h2 class="card-title mt-5 pricing-card-title">{{$product->price}} <small
                            class="text-muted fw-light">₽/м2</small></h2>

                    <br>

                    <p class="lead fs-4 mb-0">Остаток на складе: {{$product->stock}} м2</p>
                    <p class="lead fs-5">Актуально на <span
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
                        @if($product->Country_of_manufacture)
                            <tr>
                                <th scope="row">Страна производства</th>
                                <td>{{$product->Country_of_manufacture}}</td>
                            </tr>
                        @endif
                        @if($product->Category)
                            <tr>
                                <th scope="row">Категория</th>
                                <td>{{$product->Category}}</td>
                            </tr>
                        @endif
                        @if($product->Place_in_the_Collection)
                            <tr>
                                <th scope="row">Место в коллекции</th>
                                <td>{{$product->Place_in_the_Collection}}</td>
                            </tr>
                        @endif
                        @if($product->DesignValue)
                            <tr>
                                <th scope="row">Дизайн</th>
                                <td>{{$product->DesignValue}}</td>
                            </tr>
                        @endif
                        @if($product->Color)
                            <tr>
                                <th scope="row">Цвет</th>
                                <td>{{$product->Color}}</td>
                            </tr>
                        @endif
                        @if($product->surface)
                            <tr>
                                <th scope="row">Поверхность</th>
                                <td>{{$product->surface}}</td>
                            </tr>
                        @endif
                        @if($product->Cover)
                            <tr>
                                <th scope="row">Покрытие</th>
                                <td>{{$product->Cover}}</td>
                            </tr>
                        @endif
                        @if($product->FrostResistance)
                            <tr>
                                <th scope="row">Морозоустойчивость</th>
                                <td>{{$product->FrostResistance}}</td>
                            </tr>
                        @endif
                        @if($product->Rectified)
                            <tr>
                                <th scope="row">Ректифицированная</th>
                                <td>{{$product->Rectified}}</td>
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
                        @if($product->osnova)
                            <tr>
                                <th scope="row">Основа</th>
                                <td>{{$product->osnova}}</td>
                            </tr>
                        @endif
                        @if($product->material)
                            <tr>
                                <th scope="row">Материал</th>
                                <td>{{$product->material}}</td>
                            </tr>
                        @endif
                        @if($product->size_tile)
                            <tr>
                                <th scope="row">Размер листа</th>
                                <td>{{$product->size_tile}} мм</td>
                            </tr>
                        @endif
                        @if($product->size_chip)
                            <tr>
                                <th scope="row">Размер чипа</th>
                                @if ($product->size_chip != 'Произвольный')
                                    <td>{{$product->size_chip}} мм</td>
                                @else
                                    <td>{{$product->size_chip}}</td>
                                @endif
                            </tr>
                        @endif
                        @if($product->fat && $product->fat != 0)
                            <tr>
                                <th scope="row">Толщина</th>
                                @if ($product->fat != 'произвольная')
                                    <td>{{$product->fat}} мм</td>
                                @else
                                    <td>{{$product->fat}}</td>
                                @endif
                            </tr>
                        @endif
                        @if($product->square_list)
                            <tr>
                                <th scope="row">Площадь листа</th>
                                <td>{{$product->square_list}} м2</td>
                            </tr>
                        @endif
                        @if($product->Package_Weight)
                            <tr>
                                <th scope="row">Вес упаковки</th>
                                <td>{{$product->Package_Weight}} кг</td>
                            </tr>
                        @endif
                        @if($product->Durability)
                            <tr>
                                <th scope="row">Стойкость к истиранию</th>
                                <td>{{$product->Durability}}</td>
                            </tr>
                        @endif
                        @if($product->Package_Value)
                            <tr>
                                <th scope="row">Кв.м в упаковке</th>
                                <td>{{$product->Package_Value}}</td>
                            </tr>
                        @endif
                        @if($product->PCS_in_Package)
                            <tr>
                                <th scope="row">Количество в упаковке</th>
                                <td>{{$product->PCS_in_Package}}</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

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

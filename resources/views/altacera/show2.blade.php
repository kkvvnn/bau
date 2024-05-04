@extends('main')

@section('title', $product->artikul.' '.$product->category_rel->parent.' '.$product->collection_item.' '.$product->name_for_site)

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
                    <h1 class="display-6">{{$product->category_rel->parent}} {{$product->collection_item}} {{$product->name_for_site}} {{$product->height}}x{{$product->width}} {{$product->artikul}}</h1>
                    <hr>
                    <h1 class="display-6">{{$product->category_rel->parent}}</h1>
                    <p class="fs-2">Коллекция: {{$product->category}}</p>
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

                    @php
                        $units = $product->units;
                        $unit_id = $product->balance[0]->unit_id;
                        $unit = '';
                        foreach ($units as $u) {
                            if ($u['unit_id'] == $unit_id) {
                                $unit = $u['unit'];
                                break;
                            }
                        }

                        $pack_ratio = '';
                        foreach ($units as $u) {
                            if ($u['unit'] == 'Упак') {
                                $pack_ratio = $u['unit_ratio'];
                                break;
                            }
                        }

                        $one_count_ratio = '';
                        foreach ($units as $u) {
                            if ($u['unit'] == 'шт') {
                                $one_count_ratio = $u['unit_ratio'];
                                break;
                            }
                        }

                        $count_in_pack = (float)$pack_ratio / (float)$one_count_ratio;
                    @endphp

                    <h2 class="card-title mt-5 pricing-card-title">{{$product->price->price}} <small
                                class="text-muted fw-light">₽/{{$unit}}</small></h2>

                    <br>

                    @php
                        $balances = $product->balance;
                //                                        dd($balances);
                        foreach ($balances as $balance) {
                            if ($balance['depot_id'] == '8c279853-d2c9-11e8-80c3-0cc47afc14e9') {
                                $balance_moscow = (float)$balance['free_balance'];
                            }
                            if ($balance['depot_id'] == '64c17eef-42d6-11e8-812c-10feed0262c6') {
                //                                            if ($balance['depot_id'] == 'e36ebb4b-0979-11ec-80f1-00155d5d5700') {
                                $balance_krasnodar = (float)$balance['free_balance'];
                            }
                            if ($balance['depot_id'] == 'd1666584-d536-11ec-80f8-00155d5d5700') {
                                $balance_kazan = (float)$balance['free_balance'];
                            }
                            if ($balance['depot_id'] == '2170fa9f-bcdc-11ed-8167-00155d5d5700') {
                                $balance_spb = (float)$balance['free_balance'];
                            }
                        }
                    @endphp

                    @isset($balance_moscow)
                        <h5 class="mb-0">Москва: {{$balance_moscow}} {{$unit}}</h5>
                    @endisset
                    @isset($balance_spb)
                        <h5 class="mb-0">СПб: {{$balance_spb}} {{$unit}}</h5>
                    @endisset
                    @isset($balance_kazan)
                        <h5 class="mb-0">Казань: {{$balance_kazan}} {{$unit}}</h5>
                    @endisset

                    @isset($balance_krasnodar)
                        <h5 class="mb-0">Краснодар: {{$balance_krasnodar}} {{$unit}}</h5>
                    @endisset

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
                        @if($product->artikul)
                            <tr>
                                <th scope="row">Артикул</th>
                                <td>{{$product->artikul}}</td>
                            </tr>
                        @endif
                        @if($product->category_rel->parent)
                            <tr>
                                <th scope="row">Бренд</th>
                                <td>{{$product->category_rel->parent}}</td>
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
                                <td>{{$product->width}} см</td>
                            </tr>
                        @endif
                        @if($product->height)
                            <tr>
                                <th scope="row">Ширина</th>
                                <td>{{$product->height}} см</td>
                            </tr>
                        @endif
                        @if($product->thickness && $product->thickness != 0)
                            <tr>
                                <th scope="row">Толщина</th>
                                <td>{{$product->thickness}} мм</td>
                            </tr>
                        @endif
                        @if($product->Package_Weight)
                            <tr>
                                <th scope="row">Вес упаковки</th>
                                <td>{{$product->Package_Weight}} кг</td>
                            </tr>
                        @endif

                        @if($one_count_ratio != 1)
                            @if($pack_ratio)
                                <tr>
                                    <th scope="row">Кв.м в упаковке</th>
                                    <td>{{$pack_ratio}}</td>
                                </tr>
                            @endif

                            @if($one_count_ratio)
                                <tr>
                                    <th scope="row">Кв.м в 1 шт</th>
                                    <td>{{$one_count_ratio}}</td>
                                </tr>
                            @endif
                            @if($count_in_pack)
                                <tr>
                                    <th scope="row">Количество в упаковке</th>
                                    <td>{{$count_in_pack}} шт</td>
                                </tr>
                            @endif
                        @endif

                        </tbody>
                    </table>
                    <hr>
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

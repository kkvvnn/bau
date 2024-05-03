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

                    <h1 class="display-6">{{ucfirst(strtolower($product->parent->brand))}}</h1>
                    <p class="fs-2">Коллекция: эпоксидные затирки
                    </p>
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
                                $nn_c_all = count($images);
                            @endphp
                            @foreach($images as $url_z)
                                @if ($url_z)
                                <div class="carousel-item {{$active_slider}}">
                                    <a href="{{$url_z}}" data-fancybox="gallery_collection" data-caption="Изображение {{++$nn_c}} из {{$nn_c_all}}">
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


                    <h2 class="card-title mt-5 pricing-card-title mb-5">{{$product->price}} ₽</h2>

                    <p class="text-aqua mt-5">{!!nl2br($product->parent->description)!!}</p>

                    <br>


{{--                    <p class="mt-4">Актуально на <span--}}
{{--                            class="{{$text_color}} fw-bolder">{{$product->updated_at->format('d.m.Y')}}</span></p>--}}


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

        </div>



        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-striped mt-3 mb-5">
                        <tbody>
                        @if($product->parent->vendor_code)
                            <tr>
                                <th scope="row">Артикул</th>
                                <td>{{$product->parent->vendor_code}}</td>
                            </tr>
                        @endif
                        @if($product->parent->brand)
                            <tr>
                                <th scope="row">Бренд</th>
                                <td>{{$product->parent->brand}}</td>
                            </tr>
                        @endif
                        @if($product->parent->country)
                            <tr>
                                <th scope="row">Родина бренда</th>
                                <td>{{$product->parent->country}}</td>
                            </tr>
                        @endif
                        @if($product->parent->class)
                            <tr>
                                <th scope="row">Класс</th>
                                <td>{{$product->parent->class}}</td>
                            </tr>
                        @endif
                        @if($product->parent->shov)
                            <tr>
                                <th scope="row">Ширина шва</th>
                                <td>{{$product->parent->shov}}</td>
                            </tr>
                        @endif
                        @if($product->parent->massa)
                            <tr>
                                <th scope="row">Вес</th>
                                <td>{{$product->parent->massa}}</td>
                            </tr>
                        @endif
                        @if($product->parent->froze_resistent)
                            <tr>
                                <th scope="row">Морозостойкость</th>
                                <td>{{$product->parent->froze_resistent}}</td>
                            </tr>
                        @endif
                        @if($product->parent->vid_rabot)
                            <tr>
                                <th scope="row">Вид работ</th>
                                <td>{{$product->parent->vid_rabot}}</td>
                            </tr>
                        @endif
                        @if($product->parent->country_proizv)
                            <tr>
                                <th scope="row">Страна производства</th>
                                <td>{{$product->parent->country_proizv}}</td>
                            </tr>
                        @endif

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
                                <img src="{{$url}}" alt=""/>
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

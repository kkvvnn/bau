@extends('main')

@section('meta')
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{url()->full()}}">
    <meta property="og:title" content="Мультибрендовый магазин">
    <meta property="og:description" content="Керамогранит, плитка, мозаика, ламинат и др. в Москве, СПб, Казани">
    <meta property="og:image" content="{{Storage::disk('no_image')->url('millennium-2.jpg')}}">

    <meta name="description" content="Керамогранит, мозаика, ламинат и многое другое в Москве, Санк-Петербурге и Казани">
    <meta name="keywords" content="керамогранит, мозаика, ламинат, кварцвинил, керамическая плитка">
@endsection

@section('title', $type??$search_name??config('app.name') . ' - Керамогранит, мозаика, ламинат в Москве, СПб, Казани')

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

            <div class="px-4 py-5 my-5 text-center">
{{--                <img class="d-block mx-auto mb-4" src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">--}}
                <h1 class="display-5 fw-bold text-body-emphasis">Керамогранит, мозаика, ламинат и многое другое в Москве, <span class="text-nowrap">Санк-Петербурге</span> и Казани</h1>
                <div class="col-lg-6 mx-auto">
                    <p class="lead mb-4">Мы - Официальные дилеры</p>



{{--                    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">--}}
{{--                        <button type="button" class="btn btn-primary btn-lg px-4 gap-3">Primary button</button>--}}
{{--                        <button type="button" class="btn btn-outline-secondary btn-lg px-4">Secondary</button>--}}
{{--                    </div>--}}
                </div>

                <div id="carouselExampleAutoplaying" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{Storage::disk('no_image')->url('33.jpg')}}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{Storage::disk('no_image')->url('aqua.jpg')}}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{Storage::disk('no_image')->url('pix.jpg')}}" class="d-block w-100" alt="...">
                        </div>
{{--                        <div class="carousel-item">--}}
{{--                            <img src="https://service-plitka.ru/storage/images/bauservice/products/Nomenclature/63275dba-a805-4d60-a358-82e48b305cb5/___v8_6280_11277.jpeg" class="d-block w-100" alt="...">--}}
{{--                        </div>--}}
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>


                <div class="container px-4 py-5" id="custom-cards">
                    <h2 class="pb-2 border-bottom">У нас вы найдете:</h2>

                    <div class="row row-cols-1 row-cols-lg-2 align-items-stretch g-4 py-5">
                        <div class="col">
                            <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url({{Storage::disk('no_image')->url('keramogranit.jpg')}});">
                                <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                                    <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold"><span class="text-nowrap">Керамогранит</span> и <span class="text-nowrap">керамическая</span> плитка</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url({{Storage::disk('no_image')->url('laminat.jpg')}});">
                                <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                                    <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Ламинат, <span class="text-nowrap">кварцвинил,</span> <span class="text-nowrap">инженерная</span> доска</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url({{Storage::disk('no_image')->url('mosaic.jpg')}});">
                                <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
                                    <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Большой выбор мозаики</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url({{Storage::disk('no_image')->url('sant.jpg')}});">
                                <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
                                    <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold"><span class="text-nowrap">Сантехника</span></h3>
                                </div>
                            </div>
                        </div>


                    </div>


                </div>


            </div>


{{--            <div class="b-example-divider"></div>--}}

            <div class="container px-4 py-5" id="hanging-icons">
{{--                <h2 class="pb-2 border-bottom">Почему мы</h2>--}}
                <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
                    <div class="col d-flex align-items-start">
{{--                        <div class="icon-square text-body-emphasis bg-body-secondary d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">--}}
{{--                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000" class="bi bi-airplane" viewBox="0 0 16 16">--}}
{{--                                <path d="M6.428 1.151C6.708.591 7.213 0 8 0s1.292.592 1.572 1.151C9.861 1.73 10 2.431 10 3v3.691l5.17 2.585a1.5 1.5 0 0 1 .83 1.342V12a.5.5 0 0 1-.582.493l-5.507-.918-.375 2.253 1.318 1.318A.5.5 0 0 1 10.5 16h-5a.5.5 0 0 1-.354-.854l1.319-1.318-.376-2.253-5.507.918A.5.5 0 0 1 0 12v-1.382a1.5 1.5 0 0 1 .83-1.342L6 6.691V3c0-.568.14-1.271.428-1.849m.894.448C7.111 2.02 7 2.569 7 3v4a.5.5 0 0 1-.276.447l-5.448 2.724a.5.5 0 0 0-.276.447v.792l5.418-.903a.5.5 0 0 1 .575.41l.5 3a.5.5 0 0 1-.14.437L6.708 15h2.586l-.647-.646a.5.5 0 0 1-.14-.436l.5-3a.5.5 0 0 1 .576-.411L15 11.41v-.792a.5.5 0 0 0-.276-.447L9.276 7.447A.5.5 0 0 1 9 7V3c0-.432-.11-.979-.322-1.401C8.458 1.159 8.213 1 8 1s-.458.158-.678.599"/>--}}
{{--                            </svg>--}}
{{--                        </div>--}}
                        <div>
                            <h3 class="fs-2 text-body-emphasis">Гарантия на весь ассортимент</h3>
                            <p>Мы отвечаем за качество нашего товара, нам важна наша репутация.</p>
{{--                            <a href="#" class="btn btn-primary">--}}
{{--                                Primary button--}}
{{--                            </a>--}}
                        </div>
                    </div>
                    <div class="col d-flex align-items-start">
{{--                        <div class="icon-square text-body-emphasis bg-body-secondary d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">--}}
{{--                            <svg class="bi" width="1em" height="1em"><use xlink:href="#cpu-fill"/></svg>--}}
{{--                        </div>--}}
                        <div>
                            <h3 class="fs-2 text-body-emphasis">Реальные скидки</h3>
                            <p>Для постоянных покупателей действуют специальные условия.</p>
{{--                            <a href="#" class="btn btn-primary">--}}
{{--                                Primary button--}}
{{--                            </a>--}}
                        </div>
                    </div>
                    <div class="col d-flex align-items-start">
{{--                        <div class="icon-square text-body-emphasis bg-body-secondary d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">--}}
{{--                            <svg class="bi" width="1em" height="1em"><use xlink:href="#tools"/></svg>--}}
{{--                        </div>--}}
                        <div>
                            <h3 class="fs-2 text-body-emphasis">Несколько шоурумов</h3>
                            <p>В Москве, СПб, Казани. Огромный выбор ассортимента.</p>
{{--                            <a href="#" class="btn btn-primary">--}}
{{--                                Primary button--}}
{{--                            </a>--}}
                        </div>
                    </div>
                    <div class="col d-flex align-items-start">
{{--                        <div class="icon-square text-body-emphasis bg-body-secondary d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">--}}
{{--                            <svg class="bi" width="1em" height="1em"><use xlink:href="#tools"/></svg>--}}
{{--                        </div>--}}
                        <div>
                            <h3 class="fs-2 text-body-emphasis">Доставка по Москве и МО</h3>
                            <p>Осуществляем доставку по Москве и области. Так же отправляем в регионы через ТК.</p>
{{--                            <a href="#" class="btn btn-primary">--}}
{{--                                Primary button--}}
{{--                            </a>--}}
                        </div>
                    </div>
                    <div class="col d-flex align-items-start">
{{--                        <div class="icon-square text-body-emphasis bg-body-secondary d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">--}}
{{--                            <svg class="bi" width="1em" height="1em"><use xlink:href="#tools"/></svg>--}}
{{--                        </div>--}}
                        <div>
                            <h3 class="fs-2 text-body-emphasis">Дизайн-проект</h3>
                            <p>При оформлении заказа в шоуруме вы получаете дизайн-проект в подарок.</p>
{{--                            <a href="#" class="btn btn-primary">--}}
{{--                                Primary button--}}
{{--                            </a>--}}
                        </div>
                    </div>
                    <div class="col d-flex align-items-start">
{{--                        <div class="icon-square text-body-emphasis bg-body-secondary d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">--}}
{{--                            <svg class="bi" width="1em" height="1em"><use xlink:href="#tools"/></svg>--}}
{{--                        </div>--}}
                        <div>
                            <h3 class="fs-2 text-body-emphasis">Оперативная отгрузка товара</h3>
                            <p>Доставка в короткие сроки. Так же есть пункт самовывоза</p>
{{--                            <a href="#" class="btn btn-primary">--}}
{{--                                Primary button--}}
{{--                            </a>--}}
                        </div>
                    </div>
                </div>
            </div>



            <div class="row row-cols-1 row-cols-md-3 g-4 mt-3">

            </div>


            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
            <a href="whatsapp://send?phone=79151274000&text=" class="float" target="_blank">
                <i class="fa fa-whatsapp my-float"></i>
            </a>


        </div>
    </div>

@endsection

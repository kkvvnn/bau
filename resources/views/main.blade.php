<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function (m, e, t, r, i, k, a) {
            m[i] = m[i] || function () {
                (m[i].a = m[i].a || []).push(arguments)
            };
            m[i].l = 1 * new Date();
            for (var j = 0; j < document.scripts.length; j++) {
                if (document.scripts[j].src === r) {
                    return;
                }
            }
            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
        })
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(98191201, "init", {
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true,
            webvisor: true,
            ecommerce: "dataLayer"
        });
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/98191201" style="position:absolute; left:-9999px;" alt=""/></div>
    </noscript>
    <!-- /Yandex.Metrika counter -->

    <script src="/docs/5.3/assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="kkvvnn">
    <meta name="generator" content="Hugo 0.111.3">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <!-- Favicons -->
    {{--  <link rel="apple-touch-icon" href="/docs/5.3/assets/img/favicons/apple-touch-icon.png" sizes="180x180">--}}
    {{--  <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">--}}
    {{--  <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">--}}
    {{--  <link rel="manifest" href="/docs/5.3/assets/img/favicons/manifest.json">--}}
    {{--  <link rel="mask-icon" href="/docs/5.3/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">--}}
    {{--  <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon.ico">--}}
    {{--  <meta name="theme-color" content="#712cf9">--}}


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }

        .bd-mode-toggle {
            z-index: 1500;
        }

        .image {
            display: block;
            margin: 20px auto 30px auto;
            max-width: 100%;
            height: auto;
            box-shadow: -6px 6px 0 #E0E0E0, -12px 12px 0 #BDBDBD;
            margin-bottom: 30px;
            border: 6px solid #F5F5F5;
        }

        /* ============================================================================== */


        * {
            box-sizing: border-box;
        }

        .grid:after {
            content: '';
            display: block;
            clear: both;
        }

        .grid-sizer,
        .grid-item {
            width: 33.333%;
        }

        @media (max-width: 575px) {
            .grid-sizer,
            .grid-item {
                width: 100%;
            }
        }

        @media (min-width: 576px) and (max-width: 767px) {
            .grid-sizer,
            .grid-item {
                width: 50%;
            }
        }

        /* To change the amount of columns on larger devices, uncomment the code below */

        /* @media (min-width: 768px) and (max-width: 991px) {
          .grid-sizer,
          .grid-item {
            width: 33.333%;
          }
        }
        @media (min-width: 992px) and (max-width: 1199px) {
          .grid-sizer,
          .grid-item {
            width: 25%;
          }
        }
        @media (min-width: 1200px) {
          .grid-sizer,
          .grid-item {
            width: 20%;
          }
        } */

        .grid-item {
            float: left;
        }

        .grid-item img {
            display: block;
            max-width: 100%;
        }

        /* .card:hover {
          border: 2px solid grey;
        } */

        .img-wrap {
            position: relative;
            /* filter: brightness(90%) */
        }

        .img-wrap:hover {

            filter: brightness(80%)
        }

        .img-wrap .clss {
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
        }


        .float {
            position: fixed;
            width: 50px;
            height: 50px;
            bottom: 20px;
            right: 20px;

            background-color: #05e857;
            color: #FFF;
            border-radius: 50px;
            text-align: center;
            font-size: 30px;
            box-shadow: 2px 2px 3px #999;
            z-index: 100;
        }

        .float:hover {
            background-color: #25d366;
        }

        .my-float {
            margin-top: 11px;
        }

    </style>

    @yield('styles')

</head>

<body>

<nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('product_index') }}">На главную</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar"
                aria-controls="offcanvasDarkNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar"
             aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">{{--<phone><a href="tel:+79151274000">+7-915-127-4000</a></phone>--}}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <form class="d-flex mt-0 mb-5" role="search" action="{{route('search')}}">
                    <input class="form-control me-2" type="search" name="name" placeholder="поиск"
                           aria-label="Search">
                    <button class="btn btn-success" type="submit">Найти</button>
                </form>
                <hr>
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">

                    <div class="accordion accordion-flush" data-bs-theme="dark" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    КЕРАМОГРАНИТ И ПЛИТКА
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                 data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <ul class="">
                                        <li><a class="nav-link" href="{{ route('laparet.index') }}">LAPARET</a></li>
                                        <li><a class="nav-link" href="{{ route('cersanit.index') }}">CERSANIT</a></li>
                                        <li><a class="nav-link" href="{{ route('vitra.index') }}">VITRA</a></li>
                                        <li><a class="nav-link" href="{{ route('kerama-marazzi.index') }}">KERAMA
                                                MARAZZI</a></li>
                                        <li><a class="nav-link" href="{{ route('ceradim.index') }}">CERADIM</a></li>
                                        <li><a class="nav-link" href="{{ route('primavera-new.index') }}">PRIMAVERA</a>
                                        </li>
                                        <li><a class="nav-link" href="{{ route('altacera.index') }}">ARTKERA</a></li>
                                        <li><a class="nav-link" href="{{ route('ntceramic.index') }}">NT CERAMIC</a>
                                        </li>
                                        <li><a class="nav-link" href="{{ route('kevis.index') }}">KEVIS</a></li>
                                        <li><a class="nav-link" href="{{ route('rusplitka.index') }}">RUSPLITKA</a></li>
                                        <li><a class="nav-link" href="{{ route('artcenter.index') }}">ART CENTRE</a>
                                        </li>
                                        <li><a class="nav-link" href="{{ route('global-tile.index') }}">GLOBAL TILE</a>
                                        </li>
                                        <li><a class="nav-link" href="{{ route('kerranova.index') }}">KERRANOVA</a></li>
                                        <li><a class="nav-link" href="{{ route('keramopro.index') }}">NOVIN CERAM</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    МОЗАИКА
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                 data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <ul class="">
                                        <li><a class="nav-link" href="{{ route('pixmosaic-new.index') }}">PIX MOSAIC</a>
                                        </li>
                                        <li><a class="nav-link" href="{{ route('leedo.index') }}">LEEDO</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                    ЛАМИНАТ КВАРЦ-ВИНИЛ
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                 data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <ul class="">
                                        <li><a class="nav-link" href="{{ route('aquafloor_index') }}">AQUAFLOOR</a></li>
                                        <li><a class="nav-link" href="{{ route('skalla.index') }}">SKALLA</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFour" aria-expanded="false"
                                        aria-controls="collapseFour">
                                    ЗАТИРКИ И СМЕСИ
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                 data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <ul class="">
                                        <li><a class="nav-link" href="{{ route('kerabellezza.index') }}">KERABELLEZZA</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--                    <li class="nav-item dropdown">--}}
                    {{--                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">--}}
                    {{--                            КЕРАМОГРАНИТ И ПЛИТКА--}}
                    {{--                        </a>--}}
                    {{--                        <ul class="dropdown-menu dropdown-menu-dark collapse show">--}}
                    {{--                            <li><a class="dropdown-item" href="{{ route('laparet.index') }}">LAPARET</a></li>--}}
                    {{--                            <li><a class="dropdown-item" href="{{ route('cersanit.index') }}">CERSANIT</a></li>--}}
                    {{--                            <li><a class="dropdown-item" href="{{ route('vitra.index') }}">VITRA</a></li>--}}
                    {{--                            <li><a class="dropdown-item" href="">KERAMA MARAZZI</a></li>--}}
                    {{--                            <li><a class="dropdown-item" href="">CERADIM</a></li>--}}
                    {{--                            <li><a class="dropdown-item" href="">PRIMAVERA</a></li>--}}
                    {{--                            <li><a class="dropdown-item" href="">ARTKERA</a></li>--}}
                    {{--                            <li><a class="dropdown-item" href="">NT CERAMIC</a></li>--}}
                    {{--                            <li><a class="dropdown-item" href="">KEVIS</a></li>--}}
                    {{--                            <li><a class="dropdown-item" href="">RUSPLITKA</a></li>--}}
                    {{--                            <li><a class="dropdown-item" href="">ART CENTRE</a></li>--}}
                    {{--                            <li><a class="dropdown-item" href="">GLOBAL TILE</a></li>--}}
                    {{--                            <li><a class="dropdown-item" href="">KERRANOVA</a></li>--}}
                    {{--                            <li><a class="dropdown-item" href="">NOVIN CERAM</a></li>--}}
                    {{--                            <li>--}}
                    {{--                                <hr class="dropdown-divider">--}}
                    {{--                            </li>--}}
                    {{--                        </ul>--}}
                    {{--                    </li>--}}
                    {{--                    <li class="nav-item dropdown">--}}
                    {{--                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">--}}
                    {{--                            МОЗАИКА--}}
                    {{--                        </a>--}}
                    {{--                        <ul class="dropdown-menu dropdown-menu-dark">--}}
                    {{--                            <li><a class="dropdown-item" href="{{ route('laparet.index') }}">LAPARET</a></li>--}}
                    {{--                            <li><a class="dropdown-item" href="{{ route('cersanit.index') }}">CERSANIT</a></li>--}}
                    {{--                            <li><a class="dropdown-item" href="{{ route('vitra.index') }}">VITRA</a></li>--}}
                    {{--                            <li><a class="dropdown-item" href="">KERAMA MARAZZI</a></li>--}}
                    {{--                            <li><a class="dropdown-item" href="">CERADIM</a></li>--}}
                    {{--                            <li><a class="dropdown-item" href="">PRIMAVERA</a></li>--}}
                    {{--                            <li><a class="dropdown-item" href="">ARTKERA</a></li>--}}
                    {{--                            <li><a class="dropdown-item" href="">NT CERAMIC</a></li>--}}
                    {{--                            <li><a class="dropdown-item" href="">KEVIS</a></li>--}}
                    {{--                            <li><a class="dropdown-item" href="">RUSPLITKA</a></li>--}}
                    {{--                            <li><a class="dropdown-item" href="">ART CENTRE</a></li>--}}
                    {{--                            <li><a class="dropdown-item" href="">GLOBAL TILE</a></li>--}}
                    {{--                            <li><a class="dropdown-item" href="">KERRANOVA</a></li>--}}
                    {{--                            <li><a class="dropdown-item" href="">NOVIN CERAM</a></li>--}}
                    {{--                            <li>--}}
                    {{--                                <hr class="dropdown-divider">--}}
                    {{--                            </li>--}}
                    {{--                        </ul>--}}
                    {{--                    </li>--}}
                    <hr>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('product_sale')}}">Распродажа</a>
                    </li>
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="#">Link</a>--}}
{{--                    </li>--}}
                </ul>
            </div>
        </div>
    </div>
</nav>

<main>
    @yield('content')
</main>

<div class="container">
    <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="{{route('product_index')}}"
                                    class="nav-link px-2 text-body-secondary">Главная</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Features</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Контакты</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">О нас</a></li>
        </ul>
        <p class="text-center text-body-secondary">&copy; {{ date('Y') }} Company Name, Inc</p>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"
        integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous"
        async></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
<script>
    // init Masonry
    var $grid = $('.grid').masonry({
        itemSelector: '.grid-item',
        percentPosition: true,
        columnWidth: '.grid-sizer'
    });

    // layout Masonry after each image loads
    $grid.imagesLoaded().progress(function () {
        $grid.masonry();
    });
</script>


@yield('scripts')


</body>

</html>

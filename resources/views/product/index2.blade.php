<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
  <script src="/docs/5.3/assets/js/color-modes.js"></script>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="kkvvnn">
  <meta name="generator" content="Hugo 0.111.3">
  <title>Plitka</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

  <!-- Favicons -->
  <link rel="apple-touch-icon" href="/docs/5.3/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
  <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
  <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
  <link rel="manifest" href="/docs/5.3/assets/img/favicons/manifest.json">
  <link rel="mask-icon" href="/docs/5.3/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
  <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon.ico">
  <meta name="theme-color" content="#712cf9">


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
  </style>


</head>

<body>

  <!-- <header data-bs-theme="dark">
  <div class="collapse text-bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4>About</h4>
          <p class="text-body-secondary">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4>Contact</h4>
          <ul class="list-unstyled">
            <li><a href="#" class="text-white">Follow on Twitter</a></li>
            <li><a href="#" class="text-white">Like on Facebook</a></li>
            <li><a href="#" class="text-white">Email me</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
        <strong>Album</strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header> -->

  <div class="container">
    <nav class="navbar navbar-dark bg-dark bg-gradient fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{route('product_index')}}">На главную</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Название</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <form class="d-flex mt-3" role="search" action="{{route('search')}}">
              <input class="form-control me-2" type="search" name="name" placeholder="поиск" aria-label="Search">
              <button class="btn btn-success" type="submit">Найти</button>
            </form>
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('index_keramogranit')}}">Керамогранит</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('index_plitka')}}">Керамическая плитка</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('index_mosaic')}}">Мозаика</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('index_decor')}}">Декор</a>
              </li>
              <hr>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('index_collection')}}">По названию коллекции</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="">По размеру</a>
              </li>
              <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Название2
            </a>
            <ul class="dropdown-menu dropdown-menu-dark">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li> -->
            </ul>

          </div>
        </div>
      </div>
    </nav>
  </div>

  <main>

    <!-- <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Album example</h1>
        <p class="lead text-body-secondary">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
        <p>
          <a href="#" class="btn btn-primary my-2">Main call to action</a>
          <a href="#" class="btn btn-secondary my-2">Secondary action</a>
        </p>
      </div>
    </div>
  </section> -->





    <div class="album py-5 bg-body-tertiary">
      <div class="container">
        <div>
          <p></p>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">

          @foreach($products as $product)

          <?php
          $string_for_delete = 'ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/';
          $name_file = Str::remove($string_for_delete, $product->Picture);

          //        $name_file = 'c8b0ef73-19ed-11e3-a4c8-005056ad2cf4___0002.jpg';

          if (Storage::disk('public')->missing($name_file)) {
            $file = Storage::disk('ftp')->get($name_file);
            Storage::disk('public')->put($name_file, $file);
          }

          // $name_file = 'small_img/' . $name_file;



          $url = Storage::url($name_file);
          $url_small = Storage::url('small_img/' . $name_file);
          // $url = Storage::url($name_file); 

          // use Illuminate\Support\Str;

          $url_small = Str::swap([
            '.jpeg' => '.jpg',
            '.png' => '.jpg',
            // 'great' => 'fantastic',
          ], $url_small);
          ?>

          <div class="col">
            <div class="card h-100">
              <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> -->
              <a href="/product/{{$product->id}}">
                <!-- <img src="{{$url_small}}" class="card-img-top shadow" alt="..."> -->
                <img src="{{$url_small}}" class="card-img-top" alt="...">
              </a>
              <div class="card-body">
                <h5 class="card-title">{{$product->Name}}</h5>
                <p class="card-text"></p>
              </div>
              <div class="card-footer">
                <small class="text-body-secondary">{{$product->RMPrice}} ₽/{{$product->MainUnit}}</small>
              </div>


            </div>
          </div>

          @endforeach

        </div>
      </div>
    </div>
    {{ $products->links() }}
  </main>

  <!-- <footer class="text-body-secondary py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
    <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
    <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a href="/docs/5.3/getting-started/introduction/">getting started guide</a>.</p>
  </div>
</footer> -->


  <!-- <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script> -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>

</html>
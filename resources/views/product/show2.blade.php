@extends('main')

@section('content')

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






        <div class="container">
            <div class="row">
                
                <div class="col">
                    <h2>{{$product->Name}}</h2>
                    <hr>
                    <h3>
                        {{$product->Producer_Brand}}
                    </h3>
                    <h4>Коллекция:
                        @foreach ($collection as $one_collection)
                        <a href="/collection/{{$one_collection->Collection_Id}}" class="link-dark text-decoration-none text-reset">{{$one_collection->Collection_Name}}. </a>
                        @endforeach
                    </h4>
                    <h5>
                        Цена: {{$product->RMPrice}} ₽/{{$product->MainUnit}}
                        <br>
                        Цена зак: {{$product->Price}} ₽/{{$product->MainUnit}}
                        <!-- <br> {{round(($product->RMPrice/$product->Price)*100 - 100, 2)}}% -->
                    </h5>
                    <hr>
                    <h5>
                        Остаток: {{$product->balanceCount}} {{$product->MainUnit}}
                    </h5>
                    <hr>
                    <h5>
                        Артикул: {{$product->Element_Code}}
                    </h5>
                </div>
            </div>
            <div class="row">
            <div class="col-sm-6">
                    @foreach ($url_collection as $url_c)
                    <img src="/storage/Collections/{{$url_c}}" class="img-fluid shadow p-3 mb-5 bg-white rounded" alt="...">
                    @endforeach
                </div>
            </div>
            <div class="row">
            <div class="col-sm-6">
                    @foreach ($urls as $url)
                    <img src="{{$url}}" class="img-fluid shadow p-3 mb-5 bg-white rounded" alt="...">
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</div>


@endsection
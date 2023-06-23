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
                    <h2>{{$product->Item_name}}</h2>
                    <hr>
                    <h3>
                        {{$product->Producer_Brand_name}}
                    </h3>
                    <h4>Коллекция: {{$product->Collection}}</h4>
                    <h5>
                        Цена: {{$product->Price_rozn}} ₽/{{$product->unit}}
                        <br>
                        <!-- Цена зак: {{$product->Price_OPT}} ₽/{{$product->unit}} -->
                    </h5>
                    <hr>
                    <h5>
                        Остаток Москва: {{$product->Sklad_Msk_LeeDo??0}} {{$product->unit}}
                        <br>
                        Резерв Москва: {{$product->Reserv_Msk_LeeDo??0}} {{$product->unit}}
                        <br>
                        Остаток Санкт-Петербург: {{$product->Sklad_SPb_LeeDo??0}} {{$product->unit}}
                        <br>
                        Резерв Санкт-Петербург: {{$product->Reserv_SPb_LeeDo??0}} {{$product->unit}}
                    </h5>
                    <hr>
                    <h5>
                        Категория: {{str_replace('_', ' ', $product->Category)}}
                    </h5>
                    <hr>
                    <h5>В упаковке шт: <strong>{{$product->Pcs_per_box}}</strong> кв.м:
                        <strong>{{$product->Sq_m_per_box}}</strong></h5>
                    <hr>
                    <h5>
                        {{trim($product->Description, '"')}}
                    </h5>
                </div>
            </div>

            @php
                $vendor_code = $product->System_ID;
            @endphp

            <div>
                <form action="{{ route('save-foto-leedo') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <input type="hidden" name="vendor" value="{{ $vendor_code }}">
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <input class="form-control" type="file" name="foto" id="" required>
                        <p></p>
                        <input class="btn btn-primary" type="submit" value="Отправить">
                    </div>
                </form>
            </div>
            <hr>


            <div class="container-fluid">

                <div class="grid">
                    <div class="grid-sizer"></div>
                    @foreach ($images as $img)
                        <div class="grid-item">
                            <img src="{{$img}}"/>
                        </div>
                    @endforeach

                </div>


                <hr>

                @if(count($fotos))
                    <div class="grid">
                        <div class="grid-sizer"></div>
                        @foreach ($fotos as $foto)
                            <div class="grid-item" style="position: relative; display:inline-block;">
                                <img src="{{$foto}}"/>
                                <form action="{{ route('photo-leedo.delete') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="foto_delete" value="{{ $foto }}">
                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                    <button type="submit" class="btn btn-danger"
                                            style="position: absolute; top: 0; right: 0">Удалить
                                    </button>
                                </form>
                            </div>
                        @endforeach

                    </div>
                @endif

            </div>


        </div>
    </div>

@endsection

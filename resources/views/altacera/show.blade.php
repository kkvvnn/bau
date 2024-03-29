@extends('main')

@section('title', $product->artikul.' '.$product->category_rel->parent.' '.$product->collection_item.' '.$product->name_for_site)

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

            @php
                $units = $product->units;
                $unit_id = $product->balance->unit_id;
//                        dd($units);
                $unit = '';
                foreach ($units as $u) {
                    if ($u['unit_id'] == $unit_id) {
                        $unit = $u['unit'];
                        break;
                    }
                }
//                        dd($unit);
            @endphp


            <div class="row">

                <div class="col">
                    <h2>{{$product->category_rel->parent}} {{$product->collection_item}} {{$product->name_for_site}} {{$product->artikul}}</h2>
                    <hr>
                    <h3>
                        {{$product->category_rel->parent}}
                    </h3>
                    <h4>Коллекция: {{$product->category}}</h4>
                    <h5>Артикул: {{$product->artikul}}</h5>
                    <h5>
                        Цена: {{$product->price->price}} ₽/{{$unit}}
                        <br>
                    </h5>
                    <hr>
                    <h5>
                        @if(str_contains($product->balance->free_balance, '.'))
                            Остаток: {{rtrim(rtrim($product->balance->free_balance, '0'), '.')}} {{$unit}}
                        @else
                            Остаток: {{$product->balance->free_balance}} {{$unit}}
                        @endif
                    </h5>
                </div>
            </div>

            @php
                $vendor_code = $product->artikul;
            @endphp

            <div>
                <form action="{{ route('save-foto-altacera') }}" method="post" enctype="multipart/form-data">
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
                        <div class="grid-item">
                            <img src="{{Storage::disk('altacera')->url($product->tovar_id . '.JPEG')}}"/>
                        </div>

                </div>


                <hr>

                @if(count($fotos))
                    <div class="grid">
                        <div class="grid-sizer"></div>
                        @foreach ($fotos as $foto)
                            <div class="grid-item" style="position: relative; display:inline-block;">
                                <img src="{{$foto}}"/>
                                <form action="{{ route('photo-altacera.delete') }}" method="post">
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

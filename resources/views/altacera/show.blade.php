@extends('main')

@section('title', $product->artikul.' '.$product->category_rel->parent.' '.$product->collection_item.' '.$product->name_for_site)

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/>
@endsection

@section('content')

    @php
        $units = $product->units;
        $unit_id = $product->balance[0]->unit_id;
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
                    <h1 class="display-6">{{$product->category_rel->parent}} {{$product->collection_item}} {{$product->name_for_site}} {{$product->artikul}}</h1>
                    <hr>
                    <h1 class="display-6">{{$product->category_rel->parent}}</h1>
                    <p class="fs-2">Коллекция: {{$product->category}}</p>
                    <hr>



                    <h5>Артикул: {{$product->artikul}}</h5>
                    <h5>
                        Цена: {{$product->price->price}} ₽/{{$unit}}
                        <br>
                    </h5>
                    <hr>




                    @isset($balance_moscow)
                        <p class="mb-0 fs-5 text-body-secondary">Москва: {{$balance_moscow}} {{$unit}}</p>
                    @endisset
                    @isset($balance_spb)
                        <p class="mb-0 fs-5 text-body-secondary">СПб: {{$balance_spb}} {{$unit}}</p>
                    @endisset
                    @isset($balance_krasnodar)
                        <p class="mb-0 fs-5 text-body-secondary">Краснодар: {{$balance_krasnodar}} {{$unit}}</p>
                    @endisset
                    @isset($balance_kazan)
                        <p class="mb-0 fs-5 text-body-secondary">Казань: {{$balance_kazan}} {{$unit}}</p>
                    @endisset
                    <hr>


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

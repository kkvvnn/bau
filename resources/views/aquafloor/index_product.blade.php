@extends('main')

@section('content')

<div class="album py-5 bg-body-tertiary">
    <div>
        <p></p>
    </div>

    @foreach ($product_one as $product)
    <div class="container">
        <dl class="row">
            <dt class="col-sm-3">Тип укладки</dt>
            <dd class="col-sm-9">{{$product->type_ucladki}}</dd>

            <dt class="col-sm-3">Материал</dt>
            <dd class="col-sm-9">{{$product->material}}</dd>

            <dt class="col-sm-3">Фаска</dt>
            <dd class="col-sm-9">{{$product->faska}}</dd>

            <dt class="col-sm-3">Подложка</dt>
            <dd class="col-sm-9">{{$product->podlozhka}}</dd>

            <dt class="col-sm-3">Защитный слой</dt>
            <dd class="col-sm-9">{{$product->zashit_sloi}}</dd>

            <dt class="col-sm-3">Технология CPL</dt>
            <dd class="col-sm-9">{{$product->CPL}}</dd>

            <dt class="col-sm-3">Длина</dt>
            <dd class="col-sm-9">{{$product->lenght}}</dd>

            <dt class="col-sm-3">Ширина</dt>
            <dd class="col-sm-9">{{$product->width}}</dd>

            <dt class="col-sm-3">Толщина</dt>
            <dd class="col-sm-9">{{$product->fat}}</dd>

            <dt class="col-sm-3">Крличество в упаковке</dt>
            <dd class="col-sm-9">{{$product->count_in_pack}}</dd>

            <dt class="col-sm-3">Крличество в упаковке</dt>
            <dd class="col-sm-9">{{$product->count_in_pack}}</dd>
        </dl>
    </div>
    @endforeach



</div>
@endsection
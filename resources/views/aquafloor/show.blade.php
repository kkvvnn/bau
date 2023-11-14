@extends('main')

@section('content')

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
                    <h2>{{$product->title}}</h2>
                    <hr>

                    <h4>Коллекция: <a href="{{route('aquafloor.show.collection', $product->collection)}}">{{$product->collection}}</a></h4>
                    <p class="fs-5 text-body-secondary">Цена: {{$product->price}} ₽</p>
                </div>
            </div>



            <div class="container-fluid">

                <hr>

                <div class="grid">
                    <div class="grid-sizer"></div>
                        <div class="grid-item">
                            <img src="{{$product->picture}}"/>
                        </div>
                </div>
                <hr>
            </div>

            <table class="table table-striped">
                <tbody>
                @if($product->razmer)
                    <tr>
                        <th scope="row">Размер</th>
                        <td>{{$product->razmer}} мм</td>
                    </tr>
                @endif
                @if($product->count_in_box)
                    <tr>
                        <th scope="row">В упаковке штук</th>
                        <td>{{$product->count_in_box}}</td>
                    </tr>
                @endif
                @if($product->vendor_code)
                    <tr>
                        <th scope="row">Артикул</th>
                        <td>{{$product->vendor_code}} мм</td>
                    </tr>
                @endif
                @if($product->klass_iznosostojkosti)
                    <tr>
                        <th scope="row">Класс износостойкости</th>
                        <td>{{$product->klass_iznosostojkosti}}</td>
                    </tr>
                @endif
                @if($product->tip_soedineniya)
                    <tr>
                        <th scope="row">Тип соединения</th>
                        <td>{{$product->tip_soedineniya}}</td>
                    </tr>
                @endif
                @if($product->country)
                    <tr>
                        <th scope="row">Страна</th>
                        <td>{{$product->country}}</td>
                    </tr>
                @endif
                @if($product->tip_risunka)
                    <tr>
                        <th scope="row">Тип рисунка</th>
                        <td>{{$product->tip_risunka}}</td>
                    </tr>
                @endif
                @if($product->vlagostojkost)
                    <tr>
                        <th scope="row">Влагостойкость</th>
                        <td>{{$product->vlagostojkost}}</td>
                    </tr>
                @endif
                @if($product->material)
                    <tr>
                        <th scope="row">Материал</th>
                        <td>{{$product->material}}</td>
                    </tr>
                @endif
                @if($product->vstroennaya_podlozhka)
                    <tr>
                        <th scope="row">Встроенная подложка</th>
                        <td>{{$product->vstroennaya_podlozhka}}</td>
                    </tr>
                @endif
                @if($product->zashhitnuy_sloy_mm)
                    <tr>
                        <th scope="row">Защитный слой</th>
                        <td>{{$product->zashhitnuy_sloy_mm}} мм</td>
                    </tr>
                @endif
                @if($product->faska)
                    <tr>
                        <th scope="row">Фаска</th>
                        <td>{{$product->faska}}</td>
                    </tr>
                @endif
                @if($product->url)
                    <tr>
                        <th scope="row"></th>
                        <td><a href="{{$product->url}}">Ссылка на офиц. сайт</a></td>
                    </tr>
                @endif
                </tbody>
            </table>

        </div>
    </div>
    <a href="http://"></a>
@endsection

@section('scripts')

@endsection

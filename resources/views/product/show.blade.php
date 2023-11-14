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
                    <h2>{{$product->Name}}</h2>
                    <hr>
                    <h3>
                        {{$product->Producer_Brand}}
                    </h3>
                    <h4>Коллекция:
                        @foreach ($collection as $one_collection)
                            <a href="/collection/{{$one_collection->Collection_Id}}"
                               class="link-dark text-decoration-none text-reset">{{$one_collection->Collection_Name}}
                                . </a>
                        @endforeach
                    </h4>
                    <hr>

                    <p class="fs-5 text-body-secondary">Цена: {{$product->RMPrice}} ₽/{{$product->MainUnit}} <small class="text-muted"><del>{{$old_price}} </del></small></p>
                    <hr>

                    @if($product->Producer_Brand == 'Laparet' && ($product->RMPriceOld == 0 || $product->RMPriceOld == $product->RMPrice))
                        <p class="fs-5 text-body-secondary"><button type="button" class="btn btn-info">Цена -10%: {{round($product->RMPrice * 0.90, -1)}} ₽/{{$product->MainUnit}} <small class="text-muted"><del>{{$old_price}} </del></small></button></p>
                        <hr>
                    @endif
                    @if($product->Producer_Brand == 'Vitra' && ($product->RMPriceOld == 0 || $product->RMPriceOld == $product->RMPrice))
                        <p class="fs-5 text-body-secondary"><button type="button" class="btn btn-info">Цена -10%: {{round($product->RMPrice * 0.90, -1)}} ₽/{{$product->MainUnit}} <small class="text-muted"><del>{{$old_price}} </del></small></button></p>
                        <hr>
                    @endif
                    @if($product->RMPriceOld && $product->RMPriceOld != $product->RMPrice)
                        <button type="button" class="btn btn-warning">РАСПРОДАЖА</button>                                    <hr>
                    @endif

                    <h5>Остаток: {{$product->balanceCount}} {{$product->MainUnit}} {{$vivod}}</h5>
                    <p>Актуально на {{$product->updated_at->toDateString()}}</p>
                    <hr>

                </div>
            </div>

            <div class="container-fluid">
                <div class="grid">
                    <div class="grid-sizer"></div>
                    @foreach ($url_collection as $url_c)
                        <div class="grid-item">
                            <img src="/storage/Collections/{{$url_c}}"/>
                        </div>
                    @endforeach

                </div>
                <hr>
                <div class="grid">
                    <div class="grid-sizer"></div>
                    @foreach ($urls as $url)
                        <div class="grid-item">
                            <img src="{{$url}}" style="border-bottom:1px solid rgba(78, 73, 60, 0.20);border-left:1px solid rgba(78, 73, 60, 0.20)"/>
                        </div>
                    @endforeach
                </div>
                <hr>

                <table class="table table-striped">
                    <tbody>
                    @if($product->Owner_Article)
                        <tr>
                            <th scope="row">Артикул</th>
                            <td>{{$product->Owner_Article}}</td>
                        </tr>
                    @endif
                    @if($product->Producer_Brand)
                        <tr>
                            <th scope="row">Бренд</th>
                            <td>{{$product->Producer_Brand}}</td>
                        </tr>
                    @endif
                    @if($product->Country_of_manufacture)
                        <tr>
                            <th scope="row">Страна производства</th>
                            <td>{{$product->Country_of_manufacture}}</td>
                        </tr>
                    @endif
                    @if($product->Category)
                        <tr>
                            <th scope="row">Категория</th>
                            <td>{{$product->Category}}</td>
                        </tr>
                    @endif
                    @if($product->Place_in_the_Collection)
                        <tr>
                            <th scope="row">Место в коллекции</th>
                            <td>{{$product->Place_in_the_Collection}}</td>
                        </tr>
                    @endif
                    @if($product->DesignValue)
                        <tr>
                            <th scope="row">Дизайн</th>
                            <td>{{$product->DesignValue}}</td>
                        </tr>
                    @endif
                    @if($product->Color)
                        <tr>
                            <th scope="row">Цвет</th>
                            <td>{{$product->Color}}</td>
                        </tr>
                    @endif
                    @if($product->Surface)
                        <tr>
                            <th scope="row">Поверхность</th>
                            <td>{{$product->Surface}}</td>
                        </tr>
                    @endif
                    @if($product->Cover)
                        <tr>
                            <th scope="row">Покрытие</th>
                            <td>{{$product->Cover}}</td>
                        </tr>
                    @endif
                    @if($product->FrostResistance)
                        <tr>
                            <th scope="row">Морозоустойчивость</th>
                            <td>{{$product->FrostResistance}}</td>
                        </tr>
                    @endif
                    @if($product->Rectified)
                        <tr>
                            <th scope="row">Ректифицированная</th>
                            <td>{{$product->Rectified}}</td>
                        </tr>
                    @endif
                    @if($product->Lenght)
                        <tr>
                            <th scope="row">Длина</th>
                            <td>{{$product->Lenght}} см</td>
                        </tr>
                    @endif
                    @if($product->Height)
                        <tr>
                            <th scope="row">Ширина</th>
                            <td>{{$product->Height}} см</td>
                        </tr>
                    @endif
                    @if($product->Thickness && $product->Thickness != 0)
                        <tr>
                            <th scope="row">Толщина</th>
                            <td>{{$product->Thickness}} см</td>
                        </tr>
                    @endif
                    @if($product->Package_Weight)
                        <tr>
                            <th scope="row">Вес упаковки</th>
                            <td>{{$product->Package_Weight}} кг</td>
                        </tr>
                    @endif
                    @if($product->Durability)
                        <tr>
                            <th scope="row">Стойкость к истиранию</th>
                            <td>{{$product->Durability}}</td>
                        </tr>
                    @endif
                    @if($product->Package_Value)
                        <tr>
                            <th scope="row">Кв.м в упаковке</th>
                            <td>{{$product->Package_Value}}</td>
                        </tr>
                    @endif
                    @if($product->PCS_in_Package)
                        <tr>
                            <th scope="row">Количество в упаковке</th>
                            <td>{{$product->PCS_in_Package}}</td>
                        </tr>
                    @endif
                    </tbody>
                </table>

                @if(count($fotos))
                    <div class="grid">
                        <div class="grid-sizer"></div>
                        @foreach ($fotos as $foto)
                            <div class="grid-item" style="position: relative; display:inline-block;">
                                <img src="{{$foto}}"/>
                                <form action="{{ route('photo.delete') }}" method="post">
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

@section('scripts')

@endsection

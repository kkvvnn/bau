@extends('main')

@section('content')

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
                    <h1 class="display-6">{{$product->Name}}</h1>

                    <hr>

                    <h1 class="display-6">{{$product->Producer_Brand}}</h1>
                    <p class="fs-2">Коллекция:
                        @foreach ($collection as $one_collection)
                            <a href="/collection/{{$one_collection->Collection_Id}}"
                               class="link-secondary text-decoration-none">{{$one_collection->Collection_Name}}
                                . </a>
                        @endforeach
                    </p>


                    <hr>

                </div>
            </div>
        </div>

        <div class="container-md">
            <div class="row">
                <div class="col-md-6">
                    <div id="carouselExample" class="carousel slide carousel-dark">
                        <div class="carousel-inner">
                            @php
                                $active_slider = 'active';
                            @endphp
                            @foreach($urls as $url)
                                <div class="carousel-item {{$active_slider}}">
                                    <img src="{{$url}}" class="d-block w-100" alt="...">
                                </div>
                                @php
                                    $active_slider = '';
                                @endphp
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                                data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                                data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                </div>
                <div class="col-md-6">

                    <h2 class="card-title mt-5 pricing-card-title">{{$product->RMPrice}} <small
                            class="text-muted fw-light">₽/{{$product->MainUnit}}</small></h2>

                    <br>

                    @if($product->Producer_Brand == 'Laparet' && ($product->RMPriceOld == 0 || $product->RMPriceOld == $product->RMPrice))
                        <p class="d-inline-flex mb-1 px-2 py-1 fw-semibold text-success-emphasis bg-success-subtle border border-success-subtle rounded-2">
                            Цена -15% {{round($product->RMPrice * 0.85, -1)}} ₽/{{$product->MainUnit}}</p>
                    @endif
                    @if($product->Producer_Brand == 'Vitra' && ($product->RMPriceOld == 0 || $product->RMPriceOld == $product->RMPrice))
                        <p class="d-inline-flex mb-1 px-2 py-1 fw-semibold text-success-emphasis bg-success-subtle border border-success-subtle rounded-2">
                            Цена -15% {{round($product->RMPrice * 0.85, -1)}} ₽/{{$product->MainUnit}}</p>
                    @endif
                    @if($product->RMPriceOld && $product->RMPriceOld != $product->RMPrice)
                        <p class="d-inline-flex mb-1 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2 text-uppercase">
                            Распродажа</p>
                    @endif

                    <h5 class="mt-4">Остаток: {{$product->balanceCount}} {{$product->MainUnit}} {{$vivod}}</h5>
                    <p>Актуально на <span
                            class="{{$text_color}} fw-bolder">{{$product->updated_at->format('d.m.Y')}}</span></p>

                </div>
            </div>
            <hr>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div id="carouselExample_collection" class="carousel slide carousel-dark">
                            <div class="carousel-inner">
                                @php
                                    $active_slider = 'active';
                                @endphp
                                @foreach($url_collection as $url2)
                                    <div class="carousel-item {{$active_slider}}">
                                        <img src="{{$url2}}" class="d-block w-100" alt="...">
                                    </div>
                                    @php
                                        $active_slider = '';
                                    @endphp
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample_collection"
                                    data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample_collection"
                                    data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row">
                <div class="col-md-6">
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
                </div>
            </div>
        </div>

    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="container-fluid">
                    <div class="grid">
                        <div class="grid-sizer"></div>
                        @foreach ($urls as $url)
                            <div class="grid-item">
                                <img src="{{$url}}"
                                     style="border-bottom:1px solid rgba(78, 73, 60, 0.20);border-left:1px solid rgba(78, 73, 60, 0.20)"/>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

@endsection

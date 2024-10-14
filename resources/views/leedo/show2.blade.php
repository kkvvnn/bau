@extends('main')

@section('title', $product->Item_name)

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/>
@endsection

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
                    <h1 class="display-6">{{$product->Item_name}}</h1>
                    <hr>
                    <h1 class="display-6">{{$product->Brand_name}}</h1>
                    <p class="fs-2">Коллекция:
                        <a href="{{route('leedo.collection', $product->Collection)}}"
                           class="link-secondary text-decoration-none">{{$product->Collection}}
                        </a></p>
                    <hr>

                </div>
            </div>
        </div>

        <div class="container-md">
            <div class="row">
                <div class="col-md-6">
{{--                    <p class="fs-5">Интерьер</p>--}}
                    <div id="carouselExample_collection" class="carousel slide carousel-dark pt-3">
                        <div class="carousel-indicators">
                            @php
                                $n_slide = 0;
                                $class_slide = 'class="active" aria-current="true"';
                            @endphp
                            @foreach($images as $url_slide_collection)
                                <button type="button" data-bs-target="#carouselExample_collection" data-bs-slide-to="{{$n_slide}}" {!!$class_slide!!} aria-label="Slide {{++$n_slide}}"></button>
                                @php
                                    $class_slide = '';
                                @endphp
                            @endforeach
                        </div>
                        <div class="carousel-inner">
                            @php
                                $active_slider = 'active';
                                $nn_c = 0;
                                $nn_c_all = count($images);
                            @endphp
                            @foreach($images as $url_z)
                                @if ($url_z)
                                <div class="carousel-item {{$active_slider}}">
                                    <a href="{{$url_z}}" data-fancybox="gallery_collection" data-caption="Изображение {{++$nn_c}} из {{$nn_c_all}}">
                                    <img src="{{$url_z}}" class="d-block w-100" alt="...">
                                    </a>
                                </div>
                                @endif
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
                <div class="col-md-6">


                    <h2 class="card-title mt-5 pricing-card-title">{{$product->Price_rozn}} <small
                            class="text-muted fw-light">₽/{{$product->unit}}  {{--{{$product->Price_OPT}}--}}</small></h2>

                    <br>

                    <h5 class="mb-0">Москва: {{round($product->Sklad_Msk_LeeDo)??0}} {{$product->unit}}</h5>
                    <h5 class="mb-0">СПб: {{round($product->Sklad_SPb_LeeDo)??0}} {{$product->unit}}</h5>

                    <p class="mt-4">Актуально на <span
                            class="{{$text_color}} fw-bolder">{{$product->updated_at->format('d.m.Y')}}</span></p>


{{--                    <a title="Whatsapp" href="whatsapp://send?phone=79373209953&text={{$product->Name}}">--}}
{{--                        <p class="mb-0"><img src="{{asset('w2.svg')}}" alt="Написать в Whatsapp" /></p>--}}
{{--                    </a>--}}

{{--                    <a title="Telegram" href="tg://resolve?domain=kkvvnn89" target="_blank">--}}
{{--                        <p><img src="{{asset('t2.svg')}}" alt="Написать в Telegram" /></p>--}}
{{--                    </a>--}}

{{--                    <a class="link-secondary text-decoration-none" href="tel:+79373209953"><p class="fs-4"><img src="{{asset('telephone.svg')}}" /> +7(937)320-99-53</p></a>--}}

                </div>
            </div>
            <hr>
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
                        @if($product->Brand_name)
                            <tr>
                                <th scope="row">Бренд</th>
                                <td>{{$product->Brand_name}}</td>
                            </tr>
                        @endif
                        @if($product->Collection)
                            <tr>
                                <th scope="row">Коллекция</th>
                                <td>{{$product->Collection}}</td>
                            </tr>
                        @endif
                        @if($product->Category)
                            <tr>
                                <th scope="row">Категория</th>
                                <td>{{str_replace('_', ' ', $product->Category)}}</td>
                            </tr>
                        @endif
                        @if($product->Material)
                            <tr>
                                <th scope="row">Материал</th>
                                <td>{{$product->Material}}</td>
                            </tr>
                        @endif
                        @if($product->Usage)
                            <tr>
                                <th scope="row">Для</th>
                                <td>{{$product->Usage}}</td>
                            </tr>
                        @endif
                        @if($product->Color_text)
                            <tr>
                                <th scope="row">Цвет</th>
                                <td>{{$product->Color_text}}</td>
                            </tr>
                        @endif
                        @if($product->Surface)
                            <tr>
                                <th scope="row">Поверхность</th>
                                <td>{{$product->Surface}}</td>
                            </tr>
                        @endif
                        @if($product->Form)
                            <tr>
                                <th scope="row">Форма</th>
                                <td>{{$product->Form}}</td>
                            </tr>
                        @endif
                        @if($product->Tile_size_cm)
                            @php
                                $size = explode('x', $product->Tile_size_cm);
                                $size_mm = [];
                                foreach ($size as $s) {
                                    $size_mm[] = (float)str_replace(',', '.', $s) * 10;
                                }
                                $size = implode('x', $size_mm);
                            @endphp
                            <tr>
                                <th scope="row">Размер листа</th>
                                <td>{{$size}} мм</td>
                            </tr>
                        @endif
                        @if($product->Chip_size_mm)
                            <tr>
                                <th scope="row">Размер чипа</th>
                                <td>{{$product->Chip_size_mm}} мм</td>
                            </tr>
                        @endif
                        @if($product->Thickness_mm)
                            <tr>
                                <th scope="row">Толщина</th>
                                <td>{{$product->Thickness_mm}} мм</td>
                            </tr>
                        @endif
                        @if($product->Pcs_per_box)
                            <tr>
                                <th scope="row">Количество листов в упаковке</th>
                                <td>{{$product->Pcs_per_box}}</td>
                            </tr>
                        @endif
                        @if($product->Kg_per_box)
                            <tr>
                                <th scope="row">Вес упаковки</th>
                                <td>{{$product->Kg_per_box}}</td>
                            </tr>
                        @endif
                        @if($product->Sq_m_per_box)
                            <tr>
                                <th scope="row">Кв.м. в упаковке</th>
                                <td>{{$product->Sq_m_per_box}}</td>
                            </tr>
                        @endif
                        @if($product->Tile_sheet_square)
                            <tr>
                                <th scope="row">Площадь листа</th>
                                <td>{{$product->Tile_sheet_square}}</td>
                            </tr>
                        @endif
{{--                        @if($product->Lenght)--}}
{{--                            <tr>--}}
{{--                                <th scope="row">Длина</th>--}}
{{--                                <td>{{$product->Lenght}} см</td>--}}
{{--                            </tr>--}}
{{--                        @endif--}}
{{--                        @if($product->Height)--}}
{{--                            <tr>--}}
{{--                                <th scope="row">Ширина</th>--}}
{{--                                <td>{{$product->Height}} см</td>--}}
{{--                            </tr>--}}
{{--                        @endif--}}
{{--                        @if($product->Thickness && $product->Thickness != 0)--}}
{{--                            <tr>--}}
{{--                                <th scope="row">Толщина</th>--}}
{{--                                <td>{{$product->Thickness}} см</td>--}}
{{--                            </tr>--}}
{{--                        @endif--}}
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


    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <div class="container-fluid">
                    <div class="grid">
                        <div class="grid-sizer"></div>
                        @foreach ($images as $url)
                            <div class="grid-item">
                                <img src="{{$url}}"
                                     style="border-bottom:1px solid rgba(78, 73, 60, 0.20);border-left:1px solid rgba(78, 73, 60, 0.20)"/>
                            </div>
                        @endforeach
                    </div>
{{--                    <div class="grid">--}}
{{--                        <div class="grid-sizer"></div>--}}
{{--                        @foreach ($images as $url_c)--}}
{{--                            <div class="grid-item">--}}
{{--                                <img src="/storage/Collections/{{$url_c}}"--}}
{{--                                     style="border-bottom:1px solid rgba(78, 73, 60, 0.20);border-left:1px solid rgba(78, 73, 60, 0.20)"/>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col text-center">
                <div class="card-body">
                    {!! QrCode::size(300)->generate(url()->current()) !!}
                </div>
            </div>
        </div>
    </div>



        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <a href="whatsapp://send?phone=79151274000&text={{$product->Name}}" class="float" target="_blank">
            <i class="fa fa-whatsapp my-float"></i>
        </a>

    </div>

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script>
        Fancybox.bind("[data-fancybox]", {
            // Your custom options
        });
    </script>
@endsection

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
                        <p class="fs-5 text-body-secondary"><button type="button" class="btn btn-info">Цена -20%: {{round($product->RMPrice * 0.8, -1)}} ₽/{{$product->MainUnit}} <small class="text-muted"><del>{{$old_price}} </del></small></button></p>
                        <hr>
                    @endif
                    @if($product->Producer_Brand == 'Vitra' && ($product->RMPriceOld == 0 || $product->RMPriceOld == $product->RMPrice))
                        <p class="fs-5 text-body-secondary"><button type="button" class="btn btn-info">Цена -15%: {{round($product->RMPrice * 0.85, -1)}} ₽/{{$product->MainUnit}} <small class="text-muted"><del>{{$old_price}} </del></small></button></p>
                        <hr>
                    @endif
                    @if($product->RMPriceOld && $product->RMPriceOld != $product->RMPrice)
                        <button type="button" class="btn btn-warning">РАСПРОДАЖА</button>                                    <hr>
                    @endif



                    <h5>
                        Остаток: {{$product->balanceCount}} {{$product->MainUnit}} {{$vivod}}
                    </h5>
                    <hr>
{{--                    <h5>--}}
{{--                        Артикул: {{$product->Element_Code}}--}}
{{--                    </h5>--}}
{{--                    <hr>--}}
                    <h5>В упаковке <strong>{{$product->PCS_in_Package}}</strong> шт. <strong>{{$product->Package_Value}}</strong> кв.м
                        </h5>
                    <hr>
{{--                    <div id="app-5">--}}
{{--                        <input v-model="count" placeholder="Количество кв.м?">--}}

{{--                        <h5>@{{ packages }} упаков. общая площадь @{{ all }} кв.м</h5>--}}

{{--                    </div>--}}
{{--                    <hr>--}}
                </div>
            </div>

{{--            @php--}}
{{--                $vendor_code = str_replace('х', '', $product->Element_Code);--}}
{{--            @endphp--}}

{{--            <div>--}}
{{--                <form action="{{ route('save-foto') }}" method="post" enctype="multipart/form-data">--}}
{{--                    @csrf--}}
{{--                    <div class="mb-3">--}}
{{--                        <input type="hidden" name="vendor" value="{{ $vendor_code }}">--}}
{{--                        <input type="hidden" name="id" value="{{ $product->id }}">--}}
{{--                        <input class="form-control" type="file" name="foto" id="" required>--}}
{{--                        <p></p>--}}
{{--                        <input class="btn btn-primary" type="submit" value="Отправить">--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--            <hr>--}}


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
                            <!-- <img src="{{$url}}" style="border-bottom:1px solid"/> -->
                            <img src="{{$url}}" style="border-bottom:1px solid rgba(78, 73, 60, 0.20);border-left:1px solid rgba(78, 73, 60, 0.20)"/>
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

{{--    <script>--}}
{{--        var app5 = new Vue({--}}
{{--            el: '#app-5',--}}
{{--            data: {--}}
{{--                package_value: <?php echo $product->Package_Value; ?>,--}}
{{--                pcs_in_package: <?php echo $product->PCS_in_Package; ?>,--}}
{{--                count: null--}}
{{--            },--}}
{{--            computed: {--}}
{{--                packages: function () {--}}
{{--                    let count_int = Math.trunc(this.count / this.package_value)--}}
{{--                    let count_float = this.count / this.package_value--}}
{{--                    if (count_float == count_int) {--}}
{{--                        return count_int--}}
{{--                    } else {--}}
{{--                        return count_int + 1--}}
{{--                    }--}}

{{--                },--}}

{{--                all: function () {--}}
{{--                    return (this.packages * this.package_value).toFixed(2)--}}
{{--                }--}}
{{--            }--}}
{{--        })--}}
{{--    </script>--}}

@endsection

@extends('main')

@section('content')
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div>
                <p></p>
            </div>

            <div class="text-bg-secondary p-3"><h1 class="display-6"></h1></div>


            <form action="{{route('keramogranit.filter')}}">

                <div class="row align-items-start">

                    {{--БРЕНД--}}
                    <div class="col">
                        <hr>
                        <h4><small class="text-muted">Бренд</small></h4>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="brand" id="brand0" value="0">
                            <label class="form-check-label" for="brand0">
                                Все
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="brand" id="brand1" value="Laparet"
                                   checked>
                            <label class="form-check-label" for="brand1">
                                Laparet
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="brand" id="brand2" value="Cersanit">
                            <label class="form-check-label" for="brand2">
                                Cersanit
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="brand" id="brand3"
                                   value="Kerama Marazzi">
                            <label class="form-check-label" for="brand3">
                                Kerama Marazzi
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="brand" id="brand4"
                                   value="Vitra">
                            <label class="form-check-label" for="brand4">
                                Vitra
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="brand" id="brand5"
                                   value="Ceradim">
                            <label class="form-check-label" for="brand5">
                                Ceradim
                            </label>
                        </div>

                        <hr>

                        {{--ТИП--}}
                        <h4><small class="text-muted">Тип</small></h4>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type" id="type0" value="0"
                                   checked>
                            <label class="form-check-label" for="type0">
                                Все
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type" id="type1" value="ерамогранит">
                            <label class="form-check-label" for="type1">
                                Керамогранит
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type" id="type2" value="литка">
                            <label class="form-check-label" for="type2">
                                Керамическая плитка
                            </label>
                        </div>

                    </div>

                    {{--НАЛИЧИЕ--}}
                    <div class="col">
                        <hr>
                        <h4><small class="text-muted">Наличие</small></h4>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="in_stock" id="in_stock1" value="1"
                                   checked>
                            <label class="form-check-label" for="in_stock1">
                                В наличии
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="in_stock" id="in_stock2" value="0">
                            <label class="form-check-label" for="in_stock2">
                                Все
                            </label>
                        </div>
                    </div>

                    {{--РАЗМЕР--}}
                    <div class="col">
                        <hr>
                        <h4><small class="text-muted">Размер</small></h4>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="size" id="size0" value="all" checked>
                            <label class="form-check-label" for="size0">
                                Все
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="size" id="size1" value="15x60">
                            <label class="form-check-label" for="size1">
                                15x60
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="size" id="size2" value="15x90">
                            <label class="form-check-label" for="size2">
                                15x90
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="size" id="size31" value="20x60">
                            <label class="form-check-label" for="size31">
                                20x60
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="size" id="size3" value="20x80">
                            <label class="form-check-label" for="size3">
                                20x80
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="size" id="size4" value="20x120">
                            <label class="form-check-label" for="size4">
                                20x120
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="size" id="size5" value="25x50">
                            <label class="form-check-label" for="size5">
                                25x50
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="size" id="size6" value="25x75">
                            <label class="form-check-label" for="size6">
                                25x75
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="size" id="size7" value="30x60">
                            <label class="form-check-label" for="size7">
                                30x60
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="size" id="size8" value="60x60">
                            <label class="form-check-label" for="size8">
                                60x60
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="size" id="size9" value="60x120">
                            <label class="form-check-label" for="size9">
                                60x120
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="size" id="size10" value="80x80">
                            <label class="form-check-label" for="size10">
                                80x80
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="size" id="size11" value="80x160">
                            <label class="form-check-label" for="size11">
                                80x160
                            </label>
                        </div>


                    </div>

                    {{--ПОВЕРХНОСТЬ--}}
                    <div class="col">
                        <hr>
                        <h4><small class="text-muted">Поверхность</small></h4>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="surface" id="surface0" value="all"
                                   checked>
                            <label class="form-check-label" for="surface0">
                                Все
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="surface" id="surface1" value="pol">
                            <label class="form-check-label" for="surface1">
                                Полированная
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="surface" id="surface2" value="mat">
                            <label class="form-check-label" for="surface2">
                                Матовая
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="surface" id="surface3" value="car">
                            <label class="form-check-label" for="surface3">
                                Карвинг
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="surface" id="surface4" value="sat">
                            <label class="form-check-label" for="surface4">
                                Сатинированная
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="surface" id="surface5" value="lap">
                            <label class="form-check-label" for="surface5">
                                Лаппатированная
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="surface" id="surface6" value="met">
                            <label class="form-check-label" for="surface6">
                                Металлизированная
                            </label>
                        </div>


                    </div>

                    {{--ДИЗАЙН--}}
                    <div class="col">
                        <hr>
                        <h4><small class="text-muted">Дизайн</small></h4>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="design" id="design0" value="all" checked>
                            <label class="form-check-label" for="design0">
                                Все
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="design" id="design1" value="derevo">
                            <label class="form-check-label" for="design1">
                                Дерево
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="design" id="design2" value="beton">
                            <label class="form-check-label" for="design2">
                                Бетон
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="design" id="design3" value="mramor">
                            <label class="form-check-label" for="design3">
                                Мрамор
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="design" id="design4" value="kamen">
                            <label class="form-check-label" for="design4">
                                Камень
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="design" id="design5" value="granit">
                            <label class="form-check-label" for="design5">
                                Гранит
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="design" id="design6" value="onyx">
                            <label class="form-check-label" for="design6">
                                Оникс
                            </label>
                        </div>


                    </div>

                    {{--СВОБОДНЫЙ ОСТАТОК БОЛЕЕ--}}
                    <div class="col">
                        <hr>
                        <div class="mb-3">
                            <label for="free-stock" class="form-label mb-0"><h4><small class="text-muted">Остаток не менее</small></h4></label>
                            <input type="text" class="form-control" id="free-stock" name="free_stock">
                        </div>


                        {{--ЦЕНА НЕ БОЛЕЕ--}}
                        <div class="mb-3">
                            <label for="price-max" class="form-label mb-0"><h4><small class="text-muted">Цена не более</small></h4></label>
                            <input type="text" class="form-control" id="price-max" name="price_max">
                        </div>


                    </div>
                    <hr class="mt-5">
                    <div class="row">
                        <div class="d-grid gap-2 col-3 mx-auto mt-3">
                            <button type="submit" class="btn btn-dark btn-lg">Найти</button>
                        </div>
                    </div>

                </div>
            </form>

        </div>
    </div>

@endsection

@extends('main')

@section('content')
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div>
                <p></p>
            </div>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="row row-cols-1 row-cols-md-3 g-4">

                @foreach($products as $product)

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

                                    $pack_ratio = '';
                                    foreach ($units as $u) {
                                        if ($u['unit'] == 'Упак') {
                                            $pack_ratio = $u['unit_ratio'];
                                            break;
                                        }
                                    }

                                    $one_count_ratio = '';
                                    foreach ($units as $u) {
                                        if ($u['unit'] == 'шт') {
                                            $one_count_ratio = $u['unit_ratio'];
                                            break;
                                        }
                                    }
                    @endphp

                    <div class="col">
                        <div class="card h-100">
                            <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> -->
                            <a href="/altacera/{{$product->id}}">
                                <img src="{{Storage::disk('altacera')->url($product->tovar_id . '.JPEG')}}"
                                     class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <a href="/altacera/{{$product->id}}" class="text-decoration-none text-reset">
                                    <h5 class="card-title">{{$product->category_rel->parent}} {{$product->collection_item}} {{$product->name_for_site}} {{$product->artikul}}</h5>
                                </a>
                                <p class="card-text"></p>
                            </div>
                            <div class="card-footer">
                                @if($product->price !== null)
                                    <p class="text-body-secondary">Цена: {{$product->price->price}} ₽/{{$unit}}</p>
                                @else
                                    <p class="text-body-secondary">Цена: Не указана</p>
                                @endif
                                <hr>
                                @if(str_contains($product->balance->free_balance, '.'))
                                    <p class="text-body-secondary">
                                        Остаток: {{rtrim(rtrim($product->balance->free_balance, '0'), '.')}} {{$unit}}</p>
                                    <hr>
                                @else
                                    <p class="text-body-secondary">
                                        Остаток: {{$product->balance->free_balance}} {{$unit}}</p>
                                    <hr>
                                @endif

                                <p class="text-body-secondary">Артикул: {{$product->artikul}}</p>
                                <hr>

                                @if($unit == 'м2')
                                    <p class="text-body-secondary">Кв.м. в упаковке: {{$pack_ratio}}; шт в
                                        упаковке: {{$pack_ratio/$one_count_ratio}}</p>
                                    <hr>
                                @endif

                                <p class="text-body-secondary">Обновлено: {{$product->updated_at->format('d.m.Y')}}</p>
{{--                                <hr>--}}

{{--                                @php--}}
{{--                                    $vendor_code = $product->artikul;--}}
{{--                                    $files = Storage::disk('foto_altacera')->files('/'.$vendor_code);--}}
{{--                                @endphp--}}
{{--                                @if(count($files))--}}
{{--                                    <p class="h5 text-success">Есть {{ count($files) }} фото</p>--}}
{{--                                @else--}}
{{--                                    <p class="h5 text-danger">Нет фото</p>--}}
{{--                                @endif--}}
                            </div>


                        </div>
                    </div>

                @endforeach

            </div>
        </div>
    </div>
    {{ $products->links() }}
@endsection

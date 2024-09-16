@extends('main')

@section('title', 'Altacera Delacora NewTrend AlmaCeramica')

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
                        $unit_id = $product->balance[0]->unit_id;
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

                    @php
                        $text_color = '';
                        $date_now = \Carbon\Carbon::now();
                        $date_of_update = $product->updated_at;
                        $diff_days = $date_now->diffInDays($date_of_update);

                        if ($diff_days == 0) {
                            $text_color = 'text-success';
                        } elseif ($diff_days <= 7) {
                            $text_color = 'text-warning';
                        } else {
                            $text_color = 'text-danger';
                        }
                    @endphp

                    <div class="col">
                        <div class="card h-100">
                            <a href="/artkera/{{$product->slug}}">
                                <img src="{{Storage::disk('altacera')->url($product->tovar_id . '.JPEG')}}"
                                     class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <a href="/artkera/{{$product->slug}}" class="text-decoration-none text-reset">
                                    <h5 class="card-title">{{$product->category_rel->parent}} {{$product->collection_item}} {{$product->name_for_site}} {{$product->height}}x{{$product->width}} {{$product->artikul}}</h5>
                                </a>
{{--                                <p class="card-text"></p>--}}
                            </div>
                            <div class="card-footer">
                                @if($product->price !== null)
                                    <h5 class="card-title pricing-card-title">{{$product->price->price}} <span class="text-muted fw-light"> ₽/{{$unit}}</span></h5>
                                @else
                                    <h5 class="card-title pricing-card-title">Не указана</h5>
                                @endif

                                    @php
                                        $balances = $product->balance;
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

                                    <small class="fs-5 text-body-secondary"> Обновлено: <span class="{{$text_color}}" style="--bs-text-opacity: .7;">{{$product->updated_at->format('d.m.Y')}}</span></small>

                            </div>


                        </div>
                    </div>

                @endforeach

            </div>
        </div>
    </div>
    {{ $products->links() }}
@endsection

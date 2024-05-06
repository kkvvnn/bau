@extends('main')

@section('title', 'LeeDo')

@section('content')
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div>
                <p></p>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="row row-cols-1 row-cols-md-3 g-4">

                    @foreach($products as $product)
                        <div class="col">
                            <div class="card h-100">
                                <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> -->
                                <a href="/leedo/show/{{$product->id}}">
                                    <img src="{{$product->Basic_pic}}" class="card-img-top" alt="...">
                                </a>
                                <div class="card-body">
                                    <a href="/leedo/show/{{$product->id}}" class="text-decoration-none text-reset">
                                        <h5 class="card-title">{{$product->Brand_name}} {{$product->Item_name}}</h5>
                                    </a>
                                    <p class="card-text"></p>
                                </div>
                                <div class="card-footer">
                                    <p class="text-body-secondary">Цена: {{$product->Price_rozn}}
                                        ₽/{{$product->unit}}</p>
                                    <hr>
                                    <!-- <small class="text-body-secondary">Закупка: ₽/</small> -->
                                    <!-- <hr> -->
                                    <p class="text-body-secondary">Москва: {{$product->Sklad_Msk_LeeDo??0}} {{$product->unit}}</p>
                                    <p class="text-body-secondary">СПб: {{$product->Sklad_SPb_LeeDo??0}} {{$product->unit}}</p>
                                    <hr>
                                    <p class="text-body-secondary">
                                        Обновлено: {{$product->updated_at->format('d.m.Y')}}</p>
                                    <hr>

                                    @php
                                        $vendor_code = $product->System_ID;
                                        $files = Storage::disk('foto_leedo')->files('/'.$vendor_code);
                                    @endphp
                                    @if(count($files))
                                        <p class="h5 text-success">Есть {{ count($files) }} фото</p>
                                    @else
                                        <p class="h5 text-danger">Нет фото</p>
                                    @endif
                                </div>


                            </div>
                        </div>

                    @endforeach

                </div>

            </div>
        </div>
    </div>
    {{ $products->links() }}
@endsection

@extends('main')

@section('content')
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div>
                <p></p>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-4">

                @php
                    $i = 0;
                @endphp

                @foreach($products as $product)

                    <div class="col">
                        <div class="card h-100">
                            <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> -->
                            <a href="/altacera/{{$product->id}}">
                                <img src="" class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">{{$product->tovar}}</h5>
                                <p class="card-text"></p>
                            </div>
                            <div class="card-footer">
                                <p class="text-body-secondary">Цена: {{++$i}} ₽</p>
                                <hr>

                                <p class="text-body-secondary">{{$product->artikul}}</p>
                                <hr>
                                <p class="text-body-secondary">В упаковке шт: <strong></strong>   кв.м: <strong></strong></p>



                            </div>


                        </div>
                    </div>

                @endforeach

            </div>
        </div>
    </div>
    {{ $products->links() }}
@endsection

@extends('main')

@section('content')

<div class="album py-5 bg-body-tertiary">
    <div class="container">
        <div>
            <p></p>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($products as $product)
            <div class="col">
                <div class="card h-100">
                    <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> -->
                    <div class="img-wrap">
                        <a href="">
                            <img src="https://aqua-floor.com{{$product->img_1}}" class="card-img-top" alt="...">
                        </a>
                        <div class="clss">
                            <h2 class="card-title text-white">{{$product->title}}</h2>
                            <h3 class="text-info">{{$product->price}} р/м.кв</h3>
                        </div>
                    </div>

                </div>
            </div>

            @endforeach
        </div>
    </div>

    {{ $products->links() }}
    @endsection
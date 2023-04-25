@extends('main')

@section('content')

<div class="album py-5 bg-body-tertiary">
    <div class="container">

    </div>
</div>

<div class="album py-5 bg-body-tertiary">
    <div class="container">
        <div>
            <p></p>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">

            @foreach($products as $product)

            @php
            $route = route('show', $product->id);
            $route = str_replace('http://baukv.loc', '192.168.1.225', $route); 
            @endphp
            
            <div class="col">
                <div class="card h-100">
                    <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> -->
                    <a href="/product/{{$product->id}}">
                        <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(256)->generate($route)) !!} ">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">{{$product->Name}}</h5>
                        <h4 class="card-text">Laparet</h4>
                    </div>
                    


                </div>
            </div>

            @endforeach

        </div>
    </div>
</div>
{{ $products->links() }}
@endsection
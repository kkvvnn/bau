@extends('main')

@section('title', $type??$search_name??config('app.name'))

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

            <table>
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->articul}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->brand_name}}</td>
                        <td>{{$product->svoystvo}}</td>
                        <td>{{$product->price_rozn}}</td>
                        <td>{{$product->rest_real_free}}</td>
                    </tr>
                @endforeach

            </table>

        </div>
    </div>

@endsection

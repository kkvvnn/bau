@extends('main')

@section('title', $search_name??'Kerranova')

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

                @foreach($products as $key => $value)
                   {{$key}}
                @endforeach

            </div>
        </div>
    </div>
{{--    {{ $products->links() }}--}}
@endsection

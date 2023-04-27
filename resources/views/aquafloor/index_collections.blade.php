@extends('main')

@section('content')

<div class="album py-5 bg-body-tertiary">
    <div class="container">
        <div>
            <p></p>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($collections as $collection)
            @php
                $name = strtolower($collection);
                $name = str_replace(' ', '-', $name);
                $name = urldecode($name);
                $name = urlencode($name);

            @endphp
            <div class="col">
                <a href="/aquafloor/collection/{{$name}}" class="link-dark text-decoration-none text-reset">{{$collection}}</a>
            </div>

            @endforeach
        </div>
    </div>

    @endsection
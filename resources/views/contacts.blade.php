@extends('main')

@section('title', 'Контакты')

@section('content')
    <div class="album py-5 bg-body-tertiary">
        <div class="container pt-3">

            <div class="row">
                <div class="col">
                    <a href="https://yandex.ru/maps/-/CDdTIJzQ">Точка на карте</a>
                </div>
                <div class="col">
                    <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A7ddde8cb02cc9fbbcb20285ee41a8e5fff22ddc63fd72e03dce8ef16787e8b22&amp;width=853&amp;height=720&amp;lang=ru_RU&amp;scroll=true"></script>
                </div>
            </div>
        </div>
    </div>
@endsection

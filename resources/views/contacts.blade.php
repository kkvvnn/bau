@extends('main')

@section('title', 'Контакты')

@section('content')
    <div class="album py-5 bg-body-tertiary">
        <div class="container pt-3">
            <h1 class="display-3">Контакты</h1>
            <div class="row mt-5">
                <div class="col">
                    <a class="link-dark link-underline-light" href="tel:+79151274000">+7-915-127-4000</a>
                    <hr>
                    <a class="link-dark link-underline-light" href="https://maps.yandex.ru/maps/-/CDdTIJzQ">
                        <figure>
                            <blockquote class="blockquote">
                                <p>Точка на карте</p>
                            </blockquote>
                            <figcaption class="blockquote-footer">
                                для навигатора
                            </figcaption>
                        </figure>
                    </a>
                    <hr>
                </div>
                <div class="col">
                    <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A7ddde8cb02cc9fbbcb20285ee41a8e5fff22ddc63fd72e03dce8ef16787e8b22&amp;width=853&amp;height=720&amp;lang=ru_RU&amp;scroll=true"></script>
                </div>
            </div>
        </div>
    </div>
@endsection

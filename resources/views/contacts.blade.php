@extends('main')

@section('title', 'Контакты')

@section('content')
    <div class="album py-5 bg-body-tertiary">
        <div class="container pt-3">
            <h1 class="display-3">Контакты</h1>
            <div class="row mt-5">
                    <a class="link-dark link-underline-light mb-5" href="tel:+79151274000">
                        <span class="h3">+7-915-127-4000</span>

                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-telephone-inbound" viewBox="0 0 16 16">
                            <path d="M15.854.146a.5.5 0 0 1 0 .708L11.707 5H14.5a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 1 0v2.793L15.146.146a.5.5 0 0 1 .708 0m-12.2 1.182a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
                        </svg>
                    </a>
                <p>ТД "Можайский двор"</p>
                <p>Западная улица, с100, рабочий посёлок Новоивановское, Одинцовский городской округ, Московская область</p>


                    <hr>
                <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A7ddde8cb02cc9fbbcb20285ee41a8e5fff22ddc63fd72e03dce8ef16787e8b22&amp;width=400&amp;height=300&amp;lang=ru_RU&amp;scroll=true"></script>

                <a class="link-dark link-underline-light mt-5" href="https://maps.yandex.ru/maps/-/CDdTIJzQ" target="_blank">
                    <span class="h3">Точка на карте (для навигатора)</span>
                </a>

            </div>
        </div>
    </div>
@endsection

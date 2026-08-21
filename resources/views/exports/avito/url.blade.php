@extends('main')

@section('content')
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div>
                <p></p>
            </div>

            @switch($type)
                @case('main')
                    <div class="text-bg-secondary p-3"><h1 class="display-6">Автозагрузка Авито Напольные Решения</h1></div>
                    @break
                @case('laparet-moscow')
                    <div class="text-bg-warning p-3"><h1 class="display-6">Автозагрузка Авито Laparet-Запад</h1></div>
                    @break
                @case('laparet-kazan')
                    <div class="text-bg-info p-3"><h1 class="display-6">Автозагрузка Авито Laparet-Казань</h1></div>
                    @break
                @case('millennium')
                    <div class="text-bg-success p-3"><h1 class="display-6">Автозагрузка Авито Миллениум</h1></div>
                    @break
                @default
                    <div class="text-bg-warning p-3"><h1 class="display-6">Автозагрузка Авито</h1></div>
            @endswitch

            <hr>
            <h3>{{ $url }}</h3>

            <!-- Блок с кнопками Bootstrap -->
            <div class="d-flex gap-2">
                <!-- Кнопка Скачать (просто ссылка со стилем кнопки и атрибутом download) -->
                <a href="{{ $url }}" class="btn btn-success" download>
                    Скачать
                </a>
            </div>

        </div>
    </div>

@endsection

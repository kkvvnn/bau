@extends('main')

@section('content')
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div>
                <p></p>
            </div>

            @if($rodion)
                <div class="text-bg-warning p-3"><h1 class="display-6">Автозагрузка Авито аккаунт Родион</h1></div>
            @elseif($spb)
                <div class="text-bg-info p-3"><h1 class="display-6">Автозагрузка Авито аккаунт ПИТЕР</h1></div>
            @else
                <div class="text-bg-secondary p-3"><h1 class="display-6">Автозагрузка Авито</h1></div>
            @endif
            <hr>
            <h3>{{ $url }}</h3>

        </div>
    </div>

@endsection

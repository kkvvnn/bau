@extends('main')

@section('meta')
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{url()->full()}}">
    <meta property="og:title" content="График работы в Новый Год и праздничные дни">
    <meta property="og:description" content="До 8 января работаем в новогоднем режиме">
    <meta property="og:image" content="{{Storage::disk('no_image')->url('2025.jpg')}}">
@endsection

@section('title', 'График работы в Новый Год и праздничные дни')

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/>
@endsection

@section('content')

    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div>
                <p></p>
            </div>

            <br>

        <h1 class="display-6">График работы в Новый Год</h1>

            <br>

            <ul>
                <li>30 декабря - 3 января выходные дни (магазин не работает).</li>
                <li>С 4 по 8 января работа в ограниченном режиме (возможен прием заявок на дату после 9 января).</li>
                <li>С 10 января работа в штатном режиме.</li>
{{--                <li>However, this style only applies to immediate child elements.</li>--}}
{{--                <li>Nested lists:--}}
{{--                    <ul>--}}
{{--                        <li>and have appropriate left margin</li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <li>This may still come in handy in some situations.</li>--}}
            </ul>


        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <a href="whatsapp://send?phone=79151274000&text=" class="float" target="_blank">
            <i class="fa fa-whatsapp my-float"></i>
        </a>

    </div>

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script>
        Fancybox.bind("[data-fancybox]", {
            // Your custom options
        });
    </script>
@endsection

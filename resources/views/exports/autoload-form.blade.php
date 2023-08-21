@extends('main')

@section('content')
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div>
                <p></p>
            </div>

            <h1 class="display-6">Автозагрузка Авито</h1>
            <hr>

            <form action="{{route('avito-export')}}">
                <div class="mb-3">
                    <label for="phone" class="form-label">Телефон</label>
                    <input type="text" class="form-control" id="phone" name="phone" aria-describedby="phoneHelp" value="79039890822">
                    <div id="phoneHelp" class="form-text">Телефон будет указан в объявлениях Avito.</div>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Адрес размещения</label>
                    <input type="text" class="form-control" id="address" name="address" value="Москва, парк Победы">
                </div>
                <div class="mb-3">
                    <label for="contact_method" class="form-label">Способ связи</label>
                    <select class="form-select" id="contact_method" name="contact_method">
                        <option selected>По телефону и в сообщениях</option>
                        <option>По телефону</option>
                        <option>В сообщениях</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Создать файл автозагрузки</button>
            </form>

        </div>
    </div>

@endsection

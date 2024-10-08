@extends('main')

@section('content')
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div>
                <p></p>
            </div>

            <div class="{{ $data['color'] }} p-3"><h1 class="display-6">{{ $data['title'] }}</h1></div>
            <hr>

            <form method="POST">
                @csrf
                <div class="mb-3">
                    <label for="phone" class="form-label">Телефон</label>
                    <input type="text" class="form-control" id="phone" name="phone" aria-describedby="phoneHelp" value="{{ $data['phone'] }}">
                    <div id="phoneHelp" class="form-text">Телефон будет указан в объявлениях Avito.</div>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Контактное лицо</label>
                    <input type="text" class="form-control" id="name" name="name"  value="{{ $data['manager_name'] }}">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Адрес размещения</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ $data['address'] }}">
                </div>
                <div class="mb-3">
                    <label for="contact_method" class="form-label">Способ связи</label>
                    <select class="form-select" id="contact_method" name="contact_method">
                        <option selected>По телефону и в сообщениях</option>
                        <option>В сообщениях</option>
                        <option>По телефону</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="add_description_first" class="form-label">Добавить текст в начало всех объявлений</label>
                    <textarea class="form-control" id="add_description_first" name="add_description_first" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="add_description_last" class="form-label">Добавить текст в конец всех объявлений</label>
                    <textarea class="form-control" id="add_description_last" name="add_description_last" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Создать файл автозагрузки</button>
            </form>

        </div>
    </div>

@endsection

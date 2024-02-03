@extends('main')

@section('content')
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div>
                <p></p>
            </div>

            <h1 class="display-6">Авито_2 загрузка ручных объявлений</h1>
            <hr>

            <form action="{{route('avito-2-old')}}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="mb-3">
                    <label for="file" class="form-label">Excel файл с объявлениями</label>
                    <input type="file" class="form-control" id="file" name="file" required>
                </div>

                <button type="submit" class="btn btn-primary">Загрузить</button>
            </form>

        </div>
    </div>

@endsection

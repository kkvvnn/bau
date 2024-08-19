@extends('main')

@section('content')
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div>
                <p></p>
            </div>

            <h1 class="display-6">Kerranova обновление Прайс листа и Остатков</h1>
            <hr>

            <form action="{{route('kerranova.import-work-price-stock')}}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="mb-3">
                    <label for="file" class="form-label">Excel Kerranova Прайс лист и Остатки</label>
                    <input type="file" class="form-control" id="file" name="file" required>
                </div>

                <button type="submit" class="btn btn-primary">Обновить информацию</button>
            </form>

        </div>
    </div>

@endsection

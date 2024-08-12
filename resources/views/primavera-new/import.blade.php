@extends('main')

@section('content')
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div>
                <p></p>
            </div>

            <h1 class="display-6">Primavera заливка контента</h1>
            <hr>

            <form action="{{route('primavera-new.import-work')}}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="mb-3">
                    <label for="file" class="form-label">Excel Primavera контент</label>
                    <input type="file" class="form-control" id="file" name="file" required>
                </div>

                <button type="submit" class="btn btn-primary">Обновить информацию</button>
            </form>

        </div>
    </div>

@endsection
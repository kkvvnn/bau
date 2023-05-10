@extends('main')

@section('content')


<div class="album py-5 bg-body-tertiary">
    <div class="container">
        <div>
            <p></p>
        </div>


        <form action="{{route('index_size')}}">
            <div class="mb-3">
                <label for="lenght" class="form-label">Длина</label>
                <input type="text" name="lenght" class="form-control" id="lenght">
            </div>
            <div class="mb-3">
                <label for="height" class="form-label">Ширина</label>
                <input type="text" name="height" class="form-control" id="height">
            </div>

            <button type="submit" class="btn btn-primary">Показать</button>
        </form>

    </div>
</div>


@endsection
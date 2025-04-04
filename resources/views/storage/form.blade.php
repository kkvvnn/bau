@extends('main')

@section('content')
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div>
                <p></p>
            </div>

            <div class="text-bg-secondary p-3"><h1 class="display-6">STORAGE</h1></div>
            <hr>

            <form method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="path" class="form-label">Path</label>
                    <input type="text" class="form-control" id="path" name="path" aria-describedby="pathHelp" value="kevis">
                    <div id="pathHelp" class="form-text">путь в Storage 'app/public/images/kevis' например.</div>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" value="file-name">
                    <div id="nameHelp" class="form-text">имя без расширения 'pucture1' например (под этим именем сохранится файл).</div>
                </div>
                <div class="mb-3">
                    <label for="file" class="form-label">Файл</label>
                    <input type="file" class="form-control" id="file" name="file" required>
                </div>

                <button type="submit" class="btn btn-primary">Сохранить в Storage</button>
            </form>

        </div>
    </div>

@endsection

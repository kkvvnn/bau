@extends('main')

@section('content')
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div>
                <p></p>
            </div>


            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{ route('primavera.search') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="name">Поиск Primavera</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Поиск">

                                </div>
                                <br>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Найти">
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>


        </div>
    </div>
@endsection

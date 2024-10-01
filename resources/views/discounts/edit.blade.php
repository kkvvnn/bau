@extends('discounts.layouts')

@section('content')

    <div class="row justify-content-center mt-3">
        <div class="col-md-8">

            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Редактирование
                    </div>
                    <div class="float-end">
                        <a href="{{ route('discounts.index') }}" class="btn btn-outline-primary btn-sm">&larr; Назад</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('discounts.update', $discount->id) }}" method="post">
                        @csrf
                        @method("PUT")

                        <div class="mb-3 row">
                            <label for="account" class="col-md-4 col-form-label text-md-end text-start form-label">Avito
                                аккаунт</label>
                            <div class="col-md-6">
                                <select id="account" class="form-control @error('account') is-invalid @enderror"
                                        name="account">
                                    <option @if($discount->account == 'Напольные решения') selected @endif>Напольные решения</option>
                                    <option @if($discount->account == 'Laparet-Запад') selected @endif>Laparet-Запад</option>
                                    <option @if($discount->account == 'Laparet-Казань') selected @endif>Laparet-Казань</option>
                                </select>
                                @if ($errors->has('account'))
                                    <span class="text-danger">{{ $errors->first('account') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="name" class="col-md-4 col-form-label text-md-end text-start">Бренд</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                       name="name" value="{{ $discount->name }}">
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="discount" class="col-md-4 col-form-label text-md-end text-start">Размер скидки %
                                (0-100)</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control @error('discount') is-invalid @enderror"
                                       id="discount" name="discount" value="{{ $discount->discount }}">
                                @if ($errors->has('discount'))
                                    <span class="text-danger">{{ $errors->first('discount') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="additional" class="col-md-4 col-form-label text-md-end text-start form-label">Дополнительно</label>
                            <div class="col-md-6">
                                <select id="additional" class="form-control @error('additional') is-invalid @enderror"
                                        name="additional">
                                    <option @if($discount->additional == 'По умолчанию') selected @endif>По умолчанию</option>
                                    <option @if($discount->additional == 'Не указывать цену') selected @endif>Не указывать цену</option>
                                    <option @if($discount->additional == 'Цена 1 рубль') selected @endif>Цена 1 рубль</option>
                                </select>
                                @if ($errors->has('additional'))
                                    <span class="text-danger">{{ $errors->first('additional') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <input type="submit" class="col-md-3 offset-md-5 btn btn-outline-primary" value="Обновить">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

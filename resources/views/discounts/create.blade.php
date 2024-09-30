@extends('discounts.layouts')

@section('content')

    <div class="row justify-content-center mt-3">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Add New Product
                    </div>
                    <div class="float-end">
                        <a href="{{ route('discounts.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('discounts.store') }}" method="post">
                        @csrf

                        <div class="mb-3 row">
                            <label for="account" class="col-md-4 col-form-label text-md-end text-start">Avito аккаунт</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('account') is-invalid @enderror" id="account" name="account" value="{{ old('account') }}">
                                @if ($errors->has('account'))
                                    <span class="text-danger">{{ $errors->first('account') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="discount" class="col-md-4 col-form-label text-md-end text-start">Размер скидки % (0-100)</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control @error('discount') is-invalid @enderror" id="discount" name="discount" value="{{ old('discount') }}">
                                @if ($errors->has('discount'))
                                    <span class="text-danger">{{ $errors->first('discount') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="price_not_specified" class="col-md-4 col-form-label text-md-end text-start">Не указывать цену</label>
                            <div class="col-md-6">
                                <input type="number" step="0.01" class="form-control @error('price_not_specified') is-invalid @enderror" id="price_not_specified" name="price_not_specified" value="{{ old('price_not_specified') }}">
                                @if ($errors->has('price_not_specified'))
                                    <span class="text-danger">{{ $errors->first('price_not_specified') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add Product">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

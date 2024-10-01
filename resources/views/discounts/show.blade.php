@extends('discounts.layouts')

@section('content')

    <div class="row justify-content-center mt-3">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Цены на Avito
                    </div>
                    <div class="float-end">
                        <a href="{{ route('discounts.index') }}" class="btn btn-primary btn-sm">&larr; Назад</a>
                    </div>
                </div>
                <div class="card-body">

                    <div class="row">
                        <label for="code" class="col-md-4 col-form-label text-md-end text-start"><strong>Аккаунт:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $discount->account }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Бренд:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $discount->name }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="quantity" class="col-md-4 col-form-label text-md-end text-start"><strong>Скидка:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $discount->discount }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="price" class="col-md-4 col-form-label text-md-end text-start"><strong>Дополнительно:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $discount->additional }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

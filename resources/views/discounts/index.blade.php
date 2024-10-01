@extends('discounts.layouts')

@section('content')

    <div class="row justify-content-center mt-3">
        <div class="col-md-12">

            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">Цены на Avito</div>
                <div class="card-body">
                    <a href="{{ route('discounts.create') }}" class="btn btn-outline-success mb-3"><i class="bi bi-plus-circle"></i> Добавить</a>
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">№</th>
                            <th scope="col">Avito аккаунт</th>
                            <th scope="col">Бренд</th>
                            <th scope="col">Размер скидки % (0-100)</th>
{{--                            <th scope="col">Дополнительно</th>--}}
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($discounts as $discount)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                @if($discount->account == 'Напольные решения')
                                    <td class="text-bg-light p-3">{{ $discount->account }}</td>
                                @endif
                                @if($discount->account == 'Laparet-Запад')
                                    <td class="text-bg-success p-3">{{ $discount->account }}</td>
                                @endif
                                @if($discount->account == 'Laparet-Казань')
                                    <td class="text-bg-info p-3">{{ $discount->account }}</td>
                                @endif

                                <td>{{ $discount->name }}</td>

                                @if($discount->additional == 'По умолчанию')
                                    @if($discount->discount)
                                        <td class="text-bg-success p-3">{{ $discount->discount }}</td>
                                    @else
                                        <td>РРЦ</td>
                                   @endif
                                @else
                                    <td class="text-bg-danger p-3">{{ $discount->additional }}</td>
                                @endif

{{--                                @if($discount->additional == 'Не указывать цену' || $discount->additional == 'Цена 1 рубль')--}}
{{--                                    <td class="text-bg-danger p-3">{{ $discount->additional }}</td>--}}
{{--                                @else--}}
{{--                                    <td>{{ $discount->additional }}</td>--}}
{{--                                @endif--}}
                                <td>
                                    <form action="{{ route('discounts.destroy', $discount->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')

{{--                                        <a href="{{ route('discounts.show', $discount->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Подробнее</a>--}}

                                        <a href="{{ route('discounts.edit', $discount->id) }}" class="btn btn-outline-primary"><i class="bi bi-pencil-square"></i> Изменить</a>

                                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Удалить?');"><i class="bi bi-trash"></i> Удалить</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>Ничего не найдено!</strong>
                                </span>
                            </td>
                        @endforelse
                        </tbody>
                    </table>

                    {{ $discounts->links() }}

                </div>
            </div>
        </div>
    </div>

@endsection

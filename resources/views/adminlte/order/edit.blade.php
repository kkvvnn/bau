@extends('adminlte.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактировать заказ</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Главная</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('order.update', $order->id) }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="order_code">Номер заказа</label>
                            <input type="text" name="order_code" id="order_code" value="{{ $order->order_code }}"
                                   class="form-control" placeholder="Номер заказа">
                            <label for="title">Наименование</label>
                            <input type="text" name="title" id="title" value="{{ $order->title }}" class="form-control"
                                   placeholder="Наименование">
                            <label for="customer">Заказчик</label>
                            <input type="text" name="customer" id="customer" value="{{ $order->customer }}"
                                   class="form-control" placeholder="Заказчик">
                            <label for="customer_phone">Телефон</label>
                            <input type="text" name="customer_phone" id="customer_phone"
                                   value="{{ $order->customer_phone }}" class="form-control" placeholder="Телефон">
                            <label for="customer_address">Адрес</label>
                            <input type="text" name="customer_address" id="customer_address"
                                   value="{{ $order->customer_address }}" class="form-control" placeholder="Адрес">
                            <label for="shipping">Доставка</label>
                            <input type="text" name="shipping" id="shipping" value="{{ $order->shipping }}"
                                   class="form-control" placeholder="Доставка">
                            <label for="status">Статус</label>
                            <input type="text" name="status" id="status" value="{{ $order->status }}"
                                   class="form-control" placeholder="Статус">
                            <label for="note">Примечание</label>
                            <input type="text" name="note" id="note" value="{{ $order->note }}" class="form-control"
                                   placeholder="Примечание">
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Редактировать">
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

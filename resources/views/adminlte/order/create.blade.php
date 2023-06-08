@extends('adminlte.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить заказ</h1>
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
                    <form action="{{ route('order.store') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="title">Наименование</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Наименование">
                            <label for="vendor_code">Артикул</label>
                            <input type="text" name="vendor_code" id="vendor_code" class="form-control" placeholder="Артикул">
                            <label for="count">Количество</label>
                            <input type="text" name="count" id="count" class="form-control" placeholder="Количество">
                            <label for="unit">Ед.измерения</label>
                            <input type="text" name="unit" id="unit" class="form-control" placeholder="Ед.измерения">
                            <label for="price">Цена</label>
                            <input type="text" name="price" id="price" class="form-control" placeholder="Цена">
                            <label for="customer">Заказчик</label>
                            <input type="text" name="customer" id="customer" class="form-control" placeholder="Заказчик">
                            <label for="customer_phone">Телефон</label>
                            <input type="text" name="customer_phone" id="customer_phone" class="form-control" placeholder="Телефон">
                            <label for="customer_address">Адрес</label>
                            <input type="text" name="customer_address" id="customer_address" class="form-control" placeholder="Адрес">
                            <label for="shipping">Доставка</label>
                            <input type="text" name="shipping" id="shipping" class="form-control" placeholder="Доставка">
                            <label for="order_code">Номер заказа</label>
                            <input type="text" name="order_code" id="order_code" class="form-control" placeholder="Номер заказа">
                            <label for="status">Статус</label>
                            <input type="text" name="status" id="status" class="form-control" placeholder="Статус">
                            <label for="note">Примечание</label>
                            <input type="text" name="note" id="note" class="form-control" placeholder="Примечание">
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Добавить">
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

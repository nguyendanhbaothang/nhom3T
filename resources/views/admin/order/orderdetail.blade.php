@extends('admin.layout.master')
@section('content')
<main class="page-content">
    <section class="wrapper">
        <div class="panel-panel-default">
            <div class="market-updates">
                <div class="container">
                    <main id="main" class="main">
                        <div class="pagetitle">
                            <h1>Chi tiết đơn hàng</h1>
                            <a class="btn btn-primary" href="{{ route('order.index') }}">Đơn hàng</a>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Name Product</th>
                                    <th scope="col">Price(VND)</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total Money(VND)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $key => $item)
                                    <tr>
                                        <th scope="row">{{ ++$key }}</th>
                                        <td>{{ $item->name }}</td>
                                        <th>
                                        <td>{{ number_format($item->price) }} VND</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ number_format($item->total) }} VND</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </main>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

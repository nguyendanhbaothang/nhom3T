@extends('admin.layout.master')
@section('content')
<main class="page-content">
<section class="wrapper">
    <form>

        <a class="btn btn-success" type="button" name="key" value="{{ $f_key }}"
            data-bs-toggle="modal" data-bs-target="#basicModal">Tìm kiếm</a>

        @include('admin.customers.modals.modalcustomercolumns')

    </form>
    <div class="panel-panel-default">
        <div class="market-updates">
            <div class="container">
                <main id="main" class="main">
                    <div class="pagetitle">
                        <hr>
                        <h1>Danh sách khách hàng</h1>
                        <hr>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Họ và Tên</th>
                                <th scope="col">Địa chỉ</th>
                                <th scope="col">Email</th>
                                <th scope="col">Số điện thoại</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $key => $item)
                                <tr>
                                    <th scope="row">{{ ++$key }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="col-6">
                        <div class="pagination float-right">
                            {{ $items->appends(request()->query()) }}
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</section>
</main>
@endsection

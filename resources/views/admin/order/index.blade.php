@extends('admin.layout.master')
@section('content')
<main class="page-content">
    <a   class="btn btn-warning" href="{{route('orders.xuat')}}">Xuất</a>
<section class="wrapper">
    <div class="panel-panel-default">
        <div class="market-updates">
            <div class="container">
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Đơn hàng</h1>
      <hr>
    </div>
    <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên khách hàng</th>
            <th scope="col">Email</th>
            <th scope="col">Số điện thoại</th>
            <th scope="col">Địa chỉ</th>
            <th scope="col">Ngày đặt hàng</th>
            <th scope="col">Tổng tiền(VND)</th>
            <th scope="col">Trạng thái</th>

            <th scope="col">Tùy chỉnh</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($orders as $key=> $order)
          <tr>
            <th scope="row">{{++$key}}</th>
            <td>{{$order->customer->name}}</td>
            <td>{{$order->customer->email}}</td>
            <td>{{$order->customer->phone}}</td>
            <td>{{$order->customer->address}}</td>
            <td>{{$order->date_at}}</td>
            <td>{{number_format($order->total)}} VND</td>
            <td>{{$order->status}} </td>

            <td>
                <a  class="btn btn-info" href="{{route('order.detail',$order->id)}}">Xem</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="col-6">
        <div class="pagination float-right">

            {{ $orders->appends(request()->input())->links() }}
        </div>
    </div>
</main>
</div>
</div>
</div>
</section>
</main>
@endsection

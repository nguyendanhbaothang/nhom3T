@extends('admin.layout.master')
@section('content')
<main class="page-content">
    <a   class="btn btn-warning" href="{{route('orders.xuat')}}">Xuất</a>
<section class="wrapper">
            <div class="container">
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
            <td>
                @if ($order->status === 0)
                    <h5 style="color: rgb(144, 243, 147)"><i
                            class="bi bi-bookmark-plus-fill"></i>Đơn mới</h5>
                @endif
                @if ($order->status === 1)
                    <h5 style="color: green"><i
                            class="bi bi-bookmark-check-fill"></i>Đang giao</h5>
                @endif
                @if ($order->status === 2)
                    <h5 style="color: red"><i class="bi bi-bookmark-x-fill">Đã giao</i>
                    </h5>
                @endif
            </td>
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
</section>
</main>
@endsection


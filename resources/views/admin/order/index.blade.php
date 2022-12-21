@extends('admin.layout.master')
@section('content')
<main class="page-content">
    <a   class="btn btn-warning" href="{{route('orders.xuat')}}">OrderExport</a>
<section class="wrapper">
    <div class="panel-panel-default">
        <div class="market-updates">
            <div class="container">
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Order</h1>
      <hr>
    </div>
    <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Customer name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Address</th>
            <th scope="col">Order date</th>
            <th scope="col">Total Money(VND)</th>
            <th scope="col">Option</th>
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
            <td>
                <a  class="btn btn-info" href="{{route('order.detail',$order->id)}}">See details</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="col-6">
        <div class="pagination float-right">
            {{-- {{ $orders->appends(request()->query()) }} --}}
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

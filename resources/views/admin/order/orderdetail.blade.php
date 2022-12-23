@extends('admin.layout.master')
@section('content')
<section class="section">
    <a   class="btn btn-info" href="{{route('order.index')}}">Quay lại</a>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <br>
                    <h2 class="offset-4">
                        Chi Tiết Đơn Hàng
                    </h2><br>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên Sản Phẩm</th>
                                <th scope="col">GIá(Đồng)</th>
                                <th scope="col">Số Lượng</th>
                                <th scope="col">Tổng Tiền(Đồng)</th>
                                <th scope="col">Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0 @endphp
                            @foreach ($order_Details as $key => $order_Detail)
                            @php $total += $order_Detail->quantity * $order_Detail->price  @endphp
                                <tr>
                                    <th scope="row">{{ ++$key }}</th>
                                    <td>{{ $order_Detail->product->name }}</td>
                                    <td>{{ number_format($order_Detail->product->price) }}</td>
                                    <td>{{ $order_Detail->quantity }}</td>
                                    <td>{{ number_format($order_Detail->quantity * $order_Detail->total ) }}</td>
                                    <td>@if($order->status==0)
                                        <form>
                                           @csrf
                                           <select name="status" data-order_id="{{$order->id}}" class="custom-select trangthai">
                                              <option selected value="0">Đơn mới</option>
                                              <option value="1">Đang giao</option>
                                              <option value="2">Đã giao</option>
                                           </select>
                                        </form>
                                        @elseif($order->status==1)
                                        <form>
                                           @csrf
                                           <select name="status" data-order_id="{{$order->id}}" class="custom-select trangthai">
                                              <option  value="0">Đơn mới</option>
                                              <option selected value="1">Đang giao</option>
                                              <option value="2">Đã giao</option>
                                           </select>
                                        </form>
                                        @else
                                        <form>
                                           @csrf
                                           <select name="status" data-order_id="{{$order->id}}" class="custom-select trangthai">
                                              <option  value="0">Đơn mới</option>
                                              <option value="1">Đang giao</option>
                                              <option selected value="2">Đã giao</option>
                                           </select>
                                        </form>
                                        @endif
                                    </td>
                            @endforeach
                        </tbody>
                    </table>
                    <h4 style="color: red"><strong>Tổng Tiền Đơn Hàng: {{ number_format($order_Detail->quantity * $order_Detail->total ) }} VND</strong></h4><hr>

                    <div style="float:right">
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('.trangthai').change(function(){
            const trangthai = $(this).val();
            const order_id = $(this).data('order_id');
            var _token = $('input[name="_token"]').val();
            if(trangthai==0){
                var thongbao = 'Thay đổi trạng thái thành đơn mới';
            }else if(trangthai==1){
                var thongbao = 'Thay đổi trạng thái thành đang giao';
            }else{
                var thongbao = 'Thay đổi trạng thái thành đã giao';
            }
            $.ajax({
                url:"{{url('/orders/trangthaidon')}}",
                method:"POST",
                data:{trangthai:trangthai, order_id:order_id, _token:_token},
                success:function(data)
                    {
                        alert(thongbao);
                    }
            });
        });
    </script>
@endsection

@extends('admin.layout.master')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1 class="mb-1">Sản phẩm</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="{{route('product.index')}}">Sản phẩm</a></li>
            <li class="breadcrumb-item"> Chi tiết sản phẩm </a></li>
          </ol>
        </nav>
      </div>
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Chi tiết sản phẩm</h5>
<div class="row g-0">
    <div class="col-md-6">
        <div class="d-flex flex-column justify-content-center">
            <div style=" margin-top: 24px;" class="main_image"> <img src="{{ asset('public/assets/product/' .$product->image) }}" id="main_product_image" height="300" width="412">
            </div><br>
        </div>
    </div>
    <div class="col-md-6">
        <div class="p-3 right-side">
            <div class="product-info-tabs">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td>Tên</td>
                                <td>{{ $product->name }}</td>
                            </tr>
                            <tr>
                                <td>Trạng thái</td>
                                <td>{{ $product->status == 0 ? ' Active' : 'No Active' }}</td>
                            </tr>
                            <tr>
                                <td>Nổi bật hay không</td>
                                <td>{{ $product->status == 0 ? 'Hot ' : 'No' }}</td>
                            </tr>
                            <tr>
                                <td>Thể loại</td>
                                <td>{{ $product->category->name }}</td>
                            </tr>
                            <tr>
                                <td>Số lượng</td>
                                <td>{{ $product->quantity}} Chiếc</td>
                            </tr>
                            <tr>
                                <td>Giá</td>
                                <td>{{ number_format($product->price)}} VND</td>
                            </tr>
                            <tr>
                                <td>Ngày thêm</td>
                                <td>{{ $product->created_at}}</td>
                            </tr>
                            <tr>
                                <td>Ngày sửa</td>
                                <td>{{ $product->updated_at}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <label>Mô tả:    {!! $product->description !!}</label>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>
</div>
</main>
@endsection

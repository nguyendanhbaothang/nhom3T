@extends('admin.layout.master')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1 class="mb-1">Product</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('product.index')}}">Product</a></li>
            <li class="breadcrumb-item"> Product Details </a></li>
          </ol>
        </nav>
      </div>
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Product Details</h5>
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
                                <td>Name</td>
                                <td>{{ $product->name }}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>{{ $product->status == 0 ? ' Active' : 'No Active' }}</td>
                            </tr>
                            <tr>
                                <td>Hot Or No</td>
                                <td>{{ $product->status == 0 ? 'Hot ' : 'No' }}</td>
                            </tr>
                            <tr>
                                <td>Category</td>
                                <td>{{ $product->category->name }}</td>
                            </tr>
                            <tr>
                                <td>Quantity</td>
                                <td>{{ $product->quantity}} Chiếc</td>
                            </tr>
                            <tr>
                                <td>Price</td>
                                <td>{{ number_format($product->price)}} Đồng</td>
                            </tr>
                            <tr>
                                <td>Extra Day </td>
                                <td>{{ $product->created_at}}</td>
                            </tr>
                            <tr>
                                <td>Edit date</td>
                                <td>{{ $product->updated_at}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <label>Description:    {!! $product->description !!}</label>
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

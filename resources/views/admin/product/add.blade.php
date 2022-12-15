@extends('admin.layout.master')
@section('content')
<h2>Thêm sản phẩm</h2>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<div class="container">
<div class="row">
    <div class="col-lg-8 mx-auto">
     <div class="card">
         </div>
       <div class="card-body">
         <div class="border p-3 rounded">
         <form class="row g-3" action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
            @csrf
           <div class="col-12">
             <label class="form-label">Tên</label>
             <input type="text" class="form-control" name="name" placeholder="Tên sản phẩm">
           </div>
           <div class="col-12">
            <label class="form-label">Giá</label>
            <div class="row g-3">
              <div class="col-lg-9">
                <input type="text" class="form-control" name="price" placeholder="Giá">
              </div>
              <div class="col-lg-3">
                <div class="input-group">
                </div>
              </div>
            </div>
          </div>
          <div class="col-12">
            <label class="form-label">Số lượng</label>
            <div class="row g-3">
              <div class="col-lg-9">
                <input type="text" class="form-control" name="quantity" placeholder="Số lượng">
              </div>
              <div class="col-lg-3">
                <div class="input-group">
                </div>
              </div>
            </div>
          </div>
           <div class="col-12">
             <label class="form-label">Sự mô tả</label>
             <textarea class="form-control" type="text" placeholder="Mô tả" name="description" rows="4" cols="4"></textarea>
           </div>
           <select name="category_id" id="" class="form-control">
            <option value="">--Vui lòng chọn--</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach

        </select>
           <div class="col-12">
             <label class="form-label">Images</label>
             <input class="form-control" name="image" type="file">
           </div>

           <div class="ol-12">
            <label>Trạng thái</label>
            <select name="status" class="form-select" >
                <option value="0">Kích hoạt</option>
                <option value="1">Không kích hoạt</option>
            </select>
            </div>
            <div class="ol-12">
              <label >Nổi bật hay không</label>
              <select name="product_hot" class="form-select" >
                  <option value="0">Nổi bật</option>
                  <option value="1">Không nổi bật</option>
              </select>
              </div>

           <div class="col-12">
             <button class="btn btn-primary px-4">Thêm sản phảm</button>
            <a class="btn btn-primary px-4" href="{{ route('product.index') }}" class="w3-button w3-red">Quay Lại</a>
           </div>
         </form>
         </div>
        </div>
       </div>
    </div>
 </div>
 </div>
 @endsection

@extends('admin.layout.master')
@section('content')
<h2>Thêm sản phẩm</h2>
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
             <input type="text" class="form-control"  name="name" placeholder="Tên sản phẩm">
             @error('name')
             <div class="text text-danger">{{ $message }}</div>
             @enderror
           </div>
           <div class="col-12">
            <label class="form-label">Giá</label>
            <div class="row g-3">
              <div class="col-lg-12">
                <input type="text" class="form-control" name="price" placeholder="Giá">
                @error('price')
                <div class="text text-danger">{{ $message }}</div>
                @enderror
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
              <div class="col-lg-12">
                <input type="text" class="form-control" name="quantity" placeholder="Số lượng">
                @error('quantity')
                <div class="text text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-lg-3">
                <div class="input-group">
                </div>
              </div>
            </div>
          </div>
           <div class="col-12">
             <label class="form-label">Sự mô tả</label>
             <textarea class="form-control" type="text" id="editor" placeholder="Mô tả" name="description" ></textarea>
             @error('description')
             <div class="text text-danger">{{ $message }}</div>
             @enderror
           </div>
           <select name="category_id" id="" class="form-control">
            <option value="">--Vui lòng chọn--</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id')
        <div class="text text-danger">{{ $message }}</div>
        @enderror
           <div class="col-12">
             <label class="form-label">Images</label>
             <input class="form-control" name="image" type="file">
             @error('image')
             <div class="text text-danger">{{ $message }}</div>
             @enderror
           </div>

           <div class="ol-12">
            <label>Trạng thái</label>
            <select name="status" class="form-select" >
                <option value="">-----Vui lòng chọn-----</option>
                <option value="0">Kích hoạt</option>
                <option value="1">Không kích hoạt</option>
            </select>
            @error('status')
            <div class="text text-danger">{{ $message }}</div>
            @enderror
            </div>
            <div class="ol-12">
              <label >Nổi bật hay không</label>
              <select name="product_hot" class="form-select" >
                  <option value="">----Vui lòng chọn----</option>
                  <option value="0">Nổi bật</option>
                  <option value="1">Không nổi bật</option>
              </select>
              @error('product_hot')
              <div class="text text-danger">{{ $message }}</div>
              @enderror
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

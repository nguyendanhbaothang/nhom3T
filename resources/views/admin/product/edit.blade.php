@extends('admin.layout.master')
@section('content')
<main class="page-content">
    <h2>Edit Product</h2>
    <div class="container">
    <div class="row">
        <div class="col-lg-8 mx-auto">
         <div class="card">
             </div>
           <div class="card-body">
             <div class="border p-3 rounded">
             <form class="row g-3" action="{{ route('product.update',[$product->id]) }}" method="post"  enctype="multipart/form-data">
                @method('put')
                @csrf
               <div class="col-12">
                 <label class="form-label">Tên</label>
                 <input type="text" class="form-control" value="{{$product->name}}" name="name" placeholder="Tên">
                 @error('name')
                 <div class="text text-danger">{{ $message }}</div>
                 @enderror
               </div>

               <div class="col-12">
                <label class="form-label">Giá</label>
                <div class="row g-3">
                  <div class="col-lg-9">
                    <input type="text" class="form-control" value="{{$product->price}}" name="price" placeholder="Giá">
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
                  <div class="col-lg-9">
            <input type="text" class="form-control" name="quantity" value="{{$product->quantity}}" placeholder="Số lượng">
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
                 <label class="form-label">Miêu tả</label>
                 <textarea class="form-control" placeholder="Miêu tả" id="editor"  name="description" rows="4" cols="4">{{$product->description}}</textarea>
                 @error('description')
                 <div class="text text-danger">{{ $message }}</div>
                 @enderror
                </div>
               <label class="form-label">Thể loại</label>
               <select name="category_id" id="" class="form-control">
                <option value="">--Vui lòng chọn--</option>
                @foreach ($categories as $category)
                <option
                    <?= $category->id == $product->category_id ? 'selected' : '' ?>
                    value="{{ $category->id }}">
                    {{ $category->name }}</option>
            @endforeach
            </select>
            @error('category_id')
            <div class="text text-danger">{{ $message }}</div>
            @enderror
                 </div>
                 <div class="mb-3">
                    <label for="exampleInputEmail1" >Ảnh</label>
                    <input type="file" name="image" class="form-control-file"><br>
                    <img src="{{asset('public/assets/product/'.$product->image)}} "height="100px" width="100px">
                </div>
                 <div class="col-12">
                  <label for="exampleInputEmail1" >Active Category</label>
                  <select name="status" class="form-select" id="inputGroupSelect02">
                  @if($product->status==0)
                      <option selected value="0">Hoạt động<table></table></option>
                      <option value="1">Không hoạt động</option>
                  @else($truyen->kichhoat==1)
                      <option  value="0">Hoạt động<table></table></option>
                      <option selected value="1">Không hoạt động</option>
                  @endif
                  </select>
                  </div>

                  <div class="col-12">
                    <label for="exampleInputEmail1" >Trạng thái</label>
                    <select name="product_hot" class="form-select" id="inputGroupSelect02">
                    @if($product->product_hot==0)
                        <option selected value="0">Nổi bật<table></table></option>
                        <option value="1">Không nổi bật</option>
                        @else($truyen->kichhoat==1)
                        <option  value="0">Nổi bật<table></table></option>
                        <option selected value="1">Không nổi bật</option>
                    @endif
                    </select>
                    </div>

               <div class="col-12">
                 <button class="btn btn-primary px-4">Lưu</button>
                <a class="btn btn-primary px-4" href="{{ route('product.index') }}" class="w3-button w3-red">Trở về</a>
            </div>
             </form>
            </div>
            </div>
           </div>
        </div>
     </div>
     </div>
    </main>
    @endsection

@extends('admin.layout.master')
@section('content')
<main id="main">
<h1>Danh sách sản phẩm</h1>
<div class="container">
<table class="table table-striped table-hover">
    <a href="{{route('product.create')}}" class="btn btn-info">Thêm mới</a>
        <div class="col-6">
            <form>
                <a class="btn btn-sm btn-icon btn-warning" type="button" name="key" value="{{ $f_key }}" data-bs-toggle="modal" data-bs-target="#basicModal">Tìm nâng cao</a>
                    @include('admin.product.modals.modalproductcolumns')
                </form>
        </div>
        <thead>
            <tr>
                <th scope="col">Số thứ tự</th>
                <th scope="col">Tên</th>
                <th scope="col">Giá</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Mô tả</th>
                <th scope="col">Thể loại</th>
                <th scope="col">Image</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Nổi bật hay không nổi bật</th>
                <th adta-breakpoints="xs">Quản lí</th>
            </tr>
        </thead>
        <tbody id="myTable">
            @foreach ($products as $key => $team)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $team->name }}</td>
                    <td>{{ $team->price }}</td>
                    <td>{{ $team->quantity }}</td>
                    <td>{{ $team->description }}</td>
                    <td>{{ $team->category->name }}</td>
                    <td>
                        <img src="{{ asset('public/assets/product/' . $team->image) }}" alt=""
                            style="width: 100px">
                    </td>

                    <td>
                        @if($team->status==0)
                        <span class='text text-success'>Kích Hoạt</span>
                        @else
                        <span class='text text-success'>Không Kích Hoạt</span>
                        @endif
                    </td>
                    <td>
                        @if($team->product_hot==0)
                        <span class='text text-success'>Nổi bật</span>
                        @else
                        <span class='text text-success'>Không nổi bật</span>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('product.softdeletes', $team->id) }}" method="POST">

                            <a href="{{ route('product.edit', $team->id) }}"
                                class="btn btn-primary">Sửa</a>
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Chuyên vào thùng rác')">Xóa</button>
                                <p class="text-success">
                                <div > <i class="fa fa-check"
                                        aria-hidden="true"></i>
                                  </div>
                                </p>
                                <p class="text-danger">
                                <div > <i
                                        aria-hidden="true"></i>
                                </p>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="col-6">
        <div class="pagination float-right">
            {{ $products->appends(request()->query()) }}
        </div>
    </div>
</main>
@endsection

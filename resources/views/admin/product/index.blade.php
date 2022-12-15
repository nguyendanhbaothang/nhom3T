<main id="main">
<h1>Danh sách sản phẩm</h1>
<div class="container">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<table class="table">
    <a href="{{route('product.create')}}" class="btn btn-info">Thêm mới</a>
        <div class="col-6">

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
                        <img src="{{ asset('public/uploads/product/' . $team->image) }}" alt=""
                            style="width: 50px">
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
        </div>
    </div>
</main>

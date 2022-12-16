<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<main id="main" class="main">
    <div class="pagetitle">
        <h1 class="mb-1">Thùng rác</h1>
            <a href="{{route('categories.index')}}">Quay lại</a></li>

      </div>
<div class="card">
  <div class="card-body">
    @if (Session::has('success'))
    <p class="text-success"><i class="fa fa-check" aria-hidden="true"></i>
        {{ Session::get('success') }}
    </p>
@endif
@if (Session::has('error'))
    <p class="text-danger"><i class="bi bi-x-circle"></i>
        {{ Session::get('error') }}
    </p>
@endif
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          {{-- <th scope="col">The number of products</th> --}}
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($categories as $key => $category)
        <tr>
          <th scope="row">{{$key + 1}}</th>
          <td>{{$category->name}}</td>
          {{-- <td>{{$category->products->count()}}</td> --}}
          <td>
            <form action="{{ route('categories.delete', $category->id) }}" method="post" >
                @method('DELETE')
                @csrf
                <a onclick="return confirm('Bạn có chắc muốn khôi phục danh mục này không?');"
                    style='color:rgb(52,136,245)' class='btn'
                    href="{{ route('categories.restore', $category->id) }}"><i
                    class='bi bi-arrow-clockwise h4'>khôi phục</i></a>
                <button onclick="return confirm('Bạn có chắc muốn xóa danh mục này không?');"
                    class ='btn' style='color:rgb(52,136,245)' type="submit" ><i class='bi bi-trash h4'>Xoá</i></button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
</main>

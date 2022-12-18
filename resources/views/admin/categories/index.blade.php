@extends('admin.layout.master')
@section('content')
<!DOCTYPE html>
<html>
<h1>Categories</h1>
<main id="main">
<body>
<table  class="table">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
       {{ session('status') }}
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger" role="alert">
       {{ session('error') }}
    </div>
    @endif
<a href="{{route('categories.create')}}" class="btn btn-success">Thêm mới</a>
    <tr>
    <th>id</th>
    <th>Tên danh mục</th>
    <th>Tuỳ chỉnh</th>
    </tr>
    @foreach ($categories as $key => $value )
    <tr>
        <td>
            {{++$key }}
         </td>
          <td>
            {{$value->name}}
         </td>
         <td>

                 {{-- <a href="{{ route('categories.show', $value->id) }}"
                    class="btn btn-sm btn-icon btn-secondary"><i class="bi bi-eye-fill"></i></a> --}}
                <a href="{{ route('categories.edit', $value->id) }}"
                    ><i
                        class="btn btn-primary">Chỉnh sửa</i></a>
                        <form onclick="return confirm('Bạn có chắc chắn muốn xoá không?')" action="{{ route('categories.destroy', $value->id) }}"
                            style="display:inline"  method="post">
                <button
                    type="submit"
                        class="btn btn-danger">Xoá</button>
                @csrf
                @method('DELETE')
            </form>
        </td>
    </tr>
    @endforeach

  </table>
  <div class="col-6">
    <div class="pagination float-right">
        {{ $categories->appends(request()->query()) }}
    </div>
</div>
</body>
</html>

</main>
@endsection

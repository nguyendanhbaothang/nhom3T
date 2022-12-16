@extends('admin.layout.master')
@section('content')
<!DOCTYPE html>
<html>
<style>

</style>
<main id="main">
<body>
<table  class="table">
<a href="{{route('categories.create')}}" class="btn btn-success">Thêm mới</a>
    <tr>
    <th>id</th>
    <th>Tên danh mục</th>
    <th>Tuỳ chỉnh</th>
    </tr>
    @foreach ($categories as $key => $value )
    <tr>
        <td>
            {{$key++ }}
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
</body>
</html>

</main>
@endsection

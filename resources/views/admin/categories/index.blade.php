<!DOCTYPE html>
<html>
<style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

     table, th, td {
                border:1px solid black;
                }

</style>
<main id="main">
<body>
<table style="width:100%" class="table">
<a href="{{route('categories.create')}}" class="btn btn-success">Thêm mới</a>
<a class='btn btn-secondary mb-2 float-right'  href="{{route('categories.getTrashed')}}">Thùng rác</a>
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
                    class="btn btn-sm btn-icon btn-secondary"><i
                        class="bi bi-pencil-square">Chỉnh sửa</i></a>
                        <form onclick="return confirm('Bạn có chắc chắn muốn xoá không?')" action="{{ route('categories.destroy', $value->id) }}"
                            style="display:inline"  method="post">
                <button
                    type="submit"  class="btn btn-sm btn-icon btn-secondary"><i
                        class="bi bi-trash">Xoá</i></button>
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

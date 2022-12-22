@extends('admin.layout.master')
@section('content')
<!DOCTYPE html>
<html>
<h1>Danh mục</h1>
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
    @if(Auth::user()->hasPermission('Category_create'))
<a href="{{route('categories.create')}}" class="btn btn-success">Thêm danh mục</a>
@endif
    <tr>
    <th>STT</th>
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
            @if (Auth::user()->hasPermission('Category_update'))
                <a href="{{ route('categories.edit', $value->id) }}">
                    <i
                        class="btn btn-primary">Chỉnh sửa</i></a>
                        @endif
                        <form onclick="return confirm('Bạn có muốn chuyển nó vào thùng rác?')" action="{{ route('categories.destroy', $value->id) }}"
                            style="display:inline"  method="post">
                            @if (Auth::user()->hasPermission('Category_delete'))
                            <button
                    type="submit"
                        class="btn btn-danger">Xoá</button>
                        @endif
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

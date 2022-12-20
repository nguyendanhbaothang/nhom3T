@extends('admin.layout.master')
@section('content')
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
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($categories as $key => $category)
        <tr>
          <th scope="row">{{$key + 1}}</th>
          <td>{{$category->name}}</td>
          <td>
            <form action="{{ route('categories.delete', $category->id) }}" method="post" >
                @method('DELETE')
                @csrf
                @if (Auth::user()->hasPermission('Product_restore'))

                <a onclick="return confirm('Bạn có chắc muốn khôi phục danh mục này không?');"
                    style='color:rgb(52,136,245)' class='btn'
                    href="{{ route('categories.restore', $category->id) }}"><i
                    class='btn btn-primary'>Restore</i></a>
                    @endif
                    @if (Auth::user()->hasPermission('Product_forceDelete'))
                <button onclick="return confirm('Bạn có chắc muốn xóa danh mục này không?');"
                    class ='btn' style='color:rgb(52,136,245)' type="submit" ><i class='btn btn-danger'>Delete</i></button>
                    @endif

            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
</main>
@endsection

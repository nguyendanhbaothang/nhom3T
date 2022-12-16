@extends('admin.layout.master')
@section('content')
{{-- <main id="main" class="main">
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
@endif --}}
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Tên danh mục</th>
          {{-- <th scope="col">The number of products</th> --}}
          <th scope="col">Tuỳ chỉnh</th>
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
                    class='btn btn-primary'>khôi phục</i></a>
                <button onclick="return confirm('Bạn có chắc muốn xóa danh mục này không?');"
                    class ='btn' style='color:rgb(52,136,245)' type="submit" ><i class='btn btn-danger'>Xoá</i></button>
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

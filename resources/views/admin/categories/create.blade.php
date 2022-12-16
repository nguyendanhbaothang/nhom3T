@extends('admin.layout.master')
@section('content')

<main id="main">
    <h1>Thêm Danh Mục</h1>
    <form action="{{route('categories.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" id="fname" name="name" class="form-control">
        </div>
        <input type="submit" value="Lưu" class="btn btn-success">
        <a href="{{route('categories.index')}}" class="btn btn-danger">Huỷ</a>
      </form>
      </main>
      @endsection

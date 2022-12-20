@extends('admin.layout.master')
@section('content')
<main id="main">

    <h1>Edit Category</h1>
    <form action="{{route('categories.update',$item->id)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" id="fname" name="name" value='{{$item->name}}' class="form-control">
            @error('name')
            <div class="text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <input type="submit" value="Cập nhật" class="btn btn-primary">
        <a href="{{route('categories.index')}}" class="btn btn-danger">Cancel</a>

      </form>
      </main>
      @endsection

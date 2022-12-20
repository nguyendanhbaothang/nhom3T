@extends('admin.layout.master')
@section('content')

<main id="main">
    <h1>Add Category</h1>
    <form action="{{route('categories.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" id="fname" name="name" class="form-control">
            @error('name')
            <div class="text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <input type="submit" value="Lưu" class="btn btn-success">
        <a href="{{route('categories.index')}}" class="btn btn-danger">Cancel</a>
      </form>
      </main>
      @endsection


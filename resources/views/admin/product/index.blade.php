@extends('admin.layout.master')
@section('content')
    <main id="main">
        <h1>Prodduct</h1>
        <div class="container">
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
                <div class="col-6">
                    <form>
                        @if (Auth::user()->hasPermission('Product_create'))
                            <a href="{{ route('product.create') }}" class="btn btn-info">Add new
                            </a>
                        @endif
                        <a class="btn btn-success" type="button" name="key" value="{{ $f_key }}"
                            data-bs-toggle="modal" data-bs-target="#basicModal">Advanced search</a>

                        @include('admin.product.modals.modalproductcolumns')
                        <a href="{{ route('product.xuat') }}" class="btn btn-warning">Xuất Exports </a>

                    </form>
                </div>
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Category</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $key => $team)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $team->name }}</td>
                            <td>{{ number_format($team->price) }} VND</td>
                            <td>{{ $team->category->name }}</td>
                            <td>
                                <img src="{{ asset('public/assets/product/' . $team->image) }}" alt=""
                                    style="width: 100px">
                            </td>
                            <td>
                                <form action="{{ route('product.softdeletes', $team->id) }}" method="POST">
                                    @if (Auth::user()->hasPermission('Product_view'))
                                        <a class="btn btn-info" href="{{ route('product.show', $team->id) }}">Show</a>
                                    @endif
                                    @if (Auth::user()->hasPermission('Product_update'))
                                        <a href="{{ route('product.edit', $team->id) }}" class="btn btn-primary">Edit</a>
                                    @endif
                                    @csrf
                                    @method('PUT')
                                    @if (Auth::user()->hasPermission('Product_delete'))
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Chuyên vào thùng rác')">Delete</button>
                                    @endif
                                    <p class="text-success">
                                    <div> <i class="fa fa-check" aria-hidden="true"></i>
                                    </div>
                                    </p>
                                    <p class="text-danger">
                                    <div> <i aria-hidden="true"></i>
                                        </p>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="col-6">
                <div class="pagination float-right">
                    {{ $products->appends(request()->query()) }}
                </div>
            </div>
    </main>
@endsection

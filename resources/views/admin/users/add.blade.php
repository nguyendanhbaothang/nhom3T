@extends('admin.layout.master')
@section('content')

<main class="page-content">

<section class="wrapper">
    <div class="panel-panel-default">
        <div class="market-updates">
            <div class="container">
                <div class="page-inner">
                    <header class="page-title-bar">
                        <nav aria-label="breadcrumb">
                            {{-- <a href="{{ route('user.index') }}" class="w3-button w3-red">Quay Lại</a> --}}
                        </nav>
                        {{-- <h1 class="page-title">Thêm Sản phẩm</h1> --}}
                    </header>
                    <div class="page-section">
                        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <legend>Info</legend>
                                    <div class="row">

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="tf1">Email<abbr name="Trường bắt buộc">*</abbr></label>
                                                <input name="email" type="text" class="form-control"
                                                    value="{{ old('email') }}">
                                                <small id="" class="form-text text-muted"></small>
                                                @error('email')
                                                    <div class="text text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="tf1">Password<abbr
                                                        name="Trường bắt buộc">*</abbr></label>
                                                <input name="password" type="text" class="form-control"
                                                    value="{{ old('password') }}">
                                                <small id="" class="form-text text-muted"></small>
                                                @error('password')
                                                    <div class="text text-danger">{{ $message }}</div>
                                                @enderror
                                                <br>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="tf1">Name<abbr
                                                        name="Trường bắt buộc">*</abbr></label>
                                                <input name="name" type="text" class="form-control"
                                                    value="{{ old('name') }}">
                                                <small id="" class="form-text text-muted"></small>
                                                @error('name')
                                                    <div class="text text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="tf1">Phone<abbr
                                                        name="Trường bắt buộc">*</abbr></label> <input name="phone"
                                                    type="number" class="form-control" value="{{ old('phone') }}">
                                                <small id="" class="form-text text-muted"></small>
                                                @error('phone')
                                                    <div class="text text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="tf1">Birthday<abbr
                                                        name="Trường bắt buộc">*</abbr></label> <input name="birthday"
                                                    type="date" class="form-control" value="{{ old('birthday') }}">
                                                <small id="" class="form-text text-muted"></small>
                                                @error('birthday')
                                                    <div class="text text-danger">{{ $message }}</div>
                                                @enderror
                                                <br>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label class="control-label" for="flatpickr01"> Position<abbr
                                                    name="Trường bắt buộc">*</abbr></label>
                                            <select name="group_id" id="" class="form-control">
                                                <option value="">--Please Choose--</option>
                                                @foreach ($groups as $group)
                                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ('group_id')
                                                <p style="color:red">{{ $errors->first('group_id') }}</p>
                                            @endif
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label class="control-label" for="flatpickr01">Gender<abbr
                                                    name="Trường bắt buộc">*</abbr></label>
                                            <select name="gender" id="" class="form-control">
                                                <option value="">--Please Choose--</option>
                                                <option value="Nam">Genteman</option>
                                                <option value="Nữ">Lady</option>
                                                {{-- @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach --}}
                                            </select>
                                            @if ('gender')
                                                <p style="color:red">{{ $errors->first('gender') }}</p>
                                            @endif
                                        </div>
                                        <div class="form-group has-warning">
                                            <label class="col-lg-3 control-label">Image</label>
                                            <div class="col-lg-4">
                                                <input accept="image/*" type='file' id="inputFile"
                                                    name="image" /><br>
                                                <img type="hidden" width="90px" height="90px" id="blah"
                                                    src="#" alt="" />
                                                    <br>
                                            </div>
                                            @if ('image')
                                                <p style="color:red">{{ $errors->first('image') }}</p>
                                            @endif
                                        </div>

                                        {{-- địa chỉ --}}
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="tf1">Address<abbr
                                                        name="Trường bắt buộc">*</abbr></label> <input name="address"
                                                    type="text" class="form-control" value="{{ old('address') }}">
                                                <small id="" class="form-text text-muted"></small>
                                                @error('address')
                                                    <div class="text text-danger">{{ $message }}</div>
                                                @enderror
                                                <br>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-actions">
                                        <br><br><br><br>
                                        <button class="btn btn-primary" type="submit">Registration</button>
                                        <a class="btn btn-danger" href="{{ route('user.index') }}">Cancel</a>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</main>
</section>
@endsection

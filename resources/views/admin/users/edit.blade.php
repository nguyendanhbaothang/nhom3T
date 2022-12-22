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
                                <a href="{{ route('user.index') }}" class="btn btn-dark">Quay lại</a>
                            </nav>
                            <h1 class="page-title">Thay đổi thông tin</h1>
                        </header>
                        <div class="page-section">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="card">
                                    <div class="card-body">
                                        <legend>Thông tin nhân viên</legend>
                                        <div class="row">

                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="tf1">Email<abbr name="Trường bắt buộc">*</abbr></label>
                                                    <input name="email" type="text" class="form-control"
                                                        value="{{ $user->email }}">
                                                    <small id="" class="form-text text-muted"></small>
                                                    @error('email')
                                                        <div class="text text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="tf1">Tên<abbr
                                                            name="Trường bắt buộc">*</abbr></label>
                                                    <input name="name" type="text" class="form-control"
                                                        value="{{ $user->name }}">
                                                    <small id="" class="form-text text-muted"></small>
                                                    @error('name')
                                                        <div class="text text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="tf1">Số điện thoại<abbr
                                                            name="Trường bắt buộc">*</abbr></label> <input name="phone"
                                                        type="number" class="form-control" value="{{ $user->phone }}">
                                                    <small id="" class="form-text text-muted"></small>
                                                    @error('phone')
                                                        <div class="text text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="tf1">Ngày sinh<abbr
                                                            name="Trường bắt buộc">*</abbr></label> <input name="birthday"
                                                        type="date" class="form-control" value="{{ $user->birthday }}">
                                                    <small id="" class="form-text text-muted"></small>
                                                    @error('birthday')
                                                        <div class="text text-danger">{{ $message }}</div>
                                                    @enderror
                                                    <br>
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-4">
                                                @if (Auth::user()->hasPermission('Group_update'))
                                                <label class="control-label" for="flatpickr01">Chức vụ<abbr
                                                        name="Trường bắt buộc">*</abbr></label>
                                                <select name="group_id" id="" class="form-control">
                                                    <option value="">--Vui lòng chọn--</option>
                                                    {{-- @foreach ($groups as $group)
                                                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                                                    @endforeach --}}
                                                    @foreach ($groups as $group)
                                                    <option
                                                        <?= $group->id == $user->group_id ? 'selected' : '' ?>
                                                        value="{{ $group->id }}">
                                                        {{ $group->name }}</option>
                                                @endforeach
                                                </select>
                                                @if ('group_id')
                                                    <p style="color:red">{{ $errors->first('group_id') }}</p>
                                                @endif
                                                @endif
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label class="control-label" for="flatpickr01">Giới tính<abbr
                                                        name="Trường bắt buộc">*</abbr></label>
                                                <select name="gender" id="" value="{{ $user->gender }}" class="form-control">
                                                    <option value="Nam">Nam</option>
                                                    <option value="Nữ">Nữ</option>
                                                </select>
                                                @if ('gender')
                                                    <p style="color:red">{{ $errors->first('gender') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label class="control-label" >Mật khẩu</label>
                                                        <input name="password"
                                                        type="text" class="form-control" value="">
                                                @if ('gender')
                                                    <p style="color:red">{{ $errors->first('gender') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group has-warning">
                                                <label class="col-lg-3 control-label">Hình ảnh</label>
                                                <div class="col-lg-4">
                                                    <input accept="image/*" type='file' value="{{ $user->image }}" id="inputFile" name="image" /><br>
                                                    <img type="hidden" width="90px" height="90px" id="blah1"
                                                    src="{{ asset('pulic/user/' . $user->image) ?? asset('pulic/user/' . $request->image) }}"
                                                    alt="" />
                                                @if ('image')
                                                    <p style="color:red">{{ $errors->first('image') }}</p>
                                                @endif
                                                        <br>
                                                </div>
                                            </div>

                                            {{-- địa chỉ --}}
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="tf1">Địa chỉ<abbr
                                                            name="Trường bắt buộc">*</abbr></label> <input name="address"
                                                        type="text" class="form-control" value="{{ $user->address }}">
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
                                            <button class="btn btn-danger" type="submit">Lưu thay đổi</button>
                                            <a class="btn btn-warning" href="{{ route('user.index') }}">Hủy</a>
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
@endsection
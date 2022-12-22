
@extends('admin.layout.login')

@section('content')
<div class="pt-4 pb-2">
	<h5 class="card-title text-center pb-0 fs-4">Đăng nhập vào tài khoản của bạn</h5>
	<p class="text-center small">Nhập tên người dùng và mật khẩu của bạn để đăng nhập</p>
 </div>

 <form class="row g-3 needs-validation" method="POST" action="{{ route('handdle-login') }}">
	@csrf
	<div class="col-12">
	   <label for="yourUsername" class="form-label">Email</label>
	   <div class="input-group has-validation">
		  <span class="input-group-text" id="inputGroupPrepend">@</span> <input type="text" name="email" class="form-control" id="yourUsername" required>
	   </div>
       @error('email')
       <div class="text text-danger">{{ $message }}</div>
       @enderror
	</div>
	<div class="col-12">
	   <label for="yourPassword" class="form-label">Mật khẩu</label> <input type="password" name="password" class="form-control" id="yourPassword" required>
	   <div class="invalid-feedback">Please enter your password!</div>
	</div>
    @error('password')
    <div class="text text-danger">{{ $message }}</div>
    @enderror
	<div class="col-12">
	   <div class="form-check"> <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe"> <label class="form-check-label" for="rememberMe">Nhớ mật khẩu</label></div>
	</div>
    <button class="btn submits sign-up">Đăng nhập<i class="fa fa-user-plus" ></i></button>
	<div class="col-12">
	   <p class="small mb-0">Bạn quên mật khẩu?  <a href="{{route('view.quenmatkhau')}}">Quên mật khẩu</a></p>
	</div>
 </form>

 @endsection

@extends('admin.layout.login')

@section('content')
<div class="pt-4 pb-2">
	<h5 class="card-title text-center pb-0 fs-4">Gửi tới Email</h5>
	<p class="text-center small">Nhập email của bạn để gửi email cho bạn</p>
 </div>
 <form class="row g-3 needs-validation" action="{{route('quenmatkhau')}}" method="post" >
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
	   <label for="yourPassword" class="form-label">ㅤㅤㅤㅤㅤㅤㅤ</label>
	   <div class="invalid-feedback">ㅤㅤㅤㅤㅤㅤㅤㅤ</div>
	</div>
    <button class="btn submits sign-up">Gửi<i class="fa fa-user-plus" ></i></button>

 </form>

 @endsection

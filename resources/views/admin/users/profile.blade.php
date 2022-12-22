@extends('admin.layout.master')
@section('content')
<main id="main" class="main">
   <div class="pagetitle">
      <h1 class="mb-1">Nhân Viên</h1>
   </div>
   <div class="card">
      <div class="card-body">
         <h5 class="card-title">Xem chi tiết</h5>
         <div class="row g-0">
            <div class="col-md-6">
               <div class="d-flex flex-column justify-content-center">
                  <div style=" margin-top: 24px;" class="main_image"> <img src="{{ asset('/assets/images/user/' .$user->image) }}" id="main_user_image" height="300" width="412">
                  </div>
                  <br>
               </div>
            </div>
            <div class="col-md-6">
               <div class="p-3 right-side">
                  <div class="product-info-tabs">
                     <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active profile-overview" id="profile-overview">
                           <table class="table table-striped">
                              {{-- 
                              <tbody>
                                 <tr>
                                    <td>Tên</td>
                                    <td>{{ $user->name }}</td>
                                 </tr>
                                 <tr>
                                    <td>Số điện thoại</td>
                                    <td>{{ $user->phone }}</td>
                                 </tr>
                                 <tr>
                                    <td>Địa chỉ</td>
                                    <td>{{ $user->address }}</td>
                                 </tr>
                                 <tr>
                                    <td>Chức vụ</td>
                                    <td>{{ $user->position }}</td>
                                 </tr>
                                 <tr>
                                    @if(Auth::user()->id == $user->id)
                                    <a class="btn mini btn-default" href="{{ route('user.editpass', Auth::user()->id) }}">
                                    <i class="fa fa-cog"> Thay đổi mật khẩu </i>
                                    </a>
                                    @endif
                                 </tr>
                                 <br>
                                 @if (Auth::user()->hasPermission('User_adminUpdatePass'))
                                 <a class="btn mini btn-default" href="{{ route('user.adminpass', $user->id) }}">
                                 <i class="fa fa-cog">Thay đổi mật khẩu của*</i>
                                 </a>
                                 @endif
                              </tbody>
                              --}}
                              <tbody>
                                 <tr>
                                    <td>Tên</td>
                                    <td>{{ $user->name }}</td>
                                 </tr>
                                 <tr>
                                    <td>Số điện thoại</td>
                                    <td>{{ $user->phone }}</td>
                                 </tr>
                                 <tr>
                                    <td>Địa chỉ</td>
                                    <td>{{ $user->address }}</td>
                                 </tr>
                                 <tr>
                                    <td>Chức vụ</td>
                                    <td>{{ $user->group->name }}</td>
                                 </tr>
                                 
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
</main>
@endsection

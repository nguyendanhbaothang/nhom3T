@extends('admin.layout.master')
@section('content')
<div class="pagetitle">
    <h1>Phân Quyền</h1>
 </div>
 <section class="section">
    <div class="row">
       <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-10">

            </div>
            <div class="col-lg-2">
                <a class="btn btn-primary btn-block" href="{{route('group.index')}}">Trở Về</a>
            </div>
        </div>
          <div class="card">
             <div class="card-body">

                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-hover">
                           <thead>
                              <tr>
                                 <th scope="col">id</th>
                                 <th scope="col">Tên Nhóm Quyền</th>
                                 <th scope="col">Người đảm nhận</th>
                                 <th scope="col">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach ($groups as $item )
                              <tr>
                                 <th scope="row">{{$item->id}}</th>
                                 <td>{{$item->name}}</td>
                                 <td>{{$item->users}}</td>
                              </td>
                              <td>
                               <a href="{{route('admin.restore',$item->id)}}" class="btn btn-info">Khôi Phục</a>
                               <form action="{{route('admin.forceDelete',$item->id)}}" method="post">
                                 @csrf
                                 @method('delete') 
                                 <button type="submit" class="btn btn-danger" onclick="return confirm('Are You Sure?')">Xóa Luôn</button>
                              </form>
                              </td>
                              </tr>
                              @endforeach
                            </tbody>
                         </table>
                         {{ $group->links(); }}
                    </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
@endsection
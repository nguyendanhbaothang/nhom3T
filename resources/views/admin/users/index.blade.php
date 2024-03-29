@extends('admin.layout.master')
@section('content')
<style>
    img#avt {
width: 80px;
height: 80px;
border-radius:50%;
-moz-border-radius:50%;
-webkit-border-radius:50%;
}
</style>
<main class="page-content">
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

<section class="wrapper">
    <section class="wrapper">
        <form>
        
            <a class="btn btn-success" type="button" name="key" value="{{ $f_key }}"
                data-bs-toggle="modal" data-bs-target="#basicModal">Advanced search</a>
    
            @include('admin.users.modals.modalusercolumns')
    
        </form>
        <br>
        <div class="table-agile-info">
            <div class="panel-panel-default">
                    <header class="page-title-bar">
                        {{-- <h1 class="page-title">Sản phẩm</h1> --}}
                        <a href="{{ route('user.create') }}" class="btn btn-info">Đăng kí nhân viên</a>
                    </header>
                    <hr>
                    <div class="panel-heading">
                      <h3> Nhân viên</h3>
                    </div>
                    <div>
                        <table class="table" ui-jq="footable"
                            ui-options='{
        "paging": {
          "enabled": true
        },
        "filtering": {
          "enabled": true
        },
        "sorting": {
          "enabled": true
        }}'>

                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Hình ảnh</th>
                                    <th>Tên</th>
                                    <th>Số điện thoại</th>
                                    <th>Địa chỉ</th>
                                    <th>Chức vụ</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                @foreach ($users as $key => $user )
                                <tr>
                                    <td>
                                        {{++$key }}
                                     </td>
                                     <td><a href="{{ route('user.show', $user->id) }}"><img id="avt" src="{{asset('assets/images/user/' . $user->image)}}" alt=""></a></td>
                                     <td><a href="{{ route('user.show', $user->id) }}">{{ $user->name }}</a></td>
                                     <td>{{ $user->phone }}</td>
                                     <td>{{ $user->address }}</td>
                                     <td>{{ $user->group->name }}</td>
                                     <td>
                                        @if (Auth::user()->hasPermission('User_update'))
                                            <a href="{{ route('user.edit', $user->id) }}">
                                                <i class="btn btn-primary">Edit</i></a>
                                        @endif
                                            <form onclick="return confirm('Bạn có muốn chuyển nó vào thùng rác?')" action="{{ route('user.destroy', $user->id) }}"
                                                  style="display:inline"  method="post">
                                        @if (Auth::user()->hasPermission('User_delete'))
                                            <button type="submit"class="btn btn-danger">Delete</button>
                                        @endif
                                        @csrf
                                         @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <div class="col-6">
                            <div class="pagination float-right">
                                {{ $users->appends(request()->query()) }}
                            </div>
                        </div>
                       {{-- {{ $users->appends(request()->query()) }} --}}
                    </div>
                </div>
            </div>
        </section>

</main>
@endsection





@extends('admin.layout.master')
@section('content')
<main class="page-content">
    <h1>Thùng rác</h1>

    <div class="container">


        <table class="table">
            <div class="col-6">
            </div>
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Chức vụ</th>
                    <th adta-breakpoints="xs">Hành động</th>
                </tr>
            </thead>
            <tbody id="myTable">

                @foreach ($users as $key => $user)
                    <tr class="item-{{ $user->id }}">
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>
                            <img src="{{ asset('assets/images/user/' . $user->image) }}" alt=""
                                style="width: 100px">
                        </td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->position }}</td>

                        <td>
                            <form action="{{ route('user.delete', $user->id) }}" method="post" >
                                @method('DELETE')
                                @csrf
                                @if (Auth::user()->hasPermission('User_restore'))
                
                                <a onclick="return confirm('Bạn có chắc muốn khôi phục danh mục này không?');"
                                    style='color:rgb(52,136,245)' class='btn'
                                    href="{{ route('user.restore', $user->id) }}"><i
                                    class='btn btn-primary'>Khôi phục</i></a>
                                    @endif
                                    @if (Auth::user()->hasPermission('User_forceDelete'))
                                <button onclick="return confirm('Bạn có chắc muốn xóa danh mục này không?');"
                                    class ='btn' style='color:rgb(52,136,245)' type="submit" ><i class='btn btn-danger'>Xóa</i></button>
                                    @endif
                
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="col-6">
            <div class="pagination float-right">
            </div>
        </div>
</main>
</section>
@endsection

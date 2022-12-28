@extends('admin.layout.master')
@section('content')
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
    <div class="container">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel-panel-default">
                <header class="page-title-bar">
                    <h1 class="page-title">Nhóm nhân viên</h1>
                    <br>
                    <nav aria-label="breadcrumb">
                        @if (Auth::user() && Auth::user()->hasPermission('Group_create') || true)
                                <a href="{{ route('group.create') }}" class="btn btn-info">Thêm mới nhóm</a>
                        @endif
                    </nav>
                </header>
                <hr>
                <div class="panel-heading">
                   <h3>Danh sách nhân viên</h3>
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
                                <th>ID</th>
                                <th>Tên nhóm quyền</th>
                                <th>Số người</th>
                                <th data-breakpoints="xs">Hành động</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            @foreach ($groups as $key => $group)
                                <tr data-expanded="true" class="item-{{ $group->id }}">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $group->name }} </td>
                                    <td>Hiện có {{ count($group->users) }} người</td>
                                    <td>
                                        @if (Auth::user()->hasPermission('Group_update'))
                                            <a class="btn btn-primary " href="{{route('group.detail', $group->id)}}">Trao quyền</a>
                                        @endif
                                        @if (Auth::user()->hasPermission('Group_update'))
                                        <a href="{{ route('group.edit', $group->id) }}">
                                        <i
                                           class="btn btn-primary">Sửa</i></a>
                                        @endif
                                        <form onclick="return confirm('Bạn có muốn chuyển nó vào thùng rác?')" action="{{ route('group.destroy', $group->id) }}"
                                           style="display:inline"  method="post">
                                        @if (Auth::user()->hasPermission('Group_delete'))
                                           <button
                                              type="submit"
                                              class="btn btn-danger">Xóa</button>
                                        @endif
                                        @csrf
                                        @method('DELETE')
                                        </form>
                                     </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $groups->appends(request()->query()) }}
                </div>
            </div>
    </section>
</main>
@endsection

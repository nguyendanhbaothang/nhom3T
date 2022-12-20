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

<section class="wrapper">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel-panel-default">
                    <header class="page-title-bar">
                        {{-- <h1 class="page-title">Sản phẩm</h1> --}}
                        <a href="{{ route('user.create') }}" class="btn btn-info">Register account user</a>
                    </header>
                    <hr>
                    <div class="panel-heading">
                      <h3> User</h3>
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
                                    <th data-breakpoints="xs">Stt</th>
                                    {{-- <th data-breakpoints="xs">ID</th> --}}
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Position</th>
                                    <th data-breakpoints="xs">Action</th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                @foreach ($users as $key => $user)
                                    <tr data-expanded="true" class="item-{{ $user->id }}">
                                        <td>{{  ++$key }}</td>
                                        <td><a href="{{ route('user.show', $user->id) }}"><img id="avt" src="{{asset('assets/images/user/' . $user->image)}}" alt=""></a></td>
                                        <td><a href="{{ route('user.show', $user->id) }}">{{ $user->name }}</a></td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->group->name }}</td>
                                        <td>
                                            @if (Auth::user()->hasPermission('User_update'))
                                                <a href="{{ route('user.edit', $user->id) }}">
                                                    <i
                                                        class="btn btn-primary">Edit</i></a>
                                                        @endif
                                                        <form onclick="return confirm('Bạn có muốn chuyển nó vào thùng rác?')" action="{{ route('user.softdeletes', $user->id) }}"
                                                            style="display:inline"  method="post">
                                                            @if (Auth::user()->hasPermission('User_delete'))
                                                            <button
                                                    type="submit"
                                                        class="btn btn-danger">Delete</button>
                                                        @endif
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                       {{-- {{ $users->appends(request()->query()) }} --}}
                    </div>
                </div>
            </div>
        </section>

</main>
@endsection

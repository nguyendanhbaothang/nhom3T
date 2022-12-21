@extends('admin.layout.master')
@section('content')
<main class="page-content">
    <div class="container">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel-panel-default">
                <header class="page-title-bar">
                    <h1 class="page-title">Group</h1>
                    <br>
                    <nav aria-label="breadcrumb">
                        @if (Auth::user() && Auth::user()->hasPermission('Group_create') || true)
                                <a href="{{ route('group.create') }}" class="btn btn-info">Add group</a>
                        @endif
                    </nav>
                </header>
                <hr>
                <div class="panel-heading">
                   <h3>List group</h3>
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
                                <th>Group name</th>
                                <th>Undertaker</th>
                                <th data-breakpoints="xs">Action</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            @foreach ($groups as $key => $group)
                                <tr data-expanded="true" class="item-{{ $group->id }}">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $group->name }} </td>
                                    <td>Hiện có {{ count($group->users) }} người</td>
                                    <td>

                                        <form action="{{ route('group.destroy', $group->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            @if (Auth::user()->hasPermission('Group_update'))
                                            <a class="btn btn-primary " href="{{route('group.detail', $group->id)}}">Authorize</a>
                                            @endif
                                            @if (Auth::user()->hasPermission('Group_update'))
                                            <a href="{{ route('group.edit', $group->id) }}"
                                                class="btn btn-warning">Edit</a>
                                            @endif

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

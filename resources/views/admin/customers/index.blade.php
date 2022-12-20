@extends('admin.layout.master')
@section('content')
<main class="page-content">
<section class="wrapper">
    <div class="panel-panel-default">
        <div class="market-updates">
            <div class="container">
                <main id="main" class="main">
                    <div class="pagetitle">
                        <hr>
                        <h1>List customer</h1>
                        <hr>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $key => $item)
                                <tr>
                                    <th scope="row">{{ ++$key }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="col-6">
                        <div class="pagination float-right">
                            {{ $items->appends(request()->query()) }}
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</section>
</main>
@endsection

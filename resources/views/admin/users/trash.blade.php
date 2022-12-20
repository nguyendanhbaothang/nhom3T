@extends('admin.layout.master')
@section('content')
<main class="page-content">
    <h1>Garbage</h1>

    <div class="container">


        <table class="table">
            <div class="col-6">
            </div>
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Position</th>
                    <th adta-breakpoints="xs">Action</th>
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
                            <form action="{{ route('user.restoredelete', $user->id) }}" method="POST">
                                @csrf
                                @method('put')
                                @if (Auth::user()->hasPermission('User_restore'))
                                    <button type="submit" class="btn btn-success">Restore</button>
                                    @endif
                                    @if (Auth::user()->hasPermission('User_forceDelete'))
                                    <a  data-href="{{ route('user.destroy', $user->id) }}"
                                        id="{{ $user->id }}" class="btn btn-danger deleteIcon">Delete</a>
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
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js'></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$(document).on('click', '.deleteIcon', function(e) {
    e.preventDefault();
    let id = $(this).attr('id');
    let href = $(this).data('href');
    let csrf = '{{ csrf_token() }}';
    console.log(id);
    Swal.fire({
        title: 'Bạn có chắc không?',
        text: "Bạn sẽ không thể hoàn nguyên điều này!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Có, xóa!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: href,
                method: 'delete',
                data: {
                    _token: csrf
                },
                success: function(res) {
                    Swal.fire(
                        'Deleted!',
                        'Tệp của bạn đã bị xóa!',
                        'success'
                    )
                    $('.item-' + id).remove();
                    // window.location.reload();
                },
            });
            Swal.fire({
            icon: 'error',
            title: 'lỗi rồi...',
            text: 'Đã xảy ra lỗi!',
            })
        }
    })
});
</script>
@endsection

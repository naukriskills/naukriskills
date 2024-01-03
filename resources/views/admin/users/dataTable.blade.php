<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<table class="table table-hover table-sm tabel-border">
    <thead>
        <tr>
            <th>Users Name</th>
            <th>Users Email</th>
            <th>Roles</th>
            <th>Create Date</th>
            @canany(['user-edit','user-delete'])
            <th>Action</th>
            @endcanany
        </tr>
    </thead>
    <tbody>
        @foreach($data as $key => $row)
        <tr>
            <td>{{ $row->name }}</td>
            <td>{{ $row->email }}</td>
            <td>{{ trim($row->roles->pluck('name'),'[""]') }}</td>
            <td>{{ $row->created_at->format('j F, Y') }}</td>
            @canany(['user-edit','user-delete'])
            <td>
                <div class="btn-group">
                    @can('user-edit')
                    <button type="button" class="btn btn-primary btn-sm" onclick='getUsersDetails("<?= $row->id ?>")'>
                        <i class="fas fa-edit"></i>
                    </button>
                    @endcan

                    @can('user-delete')
                    <button type="button" class="btn btn-danger btn-sm" onclick='deleteUsersData("<?= $row->id ?>")'>
                        <i class="far fa-trash-alt"></i>
                    </button>
                    @endcan
                </div>
            </td>
            @endcanany
        </tr>
        @endforeach

    </tbody>

</table>
<hr>
<div class="row">
    <div class="col-md-3" style="margin-top:10px;">
        <p class="text-sm text-gray-700 leading-5">
            Showing
            <span class="font-medium">{{ $data->firstItem() }}</span>
            to
            <span class="font-medium">{{ $data->lastItem() }}</span>
            of
            <span class="font-medium">{{ $data->total() }}</span>
            results
        </p>

    </div>
    <div class="col-md-9">
        {{ $data->links('pagination::bootstrap-4') }}
    </div>
</div>
<input type="hidden" value="{{ $data->path()."?page=".$data->currentPage() }}" id="pageUrl">

<!-- .modal -->
<div class="modal fade" id="UsersUpdateModel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content card-primary card-outline" id="UsersData">

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<script>
    function getUsersDetails(id) {
        $.ajax({
            url: "{{ route('admin.users.edit') }}",
            data: {
                '_token': "{{ csrf_token() }}",
                'id': id
            },
            type: 'POST',
            success: function(result) {
                $("#UsersData").html(result);
                $('#UsersUpdateModel').modal('show');
            }
        });
    }


    function deleteUsersData(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('admin.users.destroy') }}",
                    data: {
                        '_token': "{{ csrf_token() }}",
                        'id': id
                    },
                    type: 'POST',
                    success: function(results) {

                        if (results.status == "success") {
                            Swal.fire(
                                'Deleted!',
                                results.message,
                                results.status
                            ).then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire(
                                'Error!',
                                results.message,
                                results.status
                            );
                        }
                    }
                });

            }
        })


    }
</script>
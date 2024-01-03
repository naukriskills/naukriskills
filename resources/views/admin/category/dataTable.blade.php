<script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<table class="table table-hover table-sm tabel-border">
    <thead>
        <tr>
            <th>Category Name</th>
            <th>Create Date</th>
            <th>Update Date</th>
            <th>Update By</th>
            @can('category-publish')
            <th>Status</th>
            @endcan
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $key => $row)
        <tr>
            <td>{{ $row->name }}</td>
            <td>{{ $row->created_at->format('j F, Y') }}</td>
            <td>{{ $row->updated_at->format('j F, Y') }}</td>
            <td>{{ \App\Models\User::getNameById($row->userid) }}</td>
            @can('category-publish')
            <td>
                <label class="switch">
                    <input onchange="update_status(this)" value="{{ $row->id }}" type="checkbox" <?php if ($row->status == 1) echo "checked"; ?>>
                    <span class="slider round"></span>
                </label>
            </td>
            @endcan
            <td>
                <div class="btn-group">
                 @can('category-edit')
                    <button type="button" class="btn btn-primary btn-sm" onclick='getCategoryDetails("<?=$row->id ?>")'>
                        <i class="fas fa-edit"></i>
                    </button>
                    @endcan
                    
                    @can('category-delete')
                    <button type="button" class="btn btn-danger btn-sm" onclick='deleteCategoryData("<?=$row->id ?>")'>
                        <i class="far fa-trash-alt"></i>
                    </button>
                    @endcan
                    </div>
            </td>
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
<div class="modal fade" id="categoryUpdateModel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content card-primary card-outline" id="categoryData">

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<script>
    function getCategoryDetails(id) {
        $.ajax({
            url: "{{ route('admin.category.edit') }}",
            data: {
                '_token': "{{ csrf_token() }}",
                'id': id
            },
            type: 'POST',
            success: function(result) {
                $("#categoryData").html(result);
                $('#categoryUpdateModel').modal('show');
            }
        });
    }


    function deleteCategoryData(id) {
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
                    url: "{{ route('admin.category.destroy') }}",
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

    function update_status(el) {
        if (el.checked) {
            var status = 1;
        } else {
            var status = 0;
        }
        $.ajax({
            url: "{{ route('admin.category.status') }}",
            data: {
                '_token': "{{ csrf_token() }}",
                'id': el.value,
                'status': status
            },
            type: 'POST',
            success: function(results) {
                if (results.status == "success") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: "Category Status Successfully Changed !."
                    });
                } else {
                    Swal.fire({
                        icon: 'danger',
                        title: 'Danger!',
                        text: "Category Status Not Changed !."
                    });
                }
            }
        });
    }
</script>
@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Manage Users</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">Manage Users</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- /.row -->

      <div class="row">

        <div class="col-12">
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
          @if(Session('status'))
          <script>
            Swal.fire({
              icon: '<?= Session('status') ?>',
              title: '<?= Session('status') ?>',
              text: '<?= Session('message') ?>',
            })
          </script>
          @endif
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Manage Users</h3>

              <div class="row card-tools">
                <div class="col-md-6 input-group input-group-sm">
                  <input type="text" name="search" id="search" class="form-control float-right" placeholder="Search" onkeyup="search_func(this.value);">
                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default" style="height: 31px;">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
                <div class="col-md-6">
                  @can('user-create')
                  <button class="btn btn-primary add-btn" data-toggle="modal" data-target="#addModel">Add Users</button>
                  @endcan
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive" id="tag_container">
              @include('admin.users.dataTable')
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
    </div>
  </section>
</div>


<!-- .modal -->
<div class="modal fade" id="addModel">
  <div class="modal-dialog modal-default">
    <div class="modal-content card-primary card-outline">
      <div class="modal-header">
        <h4 class="modal-title">Add New Users</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('admin.users.store') }}" method="POST">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="location">Assign Role</label>
              <select type="text" class="form-control" name="role">
                @foreach($roles as $role)
                <option value="{{ $role->name }}">{{ $role->name }}</option>
                @endforeach

              </select>
            </div>
            <div class="form-group">
              <label for="code">Name</label>
              <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
              @error('name')
              <div class="error-text">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="code">Username</label>
              <input type="text" class="form-control" name="username" value="{{ old('username') }}" required>
              @error('username')
              <div class="error-text">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="name">Users Email</label>
              <input type="email" class="form-control" name="email" value="{{ old('email') }}">
              @error('email')
              <div class="error-text">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password" placeholder="Enter Password">
              @error('password')
              <div class="error-text">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Add Records</button>
          </div>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<script type="text/javascript">
  $(document).ready(function() {
    $(document).on('click', '.pagination a', function(event) {
      event.preventDefault();
      $('li').removeClass('active');
      $(this).parent('li').addClass('active');

      var myurl = $(this).attr('href');
      // var page=$(this).attr('href').split('page=')[1];
      getData(myurl);
    });

  });

  function getData(url) {
    var value = document.getElementById("search").value;
    $.ajax({
      url: url,
      type: 'GET',
      data: {
        'search': value
      },
      success: function(data) {
        $('#tag_container').html(data);
      },
      error: function(err) {
        alert("No response from server");
      }
    });
  }

  function search_func(value) {
    $.ajax({
      type: "GET",
      url: "{{ route('admin.users.index') }}",
      data: {
        'search': value
      },
      success: function(data) {
        $('#tag_container').html(data);
      },
      error: function(err) {
        alert("No response from server");
      }
    });
  }
</script>
@endsection
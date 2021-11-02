@extends('Layout.App')
@section('title', 'Data Akun User')
    
@section('content')
<div class="container-fluid">
<div class="row">
<div class="col-12">
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Data Seluruh User</h3>
      <div class="card-tools">
        <a href="/manageuser/create" class="btn btn-primary btn-sm"><i class="fas fa-plus" title="Tambah Data"></i> Tambah</a>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>No</th>
            <th>Nama Pengguna</th>
            <th>Email</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($usermanage as $user)
                    <td>{{$loop->iteration}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role}}</td>
                    <td>
                      <a href="/manageuser/edit/{{ $user->id }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                      <a href="/manageuser/delete/{{ $user->id}}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Hapus</a>
                    </td>
                </tr>
            </div>
          @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>No</th>
            <th>Nama Pengguna</th>
            <th>Email</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
</div>
</div>
</div>
@include('sweetalert::alert')
@endsection

@section('javascript')
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endsection

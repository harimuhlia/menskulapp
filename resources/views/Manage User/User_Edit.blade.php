@extends('Layout.App')
@section('title', 'Edit Data Pengguna')
    
@section('content')
<div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Form Untuk Edit Pengguna</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
            <div class="card-body">
              <form action="/manageuser/update/{{ $usermanage->id }}" method="POST">
                @method("PUT")
                @csrf
              <div class="form-group">
                <label for="name">Nama Pembina</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $usermanage->name }}" required autocomplete="name" placeholder="Nama Lengkap" autofocus>
                @error('name')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $usermanage->email }}" required autocomplete="email" placeholder="Alamat Email" autofocus>
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password" placeholder="Password">
              </div>
              <div class="form-group">
                <label for="role">Role User</label>
                <select class="form-control" id="role" name="role">
                  <option value="Administrator"{{ $usermanage->role == "Administrator" ? 'selected' : "" }}>Administrator</option>
                  <option value="Pembina"{{ $usermanage->role == "Pembina" ? 'selected' : "" }}>Pembina</option>
                </select>
              </div>
              </div>
            <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Submit</button>
                <a href="/manageuser" class="btn btn-success btn-sm"><i class="fas fa-undo" title="Kembali"></i> Kembali</a>
              </div>
            </form>
        </div>
        <!-- /.card -->
@endsection
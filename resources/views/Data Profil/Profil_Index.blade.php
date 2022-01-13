@extends('Layout.App')
@section('title', 'Profil Pengguna')
    
@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-rounded" style="width: 200px"
                     src="{{ asset('fotoprofil/'. $user->foto_profil) }}"
                     alt="User profile picture">
              </div>

              <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

              <p class="text-muted text-center">{{ Auth::user()->role }}</p>

              {{-- <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Email</b> <a class="float-right">{{ Auth::user()->email }}</a>
                </li>
                <li class="list-group-item">
                  <b>Alamat</b> <a class="float-right">{{ Auth::user()->alamat }}</a>
                </li>
              </ul> --}}

              {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-8">
          <div class="card">
            <div class="card-header card-primary card-outline p-2">
                  <form class="form-horizontal">
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-3 col-form-label">Name Lengkap</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" disabled value="{{ Auth::user()->name }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control" disabled value="{{ Auth::user()->email }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName2" class="col-sm-3 col-form-label">Role User</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" disabled value="{{ Auth::user()->role }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName2" class="col-sm-3 col-form-label">Pembina Ekskul</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" disabled value="{{ Auth::user()->jbtn_pelatih }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputExperience" class="col-sm-3 col-form-label">Alamat</label>
                      <div class="col-sm-9">
                        <textarea class="form-control" id="inputExperience" disabled placeholder="Experience">{{ Auth::user()->alamat }}</textarea>
                      </div>
                    </div>
                    <div class="card-footer">
                      <a href="{{ route('user.profile.edit', Auth::user()->id) }}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Edit Profil</a>
                    </div>
                  </form>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
@include('sweetalert::alert')
@endsection
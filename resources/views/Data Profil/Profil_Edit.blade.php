@extends('Layout.App')
@section('title', 'Profil Pengguna')
    
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-primary card-outline p-2">
              <form method="POST" enctype="multipart/form-data" action="{{ route('user.profile.update', $user->id )}}">
                @method("put")
                @csrf
                  <form class="form-horizontal">
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-3 col-form-label">Name Lengkap</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $user->name}}" required autocomplete="name">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="Email" class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $user->email}}" required autocomplete="name">
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    {{-- <div class="form-group row">
                      <label for="Password" class="col-sm-3 col-form-label">Password</label>
                      <div class="col-sm-9">
                        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                          <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                          </symbol>
                        </svg>
                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                          <div>
                            Jangan Ganti Password Jika Tidak Ingin Merubahnya/ Hubungi Administrator
                          </div>
                        </div>
                        <input name="password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" value="{{ $user->password }}" placeholder="Masukkan password">
                        @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div> --}}
                    <div class="form-group row">
                      <label for="Ekskul" class="col-sm-3 col-form-label">Pembina Ekskul</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control @error('ekskul') is-invalid @enderror" id="ekskul" name="ekskul" value="{{ $user->jbtn_pelatih }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="Alamat" class="col-sm-3 col-form-label">Alamat</label>
                      <div class="col-sm-9">
                        <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" placeholder="Masukan Alamat">{{ $user->alamat }}</textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName2" class="col-sm-3 col-form-label">Photo Profil</label>
                      <div class="col-sm-9">
                        <img class="profile-user-img img-fluid img-rounded" style="width: 200px"
                     src="{{ asset('fotoprofil/'. $user->foto_profil) }}"
                     alt="User profile picture">
                     <br>
                     <br>
                        <input type="file" class="form-control" name="foto_profil" >
                      </div>
                    </div>
                    <div class="card-footer">
                      <button type="submit"class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Update Profil</a></button>
                    </div>
                    </form>
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
@endsection
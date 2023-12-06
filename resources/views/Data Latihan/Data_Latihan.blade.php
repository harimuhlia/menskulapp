@extends('Layout.App')
@section('title', 'Data Latihan')
    
@section('content')
<div class="container-fluid">
<div class="row">
<div class="col-12">
<div class="card">
  @error('kode_ekskul')
  <div class="alert alert-danger">{{ $message }}</div>
  @enderror

  @error('nama_ekskul')
  <div class="alert alert-danger">{{ $message }}</div>
  @enderror
    <div class="card-header">
      <h3 class="card-title">Seluruh Kegiatan Latihan</h3>
      <div class="card-tools">
        <a href="laporan/index" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i> Laporan</a>
        <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus" title="Tambah Data"></i> Tambah Data</a>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>No</th>
          <th>Nama Ekskul</th>
          <th>Tempat Latihan</th>
          <th>Materi Latihan</th>
          <th>Pembimbing</th>
          {{-- <th>Foto Latihan</th> --}}
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($dtlatihan as $dt_latihan)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$dt_latihan->nama_ekskul}}</td>
            <td>{{$dt_latihan->tempat_latihan}}</td>
            <td>{{$dt_latihan->materi_latihan}}</td>
            <td>{{$dt_latihan->author->name}}</td>
            {{-- <td>
              <img src="{{ asset('fotolatihan/'.$dt_latihan->foto_latihan) }}" class="rounded" alt="" style="width: 80px">
            </td> --}}
            <td>
              <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#_detail-{{$dt_latihan->id}}"><i class="fas fa-eye"></i> Detail</a>
              <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#_edit-{{$dt_latihan->id}}"><i class="fas fa-edit"></i> Edit</a>
              <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#_hapus-{{ $dt_latihan->id}}"><i class="fas fa-trash-alt"></i> Hapus</a>
            </td>
          </tr> 
          <!-- Modal Hapus -->
                <div class="modal fade" id="_hapus-{{ $dt_latihan->id}}">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Hapus Data Latihan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form method="POST" action="{{ route('datalatihan.destroy', $dt_latihan->id) }}">
                          @method('DELETE')
                          @csrf
                          <div class="card-body">
                            <h5>Apakah Anda Yakin Akan Mengahapus Data <strong>{{ $dt_latihan->nama_ekskul }}</strong> ?</h5>
                          </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-success btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Hapus</button>
                        </form>
                      </div>
                    </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->

          <!-- Modal Edit -->
              </div>
              <div class="modal fade" id="_edit-{{ $dt_latihan->id}}">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Edit Data Latihan</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" enctype="multipart/form-data" action="{{ route('datalatihan.update', $dt_latihan->id )}}">
                        @method("PUT")
                        @csrf
                        <div class="card-body">
                          <div class="row">
                            <div class="col-6">
                              <label for="namaPembina">Nama Pembina</label>
                              <input type="text" class="form-control" required name="nama_pembina" placeholder="Masukan Nama Pembina" value="{{ old('nama_pembina', $dt_latihan->nama_pembina)}}">
                            </div>
                            <div class="col-6">
                              <label for="namaEkskul">Nama Ekskul</label>
                              <input type="text" class="form-control" required name="nama_ekskul" placeholder="Masukan Nama Ekskul" value="{{ old('nama_ekskul', $dt_latihan->nama_ekskul)}}">
                            </div>
                            <div class="col-6">
                              <label for="hariLatihan">Hari Latihan</label>
                              <input type="text" class="form-control" name="hari_latihan" placeholder="Masukan Hari Latihan" value="{{ old('hari_latihan', $dt_latihan->hari_latihan)}}">
                            </div>
                            <div class="col-6">
                              <label for="tanggalLatihan">Tanggal Latihan</label>
                              <input type="date" class="form-control" name="tgl_latihan" placeholder="Tanggal Latihan" value="{{ old('tgl_latihan', $dt_latihan->tgl_latihan)}}">
                            </div>
                            <div class="col-6">
                              <label for="jamMulai">Jam Mulai</label>
                              <input type="time" class="form-control" name="jam_mulai" placeholder="Jam Mulai Latihan" value="{{ old('jam_mulai', $dt_latihan->jam_mulai)}}">
                            </div>
                            <div class="col-6">
                              <label for="jamSelesai">Jam Selesai</label>
                              <input type="time" class="form-control" name="jam_selesai" placeholder="Jam Selesai Latihan" value="{{ old('jam_selesai', $dt_latihan->jam_selesai)}}">
                            </div>
                            <div class="col-6">
                              <label for="tempatLatihan">Tempat Latihan</label>
                              <input type="text" class="form-control" name="tempat_latihan" placeholder="Masukan Tempat Latihan" value="{{ old('tempat_latihan', $dt_latihan->tempat_latihan)}}">
                            </div>
                            <div class="col-6">
                            <label for="materiLatihan">Materi Latihan</label>
                            <input type="text" class="form-control" name="materi_latihan" placeholder="Masukan Materi Latihan" value="{{ old('materi_latihan', $dt_latihan->materi_latihan)}}">
                          </div>
                          <div class="col-6">
                            <label for="pesertaPerempuan">Peserta Perempuan</label>
                            <input type="text" class="form-control" name="jml_perempuan" placeholder="Peserta Latihan Perempuan" value="{{ old('jml_perempuan', $dt_latihan->jml_perempuan)}}">
                          </div>
                          <div class="col-6">
                            <label for="pesertaPria">Peserta Laki-Laki</label>
                            <input type="text" class="form-control" name="jml_pria" placeholder="Peserta Latihan Laki-Laki" value="{{ old('jml_pria', $dt_latihan->jml_pria)}}">
                          </div>
                            <div class="col-12">
                              <label for="fotoLatihan">Foto Latihan</label>
                              <input type="file" class="form-control" name="foto_latihan" accept="image/*" id="foto_latihan" value="{{ old('foto_latihan', $dt_latihan->foto_latihan)}}">
                              <span id="error-message" style="color: red;"></span>
                            </div>
                          </div>
                        </div>
                      </div>
                  <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                  <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                      </form>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->

            <!-- Modal Detail -->
                </div>
                <div class="modal fade" id="_detail-{{ $dt_latihan->id}}">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Detail Data Latihan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form method="POST" action="{{route('datalatihan.show', $dt_latihan->id)}}">
                          @method("GET")
                          @csrf
                          <div class="card-body">
                            <dl class="row">
                              <dt class="col-sm-4">Nama Pembina  </dt>
                              <dd class="col-sm-8">{{$dt_latihan->nama_pembina}}</dd>
                              <dt class="col-sm-4">Nama Ekskul  </dt>
                              <dd class="col-sm-8">{{$dt_latihan->nama_ekskul}}</dd>
                              <dt class="col-sm-4">Waktu Latihan  </dt>
                              <dd class="col-sm-8">{{$dt_latihan->hari_latihan}}</dd>
                              <dt class="col-sm-4">Tanggal Latihan  </dt>
                              <dd class="col-sm-8">{{$dt_latihan->tgl_latihan}}</dd>
                              <dt class="col-sm-4">Jam Mulai Latihan  </dt>
                              <dd class="col-sm-8">{{$dt_latihan->jam_mulai}}</dd>
                              <dt class="col-sm-4">Jam Selesai Latihan  </dt>
                              <dd class="col-sm-8">{{$dt_latihan->jam_selesai}}</dd>
                              <dt class="col-sm-4">Tempat Latihan  </dt>
                              <dd class="col-sm-8">{{$dt_latihan->tempat_latihan}}</dd>
                              <dt class="col-sm-4">Materi Latihan  </dt>
                              <dd class="col-sm-8">{{$dt_latihan->materi_latihan}}</dd>
                              <dt class="col-sm-4">Peserta Latihan Laki-Laki  </dt>
                              <dd class="col-sm-8">{{$dt_latihan->jml_pria}}</dd>
                              <dt class="col-sm-4">Peserta Latihan Perempuan </dt>
                              <dd class="col-sm-8">{{$dt_latihan->jml_perempuan}}</dd>
                              <dt class="col-sm-4">Foto Lomba  </dt>
                              <dd class="col-sm-8"><img src="{{ asset('fotolatihan/'.$dt_latihan->foto_latihan) }}" class="rounded" alt="" style="width: 100%"></dd>
                          </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                        <a href="#" class="btn btn-secondary btn-sm"><i class="fas fa-print"></i> Print</a>
                        </form>
                      </div>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
          @endforeach
        </tbody>
        <tfoot>
        <tr>
          <th>No</th>
          <th>Nama Ekskul</th>
          <th>Tempat Latihan</th>
          <th>Materi Latihan</th>
          <th>Pembimbing</th>
          {{-- <th>Foto Latihan</th> --}}
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
{{-- Awal Popup Modal --}}
<!-- Modal Tambah -->
<div class="modal fade" id="modal-default">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Data Latihan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" enctype="multipart/form-data" action="{{ action('App\Http\Controllers\DatalatihanController@store')}}">
          @csrf
              <div class="card-body">
                <div class="row">
                  <div class="col-6">
                    <label for="namaPembina">Nama Pembina</label>
                    <input type="text" class="form-control" readonly required name="nama_pembina" value="{{ old('nama_pembina', Auth::user()->name) }}">
                    {{-- <input type="text" class="form-control" required name="nama_pembina" placeholder="Masukan Nama Pembina"> --}}
                  </div>
                  <div class="col-6">
                    <label for="namaEkskul">Nama Ekskul</label>
                    {{-- <input type="text" class="form-control" required name="nama_ekskul" placeholder="Masukan Nama Ekskul"> --}}
                    <select name="nama_ekskul" id="" class="form-control" required>
                      <option value="">-- Pilih Ekskul -- </option>
                      @foreach ($dtekskul as $item)
                        <option value="{{ $item->nama_ekskul }}">{{ $item->nama_ekskul }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-6">
                    <label for="hariLatihan">Hari Latihan</label>
                    <input type="text" class="form-control" name="hari_latihan" placeholder="Masukan Hari Latihan">
                  </div>
                  <div class="col-6">
                    <label for="tanggalLatihan">Tanggal Latihan</label>
                    <input type="date" class="form-control" name="tgl_latihan" placeholder="Tanggal Latihan">
                  </div>
                  <div class="col-6">
                    <label for="jamMulai">Jam Mulai</label>
                    <input type="time" class="form-control" name="jam_mulai" placeholder="Jam Mulai Latihan">
                  </div>
                  <div class="col-6">
                    <label for="jamSelesai">Jam Selesai</label>
                    <input type="time" class="form-control" name="jam_selesai" placeholder="Jam Selesai Latihan">
                  </div>
                  <div class="col-6">
                    <label for="tempatLatihan">Tempat Latihan</label>
                    <input type="text" class="form-control" name="tempat_latihan" placeholder="Masukan Tempat Latihan">
                  </div>
                  <div class="col-6">
                  <label for="materiLatihan">Materi Latihan</label>
                  <input type="text" class="form-control" name="materi_latihan" placeholder="Masukan Materi Latihan">
                </div>
                <div class="col-6">
                  <label for="pesertaPerempuan">Peserta Perempuan</label>
                  <input type="text" class="form-control" name="jml_perempuan" placeholder="Peserta Latihan Perempuan">
                </div>
                <div class="col-6">
                  <label for="pesertaPria">Peserta Laki-Laki</label>
                  <input type="text" class="form-control" name="jml_pria" placeholder="Peserta Latihan Laki-Laki">
                </div>
                  <div class="col-12">
                    <label for="fotoLatihan">Foto Latihan</label>
                    <input type="file" class="form-control" name="foto_latihan">
                  </div>
                </div>
              </div>
            </div>
        <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
{{-- Akhir Popup Modal --}}
  @include('sweetalert::alert')
  @endsection

  @section('javascript')
  <script>
    $(function() {
      var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
  </script>
<!-- page script -->

// Script untuk batasan upload foto latihan 
<script>
document.getElementById('foto_latihan').addEventListener('change', function() {
  const fileInput = this;
  const errorMessage = document.getElementById('error-message');
  
  if (fileInput.files.length === 0) {
    errorMessage.textContent = '';
    return;
  }

  const file = fileInput.files[0];
  const fileSize = file.size / 1024; // Convert to KB

  if (!file.type.startsWith('image/') || fileSize > 1024) {
    fileInput.value = ''; // Clear the file input
    errorMessage.textContent = 'Hanya gambar dengan ukuran maksimal 1 MB yang diizinkan.';
  } else {
    errorMessage.textContent = '';
  }
});
</script>

// Script untuk Data Table
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
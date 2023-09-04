@extends('Layout.App')
@section('title', 'Data Seluruh Event')

@section('content')
            <!-- /.row -->
            <div class="row">
              <div class="col-12">
                <div class="card">
                  @error('status_kegiatan')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                
                  @error('nama_kegiatan')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="card-header">
                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_tambah"><i class="fas fa-plus" title="Tambah Data"></i> Tambah Data</a>
                    <a href="{{ route('exportevent') }}" class="btn btn-success btn-sm"><i class="fas fa-plus" title="Download Data"></i> Download Excel</a>
                    <div class="card-tools">
                      <div class="input-group input-group-sm" style="width: 250px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
    
                        <div class="input-group-append">
                          <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                      <thead>
                        <tr>
                          <th>No</th>
                          {{-- <th>Status Event</th> --}}
                          <th>Nama Event</th>
                          {{-- <th>Jenis Lomba</th> --}}
                          <th>Jenis Lomba</th>
                          <th>Penyelenggara</th>
                          <th>Waktu Event</th>
                          <th>Nama Pembimbing</th>
                          {{-- <th>Foto Lomba</th> --}}
                          {{-- <th>Tempat Lomba</th> --}}
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                        @foreach ($dtevent as $event)
                          <td>{{ $loop->iteration }}</td>
                          {{-- <td>{{ $event->status_kegiatan }}</td> --}}
                          <td>{{ $event->nama_kegiatan }}</td>
                          {{-- <td>{{ $event->jenis_lomba }}</td> --}}
                          <td>{{ $event->cabang_lomba}}</td>
                          <td>{{ $event->penyelenggara_kegiatan }}</td>
                          <td>{{ $event->tanggal_mulai_kegiatan }} - {{ $event->tanggal_akhir_kegiatan }}</td>
                          <td>{{ $event->nama_pembimbing }}</td>
                          {{-- <td>
                            <img src="{{ asset('fotoevent/'.$event->foto_kegiatan) }}" alt="" style="width: 100%">
                          </td> --}}
                          {{-- <td>{{ $event->tempat_kegiatan }}</td> --}}
                          <td>
                            <a href="#" class="badge badge-success" data-toggle="modal" data-target="#_detail-{{$event->id}}"><i class="fas fa-eye"></i></a>
                            <a href="#" class="badge badge-warning" data-toggle="modal" data-target="#_edit-{{$event->id}}"><i class="fas fa-edit"></i></a>
                            <a href="#" class="badge badge-danger" data-toggle="modal" data-target="#_hapus-{{$event->id}}"><i class="fas fa-trash-alt"></i></a>
                          </td>
                        </tr>
  <!-- Modal Popup Awal -->

<!-- Modal Hapus -->
<div class="modal fade" id="_hapus-{{ $event->id}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Hapus Data Event</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('dataevent.destroy', $event->id) }}">
          @method('DELETE')
          @csrf
          <div class="card-body">
            <h5>Apakah Anda Yakin Akan Mengahapus Data <strong>{{ $event->nama_kegiatan }}</strong>?</h5>
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
<div class="modal fade" id="_edit-{{ $event->id}}">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Data Event</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" enctype="multipart/form-data" action="{{ route('dataevent.update', $event->id )}}">
          @method("PUT")
          @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-6">
                <label for="statusLomba">Status Lomba</label>
                <input type="text" class="form-control" name="status_kegiatan" placeholder="Misal: Juara 1" value="{{ old('status_kegiatan', $event->status_kegiatan)}}">
              </div>
              <div class="col-6">
                <label for="namaLomba">Nama Lomba</label>
                <input type="text" class="form-control" name="nama_kegiatan" placeholder="Masukan Nama Lomba" value="{{ old('nama_kegiatan', $event->nama_kegiatan)}}">
              </div>
              <div class="col-6">
                <label for="mulaiEvent">Waktu Mulai Event</label>
                <input type="date" class="form-control" name="tanggal_mulai_kegiatan" placeholder="Waktu Mulai Kegiatan" value="{{ old('tanggal_mulai_kegiatan', $event->tanggal_mulai_kegiatan)}}">
              </div>
              <div class="col-6">
                <label for="akhirEvent">Waktu Berakhir Event</label>
                <input type="date" class="form-control" name="tanggal_akhir_kegiatan" placeholder="Waktu Berakhir Kegiatan" value="{{ old('tanggal_akhir_kegiatan', $event->tanggal_akhir_kegiatan)}}">
              </div>
              <div class="col-6">
                <label for="namaPembimbing">Nama Pembimbing</label>
                <input type="text" class="form-control" name="nama_pembimbing" placeholder="Nama Pembimbing" value="{{ old('nama_pembimbing', $event->nama_pembimbing)}}">
              </div>
              <div class="col-6">
                <label for="jenisLomba">Jenis Lomba</label>
                <input type="text" class="form-control" name="jenis_lomba" placeholder="Jenis Lomba" value="{{ old('jenis_lomba', $event->jenis_lomba)}}">
              </div>
              <div class="col-6">
                <label for="cabangLomba">Cabang Lomba</label>
                <input type="text" class="form-control" name="cabang_lomba" placeholder="Cabang Lomba" value="{{ old('cabang_lomba', $event->cabang_lomba)}}">
              </div>
              <div class="col-6">
              <label for="penyelenggaraLomba">Penyelenggara Lomba</label>
              <input type="text" class="form-control" name="penyelenggara_kegiatan" placeholder="Penyelenggara Lomba" value="{{ old('penyelenggara_kegiatan', $event->penyelenggara_kegiatan)}}">
            </div>
              <div class="col-12">
                <label for="fotoLomba">Foto Kegiatan Lomba</label>
                <input type="file" class="form-control" name="foto_kegiatan" accept="image/*" id="foto_kegiatan" value="{{ old('foto_kegiatan', $event->foto_kegiatan)}}">
                  <span id="error-message" style="color: red;"></span>
              </div>
              <div class="col-12">
                <label for="namaPeserta">Nama Peserta Lomba</label>
                <textarea class="textarea" rows="3" name="nama_peserta" placeholder="Nama Peserta Dan Official">{{ old('nama_peserta', $event->nama_peserta)}}</textarea>
              </div>
              <div class="col-12">
                <label for="tempatLomba">Tempat Lomba</label>
                <textarea class="form-control" rows="3" name="tempat_kegiatan" placeholder="Alamat Kegiatan">{{ old('tempat_kegiatan', $event->tempat_kegiatan)}}</textarea>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-success btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Update</button>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->

           <!-- Modal Detail -->
          </div>
          <div class="modal fade" id="_detail-{{ $event->id}}">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Detail Data Event</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="POST" action="{{route('dataevent.show', $event->id)}}">
                    @method("GET")
                    @csrf
                    <div class="card-body">
                      <dl class="row">
                        <dt class="col-sm-4">Status Event  </dt>
                        <dd class="col-sm-8">{{$event->status_kegiatan}}</dd>
                        <dt class="col-sm-4">Nama Event  </dt>
                        <dd class="col-sm-8">{{$event->nama_kegiatan}}</dd>
                        <dt class="col-sm-4">Jenis Lomba  </dt>
                        <dd class="col-sm-8">{{$event->jenis_lomba}}</dd>
                        <dt class="col-sm-4">Cabang Lomba  </dt>
                        <dd class="col-sm-8">{{$event->cabang_lomba}}</dd>
                        <dt class="col-sm-4">Penyelenggara  </dt>
                        <dd class="col-sm-8">{{$event->penyelenggara_kegiatan}}</dd>
                        <dt class="col-sm-4">Waktu Mulai Lomba  </dt>
                        <dd class="col-sm-8">{{$event->tanggal_mulai_kegiatan}}</dd>
                        <dt class="col-sm-4">Waktu Berakhir Lomba  </dt>
                        <dd class="col-sm-8">{{$event->tanggal_akhir_kegiatan}}</dd>
                        <dt class="col-sm-4">Nama Pembimbing  </dt>
                        <dd class="col-sm-8">{{$event->nama_pembimbing}}</dd>
                        <dt class="col-sm-4">Peserta Lomba  </dt>
                        <dd class="col-sm-8">{!! $event->nama_peserta !!}</dd>
                        <dt class="col-sm-4">Alamat Kegiatan/ Lomba  </dt>
                        <dd class="col-sm-8">{{$event->tempat_kegiatan}}</dd>
                        <dt class="col-sm-4">Foto Lomba  </dt>
                        <dd class="col-sm-8"><img src="{{ asset('fotoevent/'.$event->foto_kegiatan) }}" class="rounded" alt="" style="width: 100%"></dd>
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

                        <!-- Modal Popup Akhir -->
        @endforeach
      </tbody>
     </table>
     </div>
    <!-- /.card-body -->
    </div>
  </div>
 </div>
    <!-- /.row -->
                        
            {{-- Awal Popup untuk tombol tambah --}}
            <div class="modal fade" id="modal_tambah">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Event</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ action('App\Http\Controllers\DataeventController@store')}}">
                      @csrf
                          <div class="card-body">
                            <div class="row">
                              <div class="col-6">
                                <label for="statusLomba">Status Lomba</label>
                                <input type="text" class="form-control" required name="status_kegiatan" placeholder="Masukan Status, Misal: Juara 1">
                              </div>
                              <div class="col-6">
                                <label for="namaLomba">Nama Lomba</label>
                                <input type="text" class="form-control" required name="nama_kegiatan" placeholder="Masukan Nama Lomba">
                              </div>
                              <div class="col-6">
                                <label for="mulaiEvent">Waktu Mulai Event</label>
                                <input type="date" class="form-control" name="tanggal_mulai_kegiatan" placeholder="Tanggal Mulai Lomba">
                              </div>
                              <div class="col-6">
                                <label for="akhirEvent">Waktu Berakhir Event</label>
                                <input type="date" class="form-control" name="tanggal_akhir_kegiatan" placeholder="Tanggal Selesai Lomba">
                              </div>
                              <div class="col-6">
                                <label for="namaPembimbing">Nama Pembimbing</label>
                                <input type="text" class="form-control" name="nama_pembimbing" placeholder="Nama Pembimbing" readonly value="{{ old('nama_pembimbing', Auth::user()->name) }}">
                                {{-- <input type="text" class="form-control" name="nama_pembimbing" placeholder="Nama Pembimbing Lomba"> --}}
                              </div>
                              <div class="col-6">
                                <label for="jenisLomba">Jenis Lomba</label>
                                {{-- <input type="text" class="form-control" name="jenis_lomba" placeholder="Misalkan Bola Voli"> --}}
                                <select name="jenis_lomba" id="" class="form-control">
                                  <option value="">-- Pilih Lomba -- </option>
                                  @foreach ($dtekskul as $item)
                                    <option value="{{ $item->nama_ekskul }}">{{ $item->nama_ekskul }}</option>
                                  @endforeach
                                </select>
                              </div>
                              <div class="col-6">
                                <label for="cabangLomba">Cabang Lomba</label>
                                <input type="text" class="form-control" name="cabang_lomba" placeholder="Misalkan Bola Voli Putri">
                              </div>
                              <div class="col-6">
                              <label for="penyelenggaraLomba">Penyelenggara Lomba</label>
                              <input type="text" class="form-control" name="penyelenggara_kegiatan" placeholder="Yang Menyelenggarakan Lomba">
                            </div>
                              <div class="col-12">
                                <label for="fotoLomba">Foto Kegiatan Lomba</label>
                                <input type="file" class="form-control" name="foto_kegiatan">
                              </div>
                              <div class="col-12">
                                <label for="namaPeserta">Nama Peserta Lomba</label>
                                <textarea class="textarea" rows="3" name="nama_peserta" placeholder="Nama Peserta Dan Official"></textarea>
                              </div>
                              <div class="col-12">
                                <label for="tempatLomba">Alamat Lomba</label>
                                <textarea class="form-control" rows="3" name="tempat_kegiatan" placeholder="Alamat Lomba Dilaksanakan"></textarea>
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
            {{-- Akhir Popup untuk tombol tambah --}}   
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
<script>
document.getElementById('foto_kegiatan').addEventListener('change', function() {
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
@endsection

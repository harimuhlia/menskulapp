@extends('Layout.App')
@section('title', 'Data Prestasi')
    
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
      <h3 class="card-title">Data Seluruh Ekstrakurikuler</h3>
      <div class="card-tools">
        <a href="#" class="btn btn-success btn-sm"><i class="fas fa-file-excel" title="Download Excel"></i> Export Excel</a>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>No</th>
          <th>Prestasi</th>
          <th>Nama Lomba</th>
          <th>Cabang Lomba</th>
          <th>Pelaksanaan Lomba</th>
          <th>Foto Kegiatan</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($dtevent as $event)
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $event->status_kegiatan }}</td>
                  <td>{{ $event->nama_kegiatan }}</td>
                  <td>{{ $event->cabang_lomba }}</td>
                  <td>{{ $event->tanggal_mulai_kegiatan }} - {{ $event->tanggal_akhir_kegiatan }}</td>
                  <td>
                    <img src="{{ asset('fotoevent/'.$event->foto_kegiatan) }}" class="rounded" alt="" style="width: 80px;">
                  </td>
                  <td>
                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#_detail-{{$event->id}}"><i class="fas fa-eye"></i> Detail</a>
                  </td>
                </tr>
            </div>
                       <!-- Modal Detail -->
          </div>
          <div class="modal fade" id="_detail-{{ $event->id}}">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Detail Data Prestasi</h4>
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
                        <dt class="col-sm-4">Tempat Lomba  </dt>
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
          @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>No</th>
            <th>Prestasi</th>
            <th>Nama Lomba</th>
            <th>Cabang Lomba</th>
            <th>Pelaksanaan Lomba</th>
            <th>Foto Kegiatan</th>
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
@extends('Layout.App')
@section('title', 'Laporan Latihan')

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="row">
                <h3 class="card-title col">Laporan Kegiatan Latihan</h3>
                  <form action="{{ route('laporan.select') }}" method="POST">
                    {{ csrf_field() }}
                      <div class="input-group">
                          <div class="col">
                              <input type="date" class="form-control" name="tglawal">
                          </div>
                          <div class="col">
                              <input type="date" class="form-control" name="tglakhir">
                          </div>
                          <button class="btn btn-primary" type="submit">CARI</button>
                      </div>
                  </form>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              @if (count($dtlaporan)>0)
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Pembimbing</th>
                  <th>Tanggal</th>
                  <th>Waktu</th>
                  <th>Tempat</th>
                  <th>Materi</th>
                  <th>Peserta</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($dtlaporan as $dtlaporan)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$dtlaporan->author->name}}</td>
                    <td>{{$dtlaporan->tgl_latihan}}</td>
                    <td>{{$dtlaporan->jam_mulai}} - {{$dtlaporan->jam_selesai}}</td>
                    <td>{{$dtlaporan->tempat_latihan}}</td>
                    <td>{{$dtlaporan->materi_latihan}}</td>
                    <td>{{$dtlaporan->jml_perempuan}} P | {{$dtlaporan->jml_pria}} L</td>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Pembimbing</th>
                  <th>Tanggal</th>
                  <th>Waktu</th>
                  <th>Tempat</th>
                  <th>Materi</th>
                  <th>Peserta</th>
                </tr>
                </tfoot>
              </table>
              @else
                <h3 class="text-align-center">Tidak ada data yang dipilih</h3>
              @endif
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
@endsection

@section('javascript')
        <script>
          $(function () {
            $("#example1").DataTable({
              "responsive": true, "lengthChange": false, "autoWidth": false,
              "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
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


{{-- @extends('Layout.App')
@section('title', 'Laporan Latihan')
    
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
    <div class="row">
      <h3 class="card-title col">Laporan Kegiatan Latihan</h3>
        <form action="{{ route('laporan.select') }}" method="POST">
          {{ csrf_field() }}
            <div class="input-group">
                <div class="col">
                    <input type="date" class="form-control" name="tglawal">
                </div>
                <div class="col">
                    <input type="date" class="form-control" name="tglakhir">
                </div>
                <button class="btn btn-primary" type="submit">CARI</button>
                <div class="col">
                    <button class="btn btn-success" type="submit">PRINT</button>
                </div>
            </div>
        </form>
    </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      @if (count($dtlaporan)>0)
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>No</th>
          <th>Nama Ekskul</th>
          <th>Tempat Latihan</th>
          <th>Materi Latihan</th>
          <th>Pembimbing</th>
          <th>Peserta</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($dtlaporan as $dtlaporan)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$dtlaporan->tgl_latihan}}</td>
            <td>{{$dtlaporan->tempat_latihan}}</td>
            <td>{{$dtlaporan->materi_latihan}}</td>
            <td>{{$dtlaporan->author->name}}</td>
            <td>{{$dtlaporan->jml_perempuan}} P | {{$dtlaporan->jml_pria}} L</td>
          @endforeach
        </tbody>
        <tfoot>
        <tr>
          <th>No</th>
          <th>Nama Ekskul</th>
          <th>Tempat Latihan</th>
          <th>Materi Latihan</th>
          <th>Pembimbing</th>
          <th>Peserta</th>
        </tr>
        </tfoot>
      </table>
      @else
        <h3 class="text-align-center">Tidak ada data yang dipilih</h3>
      @endif
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
          $(function () {
            $("#example1").DataTable({
              "responsive": true, "lengthChange": false, "autoWidth": false,
              "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
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
@endsection --}}
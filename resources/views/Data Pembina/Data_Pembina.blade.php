@extends('Layout.App')
@section('title', 'Data Pembina Ekskul')
    
@section('content')
<div class="container-fluid">
<div class="row">
<div class="col-12">
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Data Seluruh Pembina</h3>
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
            <th>Nama Pembina</th>
            <th>Email</th>
            <th>Status</th>
            <th>Penugasan</th>
            <th>Foto Profil</th>
            <th>Alamat</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($dtpembina as $dt_pembina)
                    <td>{{$loop->iteration}}</td>
                    <td>{{$dt_pembina->name}}</td>
                    <td>{{$dt_pembina->email}}</td>
                    <td>{{$dt_pembina->role}}</td>
                    <td>{{$dt_pembina->jbtn_pelatih}}</td>
                    <td>
                        <img src="{{ asset('fotoprofil/'. $dt_pembina->foto_profil) }}" class="rounded" alt="" style="width: 80px;">
                    </td>
                    <td>{{$dt_pembina->alamat }}</td>
                    <td>
                        <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#_detail-{{$dt_pembina->id}}"><i class="fas fa-eye"></i> Detail</a>
                    </td>
                </tr>
            </div>
                       <!-- Modal Detail -->
          </div>
          <div class="modal fade" id="_detail-{{ $dt_pembina->id}}">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Detail Data Pembina</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="POST" action="{{route('datapembina.show', $dt_pembina->id)}}">
                    @method("GET")
                    @csrf
                    <div class="card-body">
                      <dl class="row">
                        <dt class="col-sm-4">Nama Pembina  </dt>
                        <dd class="col-sm-8">{{$dt_pembina->name}}</dd>
                        <dt class="col-sm-4">Email  </dt>
                        <dd class="col-sm-8">{{$dt_pembina->email}}</dd>
                        <dt class="col-sm-4">Role Akun  </dt>
                        <dd class="col-sm-8">{{$dt_pembina->role}}</dd>
                        <dt class="col-sm-4">Penugasan Pembina  </dt>
                        <dd class="col-sm-8">{{$dt_pembina->jbtn_pelatih}}</dd>
                        <dt class="col-sm-4">Alamat  </dt>
                        <dd class="col-sm-8">{{$dt_pembina->alamat}}</dd>
                        <dt class="col-sm-4">Foto Profil Pembina  </dt>
                        <dd class="col-sm-8"><img src="{{ asset('fotoprofil/'.$dt_pembina->foto_profil) }}" class="rounded" alt="" style="width: 100%"></dd>
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
            <th>Nama Pembina</th>
            <th>Email</th>
            <th>Status</th>
            <th>Penugasan</th>
            <th>Foto Profil</th>
            <th>Alamat</th>
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

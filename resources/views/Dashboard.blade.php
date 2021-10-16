@extends('Layout.App')
@section('title', 'Dashboard Utama')

@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box shadow-none">
              <span class="info-box-icon bg-info"><i class="fas fa-user-friends"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Data Pembina</span>
                <span class="info-box-number">22</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box shadow-sm">
              <span class="info-box-icon bg-success"><i class="fas fa-calendar-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Data Event</span>
                <span class="info-box-number">57</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box shadow">
              <span class="info-box-icon bg-warning"><i class="fas fa-trophy"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Data Prestasi</span>
                <span class="info-box-number">87</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box shadow-lg">
              <span class="info-box-icon bg-danger"><i class="fas fa-running"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Data Kegiatan</span>
                <span class="info-box-number">187</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <h1>Bagian Dashboard</h1>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
      
@endsection
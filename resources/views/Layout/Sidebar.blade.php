<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{ asset('adminLTE') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light"> <strong>MENSKUL</strong> APP</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('adminLTE') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Nama Kita</a>
        <span class="badge badge-success text-uppercase">Admin</span>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-header">MENU UTAMA</li>
        <li class="nav-item">
          <a href="{{ url('/dashboard') }}" class="nav-link {{ (request()->is('dashboard*')) ? 'active' : '' }}">
            <i class="fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview">        
          <a href="#" class="nav-link {{ (request()->is('dataekskul')) ? 'active' : '' }}">
            <i class="fas fa-server"></i>
            <p>
              Data Master
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
        
          <ul class="nav nav-treeview">
            
            <li class="nav-item">
              <a href="{{ route('dataekskul.index')}}" class="nav-link {{ (request()->is('dataekskul*')) ? 'active' : '' }}">
                <i class="fas fa-angle-right"></i>
                <p>Data Ekskul</p>
              </a>
            </li>
          
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-angle-right"></i>
                <p>Data Pembina</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="{{ route('dataevent.index')}}" class="nav-link {{ (request()->is('dataevent*')) ? 'active' : '' }}">
            <i class="fas fa-calendar-alt"></i>
            <p>Data Event</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('dataprestasi.index') }}" class="nav-link {{ (request()->is('dataprestasi*')) ? 'active' : '' }}">
            <i class="fas fa-trophy"></i>
            <p>Data Prestasi</p>
          </a>
        </li>
        <li class="nav-item has-treeview">        
          <a href="#" class="nav-link">
            <i class="fas fa-running"></i>
            <p>
              Kegiatan Latihan
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
        
          <ul class="nav nav-treeview">
            
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-angle-right"></i>
                <p>Data Latihan</p>
              </a>
            </li>
          
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-angle-right"></i>
                <p>Laporan Latihan</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-header">PENGATURAN</li>
        <li class="nav-item">
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-users-cog"></i>
              <p>Manage User</p>
            </a>
            </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-user-friends"></i>
              <p>Profil Saya</p>
            </a>
            </li>
          <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fas fa-cogs"></i>
            <p>Setting Aplikasi</p>
          </a>
        </li>
        <br>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

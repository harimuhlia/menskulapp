<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="/home" class="brand-link">
    <img src="{{ asset('adminLTE') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light"> <strong>MENSKUL</strong> APP</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('fotoprofil/'. Auth()->user()->foto_profil) }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="{{ route('user.profile', Auth::user()->id) }}" class="d-block">{{ Auth()->user()->name }}</a>
        <span class="badge badge-success">{{ Auth()->user()->role }}</span>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-header">MENU UTAMA</li>
        <li class="nav-item">
          <a href="{{ url('/home') }}" class="nav-link {{ (request()->is('home*')) ? 'active' : '' }}">
            <i class="fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview"> 
          @if (Auth()->user()->role == 'Administrator')       
          <a href="#" class="nav-link {{ (request()->is('dataekskul*', 'datapembina*')) ? 'active' : '' }}">
            <i class="fas fa-server"></i>
            <p>
              Data Master
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
        @endif
          <ul class="nav nav-treeview">
            
            <li class="nav-item">
              <a href="{{ route('dataekskul.index')}}" class="nav-link {{ (request()->is('dataekskul*')) ? 'active' : '' }}">
                <i class="fas fa-angle-right"></i>
                <p>Data Ekskul</p>
              </a>
            </li>
          
            <li class="nav-item">
              <a href="{{ route('datapembina.index')}}" class="nav-link {{ (request()->is('datapembina*')) ? 'active' : '' }}">
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
          <a href="#" class="nav-link {{ (request()->is('datalatihan*')) ? 'active' : '' }}">
            <i class="fas fa-running"></i>
            <p>
              Kegiatan Latihan
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
        
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('datalatihan.index') }}" class="nav-link {{ (request()->is('datalatihan*', 'laporan*')) ? 'active' : '' }}">
                <i class="fas fa-angle-right"></i>
                <p>Data Latihan</p>
              </a>
            </li>
          
            <li class="nav-item">
              <a href="{{ route('laporan.index') }}" class="nav-link">
                <i class="fas fa-angle-right"></i>
                <p>Laporan Latihan</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-header">PENGATURAN</li>
        <li class="nav-item">
          @if (Auth()->user()->role == 'Administrator')
          <li class="nav-item">
            <a href="/manageuser" class="nav-link {{ (request()->is('profil*')) ? 'active' : '' }}">
              <i class="fas fa-users-cog"></i>
              <p>Manage User</p>
            </a>
            </li>
            @endif
          <li class="nav-item">
            <a href="{{ route('user.profile', Auth::user()->id) }}" class="nav-link {{ (request()->is('user*')) ? 'active' : '' }}">
              <i class="fas fa-user-friends"></i>
              <p>Profil Saya</p>
            </a>
            </li>
          @if (Auth()->user()->role == 'Administrator')
          <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fas fa-cogs"></i>
            <p>Setting Aplikasi</p>
          </a>
        </li>
        @endif
        <li class="nav-item">
          <form id="logout-form" action="{{ route('logout') }}" method="POST" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();" class="nav-link">
          <button type="button" class="btn btn-danger btn-sm" id="logout-form"><i class="fas fa-sign-out-alt"></i> Logout</button>
          {{ csrf_field() }}
          </form>
        </li>
        </li>
        <br>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

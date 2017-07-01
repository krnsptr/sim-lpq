<header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SIM</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SIM LPQ</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="{{ asset('img/default.png') }}" class="user-image" alt="User Image">
                <span class="hidden-xs">Administrasi</span>
              </a>
              <ul class="dropdown-menu">
                <li class="user-header">
                  <img src="{{ asset('img/default.png') }}" class="img-circle" alt="User Image">

                  <p>
                    Administrasi
                    <small>administrasi</small>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-right">
                    <a href="{{ route('logout') }}"
                        class="btn btn-default btn-flat"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                  </div>
                </li>
              </ul>
            </li>
        </ul>
      </div>
    </nav>
  </header>


  <!-- =============================================== -->
  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('img/default.png') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Administrasi</p>
          administrasi
        </div>
      </div>
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li><a href="{{url('admin/dasbor')}}"><span>Dasbor</span></a></li>
        <li><a href="{{url('admin/anggota')}}"><span>Anggota</span></a></li>
        <li><a href="{{url('admin/santri')}}"><span>Santri</span></a></li>
        <li><a href="{{url('admin/pengajar')}}"><span>Pengajar</span></a></li>
        <li><a href="{{url('admin/kelompok')}}"><span>Kelompok</span></a></li>

        <li><a href="{{url('admin/download')}}"><span>Download</span></a></li>
      </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>


<!-- =============================================== -->

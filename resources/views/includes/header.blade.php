    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="{{ url('') }}" class="navbar-brand"><b>SIM LPQ</b></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li<?php //if(uri_string() == 'daftar') echo ' class="active"'; ?>><a href="#">Daftar</a>
            <li<?php //if(uri_string() == 'daftar') echo ' class="active"'; ?>><a href="#">Dasbor</a>
            <li<?php //if(uri_string() == 'daftar') echo ' class="active"'; ?>><a href="#">Penjadwalan</a>
            <li<?php //if(uri_string() == 'daftar') echo ' class="active"'; ?>><a href="#">Kelompok</a>
            <li<?php //if(uri_string() == 'daftar') echo ' class="active"'; ?>><a href="#">SPP</a>
            <li<?php //if(uri_string() == 'daftar') echo ' class="active"'; ?>><a href="#">Jadwal KBM</a>
            </li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
    </nav>

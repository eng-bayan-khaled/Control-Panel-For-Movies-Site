 <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-secondary">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('/control') }}" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- User Dropdown Menu -->
      <li class="nav-item dropdown user-menu">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
            <i class="fas fa-user-shield"></i> <span> &nbsp; </span>

            <span class="d-none d-md-inline">Administrator</span>
          </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header bg-primary">
            <img src="{{ url('/') }}/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">

            <p>
              Administrator - Web Developer
              <small>Member since Nov. 2012</small>
            </p>
          </li>
          <!-- Menu Footer-->
          <li class="user-footer">
            <a href="#" class="btn btn-default btn-flat">Profile</a>
            <a href="{{ route('control.logout') }}" class="btn btn-default btn-flat float-right">Sign out</a>
          </li>
        </ul>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" data-toggle="dropdown" href="#" role="dialog">
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

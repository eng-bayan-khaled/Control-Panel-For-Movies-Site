<body class="sidebar-mini layout-fixed sidebar-collapse text-sm">
<div class="wrapper">
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">@yield('title')</h1>
          </div><!-- /.col -->
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-left">
              @php
                $path = URL::current();
                $bar = explode("/", $path);

                if (isset($bar[3])) {
                    echo '<li class="breadcrumb-item"><a href="#">' . ucfirst($bar[3]) . '</a></li>';
                }
                if (isset($bar[4])) {
                    echo '<li class="breadcrumb-item active">' . ucfirst($bar[4]) . '</li>';
                }
                if (isset($bar[5])) {
                    echo '<li class="breadcrumb-item active">' . ucfirst($bar[5]) . '</li>';
                }
              @endphp
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        @yield('content')
        <!-- /.row -->
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
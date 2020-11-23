 <footer class="main-footer">
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.5
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ url('/') }}/AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ url('/') }}/AdminLTE/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)

  let path = window.location.pathname;
  if (path.search("actors") > 0 ){
    $('li a').removeClass("active");
    $('#Actors').addClass("active");
  }
  if (path.search("articles") > 0 ){
    $('li a').removeClass("active");
    $('#Articles').addClass("active");
  }
  if (path.search("categories") > 0 ){
    $('li a').removeClass("active");
    $('#Categories').addClass("active");
  }
  if (path.search("comments") > 0 ){
    $('li a').removeClass("active");
    $('#Comments').addClass("active");
  }
  if (path.search("episodes") > 0 ){
    $('li a').removeClass("active");
    $('#Episodes').addClass("active");
  }
  if (path.search("genres") > 0 ){
    $('li a').removeClass("active");
    $('#Genres').addClass("active");
  }
  if (path.search("keywords") > 0 ){
    $('li a').removeClass("active");
    $('#Keywords').addClass("active");
  }
  if (path.search("likes") > 0 ){
    $('li a').removeClass("active");
    $('#Likes').addClass("active");
  }
  if (path.search("movies") > 0 ){
    $('li a').removeClass("active");
    $('#Movies').addClass("active");
  }
  if (path.search("reviews") > 0 ){
    $('li a').removeClass("active");
    $('#Reviews').addClass("active");
  }
  if (path.search("seasons") > 0 ){
    $('li a').removeClass("active");
    $('#Seasons').addClass("active");
  }
  if (path.search("series") > 0 ){
    $('li a').removeClass("active");
    $('#Series').addClass("active");
  }
  if (path.search("tags") > 0 ){
    $('li a').removeClass("active");
    $('#Tags').addClass("active");
  }
  if (path.search("users") > 0 ){
    $('li a').removeClass("active");
    $('#Users').addClass("active");
  }
  if (path.search("admins") > 0 ){
    $('li a').removeClass("active");
    $('#Admins').addClass("active");
  }

  
</script>
<!-- Bootstrap 4 -->
<script src="{{ url('/') }}/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ url('/') }}/AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<!-- AdminLTE App -->
<script src="{{ url('/') }}/AdminLTE/dist/js/adminlte.js"></script>
@stack('js')
</body>
</html>

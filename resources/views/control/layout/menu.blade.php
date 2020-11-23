 <!-- Main Sidebar Container -->

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link navbar-secondary">
      <img src="{{ url('/') }}/AdminLTE/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><b>Movie</b>Site</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ url('/') }}/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Administrator</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ url('control') }}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          @php
              $elements = array( 
                "/control/actors"=>"Actors",
                "/control/genres"=>"Genres",
                "/control/movies"=>"Movies",
                "/control/photos"=>"Photos",
                "/control/series"=>"Series",
                "/control/seasons"=>"Seasons",
                "/control/episodes"=>"Episodes",
                "/control/reviews"=>"Reviews",
                "/control/likes"=>"Likes",
                "/control/tags"=>"Tags",
                "/control/articles"=>"Articles",
                "/control/comments"=>"Comments",
                "/control/categories"=>"Categories",
                "/control/keywords"=>"Keywords",
                "/control/admins"=>"Admins",
                "/control/users"=>"Users",
              );

              foreach ($elements as $key => $value){
              if ($value == "Actors"){
                $icon = '<i class="nav-icon fas fa-user-friends"></i>';
              }elseif ($value == "Admins"){
                $icon = '<i class="nav-icon fas fa-user-cog"></i>';
              }elseif ($value == "Articles"){
                $icon = '<i class="nav-icon far fa-newspaper"></i>';
              }elseif ($value == "Categories"){
                $icon = '<i class="nav-icon fa fa-table "></i>';
              }elseif ($value == "Comments"){
                $icon = '<i class="nav-icon fa fa-comments"></i>';
              }elseif ($value == "Episodes"){
                $icon = '<i class="nav-icon fas fa-film"></i>';
              }elseif ($value == "Genres"){
                $icon = '<i class="nav-icon   fa fa-th-list"></i>';
              }elseif ($value == "Keywords"){
                $icon = '<i class="nav-icon   fas fa-tags"></i>';
              }elseif ($value == "Likes"){
                $icon = '<i class="nav-icon fas fa-thumbs-up"></i>';
              }elseif ($value == "Movies"){
                $icon = '<i class="nav-icon fas fa-file-video"></i>';
              }elseif ($value == "Reviews"){
                $icon = '<i class="nav-icon fas fa-rss-square"></i>';
              }elseif ($value == "Seasons"){
                $icon = '<i class="nav-icon fas fa-tv"></i>';
              }elseif ($value == "Tags"){
                $icon = '<i class="nav-icon fas fa-tags"></i>';
              }elseif ($value == "Series"){
                $icon = '<i class="nav-icon fab fa-trello"></i>';
              }elseif ($value == "Photos"){
                $icon = '<i class="nav-icon fab fa-trello"></i>';
              }else {
                $icon = '<i class="nav-icon fas fa-user-plus"></i>';
              }
              if ($value == "Series"){
                echo '<li class="nav-header">SERIES</li>';
              }elseif ($value == "Admins"){
                echo '<li class="nav-header">ADMINS</li>';
              }elseif ($value == "Articles"){
                echo '<li class="nav-header">ARTICLES</li>';
              }elseif ($value == "Reviews"){
                echo '<li class="nav-header">REACTIONS</li>';
              }
                  echo '
                    <li class="nav-item">
                      <a href="' . url($key) . '" class="nav-link" id="' . $value . '">
                        ' .  $icon . '
                        <p>
                          ' . $value . '
                        </p>
                      </a>
                    </li>
                  ';
              }
          @endphp
        </ul>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

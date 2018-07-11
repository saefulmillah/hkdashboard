<style type="text/css">
    .nav-link[data-toggle].collapsed:after {
        content: "▾";
    }
    .nav-link[data-toggle]:not(.collapsed):after {
        content: "▴";
    }
</style>
<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="#">
    <img src="<?=base_url('assets/images/hk_logo.png')?>" height="40" class="d-inline-block align-top" alt="">
    &nbsp;&nbsp;&nbsp;
    <span class="navbar-brand mb-0 h1">TOL MONITORING DASHBOARD</span>
  </a>
  <div class="dropdown">
  <button class="btn btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Hi, Administrator
  </button>
  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <div role="separator" class="dropdown-divider"></div>
    <a class="dropdown-item" href="<?=site_url('auth/logout')?>">Logout</a>
  </div>
</div>
</nav>
<div id="wrapper" class="toggled">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Overview
                    </a>
                </li>
                <ul class="nav flex-column flex-nowrap">
                    <?php
                      foreach($multilevel as $data)
                      {
                        
                        if (count($data['child']) > 0) {
                            echo '<li class="nav-item">
                                    <a class="nav-link collapsed" href="#submenu'.$data['menu_parent'].'" data-toggle="collapse" data-target="#submenu'.$data['menu_parent'].'">'.trim($data['menu_title']).'</a>';

                            echo '<div class="collapse" id="submenu'.$data['menu_parent'].'"><ul class="flex-column pl-2 nav">'.print_recursive_list($data['child']).'</ul></div></li>';
                        } else {
                            echo '<li class="nav-item">
                                    <a class="nav-link collapsed" href="#">'.trim($data['menu_title']).'</a></li>';                            
                        }
                      }
                    ?>
               <!-- <li class="nav-item">
                        <a class="nav-link collapsed" href="#submenu1" data-toggle="collapse" data-target="#submenu1">Transaksi</a>
                        <div class="collapse" id="submenu1">
                            <ul class="flex-column pl-2 nav">
                                <li class="nav-item"><a class="nav-link py-0" href="#">Orders</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#">Analytics</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Export</a></li> -->
                </ul>
            </ul>
        </div>
        
        <!-- /#sidebar-wrapper
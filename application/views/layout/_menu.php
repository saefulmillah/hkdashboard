<style type="text/css">
    .nav-link[data-toggle].collapsed:after {
        content: "▾";
    }
    .nav-link[data-toggle]:not(.collapsed):after {
        content: "▴";
    }
    .rotated { transform:rotate(180deg); -webkit-transform:rotate(180deg); -moz-transform:rotate(180deg); -o-transform:rotate(180deg); }
    .btn-floating {
      display: inline-block;
      position: absolute;
      z-index: 1000;
      /*font-weight: 400;*/
      text-align: center;
      white-space: nowrap;
      vertical-align: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
      border: 1px solid transparent;
      /*padding: 2px;*/
      /*font-size: 1rem;*/
      line-height: 1.5;
      /*border-radius: 0.25rem;*/
      transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }
    .btn-sm-floating {
      /*padding: 0.2rem 0.3rem;*/
      font-size: 0.875rem;
      /*line-height: 1.5;*/
      /*border-radius: 0.2rem;*/
    }
    .btn-secondary-floating {
      color: #fff;
      background-color: #6c757d;
      border-color: #6c757d;
      border-radius: 0px;   
    }

    .btn-secondary-floating:hover {
      color: #fff;
      background-color: #5a6268;
      border-color: #545b62;
    }
</style>
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
                                    <a class="nav-link collapsed" href="'.site_url($data['menu_url']).'">'.trim($data['menu_title']).'</a></li>';                            
                        }
                      }
                    ?>
                </ul>
            </ul>
        </div>
        <nav class="navbar navbar-light bg-light">
          <a class="navbar-brand" href="#">
            <img src="<?=base_url('assets/images/hk_logo.png')?>" height="40" class="d-inline-block align-top" alt="">
            &nbsp;&nbsp;&nbsp;
            <span class="navbar-brand mb-0 h1">TOL MONITORING DASHBOARD (ATP)</span>
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
        <a href="#menu-toggle" class="btn-floating btn-sm-floating btn-secondary" id="menu-toggle"><i class="fa fa-angle-double-right fa-fw"></i></a>
        <!-- /#sidebar-wrapper -->
        <div id="page-content-wrapper">
        <!-- Page Content -->
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><?=$breadcrumb?></li>
          </ol>
        </nav>
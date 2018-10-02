<div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper" class="bg-dark">
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
                            echo '<li class="parent">
                                    <a class="nav-link collapsed" href="#submenu'.$data['menu_parent'].'" data-toggle="collapse" data-target="#submenu'.$data['menu_parent'].'">'.trim($data['menu_title']).'</a>';

                            echo '<div class="collapse" id="submenu'.$data['menu_parent'].'"><ul class="flex-column pl-2 nav">'.print_recursive_list($data['child']).'</ul></div></li>';
                        } else {
                            echo '<li>
                                    <a class="nav-link collapsed" href="'.site_url($data['menu_url']).'">'.trim($data['menu_title']).'</a></li>';                            
                        }
                      }
                    ?>
                </ul>
            </ul>
        </div>
        <a href="#menu-toggle" class="btn-floating btn-sm-floating btn-secondary" id="menu-toggle"><i class="fa fa-angle-double-right fa-fw"></i></a>
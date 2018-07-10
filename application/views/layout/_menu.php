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
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#submenu1" data-toggle="collapse" data-target="#submenu1">Reports</a>
                        <div class="collapse" id="submenu1" aria-expanded="false">
                            <ul class="flex-column pl-2 nav">
                                <li class="nav-item"><a class="nav-link py-0" href="#">Orders</a></li>
                                <li class="nav-item">
                                    <a class="nav-link collapsed py-1" href="#submenu1sub1" data-toggle="collapse" data-target="#submenu1sub1">Customers</a>
                                    <div class="collapse" id="submenu1sub1" aria-expanded="false">
                                        <ul class="flex-column nav pl-4">
                                            <li class="nav-item">
                                                <a class="nav-link p-1" href="#">
                                                    <i class="fa fa-fw fa-clock-o"></i> Daily
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link p-1" href="#">
                                                    <i class="fa fa-fw fa-dashboard"></i> Dashboard
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link p-1" href="#">
                                                    <i class="fa fa-fw fa-bar-chart"></i> Charts
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link p-1" href="#">
                                                    <i class="fa fa-fw fa-compass"></i> Areas
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#">Analytics</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Export</a></li>
                </ul>
            </ul>
        </div>
        <!-- /#sidebar-wrapper
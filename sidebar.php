<?php include './navbar.php'; ?>
<div class="main-sidebar sidebar-style-1 ">
    <aside id="sidebar-wrapper bg-primary">
        <div class="sidebar-brand">
            <a href="./dashboard.php"> <img alt="image" src="assets/img/evsu.jpg" class="header-logo" /> <span class="logo-name">EVSU UM</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown">
                <a href="./dashboard.php" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <?php if (Auth::getRole() != User::CLIENT) { ?>
                <li class="dropdown">
                    <a href="./users.php" class="nav-link"><i data-feather="users"></i><span>Users</span></a>
                </li>
            <?php  } ?>
            
        </ul>
    </aside>
</div>
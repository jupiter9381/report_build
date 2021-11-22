
<div class="app-sidebar menu-fixed" data-background-color="man-of-steel" data-image="<?= SITE_ADMIN_ASSET_IMG?>/sidebar-bg/01.jpg" data-scroll-to-active="true">
    <div class="sidebar-header">
        <div class="logo clearfix">
            <a class="logo-text float-left" href="index.html">
                <div class="logo-img"><img src="<?= SITE_ADMIN_ASSET_IMG?>/logo.png" alt="Apex Logo" /></div>
                <span class="text">Report</span>
            </a>
            <a class="nav-toggle d-none d-lg-none d-xl-block" id="sidebarToggle" href="javascript:;">
                <i class="toggle-icon ft-toggle-right" data-toggle="expanded"></i>
            </a>
            <a class="nav-close d-block d-lg-block d-xl-none" id="sidebarClose" href="javascript:;">
                <i class="ft-x"></i>
            </a>
        </div>
    </div>

    <div class="sidebar-content main-menu-content">
        <div class="nav-container">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <?php if($_SESSION['user_type']== 'admin') {?>
                <li class="nav-item <?php if($page == 'dashboard') echo 'active'; ?>">
                    <a href="<?= SITE_ADMIN_URL?>dashboard.php"><i class="ft-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
                </li>
                <li class="nav-item <?php if($page == 'userlist') echo 'active'; ?>">
                    <a href="<?= SITE_ADMIN_URL?>userlist.php"><i class="ft-user"></i><span class="menu-title" data-i18n="User List">User List</span></a>
                </li>
                <li class="nav-item <?php if($page == 'profile') echo 'active'; ?>">
                    <a href="<?= SITE_ADMIN_URL?>profile.php"><i class="ft-user"></i><span class="menu-title" data-i18n="Profile">Profile</span></a>
                </li>
                <li class="nav-item <?php if($page == 'database') echo 'active'; ?>">
                    <a href="<?= SITE_ADMIN_URL?>database.php"><i class="ft-user"></i><span class="menu-title" data-i18n="Database">Database</span></a>
                </li>
                <li class="nav-item <?php if($page == 'reports') echo 'active'; ?>">
                    <a href="<?= SITE_ADMIN_URL?>reports.php"><i class="ft-user"></i><span class="menu-title" data-i18n="Database">Reports</span></a>
                </li>
                <li class="nav-item <?php if($page == 'header_logo') echo 'active'; ?>">
                    <a href="<?= SITE_ADMIN_URL?>header_logo.php"><i class="ft-user"></i><span class="menu-title" data-i18n="Database">Header & Logo</span></a>
                </li>
                <?php }?>
                <?php if($_SESSION['user_type']== 'viewer') {?>
                <li class="nav-item <?php if($page == 'dashboard') echo 'active'; ?>">
                    <a href="dashboard.php"><i class="ft-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
                </li>
                <li class="nav-item <?php if($page == 'profile') echo 'active'; ?>">
                    <a href="profile.php"><i class="ft-user"></i><span class="menu-title" data-i18n="Profile">Profile</span></a>
                </li>
                <li class="nav-item <?php if($page == 'reports') echo 'active'; ?>">
                    <a href="reports.php"><i class="ft-user"></i><span class="menu-title" data-i18n="Database">Reports</span></a>
                </li>
                <?php }?>
            </ul>
        </div>
    </div>
    <!-- main menu content-->
    <div class="sidebar-background"></div>
</div>
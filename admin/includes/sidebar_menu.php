
<div class="app-sidebar menu-fixed" data-background-color="man-of-steel" data-image="<?= SITE_ADMIN_ASSET_IMG?>/sidebar-bg/01.jpg" data-scroll-to-active="true">
    <div class="sidebar-header">
        <div class="logo clearfix">
            <a class="logo-text float-left" href="index.html">
                <div class="logo-img"><img src="<?= SITE_ADMIN_ASSET_IMG?>/logo.png" alt="Apex Logo" /></div>
                <span class="text">APEX</span>
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
                <li class="nav-item active">
                    <a href="<?= SITE_ADMIN_URL?>/dashboard.php"><i class="ft-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
                </li>
                <li class="nav-item">
                    <a href="<?= SITE_ADMIN_URL?>/userlist.php"><i class="ft-user"></i><span class="menu-title" data-i18n="User List">User List</span></a>
                </li>
                <li class="nav-item">
                    <a href="app-email.html"><i class="ft-user"></i><span class="menu-title" data-i18n="Profile">Profile</span></a>
                </li>
                <li class="nav-item">
                    <a href="app-email.html"><i class="ft-user"></i><span class="menu-title" data-i18n="Database">Database</span></a>
                </li>
                <li class="nav-item">
                    <a href="app-email.html"><i class="ft-user"></i><span class="menu-title" data-i18n="Database">Reports</span></a>
                </li>
            </ul>
        </div>
    </div>
    <!-- main menu content-->
    <div class="sidebar-background"></div>
</div>
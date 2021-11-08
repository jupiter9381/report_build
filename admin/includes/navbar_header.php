<nav class="navbar navbar-expand-lg navbar-light header-navbar navbar-fixed">
	<div class="container-fluid navbar-wrapper">
        <div class="navbar-header d-flex">
            <div class="navbar-toggle menu-toggle d-xl-none d-block float-left align-items-center justify-content-center" data-toggle="collapse"><i class="ft-menu font-medium-3"></i></div>
            <ul class="navbar-nav">
                <li class="nav-item mr-2 d-none d-lg-block"><a class="nav-link apptogglefullscreen" id="navbar-fullscreen" href="javascript:;"><i class="ft-maximize font-medium-3"></i></a></li>
                <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="javascript:"><i class="ft-search font-medium-3"></i></a>
                    <div class="search-input">
                        <div class="search-input-icon"><i class="ft-search font-medium-3"></i></div>
                        <input class="input" type="text" placeholder="Explore Apex..." tabindex="0" data-search="template-search">
                        <div class="search-input-close"><i class="ft-x font-medium-3"></i></div>
                        <ul class="search-list"></ul>
                    </div>
                </li>
            </ul>
        </div>
        <div class="navbar-container">
            <div class="collapse navbar-collapse d-block" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="dropdown nav-item mr-1"><a class="nav-link dropdown-toggle user-dropdown d-flex align-items-end" id="dropdownBasic2" href="javascript:;" data-toggle="dropdown">
                                <div class="user d-md-flex d-none mr-2"><span class="text-right"><?= $_SESSION['alogin']?></span><span class="text-right text-muted font-small-3">Admin</span></div><img class="avatar" src="<?= SITE_ADMIN_ASSET_IMG?>/portrait/small/avatar-s-1.png" alt="avatar" height="35" width="35">
                            </a>
                            <div class="dropdown-menu text-left dropdown-menu-right m-0 pb-0" aria-labelledby="dropdownBasic2">
                                <a class="dropdown-item" href="<?= SITE_ADMIN_URL?>createuser.php">
                                    <div class="d-flex align-items-center"><i class="ft-message-square mr-2"></i><span>Create User</span></div>
                                </a>
                                <a class="dropdown-item" href="page-user-profile.html">
                                    <div class="d-flex align-items-center"><i class="ft-edit mr-2"></i><span>Change Password</span></div>
                                </a>
                                <a class="dropdown-item" href="app-email.html">
                                    <div class="d-flex align-items-center"><i class="ft-mail mr-2"></i><span>Delete reports</span></div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= SITE_ADMIN_URL?>logout.php">
                                    <div class="d-flex align-items-center"><i class="ft-power mr-2"></i><span>Logout</span></div>
                                </a>
                            </div>
                        </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
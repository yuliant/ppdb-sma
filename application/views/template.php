<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?php echo $tittle; ?></title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/stisla/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/stisla/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/stisla/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/stisla/css/components.css">
</head>

<body style="background-color: #f5f5f7;">
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="<?php echo base_url(); ?>assets/stisla/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, Ujang Maman</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="features-profile.html" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a>
                            <a href="features-settings.html" class="dropdown-item has-icon">
                                <i class="fas fa-cog"></i> Settings
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="<?php echo base_url('auth/logout') ?>" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="<?php echo base_url() ?>">
                            <h6 class="mt-2">PPDB<br>SMA PGRI 1 SIDOARJO</h6>
                        </a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="<?php echo base_url() ?>">PPDB</a>
                    </div>
                    <ul class="sidebar-menu">
                        <!-- user menu -->
                        <li class="menu-header">Menu</li>
                        <li class=active>
                            <a class="nav-link" href="#">
                                <i class="fas fa-fire"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="#">
                                <i class="far fa-user"></i> <span>Daftar</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="#">
                                <i class="far fa-file-alt"></i> <span>Formulir</span>
                            </a>
                        </li>
                        <li class="menu-header">Setting</li>
                        <li class="dropdown">
                            <a href="#" class="nav-link has-dropdown">
                                <i class="fas fa-ellipsis-h"></i> <span>Utilities</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Profil</a></li>
                                <li><a class="nav-link" href="#">Edit Profil</a></li>
                                <li><a href="#">Change Password</a></li>
                            </ul>
                        </li>
                        <!-- end user menu -->
                    </ul>

                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <?php echo $contents ?>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2018 <div class="bullet"></div>
                    <a href="<?php echo base_url(); ?>">SMA PGRI 1 SIDOARJO</a>
                </div>
                <div class="footer-right">

                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="<?php echo base_url(); ?>assets/stisla/modules/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/stisla/modules/popper.js"></script>
    <script src="<?php echo base_url(); ?>assets/stisla/modules/tooltip.js"></script>
    <script src="<?php echo base_url(); ?>assets/stisla/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/stisla/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/stisla/modules/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/stisla/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="<?php echo base_url(); ?>assets/stisla/js/scripts.js"></script>
    <script src="<?php echo base_url(); ?>assets/stisla/js/custom.js"></script>
</body>

</html>
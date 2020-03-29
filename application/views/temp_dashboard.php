<?php
$user = $this->fungsi->user_login();
?>
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
    <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/stisla/modules/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/stisla/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/stisla/modules/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/stisla/modules/jquery-selectric/selectric.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/stisla/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/stisla/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css"> -->

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
                            <img alt="image" src="<?php echo base_url(); ?>assets/data/<?php echo $user->image ?>" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, <?php echo $user->username ?></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="<?php echo base_url('profil'); ?>" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
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
                        <?php if ($user->level == 1) { ?>
                            <li class="menu-header">Menu</li>
                            <li <?php echo $this->uri->segment(1) == 'admindashboard' ? 'class="active"' : '' ?>>
                                <a class="nav-link" href="<?php echo base_url('admindashboard') ?>">
                                    <i class="fas fa-fire"></i> <span>Dashboard</span>
                                </a>
                            </li>
                            <!-- end user menu -->
                        <?php } ?>


                        <!-- user menu -->
                        <?php if ($user->level == 2) { ?>
                            <li class="menu-header">Menu</li>

                            <li <?php echo $this->uri->segment(1) == 'dashboard' ? 'class="active"' : '' ?>>
                                <a class="nav-link" href="<?php echo base_url('dashboard') ?>">
                                    <i class="fas fa-fire"></i> <span>Dashboard</span>
                                </a>
                            </li>

                            <li <?php echo $this->uri->segment(1) == 'daftar' ? 'class="active"' : '' ?>>
                                <a class="nav-link" href="<?php echo base_url('daftar') ?>">
                                    <i class="far fa-user"></i> <span>Daftar</span>
                                </a>
                            </li>

                            <li <?php echo $this->uri->segment(1) == 'formulir' ? 'class="active"' : '' ?>>
                                <a class="nav-link" href="<?php echo base_url('formulir') ?>">
                                    <i class="far fa-file-alt"></i> <span>Formulir</span>
                                </a>
                            </li>

                            <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                                <a href="#" class="btn btn-primary btn-lg btn-block btn-icon-split">
                                    <i class="fas fa-cloud-download-alt"></i> Cetak Formulir
                                </a>
                            </div>

                            <!-- end user menu -->
                        <?php } ?>

                        <li class="menu-header">Pengaturan</li>
                        <li class="dropdown <?php echo $this->uri->segment(1) == 'profil' || $this->uri->segment(1) == 'editprofil' || $this->uri->segment(1) == 'changepass' ? 'active' : '' ?>">
                            <a href="" class="nav-link has-dropdown">
                                <i class="fas fa-ellipsis-h"></i> <span>Utilities</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li <?php echo $this->uri->segment(1) == 'profil' ? 'class="active"' : '' ?>>
                                    <a href="<?php echo base_url('profil') ?>">Profil</a>
                                </li>
                                <li <?php echo $this->uri->segment(1) == 'editprofil' ? 'class="active"' : '' ?>>
                                    <a href="<?php echo base_url('editprofil') ?>">Edit Profil</a>
                                </li>
                                <li <?php echo $this->uri->segment(1) == 'changepass' ? 'class="active"' : '' ?>>
                                    <a href="<?php echo base_url('changepass') ?>">Ubah Password</a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <?php echo $contents ?>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; <?php echo date('Y'); ?> <div class="bullet"></div>
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
    <!-- <script src="<?php echo base_url(); ?>assets/stisla/modules/chocolat/dist/js/jquery.chocolat.min.js"></script> -->
    <!-- <script src="<?php echo base_url(); ?>assets/stisla/modules/jquery-ui/jquery-ui.min.js"></script> -->

    <!-- Page Specific JS File -->
    <!-- <script src="<?php echo base_url(); ?>assets/stisla/js/page/forms-advanced-forms.js"></script> -->

    <!-- Template JS File -->
    <script src="<?php echo base_url(); ?>assets/stisla/js/scripts.js"></script>
    <script src="<?php echo base_url(); ?>assets/stisla/js/custom.js"></script>

    <!-- untuk memunculkan nama file gambar -->
    <script>
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
    </script>
</body>

</html>
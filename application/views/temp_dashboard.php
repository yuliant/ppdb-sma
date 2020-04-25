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

                            <li <?php echo $this->uri->segment(1) == 'showuser' ? 'class="active"' : '' ?>>
                                <a class="nav-link" href="
                                <?php echo base_url('showuser') ?>">
                                    <i class="far fa-user"></i> <span> Semua User</span>
                                </a>
                            </li>

                            <li <?php echo $this->uri->segment(1) == 'pendaftar' ? 'class="active"' : '' ?>>
                                <a class="nav-link" href="<?php echo base_url('pendaftar') ?>">
                                    <i class="fas fa-user-plus"></i> <span>Para Pendaftar</span>
                                </a>
                            </li>

                            <li <?php echo $this->uri->segment(1) == 'showformulir' ? 'class="active"' : '' ?>>
                                <a class="nav-link" href="
                                <?php echo base_url('showformulir') ?>">
                                    <i class="far fa-file-alt"></i> <span>Semua Formulir</span>
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
                                <a href="<?php echo base_url('cetakformulir') ?>" class="btn btn-primary btn-lg btn-block btn-icon-split">
                                    <i class="fas fa-cloud-download-alt"></i> Cetak Formulir
                                </a>
                            </div>

                            <!-- end user menu -->
                        <?php } ?>

                        <li class="menu-header">Pengaturan</li>
                        <?php if ($user->level == 1) { ?>
                            <li class="dropdown 
                            <?php echo $this->uri->segment(1) == 'pembayaran'
                                || $this->uri->segment(1) == 'Agenda'
                                || $this->uri->segment(1) == 'kontak admin' ? 'active' : '' ?>">
                                <a href="" class="nav-link has-dropdown">
                                    <i class="fas fa-desktop"></i> <span>Environment</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li <?php echo $this->uri->segment(1) == 'pembayaran' ? 'class="active"' : '' ?>>
                                        <a href="<?php echo "#" //base_url('pembayaran') 
                                                    ?>">Pembayaran</a>
                                    </li>
                                    <li <?php echo $this->uri->segment(1) == 'Agenda' ? 'class="active"' : '' ?>>
                                        <a href="<?php echo "#" //base_url('Agenda') 
                                                    ?>">Agenda</a>
                                    </li>
                                    <li <?php echo $this->uri->segment(1) == 'kontak admin' ? 'class="active"' : '' ?>>
                                        <a href="<?php echo "#" //base_url('kontak admin') 
                                                    ?>">Kontak Admin</a>
                                    </li>
                                </ul>
                            </li>
                        <?php } ?>

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
    <!-- <script src="<?php echo base_url(); ?>assets/stisla/modules/popper.js"></script>
    <script src="<?php echo base_url(); ?>assets/stisla/modules/tooltip.js"></script> -->
    <script src="<?php echo base_url(); ?>assets/stisla/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/stisla/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/stisla/modules/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/stisla/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

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
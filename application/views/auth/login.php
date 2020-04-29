<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $tittle ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url(); ?>assets/sbadmin2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url(); ?>assets/sbadmin2/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body style="background-color: #f5f5f7;
	height: 100vh;
	width: auto;">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-7 d-none d-lg-block">
                                <!-- change image here -->
                                <img style="height: 400px" src="<?php echo base_url() ?>assets/data/bg_login.jpg">
                            </div>
                            <div class="col-lg-5">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="h4 text-gray-900">Login</h4>
                                        <p class="text-gray-900 mb-2">PPDB Smagrisda</p>
                                    </div>

                                    <?php echo $this->session->flashdata('message'); ?>

                                    <form class="user" action="<?php echo base_url('auth'); ?>" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" value="<?php echo set_value('username'); ?>" name="username" id="username" placeholder="Masukkan username...">
                                            <?php echo form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" value="<?php echo set_value('password'); ?>" name="password" id="password" placeholder="Masukkan Password...">
                                            <?php echo form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <button type="submit" name="login" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?php echo base_url('auth/registration') ?>">Buat akun!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card -->
                <div class="row">

                    <div class="col-lg-4 mb-4">
                        <div class="card border-left-success shadow h-100">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Panduan</div>
                                        <a rel="nofollow" href="#" data-toggle="modal" data-target="#panduanModal">
                                            <small>
                                                Baca lebih lanjut &rarr;
                                            </small>
                                        </a>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-book fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-4">
                        <div class="card border-left-info shadow h-100">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Agenda</div>
                                        <a rel="nofollow" href="#" data-toggle="modal" data-target="#agendaModal">
                                            <small>
                                                Baca lebih lanjut &rarr;
                                            </small>
                                        </a>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-4">
                        <div class="card border-left-danger shadow h-100">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Hubungi admin</div>
                                        <a rel="nofollow" href="#" data-toggle="modal" data-target="#kontakModal">
                                            <small>
                                                Baca lebih lanjut &rarr;
                                            </small>
                                        </a>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-phone fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Panduan Modal-->
    <div class="modal fade" id="panduanModal" tabindex="-1" role="dialog" aria-labelledby="panduanModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="panduanModalLabel">Panduan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ol>
                        <li>Silahkan register akun anda, dengan menekan "register di bawah tombol login."</li>
                        <li>Silahkan login apabila akun anda sudah dibuat. Masukkan username dan password.</li>
                        <li>Ikuti panduan lebih lanjut setelah anda login pada menu <b>Dashboard</b>.</li>
                    </ol>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" type="button" data-dismiss="modal">Oke</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Agenda Modal-->
    <div class="modal fade" id="agendaModal" tabindex="-1" role="dialog" aria-labelledby="agendaModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="agendaModalLabel">Agenda PPDB</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <pre>
<?php echo $env_agenda->agenda ?>
                </pre>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-info" type="button" data-dismiss="modal">Oke</button>
                </div>
            </div>
        </div>
    </div>

    <!-- kontak Modal-->
    <div class="modal fade" id="kontakModal" tabindex="-1" role="dialog" aria-labelledby="kontakModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="kontakModalLabel">Hubungi Admin</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <address>
                        <strong>Hubungi:</strong><br>
                        <?php echo $env_kontak->nama_kontak ?><br>

                        WA. <a href="
                        <?php echo 'https://api.whatsapp.com/send?phone=' .
                            $env_kontak->nomor_kontak .
                            '&text=Assalamulaikum' ?>" target="_blank">
                            <?php echo $env_kontak->nomor_kontak ?>
                        </a><br>

                        EMAIL. <a href="<?php echo 'mailto:' . $env_kontak->email_admin . '?subject=Email dari website PPDB Smagrisda' ?>" target="_blank">
                            <?php echo $env_kontak->email_admin ?>
                        </a><br>

                        <?php echo $env_kontak->alamat_admin ?>
                    </address>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Oke</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url(); ?>assets/sbadmin2/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url(); ?>assets/sbadmin2/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url(); ?>assets/sbadmin2/js/sb-admin-2.min.js"></script>

</body>

</html>
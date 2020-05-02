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

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Buat akun!</h1>
              </div>

              <?php echo $this->session->flashdata('message'); ?>

              <form class="user" method="post" action="<?php echo base_url('auth/registration') ?>">
                <div class="form-group">
                  <label class="badge" for="">Username</label>
                  <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username" value="<?php echo set_value('username'); ?>">
                  <?php echo form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <label class="badge" for="">Nama Lengkap</label>
                  <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Nama Lengkap" value="<?php echo set_value('name'); ?>">
                  <?php echo form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <label class="badge" for="">Password</label>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                    <?php echo form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Konfirmasi Password">
                    <?php echo form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="form-group mt-3 mx-auto">
                    <div class=" g-recaptcha" data-sitekey="6LcUNfEUAAAAACUfuRf9vI0Ps37tdMJbSVXUeeth"></div>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Registrasi Akun
                </button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="<?= base_url('auth') ?>">Sudah Memiliki akun? Login!</a>
              </div>
            </div>
          </div>
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
  <script src='https://www.google.com/recaptcha/api.js'></script>
</body>

</html>
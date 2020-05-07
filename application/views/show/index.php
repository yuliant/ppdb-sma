<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Calon Siswa | PPDB Smagrisda</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/stisla/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/stisla/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/stisla/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/stisla/css/components.css">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div class="container">
        <section class="section">

            <div class="section-header  mt-3">
                <h1>Calon Siswa SMA 1 PGRI Sidoarjo Tapel 2020/2021</h1>
            </div>

            <div class="card">
                <div class="card-body">
                    <div id="accordion">
                        <div class="accordion">
                            <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-1" aria-expanded="true">
                                <h4><b>DIRI PRIBADI</b></h4>
                            </div>
                            <div class="accordion-body collapse show" id="panel-body-1" data-parent="#accordion">

                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-lg-3 text-md-right">Nama Lengkap Siswa</label>
                                    <div class="col-lg-9 col-md-12">
                                        <input class="form-control" value="<?php echo $show->nama ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right">Tempat Lahir</label>
                                    <div class="col-lg-9 col-md-12">
                                        <input class="form-control" value="<?php echo $show->tempat_lahir ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right">Tanggal Lahir</label>
                                    <div class="col-lg-9 col-md-12">
                                        <input type="date" class="form-control" value="<?php echo $show->tanggal_lahir ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right">Agama</label>
                                    <div class="col-lg-9 col-md-12">
                                        <input class="form-control" value="<?php echo $show->agama ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right">Kelamin</label>
                                    <div class="col-lg-9 col-md-12">
                                        <input class="form-control" value="<?php
                                                                            if ($show->kelamin == 'L') {
                                                                                echo "LAKI - LAKI";
                                                                            } else {
                                                                                echo "PEREMPUAN";
                                                                            } ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right">Alamat</label>
                                    <div class="col-lg-9 col-md-12">
                                        <textarea class="form-control" readonly><?php echo $show->alamat ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right">Nomor Telpon</label>
                                    <div class="col-lg-9 col-md-12">
                                        <input class="form-control" value="<?php echo $show->telp ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right">Asal Sekolah</label>
                                    <div class="col-lg-9 col-md-12">
                                        <input class="form-control" value="<?php echo $show->asal_sekolah ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right">NISN</label>
                                    <div class="col-lg-9 col-md-12">
                                        <input class="form-control" value="<?php echo $show->nisn ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right">Tahun Lulus</label>
                                    <div class="col-lg-9 col-md-12">
                                        <input class="form-control" value="<?php echo $show->tahun_lulus ?>" readonly>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="accordion">
                            <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-2">
                                <h4><b>DIRI ORANG TUA</b></h4>
                            </div>
                            <div class="accordion-body collapse" id="panel-body-2" data-parent="#accordion">

                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right">Nama Orang Tua</label>
                                    <div class="col-lg-9 col-md-12">
                                        <input class="form-control" value="<?php echo $show->nama_ortu ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right">Pekerjaan</label>
                                    <div class="col-lg-9 col-md-12">
                                        <input class="form-control" value="<?php echo $show->pekerjaan ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right">Alamat Orang Tua</label>
                                    <div class="col-lg-9 col-md-12">
                                        <textarea class="form-control" readonly><?php echo $show->alamat_ortu ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right">No. Telpon Orang Tua</label>
                                    <div class="col-lg-9 col-md-12">
                                        <input class="form-control" value="<?php echo $show->telp_ortu ?>" readonly>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="accordion">
                            <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-3">
                                <h4><b>KELENGKAPAN LAINNYA</b></h4>
                            </div>
                            <div class="accordion-body collapse" id="panel-body-3" data-parent="#accordion">

                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right">Nilai Mapel Bahasa Indonesia</label>
                                    <div class="col-lg-9 col-md-12">
                                        <input class="form-control" value="<?php echo $show->nilai_indo ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right">Nilai Mapel Bahasa Inggris</label>
                                    <div class="col-lg-9 col-md-12">
                                        <input class="form-control" value="<?php echo $show->nilai_ing ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right">Nilai Mapel Matematika</label>
                                    <div class="col-lg-9 col-md-12">
                                        <input class="form-control" value="<?php echo $show->matematika ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right">Nilai Mapel IPA</label>
                                    <div class="col-lg-9 col-md-12">
                                        <input class="form-control" value="<?php echo $show->ipa ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right">Foto SKL / Ijasah SMP</label>
                                    <div class="col-lg-9 col-md-12">
                                        <div class="col-lg-4">
                                            <a href="<?php echo base_url('assets/data/') . $show->foto_ijasah_smp; ?>">
                                                <img src="<?php echo base_url('assets/data/') . $show->foto_ijasah_smp; ?>" class="img-thumbnail">
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right">Foto Kartu Keluarga</label>
                                    <div class="col-lg-9 col-md-12">
                                        <div class="col-sm-4">
                                            <a href="<?php echo base_url('assets/data/') . $show->foto_shun; ?>">
                                                <img src="<?php echo base_url('assets/data/') . $show->foto_shun; ?>" class="img-thumbnail">
                                            </a>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
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
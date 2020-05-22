<section class="section">
    <div class="section-header">
        <h1><?php echo $tittle; ?></h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="<?php echo base_url('pendaftar') ?>">Para Pendaftar</a></div>
            <div class="breadcrumb-item">Detail Pendaftaran</div>
        </div>
    </div>

    <div class="section-body">

        <div class="col-12 col-sm-8 col-lg-8">
            <?php echo $this->session->flashdata('message'); ?>
        </div>

        <div class="col-12 col-sm-8 col-lg-8">

            <a href="<?php echo base_url('pendaftar') ?>" class="btn btn-info mb-3">
                <i class="fas fa-backward"></i> Cancel
            </a>

            <div class="card">
                <div class="card-body">

                    <label>Nama Lengkap</label>
                    <div class="form-group">
                        <input type="text" class="form-control" value="<?php echo $daftar->nama; ?>" readonly>
                    </div>

                    <label>Status</label>
                    <div class="form-group">
                        <input type="text" class="form-control" value="<?php if ($daftar->status == 1) {
                                                                            echo "1 (Telah dikonfirmasi)";
                                                                        } elseif ($daftar->status == 0) {
                                                                            echo "0 (Menunggu keputusan)";
                                                                        } else {
                                                                            echo "Ditolak";
                                                                        } ?>" readonly>
                    </div>

                    <label>No. Telp / WA</label>
                    <div class="form-group">
                        <input type="number" class="form-control" value="<?php echo $daftar->telp; ?>" readonly>
                        <a class="btn mt-1 text-right" href="
                        <?php echo 'https://api.whatsapp.com/send?phone=' . $daftar->telp . '&text=Assalamulaikum' ?>" target="_blank">OPEN WA <i class="fab fa-whatsapp"></i></a>
                    </div>

                    <label>Email</label>
                    <div class="form-group">
                        <input type="email" class="form-control" value="<?php echo $daftar->email; ?>" readonly>
                        <a class="btn mt-1 text-right" href="<?php echo 'mailto:' . $daftar->email . '?subject=Email dari website PPDB Smagrisda' ?>" target=" _blank">OPEN EMAIL <i class="fas fa-paper-plane"></i></a>
                    </div>

                    <label>Bukti Transfer Pembayaran*</label>
                    <div class="row">
                        <div class="col-sm-6">
                            <a href="<?php echo base_url('assets/data/') . $daftar->foto_bukti_transfer; ?>">
                                <img src="<?php echo base_url('assets/data/') . $daftar->foto_bukti_transfer; ?>" class="img-thumbnail">
                            </a>
                        </div>
                    </div>

                    <div class="card-footer text-right">
                        <form action="<?php echo base_url('pendaftar/changestatus') ?>" method="post">
                            <input type="hidden" name="id_user" value="<?php echo $daftar->id_user ?>">
                            <button class="btn btn-success mr-1" name="konfirmasi" type="konfirmasi">Konfirmasi</button>
                            <button class="btn btn-danger mr-1" name="tolak" type="tolak">Tolak</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
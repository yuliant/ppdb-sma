<section class="section">
    <div class="section-header">
        <h1><?php echo $tittle; ?></h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="<?php echo base_url('showuser') ?>">Semua user</a></div>
            <div class="breadcrumb-item">Detail User</div>
        </div>
    </div>

    <div class="section-body">

        <div class="col-12 col-sm-8 col-lg-8">
            <?php echo $this->session->flashdata('message'); ?>
        </div>

        <div class="col-12 col-sm-8 col-lg-8">

            <a href="<?php echo base_url('showuser') ?>" class="btn btn-info mb-3">
                <i class="fas fa-backward"></i> Cancel
            </a>

            <div class="card">
                <div class="card-body">

                    <label>Nama Lengkap</label>
                    <div class="form-group">
                        <input type="text" class="form-control" value="<?php echo $detail_user->nama; ?>" readonly>
                    </div>

                    <label>Username</label>
                    <div class="form-group">
                        <input type="text" class="form-control" value="<?php echo $detail_user->username; ?>" readonly>
                    </div>

                    <label>Status</label>
                    <div class="form-group">
                        <input type="text" class="form-control" value="<?php if ($detail_user->is_active == 0) {
                                                                            echo "Tidak aktif";
                                                                        } else {
                                                                            echo "Aktif";
                                                                        } ?>" readonly>
                    </div>

                    <label>Tanggal Dibuat</label>
                    <div class="form-group">
                        <input type="date" class="form-control" value="<?php echo date("Y-m-d", strtotime($detail_user->date_created)); ?>" readonly>
                    </div>

                    <label>Foto Profil</label>
                    <div class="row">
                        <div class="col-sm-5">
                            <a href="<?php echo base_url('assets/data/') . $detail_user->image; ?>">
                                <img src="<?php echo base_url('assets/data/') . $detail_user->image; ?>" class="img-thumbnail">
                            </a>
                        </div>
                    </div>

                    <div class="card-footer text-right">
                        <form action="<?php echo base_url('showuser/changestatus') ?>" method="post">
                            <input type="hidden" name="user_id" value="<?php echo $detail_user->user_id ?>">
                            <button class="btn btn-danger mr-1" name="tidakaktif" type="tidakaktif">Tidak aktif</button>
                            <button class="btn btn-success mr-1" name="aktif" type="aktif">Aktif</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
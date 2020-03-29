<section class="section">
    <div class="section-header">
        <h1><?php echo $tittle; ?></h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="<?php echo base_url('profil') ?>">Utilities</a></div>
            <div class="breadcrumb-item">Ubah Password</div>
        </div>
    </div>

    <!-- flashdata message -->
    <div class="section-body">
        <div class="col-12 col-sm-8 col-lg-8">
            <?php echo $this->session->flashdata('message'); ?>
        </div>
    </div>

    <div class="section-body">
        <div class="col-12 col-sm-8 col-lg-8">
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo base_url('changepass') ?>" method="post">
                        <label>Password Terdahulu*</label>
                        <div class="form-group">
                            <input type="password" name="current_pasword" id="current_pasword" class="form-control" required>
                            <?php echo form_error('current_pasword', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <label>Password Baru*</label>
                        <div class="form-group">
                            <input type="password" name="new_pasword1" id="new_pasword1" class="form-control" required>
                            <?php echo form_error('new_pasword1', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <label>Konfirmasi Password Baru*</label>
                        <div class="form-group">
                            <input type="password" name="new_pasword2" id="new_pasword2" class="form-control" required>
                            <?php echo form_error('new_pasword2', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="card-footer text-right">
                            <button class="btn btn-primary mr-1" type="submit">Save</button>
                            <a href="<?php echo base_url('profil') ?>" class="btn btn-light">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
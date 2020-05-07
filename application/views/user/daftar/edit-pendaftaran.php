<section class="section">
    <div class="section-header">
        <h1><?php echo $tittle; ?></h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="<?php echo base_url('daftar') ?>">Daftar</a></div>
            <div class="breadcrumb-item">Edit Pendaftaran</div>
        </div>
    </div>

    <div class="section-body">

        <div class="col-12 col-sm-8 col-lg-8">
            <?php echo $this->session->flashdata('message'); ?>
        </div>

        <div class="col-12 col-sm-8 col-lg-8">
            <div class="card">
                <div class="card-body">
                    <?php echo form_open_multipart('daftar/editpendaftaran'); ?>

                    <label>Nama Lengkap</label>
                    <div class="form-group">
                        <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $user->nama; ?>" readonly>
                    </div>

                    <label>No. Telp / WA*</label>
                    <div class="form-group">
                        <input type="number" name="telp" id="telp" class="form-control" value="<?php echo $user_daftar->telp; ?>" required>
                        <?php echo form_error('telp', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <label>Email</label>
                    <div class="form-group">
                        <input type="email" name="email" id="email" class="form-control" value="<?php echo $user_daftar->email; ?>">
                        <?php echo form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <label>Bukti Transfer Pembayaran*</label>
                    <div class="row">
                        <div class="col-sm-3">
                            <a href="<?php echo base_url('assets/data/') . $user_daftar->foto_bukti_transfer; ?>">
                                <img src="<?php echo base_url('assets/data/') . $user_daftar->foto_bukti_transfer; ?>" class="img-thumbnail">
                            </a>
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Upload foto</label>
                                <small>Maximal <?php echo substr($this->config->item('max_gambar'), 0, -3) ?> Mb</small>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-right">
                        <button class="btn btn-primary mr-1" type="submit">Save</button>
                        <a href="<?php echo base_url('daftar') ?>" class="btn btn-light">Cancel</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
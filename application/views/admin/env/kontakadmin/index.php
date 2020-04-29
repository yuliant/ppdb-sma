<section class="section">
    <div class="section-header">
        <h1><?php echo $tittle; ?></h1>
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
                    <form action="<?php echo base_url('kontakadmin') ?>" method="post">
                        <label>Nama Admin*</label>
                        <div class="form-group">
                            <input type="text" name="nama_kontak" id="nama_kontak" class="form-control" value="<?php echo $data->nama_kontak ?>" required>
                            <?php echo form_error('nama_kontak', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <label>Nomor Telp*</label>
                        <div class="form-group">
                            <input type="text" name="nomor_kontak" id="nomor_kontak" class="form-control" value="<?php echo $data->nomor_kontak ?>" required>
                            <?php echo form_error('nomor_kontak', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <label>Email Admin*</label>
                        <div class="form-group">
                            <input type="email" name="email_admin" id="email_admin" class="form-control" value="<?php echo $data->email_admin ?>" required>
                            <?php echo form_error('email_admin', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <label>Alamat Admin*</label>
                        <div class="form-group">
                            <textarea type="text" class="form-control" name="alamat_admin" id="alamat_admin" required><?php echo $data->alamat_admin; ?></textarea>
                            <?php echo form_error('alamat_admin', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="card-footer text-right">
                            <button class="btn btn-primary mr-1" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
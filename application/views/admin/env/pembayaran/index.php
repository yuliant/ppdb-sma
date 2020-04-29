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
                    <form action="<?php echo base_url('pembayaran') ?>" method="post">
                        <label>Nama Bank*</label>
                        <div class="form-group">
                            <input type="text" name="nama_bank" id="nama_bank" class="form-control" value="<?php echo $data->nama_bank ?>" required>
                            <?php echo form_error('nama_bank', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <label>Jumlah Uang*</label>
                        <div class="form-group">
                            <input type="text" name="jml_uang" id="jml_uang" class="form-control" value="<?php echo $data->jml_uang ?>" required>
                            <?php echo form_error('jml_uang', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <label>Nomor Rekening*</label>
                        <div class="form-group">
                            <input type="text" name="rekening" id="rekening" class="form-control" value="<?php echo $data->rekening ?>" required>
                            <?php echo form_error('rekening', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <label>Atas Nama*</label>
                        <div class="form-group">
                            <input type="text" name="atas_nama" id="atas_nama" class="form-control" value="<?php echo $data->atas_nama ?>" required>
                            <?php echo form_error('atas_nama', '<small class="text-danger pl-3">', '</small>'); ?>
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
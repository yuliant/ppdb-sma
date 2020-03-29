<section class="section">
    <div class="section-header">
        <h1><?php echo $tittle; ?></h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="<?php echo base_url('formulir/dataortu') ?>">Formulir</a></div>
            <div class="breadcrumb-item">Edit Data Orang Tua</div>
        </div>
    </div>

    <div class="section-body">

        <div class="col-12 col-sm-8 col-lg-8">
            <?php echo $this->session->flashdata('message'); ?>
        </div>

        <div class="col-12 col-sm-8 col-lg-8">
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo base_url('formulir/editdataortu'); ?>" method="post">

                        <label>Nama Orang Tua</label>
                        <div class="form-group">
                            <input type="text" name="nama_ortu" class="form-control" id="nama_ortu" value="<?php echo $data_diri_ortu->nama_ortu ?>" required>
                            <?php echo form_error('nama_ortu', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <label>Pekerjaan</label>
                        <div class="form-group">
                            <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" value="<?php echo $data_diri_ortu->pekerjaan ?>" required>
                            <?php echo form_error('pekerjaan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <label>Alamat</label>
                        <div class="form-group">
                            <textarea type="text" class="form-control" name="alamat" id="alamat" placeholder="Desa/Kelurahan. RT/RW/Blok. Kecamatan. Kabupaten/Kota" required><?php echo $data_diri_ortu->alamat_ortu ?></textarea>
                            <?php echo form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <label>Telp. Orang Tua</label>
                        <div class="form-group">
                            <input type="number" name="telp_ortu" class="form-control" id="telp_ortu" value="<?php echo $data_diri_ortu->telp_ortu ?>" required>
                            <?php echo form_error('telp_ortu', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="card-footer text-right">
                            <button class="btn btn-primary mr-1" type="submit">Save</button>
                            <a href="<?php echo base_url('formulir/dataortu') ?>" class="btn btn-light">Cancel</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
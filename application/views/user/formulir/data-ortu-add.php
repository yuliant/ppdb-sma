<section class="section">
    <div class="section-header">
        <h1><?php echo $tittle; ?></h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Isi Formulir Secara Berurutan</h2>
        <p class="section-lead">
            Mulai dari Data diri, Data orang tua dan Kelengkapan Berkas
        </p>

        <div>
            <?php echo $this->session->flashdata('message'); ?>
        </div>

        <div id="output-status"></div>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item"><a href="<?php echo base_url('formulir') ?>" class="nav-link">Data Diri</a></li>
                            <li class="nav-item"><a href="<?php echo base_url('formulir/dataortu') ?>" class="nav-link active">Data Orang Tua</a></li>
                            <li class="nav-item"><a href="<?php echo base_url('formulir/berkas') ?>" class="nav-link">Kelengkapan Berkas</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <form id="setting-form" action="" method="post">
                    <div class="card" id="settings-card">
                        <div class="card-header">
                            <h4>Data Orang Tua</h4>
                        </div>
                        <div class="card-body">

                            <div class="form-group row align-items-center">
                                <label for="nama_ortu" class="form-control-label col-sm-3 text-md-right">Nama Orang Tua*</label>
                                <div class="col-sm-6 col-md-9">
                                    <input type="text" name="nama_ortu" class="form-control" id="nama_ortu" value="<?php echo set_value('nama_ortu'); ?>" required>
                                    <?php echo form_error('nama_ortu', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row align-items-center">
                                <label for="pekerjaan" class="form-control-label col-sm-3 text-md-right">Pekerjaan*</label>
                                <div class="col-sm-6 col-md-9">
                                    <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" value="<?php echo set_value('pekerjaan'); ?>" required>
                                    <?php echo form_error('pekerjaan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row align-items-center">
                                <label for="alamat" class="form-control-label col-sm-3 text-md-right">Alamat*</label>
                                <div class="col-sm-6 col-md-9">
                                    <textarea type="text" class="form-control" name="alamat" id="alamat" placeholder="Desa/Kelurahan. RT/RW/Blok. Kecamatan. Kabupaten/Kota" required></textarea>
                                    <?php echo form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row align-items-center">
                                <label for="telp_ortu" class="form-control-label col-sm-3 text-md-right">Telp. Orang Tua*</label>
                                <div class="col-sm-6 col-md-9">
                                    <input type="number" name="telp_ortu" class="form-control" id="telp_ortu" value="<?php echo set_value('telp_ortu'); ?>" required>
                                    <?php echo form_error('telp_ortu', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer bg-whitesmoke text-md-right">
                            <button class="btn btn-primary" id="save-btn">Simpan dan Lanjut</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
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
                            <li class="nav-item"><a href="<?php echo base_url('formulir/dataortu') ?>" class="nav-link">Data Orang Tua</a></li>
                            <li class="nav-item"><a href="<?php echo base_url('formulir/berkas') ?>" class="nav-link active">Kelengkapan Berkas</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <?php echo form_open_multipart('formulir/berkas'); ?>
                <div class="card" id="settings-card">
                    <div class="card-header">
                        <h4>Kelengkapan Berkas</h4>
                    </div>
                    <div class="card-body">

                        <div class="form-group row align-items-center">
                            <label for="nilai_indo" class="form-control-label col-sm-3 text-md-right">Nilai Mapel Bahasa Indonesia*</label>
                            <div class="col-sm-6 col-md-9">
                                <input type="number" name="nilai_indo" class="form-control" id="nilai_indo" value="<?php echo set_value('nilai_indo'); ?>" required>
                                <?php echo form_error('nilai_indo', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="form-group row align-items-center">
                            <label for="nilai_ing" class="form-control-label col-sm-3 text-md-right">Nilai Mapel Bahasa Inggris*</label>
                            <div class="col-sm-6 col-md-9">
                                <input type="number" name="nilai_ing" class="form-control" id="nilai_ing" value="<?php echo set_value('nilai_ing'); ?>" required>
                                <?php echo form_error('nilai_ing', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="form-group row align-items-center">
                            <label for="matematika" class="form-control-label col-sm-3 text-md-right">Nilai Mapel Matematika*</label>
                            <div class="col-sm-6 col-md-9">
                                <input type="number" name="matematika" class="form-control" id="matematika" value="<?php echo set_value('matematika'); ?>" required>
                                <?php echo form_error('matematika', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="form-group row align-items-center">
                            <label for="ipa" class="form-control-label col-sm-3 text-md-right">Nilai Mapel Ipa*</label>
                            <div class="col-sm-6 col-md-9">
                                <input type="number" name="ipa" class="form-control" id="ipa" value="<?php echo set_value('ipa'); ?>" required>
                                <?php echo form_error('ipa', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="form-group row align-items-center">
                            <label class="form-control-label col-sm-3 text-md-right">Foto SKL / Ijasah SMP*</label>
                            <div class="col-sm-6 col-md-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="foto_ijasah_smp" id="foto_ijasah_smp">
                                    <label class="custom-file-label" for="foto_ijasah_smp">Upload Foto SKL/Ijasah</label>
                                </div>
                                <div class="form-text text-muted">Gambar yang di upload max <?php echo substr($this->config->item('max_gambar'), 0, -3) ?> Mb</div>
                            </div>
                        </div>

                        <div class="form-group row align-items-center">
                            <label class="form-control-label col-sm-3 text-md-right">Foto Kartu Keluarga*</label>
                            <div class="col-sm-6 col-md-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="foto_shun" id="foto_shun">
                                    <label class="custom-file-label" for="foto_shun">Upload Foto Kartu Keluarga</label>
                                </div>
                                <div class="form-text text-muted">Gambar yang di upload max <?php echo substr($this->config->item('max_gambar'), 0, -3) ?> Mb</div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer bg-whitesmoke text-md-right">
                        <button class="btn btn-primary" id="save-btn">Simpan</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>
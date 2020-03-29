<section class="section">
    <div class="section-header">
        <h1><?php echo $tittle; ?></h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="<?php echo base_url('formulir/berkas') ?>">Formulir</a></div>
            <div class="breadcrumb-item">Edit Data Berkas</div>
        </div>
    </div>

    <div class="section-body">

        <div class="col-12 col-sm-8 col-lg-8">
            <?php echo $this->session->flashdata('message'); ?>
        </div>

        <div class="col-12 col-sm-8 col-lg-8">
            <div class="card">
                <div class="card-body">
                    <?php echo form_open_multipart('formulir/editberkas'); ?>

                    <label>Nilai Bahasa Indonesia*</label>
                    <div class="form-group">
                        <input type="number" name="nilai_indo" class="form-control" id="nilai_indo" value="<?php echo $data_berkas->nilai_indo ?>" required>
                        <?php echo form_error('nilai_indo', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <label>Nilai Bahasa Inggris*</label>
                    <div class="form-group">
                        <input type="number" name="nilai_ing" class="form-control" id="nilai_ing" value="<?php echo $data_berkas->nilai_ing ?>" required>
                        <?php echo form_error('nilai_ing', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <label>Nilai Matematika*</label>
                    <div class="form-group">
                        <input type="number" name="matematika" class="form-control" id="matematika" value="<?php echo $data_berkas->matematika ?>" required>
                        <?php echo form_error('matematika', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <label>Nilai Ipa*</label>
                    <div class="form-group">
                        <input type="number" name="ipa" class="form-control" id="ipa" value="<?php echo $data_berkas->ipa ?>" required>
                        <?php echo form_error('ipa', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <label>Foto Ijasah / SKL SMP</label>
                    <div class="row form-group">
                        <div class="col-sm-3">
                            <a href="<?php echo base_url('assets/data/') . $data_berkas->foto_ijasah_smp; ?>">
                                <img src="<?php echo base_url('assets/data/') . $data_berkas->foto_ijasah_smp; ?>" class="img-thumbnail">
                            </a>
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="foto_ijasah_smp" id="foto_ijasah_smp">
                                <label class="custom-file-label" for="foto_ijasah_smp">Upload Foto Ijasah</label>
                                <small>Maximal 1 mb</small>
                            </div>
                        </div>
                    </div>

                    <label>Foto SHUN</label>
                    <div class="row form-group">
                        <div class="col-sm-3">
                            <a href="<?php echo base_url('assets/data/') . $data_berkas->foto_shun; ?>">
                                <img src="<?php echo base_url('assets/data/') . $data_berkas->foto_shun; ?>" class="img-thumbnail">
                            </a>
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="foto_shun" id="foto_shun">
                                <label class="custom-file-label" for="foto_shun">Upload Foto SHUN</label>
                                <small>Maximal 1 mb</small>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-right">
                        <button class="btn btn-primary mr-1" type="submit">Save</button>
                        <a href="<?php echo base_url('formulir/berkas') ?>" class="btn btn-light">Cancel</a>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
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
                    <?php echo form_open_multipart('agenda'); ?>

                    <label>Agenda*</label>
                    <div class="form-group">
                        <textarea style="height:400px;" type="text" class="form-control" name="agenda" id="agenda" required><?php echo $env_agenda->agenda; ?></textarea>
                        <?php echo form_error('agenda', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <label>Tahun Pelajaran*</label>
                    <div class="form-group">
                        <input type="text" name="tapel" id="tapel" class="form-control" value="<?php echo $env_agenda->tapel; ?>" required>
                        <?php echo form_error('tapel', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <label>Foto daftar ulang</label>
                    <div class="row form-group">
                        <div class="col-sm-3">
                            <a href="<?php echo base_url('assets/data/') . $env_agenda->foto_daftar_ulang; ?>">
                                <img src="<?php echo base_url('assets/data/') .
                                                $env_agenda->foto_daftar_ulang; ?>" class="img-thumbnail">
                            </a>
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="foto_daftar_ulang" name="foto_daftar_ulang">
                                <label class="custom-file-label" for="foto_daftar_ulang">Choose file</label>
                                <small>Maximal <?php echo substr($this->config->item('max_du'), 0, -3) ?> Mb</small>
                            </div>
                        </div>
                    </div>

                    <label>Foto background Login</label>
                    <div class="row form-group">
                        <div class="col-sm-3">
                            <a href="<?php echo base_url('assets/data/') . $env_agenda->foto_bg; ?>">
                                <img src="<?php echo base_url('assets/data/') .
                                                $env_agenda->foto_bg; ?>" class="img-thumbnail">
                            </a>
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="foto_bg" name="foto_bg">
                                <label class="custom-file-label" for="foto_bg">Choose file</label>
                                <small>Maximal <?php echo substr($this->config->item('max_du'), 0, -3) ?> Mb</small>
                                <small> | Dimensi 400x560 px</small>
                            </div>
                        </div>
                    </div>

                    <label>Pendaftaran aktif?</label>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <select class="form-control" id="aktif" name="aktif" required>
                                <option value="">Pilih</option>
                                <option value="1">Aktif (Dibuka)</option>
                                <option value="0">Tidak aktif (Ditutup)</option>
                            </select>
                            <?php echo form_error('aktif', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="col-lg-6 pl-0">
                            <small>
                                <?php
                                if ($env_agenda->aktif == 1) {
                                    echo "*Pendaftaran <b>telah aktif (Dibuka)</b>";
                                } else {
                                    echo "*Pendaftaran <b>tidak aktif (Ditutup)</b>";
                                }
                                ?>
                            </small>
                        </div>
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
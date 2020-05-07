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
                            <li class="nav-item"><a href="<?php echo base_url('formulir') ?>" class="nav-link active">Data Diri</a></li>
                            <li class="nav-item"><a href="<?php echo base_url('formulir/dataortu') ?>" class="nav-link">Data Orang Tua</a></li>
                            <li class="nav-item"><a href="<?php echo base_url('formulir/berkas') ?>" class="nav-link">Kelengkapan Berkas</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <form id="setting-form" action="<?php echo base_url('formulir'); ?>" method="post">
                    <div class="card" id="settings-card">
                        <div class="card-header">
                            <h4>Data Diri</h4>
                        </div>
                        <div class="card-body">

                            <div class="form-group row align-items-center">
                                <label class="form-control-label col-sm-3 text-md-right">Nama Lengkap Siswa</label>
                                <div class="col-sm-6 col-md-9">
                                    <input type="text" class="form-control" value="<?php echo $user->nama ?>" readonly>
                                </div>
                            </div>

                            <div class="form-group row align-items-center">
                                <label for="tempat_lahir" class="form-control-label col-sm-3 text-md-right">Tempat Lahir*</label>
                                <div class="col-sm-6 col-md-9">
                                    <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" value="<?php echo set_value('tempat_lahir'); ?>" required>
                                    <?php echo form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row align-items-center">
                                <label for="tgl_lahir" class="form-control-label col-sm-3 text-md-right">Tanggal Lahir*</label>
                                <div class="col-sm-6 col-md-9">
                                    <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir" value="<?php echo set_value('tgl_lahir'); ?>" required>
                                    <?php echo form_error('tgl_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row align-items-center">
                                <label for="agama" class="form-control-label col-sm-3 text-md-right">Agama*</label>
                                <div class="col-sm-6 col-md-9">
                                    <select class="form-control" id="agama" name="agama" required>
                                        <option value="">Pilih</option>
                                        <option value="ISLAM">Islam</option>
                                        <option value="PROTESTAN">Protestan</option>
                                        <option value="KATOLIK">Katolik</option>
                                        <option value="HINDU">Hindu</option>
                                        <option value="BUDDHA">Buddha</option>
                                        <option value="KHONGHUCU">Khonghucu</option>
                                    </select>
                                    <?php echo form_error('agama', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row align-items-center">
                                <label for="kelamin" class="form-control-label col-sm-3 text-md-right">Kelamin*</label>
                                <div class="col-sm-6 col-md-9">
                                    <select class="form-control" id="kelamin" name="kelamin" required>
                                        <option value="">Pilih</option>
                                        <option value="L">Laki - laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                    <?php echo form_error('kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
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
                                <label for="asal_sekolah" class="form-control-label col-sm-3 text-md-right">Asal Sekolah*</label>
                                <div class="col-sm-6 col-md-9">
                                    <input type="text" name="asal_sekolah" class="form-control" id="asal_sekolah" placeholder="Contoh: SMP x ..." value="<?php echo set_value('asal_sekolah'); ?>" required>
                                    <?php echo form_error('asal_sekolah', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row align-items-center">
                                <label for="nisn" class="form-control-label col-sm-3 text-md-right">NISN*</label>
                                <div class="col-sm-6 col-md-9">
                                    <input type="number" name="nisn" class="form-control" id="nisn" value="<?php echo set_value('nisn'); ?>" required>
                                    <?php echo form_error('nisn', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row align-items-center">
                                <label for="thn_lulus" class="form-control-label col-sm-3 text-md-right">Tahun lulus*</label>
                                <div class="col-sm-6 col-md-9">
                                    <input type="number" name="thn_lulus" class="form-control" id="thn_lulus" placeholder="Contoh: 2016" value="<?php echo set_value('thn_lulus'); ?>" required>
                                    <?php echo form_error('thn_lulus', '<small class="text-danger pl-3">', '</small>'); ?>
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
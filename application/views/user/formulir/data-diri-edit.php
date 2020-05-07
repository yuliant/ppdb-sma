<section class="section">
    <div class="section-header">
        <h1><?php echo $tittle; ?></h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="<?php echo base_url('formulir') ?>">Formulir</a></div>
            <div class="breadcrumb-item">Edit Data Diri</div>
        </div>
    </div>

    <div class="section-body">

        <div class="col-12 col-sm-8 col-lg-8">
            <?php echo $this->session->flashdata('message'); ?>
        </div>

        <div class="col-12 col-sm-8 col-lg-8">
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo base_url('formulir/editdatadiri'); ?>" method="post">

                        <label>Nama Lengkap</label>
                        <div class="form-group">
                            <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $data_diri_pribadi->nama; ?>" readonly>
                        </div>

                        <label>Tempat Lahir*</label>
                        <div class="form-group">
                            <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="<?php echo $data_diri_pribadi->tempat_lahir; ?>" required>
                            <?php echo form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <label>Tanggal Lahir*</label>
                        <div class="form-group">
                            <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" value="<?php echo $data_diri_pribadi->tanggal_lahir; ?>">
                            <?php echo form_error('tgl_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <label>Agama*</label>
                        <div class="form-group">
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

                        <label>Kelamin*</label>
                        <div class="form-group">
                            <select class="form-control" id="kelamin" name="kelamin" required>
                                <option value="">Pilih</option>
                                <option value="L">Laki - laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                            <?php echo form_error('kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <label>Alamat*</label>
                        <div class="form-group">
                            <textarea type="text" class="form-control" name="alamat" id="alamat" placeholder="Desa/Kelurahan. RT/RW/Blok. Kecamatan. Kabupaten/Kota" required><?php echo $data_diri_pribadi->alamat; ?></textarea>
                            <?php echo form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <label>Asal Sekolah*</label>
                        <div class="form-group">
                            <input type="text" name="asal_sekolah" class="form-control" id="asal_sekolah" placeholder="Contoh: SMP x ..." value="<?php echo $data_diri_sekolah->asal_sekolah; ?>" required>
                            <?php echo form_error('asal_sekolah', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <label>NISN*</label>
                        <div class="form-group">
                            <input type="number" name="nisn" class="form-control" id="nisn" value="<?php echo $data_diri_sekolah->nisn; ?>" required>
                            <?php echo form_error('nisn', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <label>Tahun Lulus*</label>
                        <div class="form-group">
                            <input type="number" name="thn_lulus" class="form-control" id="thn_lulus" placeholder="Contoh: 2016" value="<?php echo $data_diri_sekolah->tahun_lulus; ?>" required>
                            <?php echo form_error('thn_lulus', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="card-footer text-right">
                            <button class="btn btn-primary mr-1" type="submit">Save</button>
                            <a href="<?php echo base_url('formulir') ?>" class="btn btn-light">Cancel</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
<section class="section">
    <div class="section-header">
        <h1><?php echo $tittle; ?></h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="<?php echo base_url('showformulir') ?>">Semua Formulir</a></div>
            <div class="breadcrumb-item">Detail Formulir</div>
        </div>
    </div>

    <div class="section-body">

        <div class="col-12 col-sm-8 col-lg-8">
            <?php echo $this->session->flashdata('message'); ?>
        </div>

        <div class="col-12 col-sm-8 col-lg-8">
            <a href="<?php echo base_url('showformulir') ?>" class="btn btn-info mb-3">
                <i class="fas fa-backward"></i> Cancel
            </a>
            <a href="<?php echo base_url('showformulir/prosescetak/') . $show->id_user ?>" class="btn btn-warning mb-3 ml-2">
                <i class="fas fa-cloud-download-alt"></i> Download
            </a>

            <div class="card">
                <div class="card-body">
                    <div id="accordion">
                        <div class="accordion">
                            <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-1" aria-expanded="true">
                                <h4><b>DIRI PRIBADI</b></h4>
                            </div>
                            <div class="accordion-body collapse show" id="panel-body-1" data-parent="#accordion">

                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-lg-3 text-md-right">Nama Lengkap Siswa</label>
                                    <div class="col-lg-9 col-md-12">
                                        <input class="form-control" value="<?php echo $show->nama ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right">Tempat Lahir</label>
                                    <div class="col-lg-9 col-md-12">
                                        <input class="form-control" value="<?php echo $show->tempat_lahir ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right">Tanggal Lahir</label>
                                    <div class="col-lg-9 col-md-12">
                                        <input type="date" class="form-control" value="<?php echo $show->tanggal_lahir ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right">Agama</label>
                                    <div class="col-lg-9 col-md-12">
                                        <input class="form-control" value="<?php echo $show->agama ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right">Kelamin</label>
                                    <div class="col-lg-9 col-md-12">
                                        <input class="form-control" value="<?php
                                                                            if ($show->kelamin == 'L') {
                                                                                echo "LAKI - LAKI";
                                                                            } else {
                                                                                echo "PEREMPUAN";
                                                                            } ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right">Alamat</label>
                                    <div class="col-lg-9 col-md-12">
                                        <textarea class="form-control" readonly><?php echo $show->alamat ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right">Nomor Telpon</label>
                                    <div class="col-lg-9 col-md-12">
                                        <input class="form-control" value="<?php echo $show->telp ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right">Asal Sekolah</label>
                                    <div class="col-lg-9 col-md-12">
                                        <input class="form-control" value="<?php echo $show->asal_sekolah ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right">NISN</label>
                                    <div class="col-lg-9 col-md-12">
                                        <input class="form-control" value="<?php echo $show->nisn ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right">Tahun Lulus</label>
                                    <div class="col-lg-9 col-md-12">
                                        <input class="form-control" value="<?php echo $show->tahun_lulus ?>" readonly>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="accordion">
                            <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-2">
                                <h4><b>DIRI ORANG TUA</b></h4>
                            </div>
                            <div class="accordion-body collapse" id="panel-body-2" data-parent="#accordion">

                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right">Nama Orang Tua</label>
                                    <div class="col-lg-9 col-md-12">
                                        <input class="form-control" value="<?php echo $show->nama_ortu ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right">Pekerjaan</label>
                                    <div class="col-lg-9 col-md-12">
                                        <input class="form-control" value="<?php echo $show->pekerjaan ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right">Alamat Orang Tua</label>
                                    <div class="col-lg-9 col-md-12">
                                        <textarea class="form-control" readonly><?php echo $show->alamat_ortu ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right">No. Telpon Orang Tua</label>
                                    <div class="col-lg-9 col-md-12">
                                        <input class="form-control" value="<?php echo $show->telp_ortu ?>" readonly>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="accordion">
                            <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-3">
                                <h4><b>KELENGKAPAN LAINNYA</b></h4>
                            </div>
                            <div class="accordion-body collapse" id="panel-body-3" data-parent="#accordion">

                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right">Nilai Mapel Bahasa Indonesia</label>
                                    <div class="col-lg-9 col-md-12">
                                        <input class="form-control" value="<?php echo $show->nilai_indo ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right">Nilai Mapel Bahasa Inggris</label>
                                    <div class="col-lg-9 col-md-12">
                                        <input class="form-control" value="<?php echo $show->nilai_ing ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right">Nilai Mapel Matematika</label>
                                    <div class="col-lg-9 col-md-12">
                                        <input class="form-control" value="<?php echo $show->matematika ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right">Nilai Mapel IPA</label>
                                    <div class="col-lg-9 col-md-12">
                                        <input class="form-control" value="<?php echo $show->ipa ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right">Foto SKL / Ijasah SMP</label>
                                    <div class="col-lg-9 col-md-12">
                                        <div class="col-lg-6">
                                            <a href="<?php echo base_url('assets/data/') . $show->foto_ijasah_smp; ?>">
                                                <img src="<?php echo base_url('assets/data/') . $show->foto_ijasah_smp; ?>" class="img-thumbnail">
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right">Foto Kartu Keluarga</label>
                                    <div class="col-lg-9 col-md-12">
                                        <div class="col-sm-6">
                                            <a href="<?php echo base_url('assets/data/') . $show->foto_shun; ?>">
                                                <img src="<?php echo base_url('assets/data/') . $show->foto_shun; ?>" class="img-thumbnail">
                                            </a>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
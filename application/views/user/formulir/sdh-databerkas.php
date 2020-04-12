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
                <div class="card" id="settings-card">
                    <div class="card-body">

                        <div class="empty-state" data-height="400">
                            <div class="empty-state-icon bg-success">
                                <i class="fas fa-check"></i>
                            </div>
                            <h2>Anda sudah mengisi data berkas</h2>
                            <p class="lead">
                                Silahkan periksa apakah ada data yang masih kosong. Jika tidak, anda dapat mencetak formulir.
                            </p>
                            <a href="<?php echo base_url('cetakformulir') ?>" class="btn btn-success mt-4">Selanjutnya Cetak Formulir</a>
                            <a href="<?php echo base_url('formulir/editberkas') ?>" class="mt-4 text-success">Edit data berkas</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
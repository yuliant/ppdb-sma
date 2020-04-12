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
                <div class="card" id="settings-card">
                    <div class="card-body">

                        <div class="empty-state" data-height="400">
                            <div class="empty-state-icon bg-success">
                                <i class="fas fa-check"></i>
                            </div>
                            <h2>Anda sudah mengisi data orang tua</h2>
                            <p class="lead">
                                Silahkan isi data lainnya yang masih kosong.
                            </p>
                            <a href="<?php echo base_url('formulir/berkas') ?>" class="btn btn-success mt-4">Selanjutnya Isi Kelangkapan Berkas</a>
                            <a href="<?php echo base_url('formulir/editdataortu') ?>" class="mt-4 text-success">Edit data orang tua</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
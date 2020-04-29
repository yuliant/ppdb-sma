<section class="section">
    <div class="section-header">
        <h1><?php echo $tittle; ?></h1>
    </div>

    <div class="section-body">

        <div class="row">
            <div class="col-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="empty-state" data-height="400">
                            <div class="empty-state-icon bg-success">
                                <i class="fas fa-check"></i>
                            </div>
                            <h2>Akun ada sudah di verifikasi</h2>
                            <p class="lead">
                                Silahkan lakukan pengisian formulir. Isi secara berurutan mulai dari data diri siswa, data orang tua, dan kelengkapan berkas.
                            </p>
                            <a href="<?php echo base_url('formulir') ?>" class="btn btn-success mt-4">Selanjutnya Isi Formulir</a>
                            <a href="#" data-toggle="modal" data-target="#logoutModal" class="mt-4 text-success">Butuh bantuan?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<?php echo $modal ?>
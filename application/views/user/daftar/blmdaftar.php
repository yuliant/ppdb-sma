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
                            <div class="empty-state-icon">
                                <i class="fas fa-question"></i>
                            </div>
                            <h2>Anda belum membayar formulir pendaftaran</h2>
                            <p class="lead">
                                Silahkan transfer Rp <?= $env_pembayaran->jml_uang ?>,- ke rekening <?= $env_pembayaran->nama_bank ?> <b><?= $env_pembayaran->rekening ?></b> atas nama <?= $env_pembayaran->atas_nama ?>. Kemudian upload foto <b>BUKTI TRANSFER PEMBAYARAN</b> dengan tekan "Sudah bayar" di bawah ini.
                            </p>
                            <a href="<?php echo base_url('daftar/bayarformulir') ?>" class="btn btn-primary mt-4">Sudah Bayar</a>
                            <a href="#" data-toggle="modal" data-target="#logoutModal" class="mt-4 bb">Butuh bantuan?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<?php echo $modal ?>
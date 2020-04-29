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
                            <div class="empty-state-icon bg-danger">
                                <i class="fas fa-times"></i>
                            </div>
                            <h2>Pendaftaran anda ditolak</h2>
                            <p class="lead">
                                Mungkin ada kesalahan saat anda menginput data. Silahkan edit dengan menekan tombol "Edit Pendaftaran" atau hubungi admin melalui tombol "bantuan" dibawah ini.
                            </p>
                            <a href="<?php echo base_url('daftar/editpendaftaran') ?>" class="btn btn-danger mt-4">Edit Pendaftaran</a>
                            <a href="#" data-toggle="modal" data-target="#logoutModal" class="mt-4 text-danger">Butuh bantuan?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<?php echo $modal ?>
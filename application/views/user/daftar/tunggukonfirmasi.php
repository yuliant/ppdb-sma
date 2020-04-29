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
                            <div class="empty-state-icon bg-warning">
                                <i class="fas fa-exclamation"></i>
                            </div>
                            <h2>Anda sudah melakukan pendaftaran</h2>
                            <p class="lead">
                                Silahkan tunggu sampai akun anda terverifikasi admin (maximal 1x24 jam)
                            </p>
                            <a href="#" data-toggle="modal" data-target="#logoutModal" class="mt-4 text-warning">Butuh bantuan?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<?php echo $modal ?>
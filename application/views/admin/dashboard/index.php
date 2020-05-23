<section class="section">
    <div class="section-header">
        <h1><?php echo $tittle; ?></h1>
    </div>

    <div class="section-body">
        <div class="row">

            <div class="col-lg-6">
                <div class="card card-large-icons">
                    <div class="card-icon bg-danger text-white">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-body">
                        <h4>Semua User</h4>
                        <p>Total semua user sebanyak <?= $countUser ?> user.</p>
                        <a href="<?php echo base_url('showuser') ?>" class="card-cta">Manage User <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card card-large-icons">
                    <div class="card-icon bg-warning text-dark">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <div class="card-body">
                        <h4>Para Pendaftar</h4>
                        <p>Total para pendaftar sebanyak <?= $countPendaftar ?> pendaftar.</p>
                        <a href="<?php echo base_url('pendaftar') ?>" class="card-cta">Manage Pendaftar <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card card-large-icons">
                    <div class="card-icon bg-success text-dark">
                        <i class="far fa-file-alt"></i>
                    </div>
                    <div class="card-body">
                        <h4>Semua Formulir</h4>
                        <p>Total semua formulir sebanyak <?= $countFormulir ?> formulir.</p>
                        <a href="<?php echo base_url('showformulir') ?>" class="card-cta">Manage Formulir <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card card-large-icons">
                    <div class="card-icon bg-light text-dark">
                        <i class="far fa-file-alt"></i>
                    </div>
                    <div class="card-body bg-dark text-white">
                        <h4>Scan Formulir</h4>
                        <p>Check keaslian formulir dari para pendaftar.</p>
                        <a href="<?php echo base_url('scan') ?>" class="card-cta text-white">Buka <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
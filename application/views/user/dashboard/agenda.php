<section class="section">
    <div class="section-header">
        <h1><?php echo $tittle; ?></h1>
    </div>

    <div class="section-body">

        <div class="card">
            <div class="card-body">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('dashboard') ?>">Panduan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-3" href="<?php echo base_url('dashboard/biayadaftarulang') ?>">Biaya Daftar Ulang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active ml-3" href="<?php echo base_url('dashboard/agenda') ?>">Agenda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-3" href="<?php echo base_url('dashboard/hubungiadmin') ?>">Hubungi admin</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="card col-12 col-sm-8 col-lg-8">
            <div class="card-body">
                <pre>
<?php echo $data->agenda ?>
                </pre>
            </div>
        </div>

    </div>
</section>
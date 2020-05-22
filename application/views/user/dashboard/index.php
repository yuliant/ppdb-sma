<section class="section">
    <div class="section-header">
        <h1><?php echo $tittle; ?></h1>
    </div>

    <div class="section-body">

        <div class="card">
            <div class="card-body">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php echo base_url('dashboard') ?>">Panduan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-3" href="<?php echo base_url('dashboard/biayadaftarulang') ?>">Biaya Daftar Ulang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-3" href="<?php echo base_url('dashboard/agenda') ?>">Agenda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-3" href="<?php echo base_url('dashboard/hubungiadmin') ?>">Hubungi admin</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row">

            <div class="col-12">
                <div class="activities">
                    <div class="activity">
                        <div class="activity-icon bg-primary text-white shadow-primary">
                            <i>
                                <b>1</b>
                            </i>
                        </div>
                        <div class="activity-detail">
                            <span class="text-job text-primary">BAYAR FORMULIR</span>
                            <p>Silahkan transfer Rp <?php echo $env_pembayaran->jml_uang ?>
                                ,- ke rekening <?php echo $env_pembayaran->nama_bank ?>
                                <?php echo $env_pembayaran->rekening ?>
                                atas nama <?php echo $env_pembayaran->atas_nama ?>.
                                Kemudian foto <b>BUKTI TRANSFER PEMBAYARAN</b>.</p>
                        </div>
                    </div>
                    <div class="activity">
                        <div class="activity-icon bg-primary text-white shadow-primary">
                            <i>
                                <b>2</b>
                            </i>
                        </div>
                        <div class="activity-detail">
                            <span class="text-job text-primary">DAFTAR</span>
                            <p>Tekan ikon garis 3 di pojok kiri atas, pilih menu <a href="<?php echo base_url('daftar') ?>"><b>DAFTAR</b></a> dan isi sesuai instruksi. Tunggu sampai akun anda terverifikasi admin (maximal 1x24 jam).</p>
                        </div>
                    </div>
                    <div class="activity">
                        <div class="activity-icon bg-primary text-white shadow-primary">
                            <i>
                                <b>3</b>
                            </i>
                        </div>
                        <div class="activity-detail">
                            <span class="text-job text-primary">ISI FORMULIR</span>
                            <p>Tekan ikon garis 3 di pojok kiri atas, pilih menu <a href="<?php echo base_url('formulir') ?>"><b>FORMULIR</b></a>. Isi secara berurutan mulai dari data diri siswa, data orang tua, dan kelengkapan berkas.</p>
                        </div>
                    </div>
                    <div class="activity">
                        <div class="activity-icon bg-primary text-white shadow-primary">
                            <i>
                                <b>4</b>
                            </i>
                        </div>
                        <div class="activity-detail">
                            <span class="text-job text-primary">CETAK FORMULIR</span>
                            <p>Tekan ikon garis 3 di pojok kiri atas, pilih menu <a href="<?php echo base_url('cetakformulir') ?>"><b>CETAK FORMULIR</b></a>. Pastikan anda sudah mengisi formulir dengan data yang sesuai.</p>
                        </div>
                    </div>
                    <div class="activity">
                        <div class="activity-icon bg-primary text-white shadow-primary">
                            <i>
                                <b>5</b>
                            </i>
                        </div>
                        <div class="activity-detail">
                            <span class="text-job text-primary">DAFTAR ULANG</span>
                            <p>Silahkan datang langsung (offline) ke <a href="https://goo.gl/maps/jzAUssEBNW3NryFHA" target="_blank"><b>SMA PGRI 1 Sidoarjo</b></a> dengan membawa formulir yang sudah di cetak.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
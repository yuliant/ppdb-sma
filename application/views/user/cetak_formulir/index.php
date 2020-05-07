<?php
$kode = base_url() . "show/" . $qrcode->token;
$this->load->library('Ciqrcode');

if (!file_exists("./assets/data/$user->username/kode.png")) {
    QRcode::png(
        $kode,
        $outfile = "assets/data/$user->username/kode.png",
        $level = QR_ECLEVEL_H,
        $size = 6,
        $margin = 2
    );
}
?>

<section class="section">
    <div class="section-header">
        <h1><?php echo $tittle; ?></h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Klik Tombol Hijau "Cetak Formulir"</h2>
        <p class="section-lead">
            Pastikan formulir yang anda cetak sudah benar.
        </p>

        <div id="output-status"></div>
        <div class="row">

            <div class="col-md-9">
                <form id="setting-form" action="" method="post">
                    <div class="card" id="settings-card">
                        <div class="card-body">

                            <div class="empty-state" data-height="400">
                                <div class="empty-state-icon bg-success">
                                    <i class="fas fa-check"></i>
                                </div>
                                <h2>Anda sudah mengisi formulir</h2>
                                <p class="lead">
                                    Silahkan datang langsung (offline) ke SMA PGRI 1 Sidoarjo dengan membawa formulir yang sudah di print/cetak.
                                </p>
                                <a href="<?php echo base_url('cetakformulir/proses') ?>" class="btn btn-success mt-4">Cetak Formulir</a>
                                <a href="https://goo.gl/maps/jzAUssEBNW3NryFHA" target="_blank" class="mt-4 text-success">Peta Lokasi</a>
                            </div>

                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="<?php echo base_url(); ?>assets/data/<?php echo $user->username ?>/kode.png" class="img-fluid mb-2" alt="Responsive image">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item"><a href="<?php echo base_url() . 'show/' . $qrcode->token ?>" target="_blank" class="nav-link active">Kunjungi Profil</a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
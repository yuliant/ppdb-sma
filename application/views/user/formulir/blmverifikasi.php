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
                                <i class="fas fa-exclamation"></i>
                            </div>
                            <h2>Akun anda belum di verifikasi admin</h2>
                            <p class="lead">
                                Silahkan daftar dengan menekan menu "Daftar" di pojok kiri. Bagi anda yang sudah mendaftar, silahkan tunggu sampai akun anda terverifikasi admin (maximal 1x24 jam)
                            </p>
                            <a href="#" data-toggle="modal" data-target="#logoutModal" class="mt-4 text-danger">Butuh bantuan?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Panduan Pembayaran Formulir</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <ol>
                    <li>Silahkan transfer Rp 50.000,- ke rekening BNI 16108010022000 atas nama Ade setya. Kemudian foto <b>BUKTI TRANSFER PEMBAYARAN</b>.</li>
                    <li>Pilih menu "Daftar" dan tekan tombol "sudah bayar". Isi form yang tersedia lalu upload Foto bukti transfer pembayaran tadi (max ukuran foto 500 KB).</li>
                    <li>Tunggu sampai akun anda terverifikasi admin (maximal 1x24 jam).</li>
                    <li>Jika sudah terverifikasi, anda dapat mengisi formulir dengan memilih menu "Formulir". Isi secara berurutan mulai dari data diri siswa, data orang tua, dan kelengkapan berkas.</li>
                </ol>
            </div>
            <div class="modal-footer">
                <a class="btn btn-light" href="<?php echo base_url('dashboard/hubungiadmin') ?>">Hubungi admin</a>
                <button class="btn btn-danger" type="button" data-dismiss="modal">Oke</button>
            </div>
        </div>
    </div>
</div>
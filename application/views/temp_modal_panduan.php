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
                    <li>Silahkan transfer Rp <?= $env_pembayaran->jml_uang ?>,- ke rekening <?= $env_pembayaran->nama_bank ?> <?= $env_pembayaran->rekening ?> atas nama <?= $env_pembayaran->atas_nama ?>. Kemudian foto <b>BUKTI TRANSFER PEMBAYARAN</b>.</li>
                    <li>Pilih menu "Daftar" dan tekan tombol "sudah bayar". Isi form yang tersedia lalu upload Foto bukti transfer pembayaran tadi.</li>
                    <li>Tunggu sampai akun anda terverifikasi admin (maximal 1x24 jam).</li>
                    <li>Jika sudah terverifikasi, anda dapat mengisi formulir dengan memilih menu "Formulir". Isi secara berurutan mulai dari data diri siswa, data orang tua, dan kelengkapan berkas.</li>
                </ol>
            </div>
            <div class="modal-footer">
                <a class="btn btn-light" href="<?php echo base_url('dashboard/hubungiadmin') ?>">Hubungi admin</a>
                <button class="btn btn-dark" type="button" data-dismiss="modal">Oke</button>
            </div>
        </div>
    </div>
</div>
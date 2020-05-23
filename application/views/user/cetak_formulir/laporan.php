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

$template = new \PhpOffice\PhpWord\TemplateProcessor('assets/data/formulir.docx');

//keterangan siswa
$template->setValue('nama', $data_diri->nama);
$template->setValue('tempat_lahir', $data_diri->tempat_lahir);
$template->setValue('tanggal_lahir', $data_diri->tanggal_lahir);
$template->setValue('agama', $data_diri->agama);
$template->setValue('kelamin', $data_diri->kelamin);
$template->setValue('alamat', $data_diri->alamat);

//keterangan sekolah
$template->setValue('nisn', $data_sekolah->nisn);
$template->setValue('asal_sekolah', $data_sekolah->asal_sekolah);
$template->setValue('tahun_lulus', $data_sekolah->tahun_lulus);

//keterangan orang tua
$template->setValue('nama_ortu', $data_ortu->nama_ortu);
$template->setValue('pekerjaan', $data_ortu->pekerjaan);
$template->setValue('telp_ortu', $data_ortu->telp_ortu);
$template->setValue('alamat_ortu', $data_ortu->alamat_ortu);

//keterangan nilai ujian
$template->setValue('nilai_indo', $berkas->nilai_indo);
$template->setValue('nilai_ing', $berkas->nilai_ing);
$template->setValue('matematika', $berkas->matematika);
$template->setValue('ipa', $berkas->ipa);
$template->setValue('tanggal_dibuat', date("d-m-Y", strtotime($berkas->berkas_created)));

//keterangan tapel
$template->setValue('tapel', $env_agenda->tapel);

//keterangan tapel
$template->setValue('url_page', $kode);

//set image
$template->setImage('image1.jpg', "assets/data/$user->username/kode.png");
$template->saveAs('assets/data/' . $data_diri->username . '/FORMULIR ' . $data_diri->nama . '.docx');

if ($this->uri->segment(2) == 'prosescetak') {
    echo "<h2>Download data <a href='" . base_url('assets/data/') . $data_diri->username . '/' . '/FORMULIR ' . $data_diri->nama . '.docx' .
        "' target='_blank'>Disini</a>  |  <a href='" . base_url('showformulir/detail/') . $user->user_id . "'>Kembali</a></h2>";
} else {
    echo "<h2>Download data <a href='" . base_url('assets/data/') . $data_diri->username . '/' . '/FORMULIR ' . $data_diri->nama . '.docx' .
        "' target='_blank'>Disini</a>  |  <a href='" . base_url('cetakformulir') . "'>Kembali</a></h2>";
}

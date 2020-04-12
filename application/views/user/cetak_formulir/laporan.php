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

//set image
$template->setValue('nama', $data_diri->nama);
$template->setImage('image1.jpg', "assets/data/$user->username/kode.png");
$template->saveAs('assets/data/' . $data_diri->username . '/FORMULIR ' . $data_diri->nama . '.docx');
header("Content-Type:application/msword");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Disposition: attachment;filename=FORMULIR " . $data_diri->nama . ".docx");
readfile('assets/data/' . $data_diri->username . '/FORMULIR ' . $data_diri->nama . '.docx');

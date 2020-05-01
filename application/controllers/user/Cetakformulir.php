<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cetakformulir extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('user/Formulir_m', 'Formulir_m');
        $this->load->model('admin/env/Agenda_m', 'Agenda_m');
        $this->load->model('Show_m');
    }

    public function index()
    {
        $data['user'] = $this->fungsi->user_login();
        $id = $data['user']->user_id;

        $cekdatadiri = $this->Formulir_m->getDataDiri($id)->num_rows();
        $cekdataortu = $this->Formulir_m->getDataOrtu($id)->num_rows();
        $cekberkas = $this->Formulir_m->getBerkas($id)->num_rows();

        if ($cekdatadiri > 0 && $cekdataortu > 0 && $cekberkas > 0) {
            $data['qrcode'] = $this->Show_m->getTokenQrcode($id)->row();
            $data['tittle'] = "Cetak Formulir";

            $this->template->load('temp_dashboard', 'user/cetak_formulir/index', $data);
        } else {
            echo "Formulir yang anda isi blm lengkap atau anda belum mendaftar, silahkan baca dengan seksama panduan pada menu 'dashboard' dengan klik tombol <a href=" . base_url('dashboard') . ">kembali</a>";
        }
    }

    public function proses()
    {
        $data['user'] = $this->fungsi->user_login();
        $id = $data['user']->user_id;

        $data['data_diri'] = $this->Formulir_m->getDataDiri($id)->row();
        $data['data_sekolah'] = $this->Formulir_m->getDataSekolah($id)->row();
        $data['data_ortu'] = $this->Formulir_m->getDataOrtu($id)->row();
        $data['berkas'] = $this->Formulir_m->getBerkas($id)->row();

        if ($data['data_diri'] && $data['data_ortu'] && $data['berkas']) {
            include_once APPPATH . 'vendor/autoload.php';
            $data['qrcode'] = $this->Show_m->getTokenQrcode($id)->row();
            $data['env_agenda'] = $this->Agenda_m->getAgenda()->row();
            $this->load->view('user/cetak_formulir/laporan', $data);
        } else {
            echo "formulir yang anda isi blm lengkap, klik tombol <a href=" . base_url('dashboard') . ">kembali</a>";
        }
    }
}

/* End of file Cetakformulir.php */

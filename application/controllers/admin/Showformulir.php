<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Showformulir extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
    }

    function get_ajax()
    {
        $this->load->model('admin/Formulir_m', 'Formulir_m');

        $list = $this->Formulir_m->get_datatables();
        $data = array();
        $no = @$_POST['start'];

        foreach ($list as $item) {
            ++$no;
            $row = array();
            $row['no'] = $no . ".";
            $row['nama'] = '<a href="' . base_url('showformulir/detail/') . $item->id_user . '">' . $item->nama . '</a>';
            $row['username'] = $item->username;
            $row['tgl_daftar'] = date("d-m-Y", strtotime($item->berkas_created));

            // add html for action
            $row['action'] = '<a href="' . base_url('showformulir/detail/' . $item->id_user) . '" class="badge badge-info btn-xs">Baca</a>';

            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->Formulir_m->count_all(),
            "recordsFiltered" => $this->Formulir_m->count_filtered(),
            "data" => $data,
        );
        // output to json format
        echo json_encode($output);
    }

    public function index()
    {
        $data['tittle'] = "Semua Formulir";
        $this->template->load('temp_dashboard', 'admin/showformulir/datatable', $data);
    }

    public function detail($id)
    {
        $this->load->model('admin/Formulir_m', 'Formulir_m');

        if ($id == null) {
            echo "User ini belum mengisi formulir secara lengkap " . "<a href=" . base_url('showformulir') . ">Kembali</a>";
        } else {
            $data['tittle'] = "Detail Formulir";
            $data['show'] = $this->Formulir_m->getAllFormulir($id, null, null, null)->row();
            $this->template->load('temp_dashboard', 'admin/showformulir/detail', $data);
        }
    }

    public function prosescetak($user_id)
    {
        //untuk mencetak formulir
        $this->load->model('user/User_m', 'User_m');
        $this->load->model('user/Formulir_m', 'User_Formulir_m');
        $this->load->model('admin/env/Agenda_m', 'Agenda_m');
        $this->load->model('Show_m');

        $data['user'] = $this->User_m->get($user_id)->row();
        $id = $data['user']->user_id;

        $data['data_diri'] = $this->User_Formulir_m->getDataDiri($id)->row();
        $data['data_sekolah'] = $this->User_Formulir_m->getDataSekolah($id)->row();
        $data['data_ortu'] = $this->User_Formulir_m->getDataOrtu($id)->row();
        $data['berkas'] = $this->User_Formulir_m->getBerkas($id)->row();

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

/* End of file Showformulir.php */

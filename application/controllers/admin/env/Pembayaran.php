<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
        $this->load->library('form_validation');
        $this->load->model('admin/env/Pembayaran_m', 'Pembayaran_m');
    }

    public function index()
    {
        $data['tittle'] = "Atur Metode Pembayaran";
        $data['data'] = $this->Pembayaran_m->getPembayaran()->row();

        $this->form_validation->set_rules('nama_bank', 'Nama bank', 'trim|required|max_length[10]');
        $this->form_validation->set_rules('jml_uang', 'Jumlah uang', 'trim|required|max_length[8]');
        $this->form_validation->set_rules('rekening', 'Rekening', 'trim|required|max_length[40]');
        $this->form_validation->set_rules('atas_nama', 'Atas nama', 'trim|required|max_length[40]');
        //message
        $this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');
        $this->form_validation->set_message('max_length', '%s anda terlalu panjang');
        if ($this->form_validation->run() == false) {
            $this->template->load('temp_dashboard', 'admin/env/pembayaran/index', $data);
        } else {
            $post = $this->input->post(null, TRUE);
            $this->Pembayaran_m->setPembayaran($post);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data metode pembayaran berhasil diubah</div>');
            redirect('pembayaran');
        }
    }
}

/* End of file Pembayaran.php */

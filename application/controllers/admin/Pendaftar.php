<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
        $this->load->model('admin/Pendaftar_m', 'Pendaftar_m');
        $this->load->model('admin/Pagination_m', 'Pagination_m');
    }

    public function index()
    {
        $data['tittle'] = "Pendaftar";

        //load library pagination
        $this->load->library('pagination');

        //delete session from 'keywordPreprocessing'
        $this->session->unset_userdata('keywordPreprocessing');

        //ambil data searching
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keywordPreprocessing', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keywordPreprocessing');
        }

        //menghitung jumlah data yang dicari
        $countAllResults = $this->Pendaftar_m->AllUserDaftar(
            null,
            null,
            $data['keyword']
        );

        $config['total_rows'] = $countAllResults->num_rows();
        $config['base_url'] = $this->Pagination_m->urlPendaftar();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = $this->Pagination_m->perPage();

        //initialize
        $this->pagination->initialize($config);

        //set data to show
        $data['start'] = $this->uri->segment(3);
        $data['pendaftar_row'] = $this->Pendaftar_m->AllUserDaftar(
            $config['per_page'],
            $data['start'],
            $data['keyword']
        );

        $this->template->load('temp_dashboard', 'admin/pendaftar/index', $data);
    }

    public function detail($id)
    {
        $data['tittle'] = "Pendaftar";
        $data['daftar'] = $this->Pendaftar_m->UserDaftarById($id)->row();
        $this->template->load('temp_dashboard', 'admin/pendaftar/detail', $data);
    }

    public function changestatus()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['konfirmasi'])) {
            $this->Pendaftar_m->konfirmasiDaftar($post);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Konfirmasi pembayaran berhasil dilakukan</div>');
            redirect('pendaftar/detail/' . $post['id_user']);
        } elseif (isset($_POST['tolak'])) {
            $this->Pendaftar_m->tolakDaftar($post);
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Konfirmasi pembayaran telah ditolak</div>');
            redirect('pendaftar/detail/' . $post['id_user']);
        } else {
            redirect('pendaftar');
        }
    }
}

/* End of file Pendaftar.php */

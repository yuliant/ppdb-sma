<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Showformulir extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
        $this->load->model('admin/Formulir_m', 'Formulir_m');
        $this->load->model('admin/Pagination_m', 'Pagination_m');
    }

    public function index()
    {
        $data['tittle'] = "Semua Formulir";

        //load library pagination
        $this->load->library('pagination');

        //delete session from 'keywordFormulir'
        $this->session->unset_userdata('keywordFormulir');

        //ambil data searching
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keywordFormulir', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keywordFormulir');
        }

        //menghitung jumlah data yang dicari
        $countAllResults = $this->Formulir_m->getAllFormulir(
            null,
            null,
            null,
            $data['keyword']
        );

        $config['total_rows'] = $countAllResults->num_rows();
        $config['base_url'] = $this->Pagination_m->urlFormulir();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = $this->Pagination_m->perPage();

        //initialize
        $this->pagination->initialize($config);

        //set data to show
        $data['start'] = $this->uri->segment(3);
        $data['formulir_row'] = $this->Formulir_m->getAllFormulir(
            null,
            $config['per_page'],
            $data['start'],
            $data['keyword']
        );

        $this->template->load('temp_dashboard', 'admin/showformulir/index', $data);
    }

    public function detail($id)
    {
        $data['tittle'] = "Detail Formulir";
        $data['show'] = $this->Formulir_m->getAllFormulir($id, null, null, null)->row();
        $this->template->load('temp_dashboard', 'admin/showformulir/detail', $data);
    }
}

/* End of file Showformulir.php */

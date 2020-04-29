<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
        $this->load->model('admin/Showuser_m', 'Showuser_m');
        $this->load->model('admin/Pendaftar_m', 'Pendaftar_m');
        $this->load->model('admin/Formulir_m', 'Formulir_m');
    }

    public function index()
    {
        $data['tittle'] = "Dashboard";
        $data['countUser'] = $this->Showuser_m->AllUser(null, null, null, null)->num_rows();
        $data['countPendaftar'] = $this->Pendaftar_m->AllUserDaftar(null, null, null, null)->num_rows();
        $data['countFormulir'] = $this->Formulir_m->getAllFormulir(null, null, null, null)->num_rows();
        $this->template->load('temp_dashboard', 'admin/dashboard/index', $data);
    }
}

/* End of file Dashboard.php */

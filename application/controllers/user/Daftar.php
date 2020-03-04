<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Daftar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
    }

    public function index()
    {
        $data['tittle'] = "Daftar";
        $this->template->load('temp_dashboard', 'user/daftar/index', $data);
    }
}

/* End of file Daftar.php */

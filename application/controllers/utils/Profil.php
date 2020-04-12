<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
    }

    public function index()
    {
        $data['user'] = $this->fungsi->user_login();
        $data['tittle'] = "Profil";
        $this->template->load('temp_dashboard', 'utils/profile', $data);
    }
}

/* End of file Profil.php */

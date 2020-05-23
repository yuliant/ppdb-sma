<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Scan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
    }

    public function index()
    {
        $data['tittle'] = "Scan Formulir";
        $url_page = htmlspecialchars($this->input->post('url_page'));
        if ($url_page) {
            echo "<script type=\"text/javascript\">window.open('$url_page', '_blank')</script>";
            // echo "<a href='" . base_url('scan') . "'>Kembali</a>";
            // echo "<a href='$url_page' target='_blank'>Click here</a> if the window does not open in a seperate window.";
        }
        $this->template->load('temp_dashboard', 'admin/scan/index', $data);
    }
}

/* End of file Scan.php */

<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
    }

    public function index()
    {
        $data['tittle'] = "Dashboard";
        $this->template->load('temp_dashboard', 'admin/dashboard/index', $data);
    }
}

/* End of file Dashboard.php */

<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Formulir extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
    }

    public function index()
    {
        echo "formulir";
    }
}

/* End of file Formulir.php */

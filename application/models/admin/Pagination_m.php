<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pagination_m extends CI_Model
{
    public function urlUser()
    {
        return base_url() . "showuser/index";
    }

    public function urlPendaftar()
    {
        return base_url() . "pendaftar/index";
    }

    public function urlFormulir()
    {
        return base_url() . "showformulir/index";
    }

    public function perPage()
    {
        return 10;
    }
}

/* End of file Pagination_m.php */

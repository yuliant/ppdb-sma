<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pagination_m extends CI_Model
{
    public function urlPendaftar()
    {
        return "http://localhost:90/ppdb-sma/pendaftar/index";
    }
    public function perPage()
    {
        return 10;
    }
}

/* End of file Pagination_m.php */

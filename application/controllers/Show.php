<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Show extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user/Formulir_m', 'Formulir_m');
        $this->load->model('Show_m');
    }


    public function index($token)
    {
        $getQrcode = $this->Show_m->getIdQrcode($token)->row();
        if ($getQrcode) {
            $id = $getQrcode->id_user;
            $data['show'] = $this->Formulir_m->getAllFormulir($id)->row();
            $this->load->view('show/index', $data);
        } else {
            echo "data tidak ada";
        }
    }
}

/* End of file Show.php */

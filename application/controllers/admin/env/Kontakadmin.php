<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kontakadmin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
        $this->load->library('form_validation');
        $this->load->model('admin/env/Kontakadmin_m', 'Kontakadmin_m');
    }

    public function index()
    {
        $data['tittle'] = "Atur Kontak Admin";
        $data['data'] = $this->Kontakadmin_m->getKontak()->row();

        $this->form_validation->set_rules('nama_kontak', 'Nama admin', 'required|trim|max_length[40]');
        $this->form_validation->set_rules('nomor_kontak', 'Nomor telpon', 'required|numeric|min_length[10]|max_length[15]');
        $this->form_validation->set_rules('email_admin', 'Email admin', 'trim|valid_email|max_length[40]');
        $this->form_validation->set_rules('alamat_admin', 'Alamat admin', 'required');

        //message
        $this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');
        $this->form_validation->set_message('numeric', '%s harus diisi berupa angka');
        $this->form_validation->set_message('max_length', '%s anda terlalu panjang');
        $this->form_validation->set_message('min_length', '%s anda terlalu pendek');
        $this->form_validation->set_message('valid_email', '%s yang anda gunakan tidak valid');
        if ($this->form_validation->run() == false) {
            $this->template->load('temp_dashboard', 'admin/env/kontakadmin/index', $data);
        } else {
            $post = $this->input->post(null, TRUE);
            $this->Kontakadmin_m->setKontak($post);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kontak admin berhasil diatur</div>');
            redirect('kontakadmin');
        }
    }
}

/* End of file Kontakadmin.php */

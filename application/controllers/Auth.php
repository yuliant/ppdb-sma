<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth/auth_m', 'auth_m');
        $this->load->library('form_validation');
    }

    public function index()
    {
        check_already_login();
        $this->form_validation->set_rules("username", "Username", "required|trim");
        $this->form_validation->set_rules("password", "Password", "required|trim");

        //message
        $this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');
        if ($this->form_validation->run() == false) {
            $data['tittle'] = "Login";
            $this->load->view('auth/login', $data);
        } else {
            $this->_proses();
        }
    }

    private function _proses()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($post['login'])) {
            $query = $this->auth_m->login($post);
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $params = array(
                    'user_id' => $row->user_id,
                    'level' => $row->level
                );
                $this->session->set_userdata($params);
                redirect('dashboard');
            } else {
                redirect('auth');
            }
        } else {
            redirect('auth');
        }
    }

    public function logout()
    {
        $params = array('user_id', 'level');
        $this->session->unset_userdata($params);
        redirect('auth');
    }
}

/* End of file Auth.php */

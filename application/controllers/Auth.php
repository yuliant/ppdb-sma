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
                if ($row->is_active == 1) {
                    if (password_verify(htmlspecialchars($this->input->post('password'), true), $row->password)) {
                        $params = array(
                            'user_id' => $row->user_id,
                            'level' => $row->level
                        );
                        $this->session->set_userdata($params);

                        if ($this->fungsi->user_login()->level == 1) {
                            redirect('admindashboard');
                        } else {
                            redirect('dashboard');
                        }
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah</div>');
                        redirect('auth');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Log in gagal, akun anda belum aktif</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Log in gagal, akun anda tidak ditemukan</div>');
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
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kamu sudah log out</div>');
        redirect('auth');
    }

    public function registration()
    {
        check_already_login();

        $this->form_validation->set_rules("name", "Nama Lengkap", "required|trim");
        $this->form_validation->set_rules("username", "Username", "required|trim|min_length[5]|is_unique[user.username]|callback_customAlpha", [
            'is_unique' => 'Username ini sudah dipakai, silahkan diganti',
            'min_length' => 'Password minimal 5 karakter'
        ]);
        $this->form_validation->set_rules("password1", "Password", "required|trim|min_length[6]|matches[password2]", [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password minimal 6 karakter'
        ]);
        $this->form_validation->set_rules("password2", "Konfirmasi Password", "required|trim|min_length[6]|matches[password1]", [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password minimal 6 karakter'
        ]);

        //message
        $this->form_validation->set_message('customAlpha', 'Selain huruf dan angka, username tidak diperbolehkan');
        $this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');

        if ($this->form_validation->run() == false) {
            $data['tittle'] = "Registration";
            $this->load->view('auth/register', $data);
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('name', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'image' => 'default.jpg',
                'level' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! akun anda berhasil dibuat. Silahkan login</div>');
            redirect('auth');
        }
    }

    // callback function
    function customAlpha($str)
    {
        if (!preg_match("/^[a-zA-Z0-9]*$/", $str)) {
            return false;
        } else {
            return true;
        }
    }
}

/* End of file Auth.php */

<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_m');
        $this->load->library('form_validation');
        $this->load->model('admin/env/Agenda_m', 'Agenda_m');
    }

    public function index()
    {
        check_already_login();
        $this->form_validation->set_rules("username", "Username", "required|trim");
        $this->form_validation->set_rules("password", "Password", "required|trim");

        //message
        $this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');
        if ($this->form_validation->run() == false) {
            $data['tittle'] = "Login | PPDB Smagrisda";

            $this->load->model('admin/env/Kontakadmin_m', 'Kontakadmin_m');

            $data['env_agenda'] = $this->Agenda_m->getAgenda()->row();
            $data['env_kontak'] = $this->Kontakadmin_m->getKontak()->row();

            $this->load->view('auth/login', $data);
        } else {
            $this->_proses();
        }
    }

    private function _proses()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($post['login'])) {

            $query = $this->Auth_m->login($post);
            if ($query->num_rows() > 0) {

                $cek_aktif = $this->Agenda_m->getAgenda()->row()->aktif;
                $row = $query->row();
                if ($cek_aktif == 1 || $row->level == 1) {

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
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Login gagal, akun anda belum aktif</div>');
                        redirect('auth');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Login gagal, pendaftaran belum dibuka</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Login gagal, akun tidak ditemukan</div>');
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
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda sudah log out</div>');
        redirect('auth');
    }

    public function registration()
    {
        check_already_login();

        $cek_aktif = $this->Agenda_m->getAgenda()->row()->aktif;
        if ($cek_aktif == 1) {
            $this->form_validation->set_rules("name", "Nama Lengkap", "required|trim");
            $this->form_validation->set_rules("username", "Username", "required|trim|min_length[5]|is_unique[user.username]|callback_customAlpha", [
                'is_unique' => 'Username ini sudah dipakai, silahkan diganti',
                'min_length' => 'Username minimal 5 karakter'
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
            $this->form_validation->set_message('customAlpha', 'Selain huruf dan angka, spasi atau karakter lain tidak diperbolehkan');
            $this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');

            if ($this->form_validation->run() == false) {
                $data['tittle'] = "Registration | PPDB Smagrisda";
                $this->load->view('auth/register', $data);
            } else {

                $recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
                $userIp = $this->input->ip_address();
                $secret = '6LcUNfEUAAAAAPSfUNjiqzwa6_KuN0nO0wq1pmHR';

                $credential = array(
                    'secret' => $secret,
                    'response' => $this->input->post('g-recaptcha-response')
                );

                $verify = curl_init();
                curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
                curl_setopt($verify, CURLOPT_POST, true);
                curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($credential));
                curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($verify);

                $status = json_decode($response, true);

                if ($status['success']) {
                    $post = $this->input->post(null, TRUE);
                    $this->Auth_m->registration($post);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! akun anda berhasil dibuat. Silahkan login</div>');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Verifikasi recaptcha anda tidak berhasil</div>');
                    redirect('auth/registration');
                }
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda tidak bisa membuat akun, pendaftaran belum dibuka</div>');
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

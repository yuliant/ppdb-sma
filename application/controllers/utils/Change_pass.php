<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Change_pass extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['tittle'] = "Ubah Password";
        //validation
        $this->form_validation->set_rules('current_pasword', 'Password Terdahulu', 'required|trim|min_length[6]');
        $this->form_validation->set_rules('new_pasword1', 'Password Baru', 'required|trim|min_length[6]|matches[new_pasword2]', [
            'matches' => 'Password tidak sama!'
        ]);
        $this->form_validation->set_rules('new_pasword2', 'Konfirmasi Password Baru', 'required|trim|min_length[6]|matches[new_pasword1]', [
            'matches' => 'Password tidak sama!'
        ]);

        //message
        $this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');
        $this->form_validation->set_message('min_length', '%s harus minimal 6 huruf');
        if ($this->form_validation->run() == false) {
            $this->template->load('temp_dashboard', 'utils/change-pass', $data);
        } else {
            $current_password = htmlspecialchars($this->input->post('current_pasword'), true);
            $new_password = htmlspecialchars($this->input->post('new_pasword1'), true);
            if (!password_verify($current_password, $this->fungsi->user_login()->password)) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password</div>');
                redirect('changepass');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password</div>');
                    redirect('changepass');
                } else {
                    //password yang benar
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    //update password
                    $this->db->set('password', $password_hash);
                    $this->db->where('username', $this->fungsi->user_login()->username);
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password has been changed</div>');
                    redirect('changepass');
                }
            }
        }
    }
}

/* End of file Change_pass.php */

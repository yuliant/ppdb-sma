<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Edit_profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        check_not_login();
    }

    public function index()
    {
        $data['tittle'] = "Edit Profil";

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        //message
        $this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');
        if ($this->form_validation->run() == false) {
            $this->template->load('temp_dashboard', 'utils/edit-profile', $data);
        } else {
            $username = htmlspecialchars($this->input->post('username'), true);
            $nama = htmlspecialchars($this->input->post('nama'), true);

            // cek jika ada gambar
            $upload_image = $_FILES['image']['name'];
            $username = $this->fungsi->user_login()->username;

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '1048';
                $config['upload_path'] = './assets/sources/img/' . $username;

                if (!is_dir('./assets/sources/img/' . $username)) {
                    mkdir('./assets/sources/img/' . $username, 0777, TRUE);
                }

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $this->fungsi->user_login()->image;
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/sources/img/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $username . '/' . $new_image);
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('profil');
                }
            }

            $this->db->set('nama', $nama);
            $this->db->where('username', $username);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profil berhasil di update</div>');
            redirect('profil');
        }
    }
}

/* End of file Edit_profile.php */

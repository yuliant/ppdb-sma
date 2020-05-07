<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Edit_profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->library('form_validation');
        $this->load->model('user/Formulir_m', 'Formulir_m');
        $this->load->config('foto');
    }

    public function index()
    {
        $data['tittle'] = "Edit Profil";
        $data['user'] = $this->fungsi->user_login();
        $id = $data['user']->user_id;

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        //message
        $this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');
        if ($this->form_validation->run() == false) {
            $this->template->load('temp_dashboard', 'utils/edit-profile', $data);
        } else {
            $nama = htmlspecialchars($this->input->post('nama'), true);

            if ($this->Formulir_m->getDataDiri($id)->num_rows() > 0) {
                $this->db->set('nama', strtoupper($nama));
                $this->db->where('id_user', $id);
                $this->db->update('data_diri_pribadi');
            }

            // cek jika ada gambar
            $upload_image = $_FILES['image']['name'];
            $username = $data['user']->username;

            if ($upload_image) {
                $config['allowed_types'] = $this->config->item('type_pp');
                $config['max_size']      = $this->config->item('max_pp');
                $config['upload_path'] = './assets/data/' . $username;

                if (!is_dir('./assets/data/' . $username)) {
                    mkdir('./assets/data/' . $username, 0777, TRUE);
                }

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']->image;
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/data/' . $old_image);
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

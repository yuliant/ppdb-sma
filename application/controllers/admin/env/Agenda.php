<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Agenda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
        $this->load->library('form_validation');
        $this->load->model('admin/env/Agenda_m', 'Agenda_m');
        $this->load->config('foto');
    }

    public function index()
    {
        $data['tittle'] = "Atur Agenda";
        $data['env_agenda'] = $this->Agenda_m->getAgenda()->row();

        $this->form_validation->set_rules('agenda', 'Agenda', 'required');
        $this->form_validation->set_rules('tapel', 'Tahun pelajaran', 'required|trim|max_length[10]');
        $this->form_validation->set_rules('aktif', 'Aktif?', 'required');

        //message
        $this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');
        $this->form_validation->set_message('max_length', '%s anda terlalu panjang');
        if ($this->form_validation->run() == false) {
            $this->template->load('temp_dashboard', 'admin/env/agenda/index', $data);
        } else {

            $upload_ft_dtr_ulang = $_FILES['foto_daftar_ulang']['name'];
            $upload_ft_bg = $_FILES['foto_bg']['name'];
            $input_ft_dtr_ulang = null;
            $input_ft_bg = null;

            if ($upload_ft_dtr_ulang) {
                $config['allowed_types'] = $this->config->item('type_du');
                $config['max_size']      = $this->config->item('max_du');
                $config['upload_path'] = './assets/data/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto_daftar_ulang')) {
                    $old_image = $data['env_agenda']->foto_daftar_ulang;

                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/data/' . $old_image);
                    }

                    $file_ft_dtr_ulang = $this->upload->data('file_name');
                    $input_ft_dtr_ulang = $file_ft_dtr_ulang;
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('agenda');
                }
            }

            if ($upload_ft_bg) {
                $config['allowed_types'] = $this->config->item('type_du');
                $config['max_size']      = $this->config->item('max_du');
                $config['upload_path'] = './assets/data/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto_bg')) {
                    $old_image = $data['env_agenda']->foto_bg;

                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/data/' . $old_image);
                    }

                    $file_ft_bg = $this->upload->data('file_name');
                    $input_ft_bg = $file_ft_bg;
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('agenda');
                }
            }
            $post = $this->input->post(null, TRUE);
            $this->Agenda_m->setAgenda($post, $input_ft_dtr_ulang, $input_ft_bg);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Agenda berhasil di edit</div>');
            redirect('agenda');
        }
    }
}

/* End of file Agenda.php */

<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Daftar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('daftar/Daftar_m', 'Daftar_m');
        check_not_login();
    }

    public function index()
    {
        $data['tittle'] = "Daftar";

        $id = $this->fungsi->user_login()->user_id;
        $cekdaftar = $this->Daftar_m->cekstatus($id);

        if ($cekdaftar->num_rows() > 0) {
            //belum daftar
            $cekstatus = $cekdaftar->row();

            if ($cekstatus->status == 0) {
                //sudah daftar dan tinggal tunggu konfirmasi
                $this->template->load('temp_dashboard', 'user/daftar/tunggukonfirmasi', $data);
            } elseif ($cekstatus->status == 1) {
                //sudah terverifikasi oleh admin
                $this->template->load('temp_dashboard', 'user/daftar/sudahverifikasi', $data);
            } else {
                //pendaftaran ditolak, pendaftar dapat melakukan pengeditan
                $this->template->load('temp_dashboard', 'user/daftar/ditolak', $data);
            }
        } else {
            $this->template->load('temp_dashboard', 'user/daftar/blmdaftar', $data);
        }
    }

    public function bayarformulir()
    {
        $id = $this->fungsi->user_login()->user_id;
        $cekstatus = $this->Daftar_m->cekstatus($id);

        if ($cekstatus->num_rows() > 0) {
            redirect('daftar');
        } else {
            $data['tittle'] = "Konfirmasi Pembayaran";

            $this->form_validation->set_rules('telp', 'Telp', 'required|numeric|min_length[10]|max_length[15]');
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|min_length[10]|max_length[30]');
            //message
            $this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');
            $this->form_validation->set_message('numeric', '%s harus diisi dengan nominasi angka');
            $this->form_validation->set_message('valid_email', '%s harus diisi dengan email yang valid');
            $this->form_validation->set_message('min_length', '%s harus diisi minimal 10 karakter');
            $this->form_validation->set_message('max_length', '%s anda terlalu panjang');
            if ($this->form_validation->run() == false) {
                $this->template->load('temp_dashboard', 'user/daftar/add-bayarformulir', $data);
            } else {
                // cek jika ada gambar
                $upload_image = $_FILES['image']['name'];
                $username = $this->fungsi->user_login()->username;

                if ($upload_image) {
                    $config['allowed_types'] = 'jpg|png';
                    $config['max_size']      = '1048';
                    $config['upload_path'] = './assets/data/' . $username;

                    if (!is_dir('./assets/data/' . $username)) {
                        mkdir('./assets/data/' . $username, 0777, TRUE);
                    }

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('image')) {
                        $new_image = $this->upload->data('file_name');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                        redirect('daftar/bayarformulir');
                    }

                    $data = [
                        'id_user' => $id,
                        'telp' => htmlspecialchars($this->input->post('telp'), true),
                        'email' => htmlspecialchars($this->input->post('email'), true),
                        'foto_bukti_transfer' => $username . '/' . $new_image,
                        'status' => 0
                    ];
                    $this->db->insert('user_daftar', $data);
                    redirect('daftar');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Input gagal, anda harus mengupload foto bukti transfer pembayaran</div>');
                    redirect('daftar/bayarformulir');
                }
            }
        }
    }

    public function editpendaftaran()
    {
        $id = $this->fungsi->user_login()->user_id;
        $cekstatus = $this->Daftar_m->cekstatus($id);

        if ($cekstatus->num_rows() > 0) {
            //cek apakah sudah daftar
            $data['user_daftar'] = $cekstatus->row();

            if ($data['user_daftar']->status == 2) {
                //cek apakah memang ditolak admin
                $data['tittle'] = "Edit Pendaftaran";

                $this->form_validation->set_rules('telp', 'Telp', 'required|numeric|min_length[10]|max_length[15]');
                $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|min_length[10]|max_length[30]');
                //message
                $this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');
                $this->form_validation->set_message('numeric', '%s harus diisi dengan nominasi angka');
                $this->form_validation->set_message('valid_email', '%s harus diisi dengan email yang valid');
                $this->form_validation->set_message('min_length', '%s harus diisi minimal 10 karakter');
                $this->form_validation->set_message('max_length', '%s anda terlalu panjang');
                if ($this->form_validation->run() == false) {
                    $this->template->load('temp_dashboard', 'user/daftar/edit-pendaftaran', $data);
                } else {
                    // cek jika ada gambar
                    $upload_image = $_FILES['image']['name'];
                    $username = $this->fungsi->user_login()->username;

                    if ($upload_image) {
                        $config['allowed_types'] = 'gif|jpg|png';
                        $config['max_size']      = '1048';
                        $config['upload_path'] = './assets/data/' . $username;

                        if (!is_dir('./assets/data/' . $username)) {
                            mkdir('./assets/data/' . $username, 0777, TRUE);
                        }

                        $this->load->library('upload', $config);

                        if ($this->upload->do_upload('image')) {
                            $old_image = $data['user_daftar']->foto_bukti_transfer;
                            if ($old_image != 'default.jpg') {
                                unlink(FCPATH . 'assets/data/' . $old_image);
                            }

                            $new_image = $this->upload->data('file_name');
                            $this->db->set('foto_bukti_transfer', $username . '/' . $new_image);
                        } else {
                            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                            redirect('daftar/editpendaftaran');
                        }
                    }

                    $this->db->set('telp', htmlspecialchars($this->input->post('telp'), true));
                    $this->db->set('email', htmlspecialchars($this->input->post('email'), true));
                    $this->db->set('status', 0);
                    $this->db->where('id_user', $id);
                    $this->db->update('user_daftar');
                    redirect('daftar');
                }
            } else {
                redirect('daftar');
            }
        } else {
            redirect('daftar');
        }
    }
}

/* End of file Daftar.php */

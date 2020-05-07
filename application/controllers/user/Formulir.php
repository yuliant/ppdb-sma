<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Formulir extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        check_user();
        $this->load->library('form_validation');
        $this->load->model('user/Daftar_m', 'Daftar_m');
        $this->load->model('user/Formulir_m', 'Formulir_m');
        $this->load->config('foto');
    }

    private function _random($n)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
        return $randomString;
    }

    public function index()
    {
        //user dikirim ke view untuk menampilkan nama lengkap pendaftar
        $data['user'] = $this->fungsi->user_login();
        $id = $data['user']->user_id;
        $cekdaftar = $this->Daftar_m->getDaftar($id);

        if ($cekdaftar->num_rows() > 0) {
            //belum daftar
            $cekstatus = $cekdaftar->row();
            $data['tittle'] = "Formulir";

            if ($cekstatus->status == 1) {
                $cekdatadiri = $this->Formulir_m->getDataDiri($id);

                if ($cekdatadiri->num_rows() > 0) {
                    //sudah mengisi data diri
                    $this->template->load('temp_dashboard', 'user/formulir/sdh-datadiri', $data);
                } else {
                    //sudah daftar
                    $this->form_validation->set_rules('tempat_lahir', 'Tempat lahir', 'required|trim|max_length[30]');
                    $this->form_validation->set_rules('tgl_lahir', 'Tanggal lahir', 'required|trim');
                    $this->form_validation->set_rules('agama', 'Agama', 'required|trim');
                    $this->form_validation->set_rules('kelamin', 'Kelamin', 'required|trim');
                    $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
                    $this->form_validation->set_rules('asal_sekolah', 'Asal sekolah', 'required|trim|max_length[40]');
                    $this->form_validation->set_rules('nisn', 'NISN', 'required|trim|numeric|min_length[10]|max_length[10]');
                    $this->form_validation->set_rules('thn_lulus', 'Tahun lulus', 'required|trim|numeric|min_length[4]|max_length[4]');

                    //message
                    $this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');
                    $this->form_validation->set_message('numeric', '%s harus diisi dengan nominasi angka');
                    $this->form_validation->set_message('min_length', '%s anda terlalu pendek');
                    $this->form_validation->set_message('max_length', '%s anda terlalu panjang');
                    if ($this->form_validation->run() == false) {
                        $this->template->load('temp_dashboard', 'user/formulir/data-diri-add', $data);
                    } else {
                        $post = $this->input->post(null, TRUE);
                        $username = $data['user']->username;
                        $nama = $data['user']->nama;
                        $telp = $cekstatus->telp;
                        $this->Formulir_m->addDataDiri($post, $id, $username, $nama, $telp);
                        $this->Formulir_m->addDataSekolah($post, $id);

                        redirect('formulir/dataortu');
                    }
                }
            } else {
                $this->template->load('temp_dashboard', 'user/formulir/blmverifikasi', $data);
            }
        } else {
            $data['tittle'] = "Formulir";
            $this->template->load('temp_dashboard', 'user/formulir/blmverifikasi', $data);
        }
    }

    public function dataortu()
    {
        $user = $this->fungsi->user_login();
        $id = $user->user_id;
        $cekdaftar = $this->Daftar_m->getDaftar($id);

        if ($cekdaftar->num_rows() > 0) {
            //belum daftar
            $cekstatus = $cekdaftar->row();
            $data['tittle'] = "Formulir";

            if ($cekstatus->status == 1) {
                $cekdataortu = $this->Formulir_m->getDataOrtu($id);

                if ($cekdataortu->num_rows() > 0) {
                    //sudah mengisi data ortu
                    $this->template->load('temp_dashboard', 'user/formulir/sdh-dataortu', $data);
                } else {
                    $this->form_validation->set_rules('nama_ortu', 'Nama Orang Tua', 'required|trim|max_length[30]');
                    $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim|max_length[25]');
                    $this->form_validation->set_rules('alamat', 'Alamat Orang Tua', 'required|trim');
                    $this->form_validation->set_rules('telp_ortu', 'Telp. Orang Tua', 'required|trim|numeric|max_length[15]');

                    //message
                    $this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');
                    $this->form_validation->set_message('numeric', '%s harus diisi dengan nominasi angka');
                    $this->form_validation->set_message('max_length', '%s anda terlalu panjang');
                    if ($this->form_validation->run() == false) {
                        $this->template->load('temp_dashboard', 'user/formulir/data-ortu-add', $data);
                    } else {
                        $post = $this->input->post(null, TRUE);
                        $this->Formulir_m->addDataOrtu($post, $id);
                        redirect('formulir/berkas');
                    }
                }
            } else {
                redirect('formulir');
            }
        } else {
            redirect('formulir');
        }
    }

    public function berkas()
    {
        $user = $this->fungsi->user_login();
        $id = $user->user_id;
        $cekdaftar = $this->Daftar_m->getDaftar($id);

        if ($cekdaftar->num_rows() > 0) {
            //belum daftar
            $cekstatus = $cekdaftar->row();
            $data['tittle'] = "Formulir";

            if ($cekstatus->status == 1) {
                $cekdataberkas = $this->Formulir_m->getBerkas($id);

                if ($cekdataberkas->num_rows() > 0) {
                    //sudah mengisi data berkas
                    $this->template->load('temp_dashboard', 'user/formulir/sdh-databerkas', $data);
                } else {
                    $this->form_validation->set_rules('nilai_indo', 'Nilai Bahasa Indonesia', 'required|trim|numeric|max_length[3]');
                    $this->form_validation->set_rules('nilai_ing', 'Nilai Bahasa Inggris', 'required|trim|numeric|max_length[3]');
                    $this->form_validation->set_rules('matematika', 'Nilai Matematika', 'required|trim|numeric|max_length[3]');
                    $this->form_validation->set_rules('ipa', 'Nilai Ipa', 'required|trim|numeric|max_length[3]');

                    //message
                    $this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');
                    $this->form_validation->set_message('numeric', '%s harus diisi dengan nominasi angka');
                    $this->form_validation->set_message('max_length', '%s anda terlalu panjang');
                    if ($this->form_validation->run() == false) {
                        $this->template->load('temp_dashboard', 'user/formulir/data-berkas-add', $data);
                    } else {
                        // cek jika ada gambar
                        $upload_ijasah = $_FILES['foto_ijasah_smp']['name'];
                        $upload_shun = $_FILES['foto_shun']['name'];
                        $username = $user->username;

                        if ($upload_ijasah && $upload_shun) {
                            $config['allowed_types'] = $this->config->item('type_gambar');
                            $config['max_size']      = $this->config->item('max_gambar');
                            $config['upload_path'] = './assets/data/' . $username;

                            if (!is_dir('./assets/data/' . $username)) {
                                mkdir('./assets/data/' . $username, 0777, TRUE);
                            }

                            $this->load->library('upload', $config);

                            if ($this->upload->do_upload('foto_ijasah_smp')) {
                                $file_ijasah = $this->upload->data('file_name');
                                $input_ijasah = $username . '/' . $file_ijasah;
                            } else {
                                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                                redirect('formulir/berkas');
                            }

                            if ($this->upload->do_upload('foto_shun')) {
                                $file_shun = $this->upload->data('file_name');
                                $input_shun = $username . '/' . $file_shun;
                            } else {
                                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                                redirect('formulir/berkas');
                            }
                            $post = $this->input->post(null, TRUE);
                            $token = $this->_random(10);

                            $this->Formulir_m->addDataBerkas($post, $id, $input_ijasah, $input_shun);
                            $this->Formulir_m->addDataQrcode($id, $token);
                            redirect('formulir/berkas');
                        } else {
                            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Input gagal, anda harus mengupload foto ijasah dan shun</div>');
                            redirect('formulir/berkas');
                        }
                    }
                }
            } else {
                redirect('formulir');
            }
        } else {
            redirect('formulir');
        }
    }

    public function editdatadiri()
    {
        $data_user = $this->fungsi->user_login();
        $id = $data_user->user_id;
        $cekdatadiri = $this->Formulir_m->getDataDiri($id);

        if ($cekdatadiri->num_rows() > 0) {

            $data['tittle'] = "Edit Data Diri";
            $data['data_diri_sekolah'] = $this->Formulir_m->getDataSekolah($id)->row();
            $data['data_diri_pribadi'] = $cekdatadiri->row();

            //sudah daftar
            $this->form_validation->set_rules('tempat_lahir', 'Tempat lahir', 'required|trim|max_length[30]');
            $this->form_validation->set_rules('tgl_lahir', 'Tanggal lahir', 'required|trim');
            $this->form_validation->set_rules('agama', 'Agama', 'required|trim');
            $this->form_validation->set_rules('kelamin', 'Kelamin', 'required|trim');
            $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
            $this->form_validation->set_rules('asal_sekolah', 'Asal sekolah', 'required|trim|max_length[40]');
            $this->form_validation->set_rules('nisn', 'NISN', 'required|trim|numeric|min_length[10]|max_length[10]');
            $this->form_validation->set_rules('thn_lulus', 'Tahun lulus', 'required|trim|numeric|min_length[4]|max_length[4]');

            //message
            $this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');
            $this->form_validation->set_message('numeric', '%s harus diisi dengan nominasi angka');
            $this->form_validation->set_message('min_length', '%s anda terlalu pendek');
            $this->form_validation->set_message('max_length', '%s anda terlalu panjang');

            if ($this->form_validation->run() == false) {
                $this->template->load('temp_dashboard', 'user/formulir/data-diri-edit', $data);
            } else {
                $post = $this->input->post(null, TRUE);
                $this->Formulir_m->editDataDiri($post, $id);
                $this->Formulir_m->editDataSekolah($post, $id);

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edit data diri berhasil</div>');
                redirect('formulir');
            }
        } else {
            redirect('formulir');
        }
    }

    public function editdataortu()
    {
        $data_user = $this->fungsi->user_login();
        $id = $data_user->user_id;
        $cekdataortu = $this->Formulir_m->getDataOrtu($id);

        if ($cekdataortu->num_rows() > 0) {
            $data['tittle'] = "Edit Data Orang Tua";
            $data['data_diri_ortu'] = $cekdataortu->row();

            $this->form_validation->set_rules('nama_ortu', 'Nama Orang Tua', 'required|trim|max_length[30]');
            $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim|max_length[25]');
            $this->form_validation->set_rules('alamat', 'Alamat Orang Tua', 'required|trim');
            $this->form_validation->set_rules('telp_ortu', 'Telp. Orang Tua', 'required|trim|numeric|max_length[15]');

            //message
            $this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');
            $this->form_validation->set_message('numeric', '%s harus diisi dengan nominasi angka');
            $this->form_validation->set_message('max_length', '%s anda terlalu panjang');

            if ($this->form_validation->run() == false) {
                $this->template->load('temp_dashboard', 'user/formulir/data-ortu-edit', $data);
            } else {
                $post = $this->input->post(null, TRUE);
                $this->Formulir_m->editDataOrtu($post, $id);

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edit data orang tua berhasil</div>');
                redirect('formulir/dataortu');
            }
        } else {
            redirect('formulir');
        }
    }

    public function editberkas()
    {
        $data_user = $this->fungsi->user_login();
        $id = $data_user->user_id;
        $cekberkas = $this->Formulir_m->getBerkas($id);

        if ($cekberkas->num_rows() > 0) {
            $data['tittle'] = "Edit Data Berkas";
            $data['data_berkas'] = $cekberkas->row();

            $this->form_validation->set_rules('nilai_indo', 'Nilai Bahasa Indonesia', 'required|trim|numeric|max_length[3]');
            $this->form_validation->set_rules('nilai_ing', 'Nilai Bahasa Inggris', 'required|trim|numeric|max_length[3]');
            $this->form_validation->set_rules('matematika', 'Nilai Matematika', 'required|trim|numeric|max_length[3]');
            $this->form_validation->set_rules('ipa', 'Nilai Ipa', 'required|trim|numeric|max_length[3]');

            //message
            $this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');
            $this->form_validation->set_message('numeric', '%s harus diisi dengan nominasi angka');
            $this->form_validation->set_message('max_length', '%s anda terlalu panjang');
            if ($this->form_validation->run() == false) {
                $this->template->load('temp_dashboard', 'user/formulir/data-berkas-edit', $data);
            } else {
                $upload_ijasah = $_FILES['foto_ijasah_smp']['name'];
                $upload_shun = $_FILES['foto_shun']['name'];
                $username = $data_user->username;
                $input_ijasah = null;
                $input_shun = null;

                if ($upload_ijasah) {
                    $config['allowed_types'] = $this->config->item('type_gambar');
                    $config['max_size']      = $this->config->item('max_gambar');
                    $config['upload_path'] = './assets/data/' . $username;

                    if (!is_dir('./assets/data/' . $username)) {
                        mkdir('./assets/data/' . $username, 0777, TRUE);
                    }

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('foto_ijasah_smp')) {
                        $old_image = $data['data_berkas']->foto_ijasah_smp;
                        if ($old_image != 'default.jpg') {
                            unlink(FCPATH . 'assets/data/' . $old_image);
                        }
                        $file_ijasah = $this->upload->data('file_name');
                        $input_ijasah = $username . '/' . $file_ijasah;
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                        redirect('formulir/editberkas');
                    }
                }

                if ($upload_shun) {
                    $config['allowed_types'] = $this->config->item('type_gambar');
                    $config['max_size']      = $this->config->item('max_gambar');
                    $config['upload_path'] = './assets/data/' . $username;

                    if (!is_dir('./assets/data/' . $username)) {
                        mkdir('./assets/data/' . $username, 0777, TRUE);
                    }

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('foto_shun')) {
                        $old_image = $data['data_berkas']->foto_shun;
                        if ($old_image != 'default.jpg') {
                            unlink(FCPATH . 'assets/data/' . $old_image);
                        }
                        $file_shun = $this->upload->data('file_name');
                        $input_shun = $username . '/' . $file_shun;
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                        redirect('formulir/editberkas');
                    }
                }

                $post = $this->input->post(null, TRUE);
                $this->Formulir_m->editDataBerkas($post, $id, $input_ijasah, $input_shun);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edit data berkas berhasil</div>');
                redirect('formulir/berkas');
            }
        } else {
            redirect('formulir');
        }
    }
}

/* End of file Formulir.php */

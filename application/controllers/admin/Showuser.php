<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Showuser extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
        $this->load->model('admin/Showuser_m', 'Showuser_m');
        $this->load->model('admin/Pagination_m', 'Pagination_m');
    }

    public function index()
    {
        $data['tittle'] = "Semua User";

        //load library pagination
        $this->load->library('pagination');

        //delete session from 'keywordUser'
        $this->session->unset_userdata('keywordUser');

        //ambil data searching
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keywordUser', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keywordUser');
        }

        //menghitung jumlah data yang dicari
        $countAllResults = $this->Showuser_m->AllUser(
            null,
            null,
            $data['keyword']
        );

        $config['total_rows'] = $countAllResults->num_rows();
        $config['base_url'] = $this->Pagination_m->urlUser();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = $this->Pagination_m->perPage();

        //initialize
        $this->pagination->initialize($config);

        //set data to show
        $data['start'] = $this->uri->segment(3);
        $data['user_row'] = $this->Showuser_m->AllUser(
            $config['per_page'],
            $data['start'],
            $data['keyword']
        );

        $this->template->load('temp_dashboard', 'admin/showuser/index', $data);
    }

    public function detail($id)
    {
        $data['tittle'] = "Detail User";
        $data['detail_user'] = $this->Showuser_m->UserById($id)->row();
        $this->template->load('temp_dashboard', 'admin/showuser/detail', $data);
    }

    public function changestatus()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['tidakaktif'])) {
            $this->Showuser_m->userNonAktif($post);
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User telah dinonaktifkan</div>');
            redirect('showuser/detail/' . $post['user_id']);
        } elseif (isset($_POST['aktif'])) {
            $this->Showuser_m->userAktif($post);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User telah diaktifkan</div>');
            redirect('showuser/detail/' . $post['user_id']);
        } else {
            redirect('showuser');
        }
    }

    public function deleteuser()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['hapus'])) {
            $data_user = $this->Showuser_m->UserById($post['user_id'])->row();

            //delete folder and all file
            $path = './assets/data/' . $data_user->username;
            $this->_deleteFolder($path);

            //message successful delete
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User dan datanya atas nama <b>' . $data_user->nama . '</b> berhasil dihapus</div>');

            //delete process
            $this->Showuser_m->deleteUser($post);
            redirect('showuser');
        } else {
            redirect('showuser');
        }
    }

    private function _deleteFolder($path)
    {
        if (is_dir($path) === true) {
            $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path), RecursiveIteratorIterator::CHILD_FIRST);

            foreach ($files as $file) {
                if (in_array($file->getBasename(), array('.', '..')) !== true) {
                    if ($file->isDir() === true) {
                        rmdir($file->getPathName());
                    } else if (($file->isFile() === true) || ($file->isLink() === true)) {
                        unlink($file->getPathname());
                    }
                }
            }

            return rmdir($path);
        } else if ((is_file($path) === true) || (is_link($path) === true)) {
            return unlink($path);
        } else {
            return false;
        }

        return false;
    }
}

/* End of file Showuser.php */

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
    }

    function get_ajax()
    {
        $list = $this->Showuser_m->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            ++$no;
            $row = array();
            $row['no'] = $no . ".";
            $row['nama'] = $item->is_active != 1 ?
                '<div class="bg-danger"><a href="' . base_url('showuser/detail/') . $item->user_id . '"><p class="text-white">' . $item->nama . '</p></a></div>'
                : '<a href="' . base_url('showuser/detail/') . $item->user_id . '">' . $item->nama . '</a>';

            $row['username'] = $item->username;
            $row['is_active'] = $item->is_active != 1 ? '<div class="badge badge-danger">Tidak aktif</div>' : '<div class="badge badge-success">Aktif</div>';

            // add html for action
            $row['action'] = '
            <form action="' . base_url('showuser/deleteuser') . '" method="post">
                <a href="' . base_url('showuser/detail/' . $item->user_id) . '" class="badge badge-info btn-xs">Baca</a>
                <input type="hidden" name="user_id" value="' . $item->user_id . '">
                <button onclick="return confirm(\'Apakah anda yakin menghapus data ini?\')"  class="btn btn-danger btn-sm ml-2 btn-xs" name="hapus" type="hapus"><i class="fa fa-trash"></i> Delete</button>
            </form>';

            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->Showuser_m->count_all(),
            "recordsFiltered" => $this->Showuser_m->count_filtered(),
            "data" => $data,
        );
        // output to json format
        echo json_encode($output);
    }

    public function index()
    {
        $data['tittle'] = "Semua User";
        $this->template->load('temp_dashboard', 'admin/showuser/datatable', $data);
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

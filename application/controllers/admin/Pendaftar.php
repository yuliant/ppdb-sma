<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
        $this->load->model('admin/Pendaftar_m', 'Pendaftar_m');
    }

    function get_ajax()
    {
        $list = $this->Pendaftar_m->get_datatables();
        $data = array();
        $no = @$_POST['start'];

        foreach ($list as $item) {
            ++$no;
            $row = array();
            $row['no'] = $no . ".";

            if ($item->status == 1) {
                $row['nama'] = '<a href="' . base_url('pendaftar/detail/') . $item->id_user . '">' . $item->nama . '</a>';
                $row['status'] = '<div class="badge badge-success">Dikonfirmasi</div>';
            } elseif ($item->status == 2) {
                $row['nama'] = '<div class="bg-danger"><a href="' . base_url('pendaftar/detail/') . $item->id_user . '"><p class="text-white">' . $item->nama . '</p></a></div>';
                $row['status'] = '<div class="badge badge-danger">Ditolak</div>';
            } else {
                $row['nama'] = '<div class="bg-warning"><a href="' . base_url('pendaftar/detail/') . $item->id_user . '"><p class="text-white">' . $item->nama . '</p></a></div>';
                $row['status'] = '<div class="badge badge-warning">Belum dikonfirmasi</div>';
            }

            $row['tgl_daftar'] = date("d-m-Y", strtotime($item->daftar_created));

            // add html for action
            $row['action'] = '<a href="' . base_url('pendaftar/detail/' . $item->id_user) . '" class="badge badge-info btn-xs">Baca</a>';

            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->Pendaftar_m->count_all(),
            "recordsFiltered" => $this->Pendaftar_m->count_filtered(),
            "data" => $data,
        );
        // output to json format
        echo json_encode($output);
    }

    public function index()
    {
        $data['tittle'] = "Para Pendaftar";
        $this->template->load('temp_dashboard', 'admin/pendaftar/datatable', $data);
    }

    public function detail($id)
    {
        $data['tittle'] = "Detail Pendaftar";
        $data['daftar'] = $this->Pendaftar_m->UserDaftarById($id)->row();
        $this->template->load('temp_dashboard', 'admin/pendaftar/detail', $data);
    }

    public function changestatus()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['konfirmasi'])) {
            $this->Pendaftar_m->konfirmasiDaftar($post);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Konfirmasi pembayaran berhasil dilakukan</div>');
            redirect('pendaftar/detail/' . $post['id_user']);
        } elseif (isset($_POST['tolak'])) {
            $this->Pendaftar_m->tolakDaftar($post);
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Konfirmasi pembayaran telah ditolak</div>');
            redirect('pendaftar/detail/' . $post['id_user']);
        } else {
            redirect('pendaftar');
        }
    }
}

/* End of file Pendaftar.php */

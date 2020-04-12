<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftar_m extends CI_Model
{
    public function AllUserDaftar($limit, $start, $keyword = null)
    {
        $this->db->select('user.nama, user_daftar.*');
        $this->db->from('user_daftar');
        $this->db->join('user', 'user.user_id = user_daftar.id_user');

        if ($keyword != null) {
            $this->db->like('user.nama', $keyword);
        }

        $this->db->order_by('user_daftar.daftar_created', 'asc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query;
    }

    public function UserDaftarById($id)
    {
        $this->db->select('user.nama, user_daftar.*');
        $this->db->from('user_daftar');
        $this->db->join('user', 'user.user_id = user_daftar.id_user');
        $this->db->where('user_daftar.id_user', $id);

        $query = $this->db->get();
        return $query;
    }

    public function konfirmasiDaftar($post)
    {
        $params['status'] = 1;
        $this->db->where('id_user', $post['id_user']);
        $this->db->update('user_daftar', $params);
    }

    public function tolakDaftar($post)
    {
        $params['status'] = 2;
        $this->db->where('id_user', $post['id_user']);
        $this->db->update('user_daftar', $params);
    }
}

/* End of file Pendaftar_m.php */

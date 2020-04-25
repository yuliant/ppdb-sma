<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Showuser_m extends CI_Model
{
    public function AllUser($limit, $start, $keyword = null)
    {
        $this->db->select('user.*');
        $this->db->from('user');

        if ($keyword != null) {
            $this->db->like('nama', $keyword);
            $this->db->or_like('username', $keyword);
        }

        $this->db->order_by('date_created', 'desc');
        $this->db->limit($limit, $start);
        $this->db->where('level', 2);
        $query = $this->db->get();
        return $query;
    }

    public function UserById($id)
    {
        $this->db->select('
            user.user_id,
            user.nama,
            user.username,
            user.image,
            user.is_active,
            user.date_created
        ');
        $this->db->from('user');
        $this->db->where('user_id', $id);

        $query = $this->db->get();
        return $query;
    }

    public function userNonAktif($post)
    {
        $params['is_active'] = 0;
        $this->db->where('user_id', $post['user_id']);
        $this->db->update('user', $params);
    }

    public function userAktif($post)
    {
        $params['is_active'] = 1;
        $this->db->where('user_id', $post['user_id']);
        $this->db->update('user', $params);
    }

    public function deleteUser($post)
    {
        $this->db->where('user_id', $post['user_id']);
        $this->db->delete('user');
    }
}

/* End of file Showuser_m.php */

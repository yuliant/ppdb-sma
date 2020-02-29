<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('user');
        if ($id != null) {
            $this->db->where('user_id', $id);
        } else {
            $this->db->order_by('user_id', 'desc');
        }
        $query = $this->db->get();
        return $query;
    }
}

/* End of file User_m.php */

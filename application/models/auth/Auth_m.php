<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_m extends CI_Model
{
    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', htmlspecialchars($post['username'], true));
        $query = $this->db->get();
        return $query;
    }
}

/* End of file Auth_m.php */

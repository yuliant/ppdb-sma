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

    public function registration($post)
    {
        $data = [
            'nama' => htmlspecialchars($post['name'], true),
            'username' => htmlspecialchars($post['username'], true),
            'password' => password_hash($post['password1'], PASSWORD_DEFAULT),
            'image' => 'default.jpg',
            'level' => 2,
            'is_active' => 1,
            'date_created' => gmdate("Y-m-d H:i:s", time() + 3600 * 7) //indonesian time
        ];
        $this->db->insert('user', $data);
    }
}

/* End of file Auth_m.php */

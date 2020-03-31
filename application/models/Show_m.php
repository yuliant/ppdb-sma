<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Show_m extends CI_Model
{
    public function getIdQrcode($token)
    {
        $this->db->select('id_user');
        $this->db->from('data_qrcode');
        $this->db->where('token', $token);
        $query = $this->db->get();
        return $query;
    }

    public function getTokenQrcode($id)
    {
        $this->db->select('token');
        $this->db->from('data_qrcode');
        $this->db->where('id_user', $id);
        $query = $this->db->get();
        return $query;
    }
}

/* End of file Show_m.php */

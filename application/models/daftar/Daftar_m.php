<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_m extends CI_Model
{
    public function cekstatus($id)
    {
        $this->db->from('user_daftar');
        if ($id != null) {
            $this->db->where('id_user', $id);
        }
        $query = $this->db->get();
        return $query;
    }
}

/* End of file Daftar_m.php */

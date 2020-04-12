<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_m extends CI_Model
{
    public function getDaftar($id = null)
    {
        $this->db->from('user_daftar');
        if ($id != null) {
            $this->db->where('id_user', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function addDaftar($post, $id, $foto_pembayaran)
    {
        $this->db->set('id_user', $id);
        $this->db->set('telp', htmlspecialchars($post['telp'], true));
        $this->db->set('email', htmlspecialchars($post['email'], true));
        $this->db->set('foto_bukti_transfer', $foto_pembayaran);
        $this->db->set('status', 0);
        $this->db->set('daftar_created', gmdate("Y-m-d H:i:s", time() + 3600 * 7));
        $this->db->insert('user_daftar');
    }

    public function editDaftar($post, $id, $foto_pembayaran = null)
    {
        $this->db->set('telp', htmlspecialchars($post['telp'], true));
        $this->db->set('email', htmlspecialchars($post['email'], true));
        if ($foto_pembayaran != null) {
            $this->db->set('foto_bukti_transfer', $foto_pembayaran);
        }
        $this->db->set('status', 0);
        $this->db->set('daftar_created', gmdate("Y-m-d H:i:s", time() + 3600 * 7));
        $this->db->where('id_user', $id);
        $this->db->update('user_daftar');
    }
}

/* End of file Daftar_m.php */

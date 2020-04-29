<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran_m extends CI_Model
{
    public function getPembayaran()
    {
        $this->db->select('
            env_pembayaran.nama_bank,
            env_pembayaran.jml_uang,
            env_pembayaran.rekening,
            env_pembayaran.atas_nama
        ');

        $this->db->from('env_pembayaran');
        $query = $this->db->get();
        return $query;
    }

    public function setPembayaran($post)
    {
        $this->db->set('nama_bank', htmlspecialchars($post['nama_bank'], true));
        $this->db->set('jml_uang', htmlspecialchars($post['jml_uang'], true));
        $this->db->set('rekening', htmlspecialchars($post['rekening'], true));
        $this->db->set('atas_nama', htmlspecialchars($post['atas_nama'], true));
        $this->db->update('env_pembayaran');
    }
}

/* End of file Pembayaran_m.php */

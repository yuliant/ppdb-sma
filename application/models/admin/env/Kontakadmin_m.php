<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kontakadmin_m extends CI_Model
{
    public function getKontak()
    {
        $this->db->select('
            env_kontak_admin.nama_kontak,
            env_kontak_admin.nomor_kontak,
            env_kontak_admin.email_admin,
            env_kontak_admin.alamat_admin
        ');

        $this->db->from('env_kontak_admin');
        $query = $this->db->get();
        return $query;
    }

    public function setKontak($post)
    {
        $this->db->set('nama_kontak', htmlspecialchars($post['nama_kontak'], true));
        $this->db->set('nomor_kontak', htmlspecialchars($post['nomor_kontak'], true));
        $this->db->set('email_admin', htmlspecialchars($post['email_admin'], true));
        $this->db->set('alamat_admin', htmlspecialchars($post['alamat_admin'], true));
        $this->db->update('env_kontak_admin');
    }
}

/* End of file Kontakadmin_m.php */

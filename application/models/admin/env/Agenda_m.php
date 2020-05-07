<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Agenda_m extends CI_Model
{
    public function getAgenda()
    {
        $this->db->select('
            env_agenda.agenda,
            env_agenda.tapel,
            env_agenda.foto_daftar_ulang,
            env_agenda.foto_bg,
            env_agenda.aktif
        ');

        $this->db->from('env_agenda');
        $query = $this->db->get();
        return $query;
    }

    public function setAgenda($post, $fotodaftarulang = null, $fotobg = null)
    {
        $this->db->set('agenda', htmlspecialchars($post['agenda'], true));
        $this->db->set('tapel', htmlspecialchars($post['tapel'], true));
        if ($fotodaftarulang != null) {
            $this->db->set('foto_daftar_ulang', $fotodaftarulang);
        }
        if ($fotobg != null) {
            $this->db->set('foto_bg', $fotobg);
        }
        $this->db->set('aktif', htmlspecialchars($post['aktif'], true));
        $this->db->update('env_agenda');
    }
}

/* End of file Agenda_m.php */

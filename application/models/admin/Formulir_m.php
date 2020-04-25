<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Formulir_m extends CI_Model
{
    public function getAllFormulir($id = null, $limit, $start, $keyword = null)
    {
        $this->db->select('data_diri_pribadi.*, data_diri_sekolah.*, data_ortu.*, data_berkas.*');
        $this->db->from('data_diri_pribadi');
        $this->db->join('data_diri_sekolah', 'data_diri_sekolah.id_user = data_diri_pribadi.id_user', 'left');
        $this->db->join('data_ortu', 'data_ortu.id_user = data_diri_pribadi.id_user', 'left');
        $this->db->join('data_berkas', 'data_berkas.id_user = data_diri_pribadi.id_user', 'left');

        if ($keyword != null) {
            $this->db->like('data_diri_pribadi.nama', $keyword);
            $this->db->or_like('data_diri_pribadi.username', $keyword);
            $this->db->or_like('data_berkas.berkas_created', $keyword);
        }

        if ($id != null) {
            $this->db->where('data_diri_pribadi.id_user', $id);
        } else {
            $this->db->limit($limit, $start);
        }

        $this->db->order_by('data_berkas.berkas_created', 'desc');
        $query = $this->db->get();
        return $query;
    }
}

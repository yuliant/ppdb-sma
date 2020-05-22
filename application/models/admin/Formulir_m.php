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

        $this->db->order_by('data_berkas.berkas_created', 'asc');
        $query = $this->db->get();
        return $query;
    }

    // start datatables
    var $column_order = array('data_diri_pribadi.id_user', 'data_diri_pribadi.nama', 'data_diri_pribadi.username', 'data_berkas.berkas_created'); //set column field database for datatable orderable
    var $column_search = array('data_diri_pribadi.nama', 'data_diri_pribadi.username', 'data_berkas.berkas_created'); //set column field database for datatable searchable
    var $order = array('data_berkas.berkas_created' => 'desc'); // default order

    private function _get_datatables_query()
    {
        $this->db->select('data_diri_pribadi.*, data_diri_sekolah.*, data_ortu.*, data_berkas.*');
        $this->db->from('data_diri_pribadi');
        $this->db->join('data_diri_sekolah', 'data_diri_sekolah.id_user = data_diri_pribadi.id_user');
        $this->db->join('data_ortu', 'data_ortu.id_user = data_diri_pribadi.id_user');
        $this->db->join('data_berkas', 'data_berkas.id_user = data_diri_pribadi.id_user');
        $i = 0;
        foreach ($this->column_search as $item) { // loop column
            if (@$_POST['search']['value']) { // if datatable send POST for search
                if ($i === 0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function get_datatables()
    {
        $this->_get_datatables_query();
        if (@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all()
    {
        // $this->db->from('data_diri_pribadi');
        // $this->db->join('data_diri_sekolah', 'data_diri_sekolah.id_user = data_diri_pribadi.id_user');
        // $this->db->join('data_ortu', 'data_ortu.id_user = data_diri_pribadi.id_user');
        // $this->db->join('data_berkas', 'data_berkas.id_user = data_diri_pribadi.id_user');
        $this->_get_datatables_query();
        $query = $this->db->count_all_results();
        return $query;
    }
    // end datatables
}

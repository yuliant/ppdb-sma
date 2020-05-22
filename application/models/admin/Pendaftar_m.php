<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftar_m extends CI_Model
{
    public function AllUserDaftar($limit, $start, $keyword = null)
    {
        $this->db->select('user.nama, user_daftar.*');
        $this->db->from('user_daftar');
        $this->db->join('user', 'user.user_id = user_daftar.id_user');

        if ($keyword != null) {
            $this->db->like('user.nama', $keyword);
        }

        $this->db->order_by('user_daftar.daftar_created', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query;
    }

    // start datatables
    var $column_order = array('user_daftar.id_user', 'user.nama', 'user_daftar.daftar_created', 'user_daftar.status'); //set column field database for datatable orderable
    var $column_search = array('user.nama', 'user_daftar.daftar_created'); //set column field database for datatable searchable
    var $order = array('user_daftar.daftar_created' => 'desc'); // default order

    private function _get_datatables_query()
    {
        $this->db->select('user.nama, user_daftar.*');
        $this->db->from('user_daftar');
        $this->db->join('user', 'user.user_id = user_daftar.id_user');
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
        // $this->db->from('user_daftar');
        $this->_get_datatables_query();
        $query = $this->db->count_all_results();
        return $query;
    }
    // end datatables

    public function UserDaftarById($id)
    {
        $this->db->select('user.nama, user_daftar.*');
        $this->db->from('user_daftar');
        $this->db->join('user', 'user.user_id = user_daftar.id_user');
        $this->db->where('user_daftar.id_user', $id);

        $query = $this->db->get();
        return $query;
    }

    public function konfirmasiDaftar($post)
    {
        $params['status'] = 1;
        $this->db->where('id_user', $post['id_user']);
        $this->db->update('user_daftar', $params);
    }

    public function tolakDaftar($post)
    {
        $params['status'] = 2;
        $this->db->where('id_user', $post['id_user']);
        $this->db->update('user_daftar', $params);
    }
}

/* End of file Pendaftar_m.php */

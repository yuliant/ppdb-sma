<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Showuser_m extends CI_Model
{
    public function AllUser($limit, $start, $keyword = null)
    {
        $this->db->select('user.*');
        $this->db->from('user');

        if ($keyword != null) {
            $this->db->like('nama', $keyword);
            $this->db->or_like('username', $keyword);
        }

        $this->db->order_by('date_created', 'desc');
        $this->db->limit($limit, $start);
        $this->db->where('level', 2);
        $query = $this->db->get();
        return $query;
    }

    // start datatables
    var $column_order = array('user_id', 'nama', 'username', 'is_active'); //set column field database for datatable orderable
    var $column_search = array('nama', 'username'); //set column field database for datatable searchable
    var $order = array('user_id' => 'desc'); // default order

    private function _get_datatables_query()
    {
        $this->db->select('user.*');
        $this->db->from('user');
        $this->db->where('level', 2);
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
        // $this->db->from('user');
        $this->_get_datatables_query();
        $query = $this->db->count_all_results();
        return $query;
    }
    // end datatables

    public function UserById($id)
    {
        $this->db->select('
            user.user_id,
            user.nama,
            user.username,
            user.image,
            user.is_active,
            user.date_created
        ');
        $this->db->from('user');
        $this->db->where('user_id', $id);

        $query = $this->db->get();
        return $query;
    }

    public function userNonAktif($post)
    {
        $params['is_active'] = 0;
        $this->db->where('user_id', $post['user_id']);
        $this->db->update('user', $params);
    }

    public function userAktif($post)
    {
        $params['is_active'] = 1;
        $this->db->where('user_id', $post['user_id']);
        $this->db->update('user', $params);
    }

    public function deleteUser($post)
    {
        $this->db->where('user_id', $post['user_id']);
        $this->db->delete('user');
    }
}

/* End of file Showuser_m.php */

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_pendeta extends CI_Model {

    function get_datatables() {
        $this->get_datatables_query();
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    function count_filtered() {
        $this->get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all() {
        $this->db->select('id, nama_lengkap')->from('jemaats')->where('gerejaid', $this->session->userdata('gereja_id'));

        return $this->db->count_all_results();
    }

    private function get_datatables_query() {
        
        $this->db->select('id, nama_lengkap')->from('jemaats')->where('gerejaid', $this->session->userdata('gereja_id'));
        $column_search = array('nama_lengkap');
        $i = 0;

        foreach ($column_search as $item) {  // looping awal
            if ($_POST['search']['value']) { // jika datatable mengirimkan pencarian dengan metode POST
                if ($i === 0) { // looping awal
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i)
                    ;
            }
            $i++;
        }

        $column_order = array('', 'nama_lengkap', '', '', '', '', '', '', '', '', '', '', '');

        if (isset($_POST['order'])) {
            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $order_by = array("nama_lengkap" => "asc");
            $this->db->order_by(key($order_by), $order_by[key($order_by)]);
        }
    }

}

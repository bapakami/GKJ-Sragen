<?php

class M_jemaat extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function dataJemaat($id)
    {
        $this->db->select('*, jemaats.id as id_jemaats')->from('jemaats')->join('users', 'jemaats.id_user = users.id')->where('jemaats.id_user =', $id);
        $query = $this->db->get()->row_array();
        return $query;
    }
    function editDataJemaat($data, $id)
    {
        return $this->db->where('id', $id)->update('jemaats', $data);
    }
    function saveFoto($jenis, $link, $id)
    {
        $cekUser = $this->db->get_where('tb_dokumen_warga', array('id_warga' => $id))->num_rows();
        return $cekUser;
        // $jumlah = $cekUser->num_rows();
        // if ($jumlah <= 0) {
        //     $data = array(
        //         $jenis => $link,
        //     );
        //     return $this->db->insert('tb_dokumen_warga', $data);
        // } else {
        //     $files = $cekUser->row();
        //     if ($files->$jenis == '') {
        //         return $this->db->set($jenis, $link)->where('id_warga', $id)->update('tb_dokumen_warga');
        //     }
        // }
    }
    function saveFile($jenis, $link)
    {
        $data = array(
            $jenis => $link,
        );
        return $this->db->insert('tb_dokumen_warga', $data);
    }
    function editFile($jenis, $link, $id)
    {
        return $this->db->set($jenis, $link)->where('id_warga', $id)->update('tb_dokumen_warga');
    }
    function getDokumen($id)
    {
        return $this->db->get_where('tb_dokumen_warga', array('id_warga' => $id))->row_array();
    }
}
